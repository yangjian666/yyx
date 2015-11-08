<?php
/**
 * Created by PhpStorm.
 * User: triumyang
 * Date: 15-11-8
 * Time: 上午10:25
 */


class UserWallet extends DynamicModelTransformSupport{
    private $id ;
    private $userId;
    private $category ;
    private $account ;
    private $wealthType ;
    private $fee;
    private $blockhash;
    private $blockindex ;
    private $mTime;
    private $txid ;
    private $blocktime ;
    private $amount ;
    private $confirmations;
    private $timereceived ;
    private $address ;
    private $isLoad ;
    private $isExist ;
    private $info ;

    /**
     * @return mixed
     */
    public function getId()
    {
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
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param mixed $account
     */
    public function setAccount($account)
    {
        $this->account = $account;
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
    public function getBlockhash()
    {
        return $this->blockhash;
    }

    /**
     * @param mixed $blockhash
     */
    public function setBlockhash($blockhash)
    {
        $this->blockhash = $blockhash;
    }

    /**
     * @return mixed
     */
    public function getBlockindex()
    {
        return $this->blockindex;
    }

    /**
     * @param mixed $blockindex
     */
    public function setBlockindex($blockindex)
    {
        $this->blockindex = $blockindex;
    }

    /**
     * @return mixed
     */
    public function getMTime()
    {
        return $this->mTime;
    }

    /**
     * @param mixed $m_time
     */
    public function setMTime($mTime)
    {
        $this->mTime = $mTime;
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
    public function getBlocktime()
    {
        return $this->blocktime;
    }

    /**
     * @param mixed $blocktime
     */
    public function setBlocktime($blocktime)
    {
        $this->blocktime = $blocktime;
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
    public function getTimereceived()
    {
        return $this->timereceived;
    }

    /**
     * @param mixed $timereceived
     */
    public function setTimereceived($timereceived)
    {
        $this->timereceived = $timereceived;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getIsLoad()
    {
        return $this->isLoad;
    }

    /**
     * @param mixed $isLoad
     */
    public function setIsLoad($isLoad)
    {
        $this->isLoad = $isLoad;
    }

    /**
     * @return mixed
     */
    public function getIsExist()
    {
        return $this->isExist;
    }

    /**
     * @param mixed $isExist
     */
    public function setIsExist($isExist)
    {
        $this->isExist = $isExist;
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


}

?>