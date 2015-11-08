<?php include_once('E:\yyx\runtime/views\./templates/default\header.php');?>
<div class="home_body">
		<div class="left">
			<?php if($notices){ ?>
			<div class="box1" id="notices" style="margin-bottom:30px;">
				<div class="title">
					<div class="setting"><a href="/member/setting/notice/">通知设置</a></div>
					<div class="caption">系统通知 <span class="numbg"><?php echo $user->getNewNoticeCount(); ?></span></div>
				</div>
				<div class="content">
					<ul class="notice">
						<?php foreach($notices as $item){ ?>
						<li class="i">
						<?php echo $item['notice']; ?>
						<a href="javascript:;" data-dismiss="alert" class="close" style="display: none;" onclick="removeNotice(this, <?php echo $item['id']; ?>)">×</a>
						</li>
						<?php } ?>
					</ul>
				</div>	
				<div class="opt">
					<a href="javascript:;" style="float: left;" class="btn" onclick="noticeIdKnow()">我知道了</a>
					<a href="/member/notice/" style="float: right;" class="btn btn-primary">查看全部</a>					
				</div>						
			</div>
			<?php } ?>
			
			<div class="box2" style="margin-top:0px;">
				<div class="title">
					<div class="setting"><a href="/member/setting/notice/">动态设置</a></div>
					<div class="caption">
						最新动态 
						<a class="listbtn" data-toggle="dropdown" href="#" id="drop1" role="button"></a>
						<ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
						<?php
							$configTemplate = $user->getConfigTemplate();
						?>
						<?php foreach($configTemplate['trend']['trend_time']['options'] as $value=>$name){ ?>
						<li><a href="<?php echo url("/guess/list/?time=$value") ?>" onclick="window.location=this.href"><?php echo $name; ?></a></li>
						<?php } ?>
						</ul>
					</div>			
				</div>
				<div class="content">
					<?php include_once('E:\yyx\runtime/views\./templates/default\guess_box.php');?>		
				</div>			
			</div>		
		</div>
		
		<div class="right">
			<?php include_once('E:\yyx\runtime/views\./templates/default\notice_box.php');?>
			<ul class="guesstype">
				<li class="sel"><a href="javascript:;">最新动态</a><span><?php echo $guessNewCount; ?></span></li>
				<li><a href="/guess/my/add/">我发布的竞猜</a><span><?php echo $guessAddCount; ?></span></li>
				<li><a href="/guess/my/play/">我参与的竞猜</a><span><?php echo $guessPlayCount; ?></span></li>
				<li><a href="/guess/my/attention/">我关注的竞猜</a><span><?php echo $attentionGuessCount; ?></span></li>
				<li><a href="/guess/my/friend/">我好友的竞猜</a><span><?php echo $friendGuessCount; ?></span></li>
				<li><a href="/guess/my/invite/">邀请我参与的竞猜</a><span><?php echo $inviteGuessCount; ?></span></li>
			</ul>
			<?php include_once('E:\yyx\runtime/views\./templates/default\invite_box.php');?>
			
			<!--
			<div class="ulist">
				<div class="title">您可能感兴趣的用户</div>
				<?php include_once('E:\yyx\runtime/views\./templates/default\users_list_box.php');?>			
			</div>
			-->
			
			<div class="ad">
				<?php include_once('E:\yyx\runtime/views\./templates/default\ad_box.php');?>				
			</div>
					
		</div>
		
		<div class="clear"></div>
	</div>
	
	<script type="text/javascript">
		$(".i").mouseover(function(){
  			$(this).children(".close").show();
		});
		$(".i").mouseout(function(){
  			$(this).children(".close").hide();
		});
		function removeNotice(elm, id){
		    $.ajax({
			url : '/member/notice/read/',
			type : "POST",
			cache : false,
			data : {'id':id  },
			success : function(html) {
			    $(elm).parent().slideUp();
			}
		    });
		}
	</script>
<?php include_once('E:\yyx\runtime/views\./templates/default\footer.php');?>