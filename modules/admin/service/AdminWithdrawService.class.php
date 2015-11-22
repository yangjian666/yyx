<?php
/**
 * Created by PhpStorm.
 * User: triumyang
 * Date: 15-11-22
 * Time: 下午8:07
 */

class AdminWithdrawService extends TransationSupport{
    private  $user = null;
    private $withdraw = null;

    /**
     * @return null
     */
    public function getUser(){
        return $this->user;
    }

    /**
     * @param null $user
     */
    public function setUser($user){
        $this->user = $user;
    }

    /**
     * @return null
     */
    public function getWithdraw(){
        return $this->withdraw;
    }

    /**
     * @param null $withdraw
     */
    public function setWithdraw($withdraw){
        $this->withdraw = $withdraw;
    }

    public function withdrawDAO($userDao, $withdrawDao, $withdraw){
        try{
            $this->setUser($userDao);
            $this->setWithdraw($withdrawDao);

            $this->beginTransation();
            $withdraMmodel = array('status' => 1);

            $success = $this->withdraw->update($withdraMmodel, $withdraw['id']);
            if($success){
                $freezeName = $this->getWealthType($withdraw['wealth_type']);
                $userModel = array();
                $userModel[$freezeName] = "{$freezeName} - {$withdraw['money']}";

                $success = $this->user->update($userModel, $withdraw['user_id'], true);
                if($success){
                    $this->commit();
                    setLogInfo($withdraw, __FILE__, __LINE__, 'info', '提现更新冻结金额及记录状态成功');
                    return true;
                }

                $this->rollBack();
                setLogInfo($withdraw, __FILE__, __LINE__, 'debug', '提现更新冻结金额失败');
                return false;
            }else{
                $this->rollBack();
                setLogInfo($withdraw, __FILE__, __LINE__, 'debug', '提现时更新提现记录状态失败');
                return false;
            }

        }catch (Exception $e){
            setLogInfo($withdraw, __FILE__, __LINE__, 'error', '提现时操作数据库异常');
            return false;
        }
    }

    /*
     *
     */
    public function getWealthType($type){
        $map = array('',
            'freeze_money',
            'freeze_integral',
            'freeze_ltc',
            'freeze_btc',
            'freeze_doge');

        if($type < 6){
            return $map[$type];
        }
        return '';
    }


}

?>