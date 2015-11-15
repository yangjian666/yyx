<?php
/**
 * Created by PhpStorm.
 * User: triumyang
 * Date: 15-11-8
 * Time: 下午8:06
 */

class Deposit extends BasicDW{

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
        $resultJson = json_decode($result);
        if($resultJson && $resultJson->code == '0' && count($resultJson->result) > 0){
            $resultJson = $resultJson->result;

            return $resultJson;
        }
        setLogInfo($resultJson,__FILE__,__LINE__,'warn','最近10条记录接口失败');

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
    public function checkAddrIsInSystem($addr, &$addressInfo){
        $addressInfo = null;
        $conditions = " account = '{$addr}' ";

        $uwDao = MD('UserWallet');
        $items = $uwDao->gets($conditions);
        //已有钱包地址
        if(count($items) > 0){
            $addressInfo = $items[0];
            return true;
        }
        return false;
    }

    /*
     * 校验交易记录是否在交易表中  yyx_user_deposit ok
     */
    public function checkTradeIsInTradeHistory($txid, &$tradeInfo){
        $tradeInfo = null;
        $conditions = " txid = '{$txid}' ";

        $udDao = MD('UserDeposit');
        $items = $udDao->gets($conditions);
        //已有钱包地址
        if(count($items) > 0){
            $tradeInfo = $items[0];
            return true;
        }
        return false;
    }


    /*
     * 更新交易记录中的confirm yyx_user_deposit
     */
    public function updateTradeConfirmations($confirms, $txid){

        $model = array(
            "confirmations" => $confirms
        );
        $conditions = " txid = '{$txid}' ";

        $udDao = MD('UserDeposit');
        $ret = $udDao->updates($model, $conditions);

        return $ret;
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
     * 3. 校验钱包地址存在性
     * 4.存在: 查询交易详情
     * 5. 查到详情, 校验详情是否有效
     * 6. 有效查询是否存在该交易记录
     * 7.存在，更新confimations
     * 8. 不存在，插入
     * 9. 插入成功，充值成功，更新账面余额
     */
    public function  doDiposit(){
        //1
        $latestTrades = $this->getLatestTradeRecord();
        if($latestTrades == null){
            return false;
        }

        $depositTrades = array();
        $withdrawTrades = array();
        //2
        $this->getSendReceiveArray($latestTrades, $withdrawTrades, $depositTrades);

        $depositLen = count($depositTrades);
        for($i = 0; $i < $depositLen; $i++){
            $trade = $depositTrades[$i];
            $addressInfo = null;//钱包地址对应的用户
            //3， 每一条记录中的钱包地址在系统中？
            if($this->checkAddrIsInSystem($trade->address, $addressInfo)){
                //4
                $tradeInfo = $this->getTradeDetailInfo($trade->address);

                if($tradeInfo){//5
                    if($this->isTradeInfoIsValid($tradeInfo, $trade->address)){

                        $ret = $this->updateTradeConfirmations($trade->confirmations, $trade->txid);
                        //7 更新成功表示存在
                        if($ret){
                            setLogInfo($tradeInfo,__FILE__,__LINE__,'info','充值交易已成功');
                        }else{
                            //8 不成功，则不存在，插入
                            $model = array(
                                'user_id' => $addressInfo['user_id'],
                                'wealth_type' => $addressInfo['wealth_type'],
                                'amount' => $trade->amount,
                                'wallet_address' => $trade->address,
                                'confirmations' => $trade->confirmations,
                                'txid' => $trade->txid,
                                'add_time' => time()
                            );
                            try {
                                //9
                                //9.1 插入交易充值记录表
                                if($this->addUserDepositRecord($model)) {
                                    //9.2 插入io表 (9.3 更新用户余额，用户信息表)包含在9.2中

                                    $rechargeService = MemberServiceFactory::getRechargeService();
                                    $userService = MemberServiceFactory::getUserService();
                                    try {
                                        $user = $userService->get($addressInfo['user_id']);

                                        //内部已经捕获
                                        $ret = $rechargeService->setPaySuccess($user, $model);
                                        if (!$ret) {
                                            setLogInfo($tradeInfo,__FILE__,__LINE__,'fatal','充值交易记录插入出错,更新IO失败[人工处理]');
                                        }
                                    }catch (Exception $e){
                                        setLogInfo($tradeInfo,__FILE__,__LINE__,'fatal','充值交易记录插入出错,未查询到用户[人工处理]');
                                    }
                                }else{
                                    setLogInfo($tradeInfo,__FILE__,__LINE__,'fatal','充值交易记录插入出错[人工处理]');
                                }
                            }catch (Exception $e){
                                //记录日志
                                setLogInfo($tradeInfo,__FILE__,__LINE__,'fatal','充值交易记录操作失败[人工处理]');
                            }
                        }
                    }
                }
            }
        }
    }

    /*
     * 增加一条充值记录 yyx_user_deposit
     */
    public function addUserDepositRecord($model){
        $udDao = MD('UserDeposit');
        try {
            $int = $udDao->add($model);//成功返回id
            if($int){
                return $int;
            }
            setLogInfo($model,__FILE__,__LINE__,'fatal',"插入充值记录失败{$int}");
        }catch (Exception $e){
            setLogInfo($model,__FILE__,__LINE__,'fatal','插入充值记录失败，一般为txid键冲突');
            return false;
        }
    }
}

?>