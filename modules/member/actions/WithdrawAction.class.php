<?php
/**
 * Created by PhpStorm.
 * User: triumyang
 * Date: 15-11-15
 * Time: 下午4:41
 */

class WithdrawAction extends UserCenterAction{

    /**
     * @var string
     */

    public function __construct(){
        parent::__construct();
    }

    /*
     * 提现动作
     * 1. 验证码
     * 2. GA校验
     * 3. 金额校验（单次金额，全天金额）
     * 4. 全天次数校验
     * 5.余额校验
     * 6.系统账号余额校验，二期
     */
    public function index(HttpRequest $request){
        $money = floatval($request->getParameter('amount'));
        $wealthType = intval($request->getParameter('wealth_type'));
        $address = $request->getParameter('address');

        if(!$money || $money < 0
            || !$wealthType || $wealthType < 0 || $wealthType > 5
        ){
            show_message( '请输入参数');
        }

        if(empty($address)){
            show_message( '请输入钱包地址');
        }

        $withdrawService = MemberServiceFactory::getWithdrawService();
        $user =  $this->user;

        //3, 4, 5 校验
        $ret = $withdrawService->checkThisTimeValid($money, $wealthType, $user, $message);

        //TODO GA校验

        if(!$ret){
            show_message(  $message);
        }

        //插入充值记录 && 冻结提现金额
        $withdraw = array(
            'sn' => $withdrawService->createSn(),
            'user_id' => $this->user->getId(),
            'money' => $money,
            'address' => $address,
            'wealth_type' => $wealthType,
            'pay_type' => 'offline',
            'status' => '0',
            'create_time' => $request->getRequestTime()
        );

        if(!$withdrawService->withDraw($withdraw, $user)){
            show_message( '提现失败,请稍后再试');
        }

        AjaxResult::closeAjaxWindow('操作成功，等待管理员处理，正在关闭窗口!');
        exit();
    }

    /*
     * @brief: 提现历史
     */
    public function history(HttpRequest $request){
        $wealthType = intval($request->getParameter('wealth_type'));

        $conditions = " user_id = '{$this->user->getId()}'";
        if($wealthType <1 || $wealthType > 5){
            $wealthType = 1;
        }
        $conditions = $conditions." and wealth_type = {$wealthType}";
        $orders = array(
            'create_time' => 'desc'
        );
        $page = getPage();
        $perpage = 5;
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
    }

    /*
     * 调用提现接口提现操作
     */
    public function handsel(HttpRequest $request){

        $this->setView('withdraw_handsel');

    }

}

?>