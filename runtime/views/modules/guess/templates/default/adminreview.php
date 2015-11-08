<?php include_once('D:\phpStudy\yyx-master\runtime/views\./templates/default\header.php');?>
<script type="text/javascript" src="http://www.yyx-test.com//res/js/jquery/jquery.scrollTo.min.js"></script>
<script type="text/javascript" src="http://www.yyx-test.com//res/js/play.js"></script>
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
				<div class="title">
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
					<div class="w2 r2"><?php if($playData->isFloatOdds()){ ?>浮动赔率<?php }elseif($playData->isFixedOdds()){ ?>固定赔率<?php }else{ ?>赔率类型错误<?php } ?></div>
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
                        <p>比特币：<span><?php echo $user->getAvailableBtc(); ?></span></p>
                        <?php }elseif($guess->wealthTypeIsLtc()){ ?>
                        <p>莱特币：<span><?php echo $user->getAvailableLtc(); ?></span></p>
                        <?php }elseif($guess->wealthTypeIsDoge()){ ?>
                        <p>狗币：<span><?php echo $user->getAvailableDoge(); ?></span></p>
						<?php }elseif($guess->wealthTypeIsIntegral()){ ?>
						<p>积分：<span><?php echo $user->getAvailableIntegral(); ?></span></p>
						<?php }else{ ?>
						吃喝玩乐
						<?php } ?>
						<p>胜率：<span><?php echo $user->getAccuracy(); ?>%</span></p>
					</div>
					<table class="table">
						<tbody id="play_reviews">
						</tbody>
					</table>
					<div class="dot"><a href="javascript:;" onclick="$.scrollTo('#play_lists', 800)">
					预览中，无操作
					</a></div>
					<div class="bottom"><span class="icon">共计投注： <span id="total_wealth">0</span> <?php echo $guess->getWealthTypeName(); ?></span></div>
				</div>
			</div>
			
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
					<?php include_once('D:\phpStudy\yyx-master\runtime/views\./templates/default\users_list_box.php');?>
			</div>
		</div>
		
		<div class="clear"></div>
	</div>
<?php include_once('D:\phpStudy\yyx-master\runtime/views\./templates/default\footer.php');?>