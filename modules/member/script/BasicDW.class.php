<?php
/**
 * Created by PhpStorm.
 * User: triumyang
 * Date: 15-11-15
 * Time: 下午4:27
 */

class BasicDW{

    const MIN_CONFIRM_LIMIT = 1;

    public function __construct(){
        include_once( EXT_LIB_ROOT .'CurlHttp.class.php');
    }

    /*
     * @bief: 获取最新的10条交易记录
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
    public function getLatestTradeRecord(){
        $reqParas = array(
            'action' => 'api_listtransactions',
            'count' => 10
        );


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
     * @brif: 获取单条交易记录的详细信息
     */
    /*
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
    public function getTradeDetailInfo($txId){

        if(empty($txId) || !$txId){
            return null;
        }

        $reqParas = array(
            'action' => 'api_gettransaction',
            'tx' => $txId
        );


        $result = CurlHttp::getInstance()->get($reqParas);
        $resultJson = json_decode($result);
        if($resultJson && $resultJson->code == '0' && $resultJson->result){
            $resultJson = $resultJson->result;

            return $resultJson;
        }
        setLogInfo($result,__FILE__,__LINE__,'fatal','交易详情接口失败');
        return null;
    }


    /*
     * 调用充值接口
     * my_address：用户充值收款地址[用户钱包地址]（如果钱包服务器开启加密传送，则加密充值收款地址）
        to：收款地址
        amount：金额，比如2.35个DKC，account=2.35
        minconf：默认为1，0为即时返回信息（可以忽略）
        comment：备注类提示信息（可以忽略）
        comment_to：备注类提示信息（可以忽略）
     * action=api_pay&account=api&
     * my_address=DFxfAd7hDFftTxoV6sXLomfZHiR9WXgGcD&
     * to=DA3VeFBN37SG5nereN7NbumW5ZTKE1U75W
     * &amount=0.12&minconf=1&comment=aa&comment_to=bbb&accountpass=admin12345
     */
    public function withdrawApi($amount, $my_address, $to_address){
//        if(empty($txId) || !$txId){
//            return null;
//        }

        $reqParas = array(
            'action' => 'api_pay',
            'amount' => $amount,
            'my_address' => $my_address,
            'to' => $to_address,
            'minconf' => '0',
            'comment_to' => ''
        );


        $result = CurlHttp::getInstance()->get($reqParas);
        $resultJson = json_decode($result);
        if($resultJson && $resultJson->code == '0' && $resultJson->result){
            $resultJson = $resultJson->result;

            return $resultJson;
        }
        setLogInfo($result,__FILE__,__LINE__,'fatal','提现接口失败');
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
     * @brif: 校验一条交易记录中是否存在相反的记录，如是充值记录，是否存在提现操作
     * 已经被更严格的校验方法取代 isTradeInfoIsValid
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
}

?>