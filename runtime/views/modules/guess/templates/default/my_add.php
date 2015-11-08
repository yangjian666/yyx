<?php include_once('D:\phpStudy\yyx-master\runtime/views\./templates/default\header.php');?>
<div class="home_body">
		<div class="left">
			<div class="box2" style="margin-top:0px;">
				<div class="title">
					<div class="caption">
						<?php echo $title; ?>
					</div>			
				</div>
				<div class="content">
					<?php include_once('D:\phpStudy\yyx-master\runtime/views\modules/guess\templates/default\my_guess_box.php');?>		
				</div>
				<?php echo $pages; ?>			
			</div>		
		</div>
		
		<div class="right">
			<?php include_once('D:\phpStudy\yyx-master\runtime/views\./templates/default\notice_box.php');?>
			<ul class="guesstype">
				<li><a href="/">最新动态</a><span><?php echo $guessNewCount; ?></span></li>
				<li <?php echo $addClass; ?>><a href="/guess/my/add/">我发布的竞猜</a><span><?php echo $guessAddCount; ?></span></li>
				<li <?php echo $playClass; ?>><a href="/guess/my/play/">我参与的竞猜</a><span><?php echo $guessPlayCount; ?></span></li>
				<li <?php echo $attentionClass; ?>><a href="/guess/my/attention/">我关注的竞猜</a><span><?php echo $attentionGuessCount; ?></span></li>
				<li <?php echo $friendClass; ?>><a href="/guess/my/friend/">我好友的竞猜</a><span><?php echo $friendGuessCount; ?></span></li>
				<li <?php echo $inviteClass; ?>><a href="/guess/my/invite/">邀请我参与的竞猜</a><span><?php echo $inviteGuessCount; ?></span></li>
			</ul>
			<?php include_once('D:\phpStudy\yyx-master\runtime/views\./templates/default\invite_box.php');?>
			
			<!--
			<div class="ulist">
				<div class="title">您可能感兴趣的用户</div>
				<?php include_once('D:\phpStudy\yyx-master\runtime/views\./templates/default\users_list_box.php');?>			
			</div>
			-->
			
			<div class="ad">
				<?php include_once('D:\phpStudy\yyx-master\runtime/views\./templates/default\ad_box.php');?>				
			</div>
		
		</div>
		
		<div class="clear"></div>
	</div>
<?php include_once('D:\phpStudy\yyx-master\runtime/views\./templates/default\footer.php');?>