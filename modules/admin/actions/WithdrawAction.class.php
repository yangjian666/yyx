<?php
/**
 * Created by PhpStorm.
 * User: triumyang
 * Date: 15-11-22
 * Time: 下午4:31
 */


class WithdrawAction extends AbstractAdminAction{
    /**
     * @var ModelDao
     */
    private $user = null;
    private $withdraw = null;

    public function __construct(){
        parent::__construct();
        $this->user = MD("User");
        $this->withdraw = MD("Withdraw");
    }

    /*
     * @brif: 给用户提现
     * 1. 记录是否存在 && 记录状态 && 记录合法性(金额 && 冻结余额)
     * 2. 用户冻结金额
     * 3. 查询钱包地址
     * 4. 更改提现状态
     * 5. 调用提现的充钱接口
     */
    public function index(HttpRequest $request){
        $id = intval($request->getParameter('id'));
        if(empty($id) || $id <= 0){
            AjaxResult::ajaxResult(1, '没有指定提现单号');
        }

        $user = $this->user;
        $withdraw = $this->withdraw;
        $adminWithdrawServie = AdminServiceFactory::getAdminWithdrawService();

        $withdrawRecord = $withdraw->get($id);

        //1.
        if(!$withdrawRecord || empty($withdrawRecord)){
            AjaxResult::ajaxResult(1, '不存在该记录');
        }

        if($withdrawRecord['status'] != 0){
            AjaxResult::ajaxResult(1, '该记录的提现状态不正常');
        }

        $withdrawService = MemberServiceFactory::getWithdrawService();
        if(!$withdrawService->checkAmountRange($withdrawRecord['money'])){
            AjaxResult::ajaxResult(1, '该记录的提现金额不符合要求');
        }

        //2.
        $userInfo = $user->get($withdrawRecord['user_id']);
        if(!$userInfo || empty($userInfo)){
            AjaxResult::ajaxResult(1, '不存在该记录的用户');
        }

        $freezTypeName = $adminWithdrawServie->getWealthType($withdrawRecord['wealth_type']);
        if(empty($freezTypeName)){
            AjaxResult::ajaxResult(1, '货币类型错误');
        }
        if($withdrawRecord['money'] > $userInfo[$freezTypeName]){
            AjaxResult::ajaxResult(1, '用户冻结的金额不足');
        }

        //3.
        $userWalletDao = MD('UserWallet');
        $conditions = " user_id = '{$withdrawRecord['user_id']}' and wealth_type = '{$withdrawRecord['wealth_type']}' ";
        $wallet = $userWalletDao->getOne($conditions);
        if(!$wallet || empty($wallet['address'])){
            AjaxResult::ajaxResult(1, '未查询到该用户的钱包地址');
        }

        //4. 改状态 && 冻结金额
        $ret = $adminWithdrawServie->withdrawDAO($user, $withdraw, $withdrawRecord);
        if(!$ret){
            AjaxResult::ajaxResult(1, '数据库异常，提现失败');
        }
        setLogInfo($ret, __FILE__,__LINE__,'info','提现状态修改成功sn:'.$withdrawRecord['sn']);

        //5.
        include_once( EXT_SCRIPT_ROOT .'BasicDW.class.php');
        $basicDW = new BasicDW();
        $ret = $basicDW->withdrawApi($withdrawRecord['money'], $wallet['address'], $withdrawRecord['address']);
        if(!$ret){
            AjaxResult::ajaxResult(1, '提现接口调用失败');
        }
        //提现成功，写流水
        setLogInfo($ret, __FILE__,__LINE__,'info','提现成功sn:'.$withdrawRecord['sn']);

        //TODO 对提现返回结果做分析

        AjaxResult::ajaxResult(1, '0');
        exit();
    }
}