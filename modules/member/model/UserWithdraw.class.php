<?php
/**
 * Created by PhpStorm.
 * User: triumyang
 * Date: 15-11-8
 * Time: 上午10:22
 */

class UserWithdraw extends DynamicModelTransformSupport{
    private $id;
    private $userId;
    private $addTime ;
    private $amount;
    private $wealthType;
    private $walletAddress;
    private $txAddress ;
    private $txid ;
    private $txConfirmations;
    private $info ;
    private $withdrawState;
    private $fee ;
    private $feePay ;
    private $adminUserId ;
    private $adminInfo ;
    private $adminIpv4 ;

    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getAddTime()
    {
        return $this->addTime;
    }

    /**
     * @param mixed $addTime
     */
    public function setAddTime($addTime)
    {
        $this->addTime = $addTime;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getWealthType()
    {
        return $this->wealthType;
    }

    /**
     * @param mixed $wealthType
     */
    public function setWealthType($wealthType)
    {
        $this->wealthType = $wealthType;
    }

    /**
     * @return mixed
     */
    public function getWalletAddress()
    {
        return $this->walletAddress;
    }

    /**
     * @param mixed $walletAddress
     */
    public function setWalletAddress($walletAddress)
    {
        $this->walletAddress = $walletAddress;
    }

    /**
     * @return mixed
     */
    public function getTxAddress()
    {
        return $this->txAddress;
    }

    /**
     * @param mixed $txAddress
     */
    public function setTxAddress($txAddress)
    {
        $this->txAddress = $txAddress;
    }

    /**
     * @return mixed
     */
    public function getTxid()
    {
        return $this->txid;
    }

    /**
     * @param mixed $txid
     */
    public function setTxid($txid)
    {
        $this->txid = $txid;
    }

    /**
     * @return mixed
     */
    public function getTxConfirmations()
    {
        return $this->txConfirmations;
    }

    /**
     * @param mixed $txConfirmations
     */
    public function setTxConfirmations($txConfirmations)
    {
        $this->txConfirmations = $txConfirmations;
    }

    /**
     * @return mixed
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param mixed $info
     */
    public function setInfo($info)
    {
        $this->info = $info;
    }

    /**
     * @return mixed
     */
    public function getWithdrawState()
    {
        return $this->withdrawState;
    }

    /**
     * @param mixed $withdrawState
     */
    public function setWithdrawState($withdrawState)
    {
        $this->withdrawState = $withdrawState;
    }

    /**
     * @return mixed
     */
    public function getFee()
    {
        return $this->fee;
    }

    /**
     * @param mixed $fee
     */
    public function setFee($fee)
    {
        $this->fee = $fee;
    }

    /**
     * @return mixed
     */
    public function getFeePay()
    {
        return $this->feePay;
    }

    /**
     * @param mixed $feePay
     */
    public function setFeePay($feePay)
    {
        $this->feePay = $feePay;
    }

    /**
     * @return mixed
     */
    public function getAdminUserId()
    {
        return $this->adminUserId;
    }

    /**
     * @param mixed $adminUserId
     */
    public function setAdminUserId($adminUserId)
    {
        $this->adminUserId = $adminUserId;
    }

    /**
     * @return mixed
     */
    public function getAdminInfo()
    {
        return $this->adminInfo;
    }

    /**
     * @param mixed $adminInfo
     */
    public function setAdminInfo($adminInfo)
    {
        $this->adminInfo = $adminInfo;
    }

    /**
     * @return mixed
     */
    public function getAdminIpv4()
    {
        return $this->adminIpv4;
    }

    /**
     * @param mixed $adminIpv4
     */
    public function setAdminIpv4($adminIpv4)
    {
        $this->adminIpv4 = $adminIpv4;
    }


}

?>