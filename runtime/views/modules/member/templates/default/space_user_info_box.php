<div class="userzl">
	<div class="top">
		<p>用户名：<span><?php echo $spaceUser->getName(); ?></span></p>
		<p>性别：<span><?php if($spaceUser->getSex() == '1'){ ?>男<?php }elseif($spaceUser->getSex() == '2'){ ?>女<?php }else{ ?>不详<?php } ?></span></p>
		<p>年龄：<span><?php echo $spaceUser->getAge(); ?></span></p>
		<p>现居地：<span><?php echo $spaceUser->getProvince(); ?> <?php echo $spaceUser->getCity(); ?></span></p>
		<p style="clear: left;">个人签名：<span><?php echo $spaceUser->getSign(); ?></span></p>
		<p>个人主页：<span><?php echo $spaceUser->getWebsite(); ?></span></p>
		<p>被浏览：<span><?php echo $spaceUser->getViews(); ?></span></p>
	</div>
	<div class="bottom">
		<p>庄家级别：<span><?php if($spaceUser->getMakersLevel()){ ?>已认证<?php }else{ ?>未认证<?php } ?></span></p>
		<p>竞猜：<span><?php echo $spaceUser->getGuessCount(); ?>场</span></p>
		<p>准确率：<span><?php echo $spaceUser->getAccuracy(); ?>%</span></p>
		<?php if($user->getId() == $spaceUser->getId()){ ?>
		<p style="clear: left;">当前积分：<span><?php echo $spaceUser->getAvailableIntegral(); ?></span> <a class="btn btn-primary" href="/member/integral/io/" >查看明细</a></p>
		<p>
			当前金币：<span><?php echo $spaceUser->getAvailableMoney(); ?></span>
			<a class="btn btn-primary"  href="/member/recharge/index/" id="money_recharge" onclick="ajaxmenu(event, this.id, 1)">充 值</a>&nbsp; &nbsp; <a class="btn btn-primary"  href="/member/money/handsel/" id="money_handsel" onclick="ajaxmenu(event, this.id, 1)">转 赠</a>&nbsp; &nbsp; <a class="btn btn-primary" href="/member/money/io/" >查看明细</a>
		</p>
		<?php } ?>
	</div>
	<div class="face"><img src="<?php echo $spaceUser->getAvatar(); ?>" /></div>
</div>