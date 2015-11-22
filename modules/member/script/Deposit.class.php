<?php
/**
 * Created by PhpStorm.
 * User: triumyang
 * Date: 15-11-8
 * Time: 下午8:06
 */

class Deposit extends BasicDW{


    static public $instance = null;

    static public function getInstance(){
        if(self::$instance){
            return self::$instance;
        }

        self::$instance = new Deposit();
        return self::$instance;
    }


    /*
     * 1. 校验钱包地址是否在该系统中 address_multiaddrs
     * 2. 不存在在放弃
     * 3. 存在，查询交易详细信息
     */
    public function checkAddrIsInSystem($addr, &$addressInfo){
        $addressInfo = null;
        $conditions = " account = '{$addr}' ";

        $uwDao = MD('UserWallet');
        $items = $uwDao->gets($conditions);
        //已有钱包地址
        if(count($items) > 0){
            $addressInfo = $items[0];
            return true;
        }
        return false;
    }

    /*
     * 校验交易记录是否在交易表中  yyx_user_deposit ok
     */
    public function checkTradeIsInTradeHistory($txid, &$tradeInfo){
        $tradeInfo = null;
        $conditions = " txid = '{$txid}' ";

        $udDao = MD('UserDeposit');
        $items = $udDao->gets($conditions);
        //已有钱包地址
        if(count($items) > 0){
            $tradeInfo = $items[0];
            return true;
        }
        return false;
    }


    /*
     * 更新交易记录中的confirm yyx_user_deposit
     */
    public function updateTradeConfirmations($confirms, $txid){

        $model = array(
            "confirmations" => $confirms
        );
        $conditions = " txid = '{$txid}' ";

        $udDao = MD('UserDeposit');
        $ret = $udDao->updates($model, $conditions);

        return $ret;
    }


    /*
     * @brif: 校验该条充值交易详情是否有效
     */
    public function isTradeInfoIsValid($tradeInfo, $addr){
        if($tradeInfo && $tradeInfo->details){
            $items = $tradeInfo->details;
            if(1 == count($items)){
                if($items[0]->category == 'receive' &&
                    $items[0]->amount > 0 &&
                    $tradeInfo->confirmations > 1 &&
                    $items[0]->address == $addr){
                    return true;
                }
            }
        }
        return false;
    }

    /*
     * 1. 查询10条交易
     * 2. 拆分出充值记录
     * 3. 校验钱包地址存在性
     * 4. 存在: 查询交易详情
     * 5. 查到详情, 校验详情是否有效
     * 6. 有效查询是否存在该交易记录
     * 7. 存在，更新confimations
     * 8. 不存在，插入
     * 9. 插入成功，充值成功，更新账面余额
     */
    public function  doDiposit(){
        //1
        $latestTrades = $this->getLatestTradeRecord();
        if($latestTrades == null){
            return false;
        }

        $depositTrades = array();
        $withdrawTrades = array();
        //2
        $this->getSendReceiveArray($latestTrades, $withdrawTrades, $depositTrades);

        $depositLen = count($depositTrades);
        for($i = 0; $i < $depositLen; $i++){
            $trade = $depositTrades[$i];
            $addressInfo = null;//钱包地址对应的用户
            //3， 每一条记录中的钱包地址在系统中？
            if($this->checkAddrIsInSystem($trade->address, $addressInfo)){
                //4
                $tradeInfo = $this->getTradeDetailInfo($trade->address);

                if($tradeInfo){//5
                    if($this->isTradeInfoIsValid($tradeInfo, $trade->address)){

                        $ret = $this->updateTradeConfirmations($trade->confirmations, $trade->txid);
                        //7 更新成功表示存在
                        if($ret){
                            setLogInfo($tradeInfo,__FILE__,__LINE__,'info','充值交易已成功');
                        }else{
                            //8 不成功，则不存在，插入
                            $model = array(
                                'user_id' => $addressInfo['user_id'],
                                'wealth_type' => $addressInfo['wealth_type'],
                                'amount' => $trade->amount,
                                'wallet_address' => $trade->address,
                                'confirmations' => $trade->confirmations,
                                'txid' => $trade->txid,
                                'add_time' => time()
                            );
                            try {
                                //9
                                //9.1 插入交易充值记录表
                                if($this->addUserDepositRecord($model)) {
                                    //9.2 插入io表 (9.3 更新用户余额，用户信息表)包含在9.2中

                                    $rechargeService = MemberServiceFactory::getRechargeService();
                                    $userService = MemberServiceFactory::getUserService();
                                    try {
                                        $user = $userService->get($addressInfo['user_id']);

                                        //内部已经捕获
                                        $ret = $rechargeService->setPaySuccess($user, $model);
                                        if (!$ret) {
                                            setLogInfo($tradeInfo,__FILE__,__LINE__,'fatal','充值交易记录插入出错,更新IO失败[人工处理]');
                                        }
                                    }catch (Exception $e){
                                        setLogInfo($tradeInfo,__FILE__,__LINE__,'fatal','充值交易记录插入出错,未查询到用户[人工处理]');
                                    }
                                }else{
                                    setLogInfo($tradeInfo,__FILE__,__LINE__,'fatal','充值交易记录插入出错[人工处理]');
                                }
                            }catch (Exception $e){
                                //记录日志
                                setLogInfo($tradeInfo,__FILE__,__LINE__,'fatal','充值交易记录操作失败[人工处理]:'.$e->getMessage() );
                            }
                        }
                    }
                }
            }
        }
    }

    /*
     * 增加一条充值记录 yyx_user_deposit
     */
    public function addUserDepositRecord($model){
        $udDao = MD('UserDeposit');
        try {
            $int = $udDao->add($model);//成功返回id
            if($int){
                return $int;
            }
            setLogInfo($model,__FILE__,__LINE__,'fatal',"插入充值记录失败{$int}");
        }catch (Exception $e){
            setLogInfo($model,__FILE__,__LINE__,'fatal','插入充值记录失败，一般为txid键冲突');
            return false;
        }
    }
}

?>