<?php
/**
 * Created by PhpStorm.
 * User: triumyang
 * Date: 15-11-15
 * Time: 上午10:07
 */

class TestAction extends UserCenterAction{
    public function __construct(){
        parent::__construct();
    }
    /*
     * 单元测试，测试新接口
     */

    public function unitTestOutput($txt, $mixVar = ''){
        echo "<br>{$txt}<br>";
        print_r($mixVar);
    }

    /*
     * 设置支付信息单测 插入IO记录，更新个人余额表
     */
    public function test(HttpRequest $request){
        $userService = MemberServiceFactory::getUserService();
        $user_id = $request->getParameter('user_id');
        $wealth_type = $request->getParameter('wealth_type');

        $user = $userService->get($user_id);
        if(count($user) < 1){
            $this->unitTestOutput('用户未查询到',$user);
            exit();
        }

        $log = R::getLog();

        //$this->unitTestOutput('单测前用户值',$user);
        $model = array(
            'user_id' => $user_id,
            'wealth_type' =>$wealth_type,
            'amount' => 0.001,
            'wallet_address' =>  'unit_test_record',
            'confirmations' => 1,
            'txid' => 'unit_test_record',
            'm_time' => time()
        );


        // $this->unitTestOutput('输入值',$model);

        $rechargeService = MemberServiceFactory::getRechargeService();
        $ret = $rechargeService->setPaySuccess($user, $model);

        $this->unitTestOutput('结果',$ret);
        if($ret == true){
            $this->unitTestOutput('success');
        }else{
            $this->unitTestOutput('fail');
        }
        //$user = $userService->get($user_id);
        //$this->unitTestOutput('单测前用户值',$user);
        exit();
    }

    public function logTest(){
        setLogInfo('info',__FILE__,__LINE__,'info','测试');
        setLogInfo('debug',__FILE__,__LINE__,'debug');
        setLogInfo('warn',__FILE__,__LINE__,'warn');
        setLogInfo('error',__FILE__,__LINE__,'error');
        setLogInfo('fatal',__FILE__,__LINE__,'fatal');
        setLogInfo('undefined',__FILE__,__LINE__,'undefined');

        exit();
    }
}


?>