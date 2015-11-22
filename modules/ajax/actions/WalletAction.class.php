<?php
/**
 * Created by PhpStorm.
 * User: triumyang
 * Date: 15-11-8
 * Time: 上午11:31
 */

class WalletAction extends UserCenterAction{

   const MIN_CONFIRM_LIMIT = 1;

    /*
     * 开通钱包地址
     */
    public function index(HttpRequest $request){

        $wealthType = intval($request->getParameter('wealth_type'));
        if($wealthType < 1 || $wealthType > 5){
            AjaxResult::ajaxResult(1, '无此货币类型');
        }

        $userService = MemberServiceFactory::getUserService();
        //$userWalletService = MemberServiceFactory::getUserWalletService();print_r($userWalletService);
        $userId = $this->user->getId();

        $conditions = " wealth_type = '{$wealthType}' and user_id = '{$userId}' ";

        $uwDao = MD('UserWallet');
        $items = $uwDao->gets($conditions);
        //已有钱包地址
        if(count($items) > 0){
            AjaxResult::ajaxResult(1, '0');
        }else{
            //没有地址，去生成一个地址，存在表中
            $reqParas = array(
                'action' => 'api_addr_new10w',
                'count' => 10
            );

            include_once( EXT_LIB_ROOT .'CurlHttp.class.php');

            $result = CurlHttp::getInstance()->get($reqParas);
            //响应内容比较特殊，正则拆分出来
            $int = preg_match_all("/\s+\d{1,4}\s+(\w{34})<br>/", $result, $matches );

            if($int && $matches[1]){

                $conditions = " account in ('" . implode("','", $matches[1]) . "')";
                $items = $uwDao->gets($conditions);
                if(empty($items)){
                    $model = array(
                        'user_id' => $userId,
                        'wealth_type' =>$wealthType,
                        'account' => $matches[1][0],
                        'address' => $matches[1][0],
                        'm_time' => time()
                    );
                    try {
                        $int = $uwDao->add($model);
                        if(!$int){
                            setLogInfo($model,__FILE__,__LINE__,'debug','生成的钱包的地址插入数据库失败:');
                            AjaxResult::ajaxResult(1, '系统异常');
                        }
                    }catch (Exception $e){
                        setLogInfo($model,__FILE__,__LINE__,'debug','生成的钱包的地址插入数据库异常:' . $e->getMessage());
                        AjaxResult::ajaxResult(1, '系统异常');
                    }

                }else{
                    setLogInfo($result,__FILE__,__LINE__,'debug','查询钱包API返回数据解析出错');
                    AjaxResult::ajaxResult(1, '调用接口出现问题，请重试');
                }

                AjaxResult::ajaxResult(1, '0');
            }else{
                setLogInfo($conditions,__FILE__,__LINE__,'debug','查询钱包API异常');
                AjaxResult::ajaxResult(1, '调用接口出问题');
            }
        }
        exit();
    }

    public function gets(){
        AjaxResult::ajaxResult(1, '调用接口出问题');

        $reqParas = array(
            'action' => 'api_listtransactions',
            'count' => 10
        );

        include_once( EXT_LIB_ROOT .'CurlHttp.class.php');

        $result = CurlHttp::getInstance()->get($reqParas);
        $result = json_decode($result);
        if($result && $result->code == '0' && count($result->result) > 0){
            $result = $result->result;
            $this->getSendReceiveArray($result, $s, $r);
            print_r($r);
            exit();
            return $result;
        }

        return null;
    }

    public function get(){
        AjaxResult::ajaxResult(1, '调用接口出问题');

        $txId = '21f0a5024b1e92b9bcba36ef21ad25fe06e5953526ea563719f16e1f24a3f093';
        /*
         * 99ac1dd93cc52826efdd52014c09871c2c5a828bf52ddd2551bc1dd51c8a855a
         * 24befa1519992dbc24736d1730eb638a6a8f70e7eabcfeec3f4db3b32ec39cb3
         */
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

}

?>