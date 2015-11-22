<?php
/**
 * Created by PhpStorm.
 * User: triumyang
 * Date: 15-11-15
 * Time: 下午3:59
 */

class Withdraw extends BasicDW{

    const MIN_CONFIRM_LIMIT = 1;

    static public $instance = null;

    static public function getInstance(){
        if (self::$instance) {
            return self::$instance;
        }

        self::$instance = new Withdraw();
        return self::$instance;
    }


    /*
     * @brif: 校验该条提现交易详情是否有效
     */
    public function isTradeInfoIsValid($tradeInfo, $addr){
        if($tradeInfo && $tradeInfo->details){
            $items = $tradeInfo->details;
            if(1 == count($items)){
                if($items[0]->category == 'send' &&
                    $items[0]->amount < 0 &&
                    $tradeInfo->confirmations > 1 &&
                    $items[0]->address == $addr){
                    return true;
                }
            }
        }
        return false;
    }
}


?>