<?php include_once('E:\yyx\runtime/views\./templates/default\header.php');?>
<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/jquery/jquery.scrollTo.min.js"></script>
<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/play.js"></script>
				
	<script type="text/javascript">var oods_array = new Array();</script>
	
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
					<?php if($guess->isPlaying()){ ?>
						<?php if($user->getId() != $guess->getUserId() && $guess->justFriendCanPlay() && !$isFollow){ ?>
						<a href="javascript:;" class="info" >竞猜只对好友开放</a> &nbsp;
						<?php }else{ ?>
						<a href="javascript:;" class="info" id="play_tip_<?php echo $playData->getId(); ?>">未投注</a> &nbsp;
						<a href="javascript:;" class="btn btn-primary mybtn" id="play_menu_<?php echo $playData->getId(); ?>" onclick="GuessPlayHelper.togglePlayBox('<?php echo $playData->getId(); ?>')">投注</a>
						<?php } ?>
					<?php }else{ ?>
					&nbsp;
					<?php } ?>
				</div>
				<?php if($guess->isPlaying()){ ?>
				<div id="play_box_<?php echo $playData->getId(); ?>" class="play_box">
					<div class="modal-body">
					<script type="text/javascript">
					var i = <?php echo $playData->getId(); ?>;
					oods_array[i] = <?php echo json_encode($oods) ?>;
					</script>
				    <div class="control-group">
					    <label class="control-label" for="choice">选择：</label>
					    <div class="controls">
							<select id="play_value_<?php echo $playData->getId(); ?>" name="play[<?php echo $playData->getId(); ?>][value]" onchange="setoods(this,<?php echo $playData->getId(); ?>);GuessPlayHelper.checkWealth('<?php echo $playData->getId(); ?>')">
								<option value=''>选择结果</option>
								<?php foreach($parameter->getOptions() as $option){ ?>
								<option value="<?php echo $option->getValue(); ?>"><?php echo $option->getLabel(); ?></option>
								<?php } ?>
							</select>
							<span style="margin-left: 15px">
					    	不选择为不投注或取消投注&nbsp;
					    	</span>
					    </div>
				    </div>
					
				    <div class="control-group">
					    <label class="control-label" for="tz">投注：</label>
					    <div class="controls">
					    	<input type="text" id="play_wealth_<?php echo $playData->getId(); ?>" onkeyup="GuessPlayHelper.checkWealth('<?php echo $playData->getId(); ?>')" name="play[<?php echo $playData->getId(); ?>][wealth]" class="span3" min="<?php echo $playData->getBettingLowerLimit(); ?>" max="<?php echo $playData->getBettingUpperLimit(); ?>" <?php if($playData->getBettingLowerLimit()){ ?>value="<?php echo $playData->getBettingLowerLimit(); ?>"<?php }else{ ?>value="1"<?php } ?>> 
					    	<span style="margin-left: 15px">
					    	0为不投注或取消投注&nbsp;
					    	<?php if($playData->getBettingLowerLimit()){ ?>投注下限<?php echo $playData->getBettingLowerLimit(); ?><?php echo $guess->getWealthTypeName(); ?><?php } ?>&nbsp;
					    	<?php if($playData->getBettingUpperLimit()){ ?>投注上限<?php echo $playData->getBettingUpperLimit(); ?><?php echo $guess->getWealthTypeName(); ?><?php } ?>&nbsp;
					    	</span>
					    </div>
				    </div>
					
					<?php if($oods[$option->getValue()]){ ?>
				    <div class="control-group">
					    <label class="control-label" for="tz">提示：</label>
					    <span>按当前赔率，获胜可得 <b odds="0" id="play_wealth_tip_<?php echo $playData->getId(); ?>" style="font-size: 14px;line-height: 35px;">
						0
					    </b> <?php echo $guess->getWealthTypeName(); ?>
					    </span>
				    </div>
				    <?php } ?>
				    	
				    <div class="control-group">
					    <a href="javascript:;" class="btn mybtn" onclick="GuessPlayHelper.addPlay('<?php echo $playData->getId(); ?>')">确认</a>
				    </div>		
				    			
					</div>
				</div>
				<?php } ?>
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
					<?php if($guess->isPlaying()){ ?>
						<?php if($user->getId() != $guess->getUserId() && $guess->justFriendCanPlay() && !$isFollow){ ?>
						竞猜只对好友开放
						<?php }else{ ?>
						继续投注
						<?php } ?>
					<?php }else{ ?>
					竞猜审核中或已结束，不能投注
					<?php } ?>
					</a></div>
					<div class="bottom"><span class="icon">共计投注： <span id="total_wealth">0</span> <?php echo $guess->getWealthTypeName(); ?></span></div>
				</div>
				<?php if($guess->isPlaying()){ ?>
					<?php if($user->getId() != $guess->getUserId() && $guess->justFriendCanPlay() && !$isFollow){ ?>
					
					<?php }else{ ?>
					<div class="cbox">
						<label class="checkbox">
							<input type="checkbox" value="1" name="agree"> 我已阅读并且同意《 预言星竞猜平台声明 》
						</label>
					</div>
					<div class="post">
						<input type="hidden" name="id" value="<?php echo $guess->getId(); ?>">
						<input type="submit" class="btn btn-primary" value="全部投注" onclick="return ajaxPostForm('ajaxform', '', 'postFormHandle', '1000', '__ajaxform')"/>
						<span class="ajaxform_tip" id="__ajaxform"></span>
					</div>
					<?php } ?>
				<?php } ?>
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
	<?php foreach($guess->getPlayDatas() as $playData){ ?>
		var playData = new PlayData();
		playData.setId('<?php echo $playData->getId(); ?>');
		playData.setName('<?php echo $playData->getName(); ?>');
		GuessPlayHelper.addPlayData(playData);
	<?php } ?>
	
	function setoods(sel,playWayId)
	{
		var selindex = sel.value;
		if(selindex!="")
		{
			var oods = oods_array[playWayId];
			var oods_value = oods[selindex];
		}
		else
		{
			oods_value = 0;
		}
		var oddsTip = $('#play_wealth_tip_' + playWayId);
		oddsTip.attr('odds',oods_value);									
	}	
	</script>
	
<?php include_once('E:\yyx\runtime/views\./templates/default\footer.php');?>