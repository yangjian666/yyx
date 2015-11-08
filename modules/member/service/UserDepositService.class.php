<?php
/**
 * Created by PhpStorm.
 * User: triumyang
 * Date: 15-11-8
 * Time: 上午10:32
 */

class UserDepositService  extends TransationSupport{

    /**
     *
     * @var ModelDao
     */
    private $dao = null;
    public function __construct(){
        $this->dao = MD('UserDeposit');
    }

}

?>