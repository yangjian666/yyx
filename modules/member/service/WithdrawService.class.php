<?php
/**
 * Created by PhpStorm.
 * User: triumyang
 * Date: 15-11-8
 * Time: 上午10:31
 */

class WithdrawService  extends TransationSupport{
    /**
     * 充值编码前缀
     * @var string
     */
    private static $snPrefix = 'RC';
    /**
     *
     * @var ModelDao
     */
    private $dao = null;
    const ONE_TIME_MAX = 1000;
    const ONE_TIME_MIN = 1;
    const ONE_DAY_MAX = 1000;
    const ONE_DAY_RECORDS_MAX = 3;

    public function __construct(){
        $this->dao = MD('Withdraw');
    }

    /**
     *
     * @see IRechargeService::createSn()
     */
    public function createSn(){
        return self::$snPrefix . date('YmdHis');
    }

    /*
     * 校验本次提现是否合法
     * $user是个对象
     */
    public function checkThisTimeValid($amount, $wealthType, $user, &$errMsg){
        $minMoney = self::ONE_TIME_MIN;
        $maxMoney = self::ONE_TIME_MAX;
        $dayMaxMoney = self::ONE_DAY_MAX;
        $dayMaxNum = self::ONE_DAY_RECORDS_MAX;
        if(!$this->checkAmountRange($amount)){
            $errMsg = "金额无效{$minMoney} -- {$maxMoney}";
            return false;
        }

        //改为根据类型校验
        $use_id = $user->getId();
        $wealthTypeName = $user->getWealthTypeFuncName($wealthType);
        $freezTypeName = $user->getFreeTypeFuncName($wealthType);

        $canMoney = $user->$wealthTypeName() ;// 冻结的金额已经从余额中扣除 - $user->$freezTypeName();
        if($canMoney < $amount){
            $errMsg = "余额不足{$canMoney}";
            return false;
        }

        $records = $this->getTodayRecords($use_id, $wealthType);

        if($records && count($records) >0){
            $len = count($records);
            if($len >= $dayMaxNum){
                $errMsg = "今天提现次数超限(每天{$dayMaxNum}次)";
                return false;
            }
            $yetMoney = 0;
            for($i = 0; $i < $len; $i++){
                $yetMoney += $records[$i]['money'];
            }

            if(($yetMoney + $amount) > $dayMaxMoney){
                $errMsg = "今天提现金额超限(每天{$dayMaxMoney}次)";
                return false;
            }
            return true;
        }else if( count($records) == 0){
            return true;
        }else{
            $errMsg = "系统异常，请稍后再试";
            return false;
        }

        //TODO 校验系统的该类型货比的余额
    }

    public function checkAmountRange($amount){
        return ($amount >= self::ONE_TIME_MIN) && ($amount <=self::ONE_TIME_MAX);
    }

    /**
     *
     * @see IRechargeService::getBySn()
     */
    public function getBySn($sn){
        return $this->dao->getOne("`sn`='{$sn}'");
    }

    /*
     * 获得今天的所有提现记录 yyx_withdraw 表
     */
    public function getTodayRecords($user_id, $wealth_type){
        $todayTime = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        $tomorrowTime = mktime(0, 0, 0, date('m'), date('d')+1, date('Y'));
        $condition = " user_id='{$user_id}' and wealth_type = {$wealth_type} and create_time >= {$todayTime} and create_time < $tomorrowTime ";

        try {
            $records = $this->dao->gets($condition, $gets, $orders, $page, $perpage);
        }catch (Exception $e){
            $records = null;
        }

        //考虑异常
        return $records;
    }

    /**
     * @brif: 冻结提现金额 && 插入提现记录
     * @see IRechargeService::recharge()
     */
    public function withDraw($withDraw, $user){

        try{
            $this->beginTransation();

            $use_id = $user->getId();
            $wealthTypeName = $user->getWealthTypeFuncName($withDraw['wealth_type']);
            //$freezTypeName = $user->getFreeTypeFuncName($withDraw['wealth_type']);
            //冻结投注金
            $userService = MemberServiceFactory::getUserService();

            $io = array(
                'from_user_id' => $use_id,
                'to_user_id' => 0,
                'from_title' => "提现金额{$withDraw['money']}",
                'wealth_type' => $withDraw['wealth_type'],
                'wealth' => $withDraw['money'],
                'from_balance' => $user->$wealthTypeName() - $withDraw['money']
            );
            if(!$userService->money($io, -1)){
                $this->rollBack();
                setLogInfo($io,__FILE__,__LINE__,'error','提现冻结失败');
                return false;
            }

            if(! $this->dao->add($withDraw)){
                $this->rollBack();
                setLogInfo($withDraw,__FILE__,__LINE__,'error','提现插入提现表失败');
                return false;
            }

            $this->commit();
            return true;
        }catch (Exception $e){
            setLogInfo($withDraw,__FILE__,__LINE__,'error','提现异常'.$e->getMessage());
            return false;
        }
    }
}

?>