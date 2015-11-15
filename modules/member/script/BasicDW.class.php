<?php
/**
 * Created by PhpStorm.
 * User: triumyang
 * Date: 15-11-15
 * Time: 下午4:27
 */

class BasicDW{

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
        $resultJson = json_decode($result);
        if($resultJson && $resultJson->code == '0' && $resultJson->result){
            $resultJson = $resultJson->result;

            return $resultJson;
        }
        setLogInfo($result,__FILE__,__LINE__,'fatal','交易详情接口失败');
        return null;
    }

}

?>