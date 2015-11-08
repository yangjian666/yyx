<?php

/**
 * 会员模块服务加载器
 * @author blueyb.java@gmail.com
 */
class MemberServiceFactory{
	
	/**
	 * 用户服务
	 * @var IUserService
	 */
	private static $userService;
	
	/**
	 * 验证码服务
	 * @var IVerificationCodeService
	 */
	private static $verificationCodeService;
	
	/**
	 * 通知服务接口
	 * @var INoticeService
	 */
	private static $noticeService;
	
	/**
	 * 短消息服务接口
	 * @var IMessageService
	 */
	private static $messageService;
	
	/**
	 * @var IRechargeService
	 */
	private static $rechargeService = null;
	
	/**
	 * @var IShareService
	 */
	private static $shareService = null;
	
	/**
	 * @var IFollowService
	 */
	private static $followService = null;

    /**
     * @var $userDepositService
     */
    private static $userDepositService = null;

    /**
     * @var $userWithdrawService
     */
    private static $userWithdrawService = null;

    /**
     * @var IFollowService
     */
    private static $userWalletService = null;

	/**
	 * @return IUserService
	 */
	public static function getUserService(){
		if(self::$userService == null){
			self::$userService = new UserService();
		}
		return self::$userService;
	}
	
	/**
	 * @return IVerificationCodeService
	 */
	public static function getVerificationCodeService(){
		if(self::$verificationCodeService == null){
			self::$verificationCodeService = new ImageVerificationCodeService();
		}
		return self::$verificationCodeService;
	}
	
	/**
	 * @return INoticeService $noticeService
	 */
	public static function getNoticeService(){
		if(!self::$noticeService){
			self::$noticeService = new NoticeService();
		}
		return self::$noticeService;
	}
	
	/**
	 * @return IMessageService $messageService
	 */
	public static function getMessageService(){
		if(!self::$messageService){
			self::$messageService = new MessageService();
		}
		return self::$messageService;
	}
	
	/**
	 * @return IRechargeService $rechargeService
	 */
	public static function getRechargeService(){
		if(!self::$rechargeService){
			self::$rechargeService = new RechargeService();
		}
		return self::$rechargeService;
	}
	
	/**
	 * @return IShareService $shareService
	 */
	public static function getShareService(){
		if(!self::$shareService){
			self::$shareService = new ShareService();
		}
		return self::$shareService;
	}
	
	/**
	 * @return IFollowService $followService
	 */
	public static function getFollowService(){
		if(!self::$followService){
			self::$followService = new FollowService();
		}
		return self::$followService;
	}

    /**
     * @return $userDepositService $userDepositService
     */
    public static function getUserDepositService(){
        if(!self::$userDepositService){
            self::$userDepositService = new UserDepositService();
        }
        return self::$userDepositService;
    }

    /**
     * @return IFollowService $followService
     */
    public static function getUserWithdrawService(){
        if(!self::$userWithdrawService){
            self::$userWithdrawService = new UserWithdrawService();
        }
        return self::$userWithdrawService;
    }

    /**
     * @return IFollowService $followService
     */
    public static function getUserWalletService(){
        if(!self::$userWalletService){
            self::$userWalletService = new UserWalletService();
        }
        return self::$userWalletService;
    }
}

?>