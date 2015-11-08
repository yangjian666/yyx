<?php
/**
 * Created by PhpStorm.
 * User: triumyang
 * Date: 15-11-8
 * Time: 上午10:19
 */

class UserDeposit extends DynamicModelTransformSupport{
    private $id ;
    private $userId ;
    private $walletAddress;
    private $confirmations ;
    private $amount;
    private $wealthType;
    private $txid ;
    private $txIsOk ;
    private $addTime ;
    private $adminUserId;
    private $adminInfo ;
    private $adminIpv4;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
    public function getConfirmations()
    {
        return $this->confirmations;
    }

    /**
     * @param mixed $confirmations
     */
    public function setConfirmations($confirmations)
    {
        $this->confirmations = $confirmations;
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
    public function getTxIsOk()
    {
        return $this->txIsOk;
    }

    /**
     * @param mixed $txIsOk
     */
    public function setTxIsOk($txIsOk)
    {
        $this->txIsOk = $txIsOk;
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