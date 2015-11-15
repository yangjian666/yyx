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
    public function checkThisTimeValid($amount, $user, &$errMsg){
        if(!$this->checkAmountRange($amount)){
            $errMsg = "金额无效{self::ONE_TIME_MIN}--{self::ONE_TIME_MAX}";
            return false;
        }

        //TODO 改为根据类型校验
        $canMoney = $user['available_money'] - $user['freeze_money'];
        if($canMoney < $amount){
            $errMsg = "余额不足{$canMoney}";
            return false;
        }

        $records = $this->getTodayRecords($user['id']);
        if($records && count($records) >0){
            $len = count($records);
            if($len > self::ONE_DAY_RECORDS_MAX){
                $errMsg = "今天提现次数超限(每天{self::ONE_DAY_RECORDS_MAX}次)";
                return false;
            }
            $yetMoney = 0;
            for($i = 0; $i < $len; $i++){
                $yetMoney += $records[$i]['money'];
            }

            if(($yetMoney + $amount) > self::ONE_DAY_MAX){
                $errMsg = "今天提现金额超限(每天{self::ONE_DAY_MAX}次)";
                return false;
            }
            return true;
        }else if($records && count($records) == 0){
            return true;
        }else{
            $errMsg = "系统异常，请稍后再试";
            return false;
        }
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
     * 获得今天的所有提现记录
     */
    public function getTodayRecords($user_id, $wealth_type){
        $todayTime = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        $tomorrowTime = mktime(0, 0, 0, date('m'), date('d')+1, date('Y'));
        $condition = " user_id='{$user_id}' and wealth_type = {$wealth_type} and add_time >= {$todayTime} and add_time < $tomorrowTime ";

        $records = $this->dao->gets($condition, $gets, $orders, $page, $perpage);

        //考虑异常
        return $records;
    }
}

?>