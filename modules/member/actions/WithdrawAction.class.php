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
        $money = $request->getParameter('amount');
        $wealth_type = $request->getParameter('wealth_type');

        $withdrawService = MemberServiceFactory::getWithdrawService();
        $ret = $withdrawService->checkThisTimeValid($money, $this->user, $message);

        $user = $this->user;
        print_r($user);
        exit();

    }

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
        $this->setView('recharge_history');
    }
}

?>