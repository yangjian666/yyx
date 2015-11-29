<?php
/**
 * @author
 * @since 1.0
 *
 */
class Withdraw extends DynamicModelTransformSupport{

    /**
     * 用户ID
     * @var int
     */
    private $id;

    /**
     * 充值编号
     * @var string
     */
    private $sn;

    /**
     * 用户ID
     * @var int
     */
    private $userId;

    /**
     * 充值的金额
     * @var int
     */
    private $money;
    private $tax;
    private $address;
    private $wealthType;

    /**
     * 支付类型,
     * @var string
     */
    private $payType;

    /**
     * 充值状态
     * @var int
     */
    private $status;

    /**
     * 注册时间
     * @var int
     */
    private $createTime;

    /**
     *
     * @return int
     */
    public function getId(){
        return $this->id;
    }

    /**
     *
     * @param int
     */
    public function setId($id){
        $this->id = $id;
    }

    /**
     * @return string $sn
     */
    public function getSn(){
        return $this->sn;
    }

    /**
     * @param string $sn
     */
    public function setSn($sn){
        $this->sn = $sn;
    }

    /**
     *
     * @return int
     */
    public function getUserId(){
        return $this->userId;
    }

    /**
     *
     * @param int
     */
    public function setUserId($userId){
        $this->userId = $userId;
    }

    /**
     *
     * @return int
     */
    public function getMoney(){
        return $this->money;
    }

    /**
     *
     * @param int
     */
    public function setMoney($money){
        $this->money = $money;
    }

    /**
     * @return mixed
     */
    public function getTax(){
        return $this->tax;
    }

    /**
     * @param mixed $tax
     */
    public function setTax($tax){
        $this->tax = $tax;
    }

    /**
     * @return mixed
     */
    public function getAddress(){
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address){
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getWealthType(){
        return $this->wealthType;
    }

    /**
     * @param mixed $wealthType
     */
    public function setWealthType($wealthType){
        $this->wealthType = $wealthType;
    }

    /**
     *
     * @return string
     */
    public function getPayType(){
        return $this->payType;
    }

    /**
     *
     * @param string
     */
    public function setPayType($payType){
        $this->payType = $payType;
    }

    /**
     *
     * @return int
     */
    public function getStatus(){
        return $this->status;
    }

    /**
     *
     * @param int
     */
    public function setStatus($status){
        $this->status = $status;
    }

    /**
     *
     * @return int
     */
    public function getCreateTime(){
        return $this->createTime;
    }

    /**
     *
     * @param int
     */
    public function setCreateTime($createTime){
        $this->createTime = $createTime;
    }
}?>