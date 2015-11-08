<?php include_once('D:\phpStudy\yyx-master\runtime/views\./templates/default\header.php');?>
<script type="text/javascript" src="http://www.yyx-test.com//res/js/uploadify/swfobject.js"></script>
<script type="text/javascript" src="http://www.yyx-test.com//res/js/uploadify/jquery.uploadify.v2.1.4.min.js"></script>
	<div class="setting_body">
		<div class="caption">我的积分</div>
        <ul class="nav nav-tabs" id="setting_tab">
			<li><a href="/member/integral/io/">收支明细</a></li>
	        <li class="active"><a href="/member/integral/">我的积分</a></li>			
        </ul>
        
        <div class="tab-content setting_list">
			<div class="tab-pane active">
				<div class="mymoney">
					<p class="mymoneyinfo">当前可用积分为：<span><?php echo $user->getAvailableIntegral(); ?></span>, 冻结积分为：<span><?php echo $user->getFreezeIntegral(); ?></span></p>
				</div>

				<table class="table mlist">
				<thead>
					<tr><th colspan="2">奖励积分的方式</th></tr>
				</thead>
				<tbody>
			       <tr>
						<td class="c">
			        		<p>通过个人推广链接推广：</p>
							<span class="c9">邀请到用户注册 +<?php echo get_config('integral_invite')?> 积分，如果该用户充值，充值金币的<?php echo R::getConfig()->getConfig('recharge_inviter_reward') * 100 ?>%系统赠送给您。同时该用户为您的永久下线，您享受该用户每次充值金币总额<?php echo R::getConfig()->getConfig('recharge_inviter_reward') * 100 ?>%的系统奖励。</span>
						</td>
			        </tr>
			        <tr>
						<td class="c">
			        		<p>通过分享竞猜题目：</p>
							<span class="c9">将您好友的竞猜，参与的竞猜分享到新浪微博、腾讯微博，每条可获得 <?php echo get_config('integral_share')?> 积分的奖励</span>
						</td>
			        </tr>
			        <tr>
						<td class="c">
			        		<p>你的专属推广链接：</p>
							<span class="c9"><?php echo get_config('site_url')?><?php echo url("/member/login/?yqcode=$yqcode") ?></span>
						</td>
			        </tr>					
				</tbody>
		        </table>
	        </div>
        </div>
	</div>
<?php include_once('D:\phpStudy\yyx-master\runtime/views\./templates/default\footer.php');?>