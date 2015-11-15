<?php

/**
 * 充值服务接口实现
 * 
 * @author blueyb.java@gmail.com
 * @since 1.0 - Jan 23, 2013
 */
class RechargeService extends TransationSupport implements IRechargeService{
	
	/**
	 * 充值编码前缀
	 * @var string
	 */
	private static $snPrefix = 'RC';
	
	/**
	 * @var ModelDao
	 */
	private $dao = null;
	
	public function __construct(){
		$this->dao = MD('Recharge');
	}
	
	/**
	 *
	 * @see IRechargeService::count()
	 */
	public function count($conditions){
		return $this->dao->count($conditions);
	}
	
	/**
	 *
	 * @see IRechargeService::createSn()
	 */
	public function createSn(){
		return self::$snPrefix . date('YmdHis');
	}
	
	/**
	 *
	 * @see IRechargeService::get()
	 */
	public function get($id){
		return $this->dao->get($id);
	}
	
	/**
	 * 
	 * @see IRechargeService::getBySn()
	 */
	public function getBySn($sn){
		return $this->dao->getOne("`sn`='{$sn}'");
	}
	
	/**
	 *
	 * @see IRechargeService::gets()
	 */
	public function gets($conditions, $orders, $page, $perpage){
		if(!$orders){
			$orders = array('create_time'=>'desc');
		}
		return $this->dao->gets($conditions, null, $orders, $page, $perpage);
	}
	
	/**
	 * 
	 * @see IRechargeService::getUserRecharges()
	 */
	public function getUserRecharges($userId, $page, $perpage){
		$conditions = array('user_id'=>$userId);
		$this->gets($conditions, null, $page, $perpage);
	}
	
	/**
	 *
	 * @see IRechargeService::pay()
	 */
	public function pay($user, $recharge){
		try{
			//给用户充值金币
			$this->beginTransation();
			$io = array(
					'to_user_id'=>$recharge['user_id'],
					'from_user_id'=>0,
					'to_title'=>"充值[{$recharge['sn']}]",
					'wealth_type'=>Io::WEALTH_TYPE_MONEY,
					'wealth'=>$recharge['money'],
					'to_balance'=>$user['available_money'] + $recharge['money']
			);
			$userService = MemberServiceFactory::getUserService();
			if(!$userService->money($io)){
				$this->rollBack();
				return false;
			}
			//更新充值状态到成功
			if(!$this->dao->update(array('status'=>'1', $recharge['id']))){
				$this->rollBack();
				return false;
			}
			$userLink = NoticeService::makeUserLink(array('id'=>$user['id'], 'name'=>$user['name']));
			//邀请赠送
			$inviteDao = MD('Invite');
			$invite = $inviteDao->getOne(array('invitee_id'=>$user['id']));
			if($invite){
				$reward = floatval($recharge['money'] * $invite['recharge_percent']);
				if($reward){
					$inviter = $userService->get($invite['inviter_id']);
					if($inviter){
						$io = array(
								'to_user_id'=>0,
								'from_user_id'=>$inviter->getId(),
								'to_title'=>"充值提成，邀请的用户{$userLink}充值了[{$recharge['money']}]金币",
								'wealth_type'=>Io::WEALTH_TYPE_MONEY,
								'wealth'=>$reward,
								'to_balance'=>$inviter->getAvailableMoney() + $reward
						);
						if(!$userService->money($io)){
							$this->rollBack();
							return false;
						}
					}
				}
			}
			$this->commit();
			return true;
		}catch(Exception $e){
			$this->rollBack();
		}
	}

    /*
     * 设置支付信息 事务，该接口即支持充值 也 支持提现
     * 1. 插入支付记录直接为成功
     * 2.插入io记录 (3.更新用户余额 插入io记录中包含3)
     *  $recharge = {
     *  txid
     * amount
     * wealth_type
     * user_id
     * }
     */
    public function setPaySuccess($user, $recharge){
        try{
            // 充值记录
            $rechargeRecord = array(
                'sn' =>$recharge['txid'] ,
                'user_id' => $recharge['user_id'],
                'money' => $recharge['amount'],
                'wealth_type' => $recharge['wealth_type'],
                'pay_type' => 'offline',
                'status' => '1',
                'create_time' => time()
            );
            //1
            if(!$this->recharge($rechargeRecord)){
                $this->rollBack();
                setLogInfo($rechargeRecord, __FILE__,__LINE__,'error', '插入充值记录表失败');
                return false;
            }

            $io = array(
                'to_user_id'=> $recharge['user_id'],
                'from_user_id'=> 0,
                'to_title'=> "充值[{$recharge['txid']}]",
                'wealth_type'=> $recharge['wealth_type'],
                'wealth'=> $recharge['amount'],
                'to_balance'=> $user->available_money + $recharge['amount']
            );
            $userService = MemberServiceFactory::getUserService();
            //2
            if(!$userService->money($io)){
                $this->rollBack();
                setLogInfo($rechargeRecord, __FILE__,__LINE__,'error', '插入IO表失败');
                return false;
            }
            return true;
        }catch(Exception $e){
            setLogInfo($rechargeRecord, __FILE__,__LINE__,'error', $e->getMessage());
            $this->rollBack();
        }
        return false;
    }
	
	/**
	 *
	 * @see IRechargeService::recharge()
	 */
	public function recharge($recharge){
		return $this->dao->add($recharge);
	}
}

?>