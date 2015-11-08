<?php
/**
 * Created by PhpStorm.
 * User: triumyang
 * Date: 15-11-8
 * Time: 上午11:31
 */

class WalletAction extends UserCenterAction{


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
                    }catch (Exception $e){
                        AjaxResult::ajaxResult(1, '系统异常');
                    }

                }else{
                    AjaxResult::ajaxResult(1, '调用接口出现问题，请重试');
                }

                AjaxResult::ajaxResult(1, '0');
            }else{
                AjaxResult::ajaxResult(1, '调用接口出问题');
            }
        }
        exit();
    }

}

?>