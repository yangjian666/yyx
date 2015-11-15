<?php
/**
 * Created by PhpStorm.
 * User: triumyang
 * Date: 15-11-15
 * Time: 下午3:59
 */

class Withdraw extends BasicDW{

    const MIN_CONFIRM_LIMIT = 1;

    static public $instance = null;

    static public function getInstance(){
        if (self::$instance) {
            return self::$instance;
        }

        self::$instance = new Withdraw();
        return self::$instance;
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
        if(empty($txId) || !$txId){
            return null;
        }

        $reqParas = array(
            'action' => 'api_pay',
            'amount' => $amount,
            'my_address' => $my_address,
            'to' => $to_address,
            'minconf' => '',
            'comment_to' => ''
        );

        include_once( EXT_LIB_ROOT .'CurlHttp.class.php');

        $result = CurlHttp::getInstance()->get($reqParas);
        $resultJson = json_decode($result);
        if($resultJson && $resultJson->code == '0' && $resultJson->result){
            $resultJson = $resultJson->result;

            return $resultJson;
        }
        setLogInfo($result,__FILE__,__LINE__,'fatal','提现接口失败');
        return null;
    }

    public function freezeMoney(){

    }

}
?>