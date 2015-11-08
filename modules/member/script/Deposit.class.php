<?php
/**
 * Created by PhpStorm.
 * User: triumyang
 * Date: 15-11-8
 * Time: 下午8:06
 */

class Deposit{

    const MIN_CONFIRM_LIMIT = 1;

    static public $instance = null;

    static public function getInstance(){
        if(self::$instance){
            return self::$instance;
        }

        self::$instance = new Deposit();
        return self::$instance;
    }
    /*
     *
             [account] => HBCOIN_API
            [address] => HdrRfaXZ2QEC47RqKRMD7tKTQjnP6V8Eqk
            [category] => send
            [amount] => -0.18
            [fee] => 0
            [confirmations] => 11295
            [blockhash] => 00000179710cb48b9c8d4f810ba7247f85515752d478cf13f92510b4e933ec49
            [blockindex] => 3
            [blocktime] => 1441381213
            [txid] => 21f0a5024b1e92b9bcba36ef21ad25fe06e5953526ea563719f16e1f24a3f093
            [time] => 1441381051
            [timereceived] => 1441381051
            [comment] =>
            [to] =>
            [from] =>
            [message] =>
     */
    /*
     * @bief: 获取最新的10条交易记录
     */
    public function getLatestTradeRecord(){
        $reqParas = array(
            'action' => 'api_listtransactions',
            'count' => 10
        );

        include_once( EXT_LIB_ROOT .'CurlHttp.class.php');

        $result = CurlHttp::getInstance()->get($reqParas);
        $result = json_decode($result);
        if($result && $result->code == '0' && count($result->result) > 0){
            $result = $result->result;

            return $result;
        }

        return null;
    }

    /*
     *   [amount] => -0.18
    [fee] => 0
    [confirmations] => 11295
    [blockhash] => 00000179710cb48b9c8d4f810ba7247f85515752d478cf13f92510b4e933ec49
    [blockindex] => 3
    [blocktime] => 1441381213
    [txid] => 21f0a5024b1e92b9bcba36ef21ad25fe06e5953526ea563719f16e1f24a3f093
    [time] => 1441381051
    [timereceived] => 1441381051
    [comment] =>
    [to] =>
    [from] =>
    [message] =>
    [details] => Array
        (
            [0] => stdClass Object
                (
                    [account] => HBCOIN_API
                    [address] => HdrRfaXZ2QEC47RqKRMD7tKTQjnP6V8Eqk
                    [category] => send
                    [amount] => -0.18
                    [fee] => 0
                )

        )
     */
    /*
     * @brif: 获取单条交易记录的详细信息
     */
    public function getTradeDetailInfo($txId){

        if(empty($txId) || !$txId){
            return null;
        }

        $reqParas = array(
            'action' => 'api_gettransaction',
            'tx' => $txId
        );

        include_once( EXT_LIB_ROOT .'CurlHttp.class.php');

        $result = CurlHttp::getInstance()->get($reqParas);
        $result = json_decode($result);
        if($result && $result->code == '0' && $result->result){
            $result = $result->result;

            return $result;
        }

        return null;
    }


    /*
     * @brif: 拆分出10条交易记录中的充值记录和体现记录
     */
    public function getSendReceiveArray($results, &$sendArr, &$receiveArr){
        $sendArr = array();
        $receiveArr = array();

        $len = count($results);
        for($i = 0; $i < $len; $i++){
            if($results[$i]->confirmations > self::MIN_CONFIRM_LIMIT){
                if($results[$i]->category == 'send'){
                    $sendArr[] = $results[$i];
                }else if($results[$i]->category == 'receive'){
                    $receiveArr[] = $results[$i];
                }
            }
        }
        return true;
    }

    /*
     * 1. 校验钱包地址是否在该系统中 address_multiaddrs
     * 2. 不存在在放弃
     * 3. 存在，查询交易详细信息
     */
    public function checkAddrIsInSystem($addr){
        $userService = MemberServiceFactory::getUserService();
        $userId = $this->user->getId();

        $conditions = " account = '{$addr}' ";

        $uwDao = MD('UserWallet');
        $items = $uwDao->gets($conditions);
        //已有钱包地址
        if(count($items) > 0){
            return true;
        }
        return false;
    }

    /*
     * 校验交易记录是否在交易表中
     */
    public function checkTradeIsInTradeHistory($addr){

        $conditions = " wallet_address = '{$addr}' ";

        $udDao = MD('UserDeposit');
        $items = $udDao->gets($conditions);
        //已有钱包地址
        if(count($items) > 0){
            return true;
        }
        return false;
    }


    /*
     * 更新交易记录中的confirm
     */
    public function updateTradeConfirmations($confirms, $txid){

        $model = array(
            "confirmations" => $confirms
        );
        $conditions = " txid = '{$txid}' ";

        $udDao = MD('UserDeposit');
        $ret = $udDao->updates($model, $conditions);

        prit_r($ret);
        exit();
        //已有钱包地址
        if(count($items) > 0){
            return true;
        }
        return false;
    }

    /*
     * @brif: 校验一条交易记录中是否存在相反的记录，如是充值记录，是否存在体现操作
     */
    public function isTradeHasOpersite($tradeInfo, $operSite = 'send'){
        if($tradeInfo->details){
            $items = $tradeInfo->details;
            $len = count($items);
            for($i = 0; $i < $len; $i++){
                if($items[$i]->category == $operSite){
                    return true;
                }
            }
        }

        return false;
    }

    /*
     * @brif: 校验几条充值交易详情是否有效
     */
    public function isTradeInfoIsValid($tradeInfo, $addr){
        if($tradeInfo && $tradeInfo->details){
            $items = $tradeInfo->details;
            if(1 == count($items)){
                if($items[0]->category == 'receive' &&
                    $items[0]->amount > 0 &&
                    $tradeInfo->confirmations > 1 &&
                    $items[0]->address == $addr){
                    return true;
                }
            }
        }
        return false;
    }

    /*
     * 1. 查询10条交易
     * 2. 拆分出充值记录
     * 3. 校验钱包地址才能在你性
     * 4.存在: 查询交易详情
     * 5. 查到详情, 校验详情是否有效
     * 6. 有效查询是否存在该交易记录
     * 7.存在，更新confimations
     * 8. 不存在，插入
     */
    public function  doDiposit(){
        //1
        $latestTrades = $this->getLatestTradeRecord();
        if($latestTrades == null){
            return false;
        }

        $depositTrades ;
        $withdrawTrades;
        //2
        $this->getSendReceiveArray($latestTrades, $withdrawTrades, $depositTrades);

        $depositLen = count($depositTrades);
        for($i = 0; $i < $depositLen; $i++){
            $trade = $depositTrades[$i];
            //3
            if($this->checkAddrIsInSystem($trade->address)){
                //4
                $tradeInfo = $this->getTradeDetailInfo($trade->address);
                //5
                if($tradeInfo){
                    if($this->isTradeInfoIsValid($tradeInfo, $trade->address)){

                        $ret = $this->updateTradeConfirmations($trade->confirmations, $trade->txid);
                        //7
                        if($ret){

                        }else{
                            //8
                        }
                    }
                }


            }
        }
    }
}

?>