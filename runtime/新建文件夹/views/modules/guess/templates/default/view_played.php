<?php include_once('E:\yyx\runtime/views\./templates/default\header.php');?>
<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/jquery/jquery.scrollTo.min.js"></script>
<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/play.js"></script>
	<div class="read_body">
		<div class="left">
			<div class="alink">当前位置：<a href="/">首页</a> > <a href="/guess/list/">竞猜</a> > 
			<?php if($rootCategory){ ?>
			<a href="<?php echo url("/guess/list/?cateid=$rootCategory[id]") ?>"><?php echo $rootCategory[name]; ?></a> > <?php echo $subCategory[name]; ?>
			<?php }else{ ?>
			自定义
			<?php } ?>
			</div>
			<div class="content">
			<form id="ajaxform" name="ajaxform" action="/guess/play/?inajax=1" method="post">
				<div class="title">
					
					<div class="fbtn">
						<?php if($guessIsFollow){ ?>
						<a class="btn"  href="/guess/follow/cancel/?id=<?php echo $guess->getId(); ?>" id="guess_follow_cancel_<?php echo $guess->getId(); ?>" onclick="ajaxmenu(event, this.id, 1)">取消关注</a>
						<?php }else{ ?>
						<a class="btn"  href="/guess/follow/index/?id=<?php echo $guess->getId(); ?>" id="guess_follow_<?php echo $guess->getId(); ?>" onclick="ajaxmenu(event, this.id, 1)">关注竞猜</a>
						<?php } ?>
						<a class="btn"  href="/member/share/index/?id=<?php echo $guess->getId(); ?>" id="guess_share_<?php echo $guess->getId(); ?>" onclick="ajaxmenu(event, this.id, 1)">分享竞猜</a>
					</div>
					
					<?php echo $guess->getTitle(); ?>					
				</div>
				<div class="t">
					<div class="t1">竞猜时间：<?php echo date('Y年m月d日 H：i', $guess->getPlayStartTime())?> — <?php echo date('Y年m月d日 H：i', $guess->getPlayDeadline())?> </div>
				</div>
				<div class="t" style="height:auto;">
					<div style="float:right;width: 530px;line-height:25px;"><?php echo $guess->getSummary(); ?></div>
					<div style="float:left;width: 60px;line-height:25px;">竞猜说明：</div>
				</div>
				<div class="clear"></div>
				<div id="play_lists"></div>
				<?php foreach($guess->getPlayDatas() as $playData){ ?>
				<?php $newsId = $playWays[$playData->getId()]['news_id']; ?>
				<div class="playtype" id="play_list_<?php echo $playData->getId(); ?>"><?php echo $playData->getName(); ?> <?php if($newsId){ ?>(<a target="_blank" href="<?php echo url("/news/view/?id=$newsId") ?>">查看说明</a>)<?php } ?></div>
				<div class="h">
					<div class="w1">竞猜结果</div>
					<?php if($playData->isFloatOdds()){ ?>
						<div class="w2 r2">浮动赔率</div>
					<?php }elseif($playData->isFixedOdds()){ ?>
						<div class="w2 r1">固定赔率</div>
					<?php }else{ ?>
						<div class="w2">赔率</div>
					<?php } ?>
					<div class="w2">投注人数</div>
					<div class="w2">投注<?php echo $guess->getWealthTypeName(); ?></div>
				</div>
				<?php $parameter = $playData->getParameter() ?>
				<?php $oods = $playData->getOdds() ?>
				<?php foreach($parameter->getOptions() as $option){ ?>
				<div class="d" id="option_<?php echo $option->getValue(); ?>">
					<div class="w1"><?php echo $option->getLabel(); ?></div>
					<div class="w2"><?php echo $playData->getOptionOdds($option->getValue()); ?></div>
					<div class="w2"><?php echo $playData->getPlayCount($option->getValue()); ?></div>
					<div class="w2"><?php echo $playData->getPlayWealth($option->getValue()); ?></div>
				</div>
				<?php } ?>
				<div class="d tc">
					当前参与人数：<b><?php echo $playData->getTotalPlayCount(); ?></b>人，共投注 <b><?php echo $playData->getTotalPlayWealth(); ?></b> <?php echo $guess->getWealthTypeName(); ?>
				</div>
				<div class="b">
				&nbsp;
				</div>
				<?php } ?>
				
				<div class="tzinfo">
					<img src="<?php echo $user->getAvatar(); ?>" class="f"/>
					<div class="n"><a href="<?php echo url("/member/space/?uid={$user->getId()}") ?>"><?php echo $user->getName(); ?></a></div>
					<div class="i">
						<?php if($guess->wealthTypeIsMoney()){ ?>
						<p>金币：<span><?php echo $user->getAvailableMoney(); ?></span></p>
                        <?php }elseif($guess->wealthTypeIsBtc()){ ?>
                            <p>金币：<span><?php echo $user->getAvailableBtc(); ?></span></p>
                        <?php }elseif($guess->wealthTypeIsLtc()){ ?>
                            <p>金币：<span><?php echo $user->getAvailableLtc(); ?></span></p>
                        <?php }elseif($guess->wealthTypeIsDoge()){ ?>
                            <p>金币：<span><?php echo $user->getAvailableDoge(); ?></span></p>
						<?php }elseif($guess->wealthTypeIsIntegral()){ ?>
						<p>积分：<span><?php echo $user->getAvailableIntegral(); ?></span></p>
						<?php }else{ ?>
						吃喝玩乐
						<?php } ?>
						<p>胜率：<span><?php echo $user->getAccuracy(); ?>%</span></p>
					</div>
					<table class="table">
						<tbody id="play_reviews">
						<?php foreach($play->getPlayDatas() as $playData){ ?>
						<?php $tempPlayDatas = $guess->getPlayDatas();$options = $tempPlayDatas[$playData->getPlayWayId()]->getParameter()->getOptions() ?>
							<tr>
							<td class="arrow"><?php echo $playData->getPlayWayName(); ?></td>
							<td><?php echo $options[$playData->getChoose()]->getLabel(); ?></td>
							<td><span><?php echo $playData->getWealth(); ?></span><?php echo $guess->getWealthTypeName(); ?></td>
							<td>
								<?php if($play->getStatus()){ ?>
									<?php if($playData->isWin()){ ?>
									赢[<?php echo $playData->getWinWealth(); ?>]
									<?php }elseif($playData->isLost()){ ?>
									输[<?php echo $playData->getWealth(); ?>]
									<?php }else{ ?>
									打平
									<?php } ?>
								<?php }else{ ?>
								未判定
								<?php } ?>
							</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
					<div class="dot">
						<?php if($play->getStatus()){ ?>
							<?php if($play->isWin()){ ?>共赢<?php }else{ ?>共输<?php } ?>[<?php echo $play->getBasWinWealth(); ?>]<?php echo $guess->getWealthTypeName(); ?>
						<?php }else{ ?>
						结果未判定
						<?php } ?></div>
					<div class="bottom"><span class="icon">共计投注： <span id="total_wealth"><?php echo $play->getPlayWealth(); ?></span> <?php echo $guess->getWealthTypeName(); ?></span></div>
				</div>
				
				</form>
			</div>
			<!-- UY BEGIN -->
			<div id="uyan_frame" style="margin-top: 30px;"></div>
			<script type="text/javascript" id="UYScript" src="http://v1.uyan.cc/js/iframe.js?UYUserId=0" async=""></script>
			<!-- UY END -->				
		</div>
		
		<div class="right">
			<div class="ulist zz">
				<div class="content">	
					<?php $makers = $guess->getUser(); ?>
					<div class="userinfo">
						<img src="<?php echo $makers->getAvatar(); ?>" />
						<span class="username">发布庄家: <a href="<?php echo url("/member/space/?uid={$makers->getId()}") ?>"><?php echo $makers->getName(); ?></a></span>
						<span class="address">
						<?php if(!$makers->getProvince() && !$makers->getCity()){ ?>
							地址不详
						<?php }else{ ?>
							<?php echo $makers->getProvince(); ?><?php echo $makers->getCity(); ?>
						<?php } ?>
						</span>
						<span class="sign"><?php echo $makers->getSign(); ?></span>
					</div>
					
					<div class="guessinfo">	
					
						<ul>
							<li class="i1">
								<?php if($guess->getStatus() == Guess::STATUS_WAITING_RUDGE){ ?>
									<span class="bg-red">判定中</span>
								<?php }elseif($guess->getStatus() == Guess::STATUS_END){ ?>
									<span class="bg-red">已结束</span>
								<?php }elseif($guess->getStatus() == Guess::STATUS_CLOSE){ ?>
									<span class="bg-red">已关闭</span>
								<?php }elseif($guess->getStatus() == Guess::STATUS_WAITING_CKECK){ ?>
									<span class="bg-red">审核中</span>
								<?php }elseif($guess->getPlayDeadline() < time()){ ?>
									<span class="bg-red">已截止</span>
								<?php }else{ ?>
									<span class="bg-green">投注中</span>
								<?php } ?>
								投注状态
							</li>
							<li class="i2">
								<span>
								<?php if($guess->getPlayDeadline() < time()){ ?>
									-
								<?php }else{ ?>
									<?php if($guessDay){ ?><?php echo $guessDay; ?>天<?php } ?><?php echo $guessHour; ?>小时<?php echo $guessMinute; ?>分钟
								<?php } ?>
								</span>								
								距离结束
							</li>
							<li class="i3">
								<span><?php echo $guess->getplayCount(); ?>人</span>
								参与人数
							</li>
							<li class="i4">
								<span><?php echo $guess->getplayWealth(); ?><?php echo $guess->getWealthTypeName(); ?></span>
								投注总额
							</li>
						</ul>
					
					</div>
					
					
					<div class="bottom">
						<a href="/member/friend/add/?uid=<?php echo $makers->getId(); ?>" cancel="0" class="btn btn-primary" onclick="ajaxmenu(event, this.id, 1, 2000)" id="follow_add_<?php echo $makers->getId(); ?>" class="btn btn-primary">加好友</a> &nbsp;&nbsp;&nbsp;&nbsp;
						<a href="/member/message/send/?uid=<?php echo $makers->getId(); ?>" id="message_send_<?php echo $makers->getId(); ?>" onclick="ajaxmenu(event, this.id, 1)" class="btn btn-primary">站内信</a>
					</div>
				</div>
			</div>		
			
			<div class="ulist">
				<div class="title">最新竞猜用户</div>
					<?php include_once('E:\yyx\runtime/views\./templates/default\users_list_box.php');?>
			</div>
		</div>
		
		<div class="clear"></div>
	</div>
	<script type="text/javascript">
	<!--
	<?php foreach($guess->getPlayDatas() as $playData){ ?>
		var playData = new PlayData();
		playData.setId('<?php echo $playData->getId(); ?>');
		playData.setName('<?php echo $playData->getName(); ?>');
		GuessPlayHelper.addPlayData(playData);
	<?php } ?>
	//-->
	</script>
<?php include_once('E:\yyx\runtime/views\./templates/default\footer.php');?>