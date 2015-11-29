<?php
/**
 * Created by PhpStorm.
 * User: triumyang
 * Date: 15-11-22
 * Time: 下午4:31
 */


class WithdrawAction extends AbstractAdminAction{

    protected $leftMenuParentId = 12;

    /**
     * @var ModelDao
     */
    private $user = null;
    private $withdraw = null;
    private $dao = null;

    public function __construct(){
        parent::__construct();
        $this->user = MD("User");
        $this->withdraw = MD("Withdraw");
        $this->dao = $this->withdraw;
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
        $id = $request->getParameter('id');
        if(empty($id) || $id <= 0){
            show_message( '没有指定提现单号');
            AjaxResult::ajaxResult(1, '没有指定提现单号');
        }

        $user = $this->user;
        $withdraw = $this->withdraw;
        $adminWithdrawServie = AdminServiceFactory::getAdminWithdrawService();

        $withdrawRecord = $withdraw->get($id);

        //1.
        if(!$withdrawRecord || empty($withdrawRecord)){
            show_message( '不存在该记录');
            AjaxResult::ajaxResult(1, '不存在该记录');
        }

        if($withdrawRecord['status'] != 0){
            show_message( '该记录的提现状态不正常');
            AjaxResult::ajaxResult(1, '该记录的提现状态不正常');
        }

        $withdrawService = MemberServiceFactory::getWithdrawService();
        if(!$withdrawService->checkAmountRange($withdrawRecord['money'])){
            show_message( '该记录的提现金额不符合要求');
            AjaxResult::ajaxResult(1, '该记录的提现金额不符合要求');
        }

        //2.
        $userInfo = $user->get($withdrawRecord['user_id']);
        if(!$userInfo || empty($userInfo)){
            show_message( '不存在该记录的用户');
            AjaxResult::ajaxResult(1, '不存在该记录的用户');
        }

        $freezTypeName = $adminWithdrawServie->getWealthType($withdrawRecord['wealth_type']);
        if(empty($freezTypeName)){
            show_message( '货币类型错误');
            AjaxResult::ajaxResult(1, '货币类型错误');
        }
        if($withdrawRecord['money'] > $userInfo[$freezTypeName]){
            show_message( '用户冻结的金额不足');
            AjaxResult::ajaxResult(1, '用户冻结的金额不足');
        }

        //3.
        $userWalletDao = MD('UserWallet');
        $conditions = " user_id = '{$withdrawRecord['user_id']}' and wealth_type = '{$withdrawRecord['wealth_type']}' ";
        $wallet = $userWalletDao->getOne($conditions);
        if(!$wallet || empty($wallet['address'])){
            show_message( '未查询到该用户的钱包地址');
            AjaxResult::ajaxResult(1, '未查询到该用户的钱包地址');
        }

        //4. 改状态 && 冻结金额
        $ret = $adminWithdrawServie->withdrawDAO($user, $withdraw, $withdrawRecord);
        if(!$ret){
            show_message( '数据库异常，提现失败');
            AjaxResult::ajaxResult(1, '数据库异常，提现失败');
        }
        setLogInfo($ret, __FILE__,__LINE__,'info','提现状态修改成功sn:'.$withdrawRecord['sn']);

        //5.
        include_once( EXT_SCRIPT_ROOT .'BasicDW.class.php');
        $basicDW = new BasicDW();
        //实际提的钱 是金额减扣手续费
        $realMoney = $withdrawRecord['money'] - $withdrawRecord['tax'];
        $ret = $basicDW->withdrawApi($realMoney, $wallet['address'], $withdrawRecord['address']);
        if(!$ret){
            setLogInfo($withdrawRecord, __FILE__,__LINE__,'info','失败记录ID:'.$withdrawRecord['id']);
            show_message( '提现接口调用失败');
            AjaxResult::ajaxResult(1, '提现接口调用失败');
        }
        //提现成功，写流水
        setLogInfo($ret, __FILE__,__LINE__,'info','提现成功sn:'.$withdrawRecord['sn']);

        //TODO 对提现返回结果做分析

        $this->setMessage('op_success');
        $request->redirect($request->getReferer());
        exit();
    }

    /*
 * @brief: 提现历史
 */
    public function history(HttpRequest $request){
        $conditions = " 1 ";
        $parameters = $request->getParameters();
        if($parameters['id']){
            $conditions .= " AND user_id = '{$parameters['id']}'";
        }
        if($parameters['status']){
            $sendStatus = intval($parameters['status']) - 1;
            $request->setAttribute('status', $parameters['status']);
            if($sendStatus === 0 || $sendStatus == 1) {
                $conditions .= " AND status = '{$sendStatus}'";
            }
        }
        if($parameters['startTime']){
            $startTime = strtotime($parameters['startTime']);
            $conditions .= " AND create_time > '{$startTime}'";
        }
        if($parameters['endTime']){
            $endTime = strtotime($parameters['endTime']);
            $conditions .= " AND create_time < '{$endTime}'";
        }
        if($parameters['wealth_type']) {
            $wealthType = intval($parameters['wealth_type']);
            if ($wealthType && ($wealthType >= 1 && $wealthType <= 5)) {
                $conditions = $conditions . " and wealth_type = {$wealthType}";
            }
        }
        $this->setConditions($conditions);

        $orders = array(
            'create_time' => 'desc'
        );
        $this->setOrders(' create_time desc ');
        parent::index($request);
        $userIds = ArrayUtil::colKeySet($request->getAttribute('items'), 'user_id', true);
        if($userIds){
            $userDao = MD('User');
            $users = $userDao->gets("id in ({$userIds})");
            $users = ArrayUtil::changeKey($users, 'id');
        }
        $request->assign('users', $users);
        $request->assign('title', '提现管理');
        $this->setView('withdraw');

        /*
        $page = getPage();
        $perpage = 15;
        $rechargeDao = MD('Withdraw');
        $items = $rechargeDao->gets($conditions, $gets, $orders, $page, $perpage);
        $total = $rechargeDao->count($conditions);
        $pages = multi_page($total, $perpage, $page);

        $request->setAttribute('items', $items);
        $request->setAttribute('total', $total);
        $request->setAttribute('pages', $pages);

        $seo = array(
            'title' => '提现记录',
            'description' => '',
            'keywords' => ''
        );
        $request->assign('seo', $seo);
        $this->setView('withdraw');
        */
    }
}