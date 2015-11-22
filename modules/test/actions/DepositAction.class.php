<?php
/**
 * Created by PhpStorm. 充值脚本单元测试
 * User: triumyang
 * Date: 15-11-15
 * Time: 上午11:04
 */

class DepositAction extends Action{
    /*
     * 最近10条记录
     */
    private static $depost = null;

    public function __construct(){

        include_once( EXT_SCRIPT_ROOT .'Deposit.class.php');
        if(self::$depost == null) {
            self::$depost = Deposit::getInstance();
        }
    }

    public function index(HttpRequest $request){
        $this->unitTestOutput('测试最近10条记录');
        $ret = self::$depost->getLatestTradeRecord();
        if($ret == null){
            $this->unitTestOutput('失败');
        }else{
            $this->unitTestOutput('成功', $ret);
        }
        exit();
    }

    /*
     * 查询交易详情
     */
    public function tradeInfo(HttpRequest $request){
        $this->unitTestOutput('测试单条记录详情');
        $txid = $request->getParameter('txid');

        $ret = self::$depost->getTradeDetailInfo($txid);
        if($ret == null){
            $this->unitTestOutput('失败');
        }else{
            $this->unitTestOutput('成功', $ret);
        }
        exit();
    }

    /*
     * 拆分为充值和提款
     */
    public function split(HttpRequest $request){
        $this->unitTestOutput('测试最近10条记录');
        $ret = self::$depost->getLatestTradeRecord();
        if($ret == null){
            $this->unitTestOutput('10条记录接口失败');
        }else{

            $deposit = array();
            $withdraw = array();
            $ret = self::$depost->getSendReceiveArray($ret, $withdraw, $deposit);
            if($ret == null){
                $this->unitTestOutput('失败');
            }else{
                $this->unitTestOutput('充值: ',$deposit);
                $this->unitTestOutput('提现: ',$withdraw);
            }
        }
        exit();
    }

    /*
     * 校验一个地址是否在系统中 ok
     */
    public function hasAddr(HttpRequest $request){
        $this->unitTestOutput('测试一个地址是否在系统中');
        $addr = $request->getParameter('addr');
        $addrInfo = array();
        $ret = self::$depost->checkAddrIsInSystem($addr, $addrInfo);
        if($ret == false){
            $this->unitTestOutput('失败');
        }else{
            $this->unitTestOutput('成功: ',$addrInfo);
        }
        exit();
    }

    /*
     * 校验交易记录 校验交易记录是否在交易表中
     */
    public function hasTrade(HttpRequest $request){
        $this->unitTestOutput('交易记录是否在交易表中');
        $addr = $request->getParameter('addr');
        $tradeInfo = array();
        $ret = self::$depost->checkTradeIsInTradeHistory($addr, $tradeInfo);
        if($ret == false){
            $this->unitTestOutput('失败');
        }else{
            $this->unitTestOutput('成功: ',$tradeInfo);
        }
        exit();
    }

    public function testAddUserDepositRecord(){
        $model = array(
            'user_id' => 15,
            'wealth_type' => 3,
            'amount' => 0.001,
            'wallet_address' => 'unit_test_record',
            'confirmations' =>1,
            'txid' => 'unit_test_record_1',
            'add_time' => time()
        );

        $ret = self::$depost->addUserDepositRecord($model);
        if($ret == true){
            $this->unitTestOutput("成功:{$ret} ");
        }else{
            $this->unitTestOutput('失败');
        }

        exit();
    }

    /*
     * 主意，这个方法会抛异常
     */
    public function getUserInfo(HttpRequest $request){
        $id = $request->getParameter('id');
        $userService = MemberServiceFactory::getUserService();

        $user = $userService->get($id);
        var_dump($user);
        exit;
    }

    public function unitTestOutput($txt, $mixVar = ''){
        echo "<br>{$txt}<br>";
        print_r($mixVar);
    }
}

?>