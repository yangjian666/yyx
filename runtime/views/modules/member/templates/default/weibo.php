<?php include_once('E:\yyx\runtime/views\./templates/default\header.php');?>
	<div class="setting_body">
		<div class="caption">微博绑定</div>
		<ul class="nav nav-tabs" id="setting_tab">
	        <li class="active"><a href="/member/weibo/">微博绑定</a></li>			
	        <li><a href="/member/setting/password/">密码设置</a></li>			
			<li><a href="/member/setting/notice/">通知动态</a></li>
	        <li><a href="/member/setting/base/">基本资料</a></li>			
        </ul>
        
        <div class="tab-content setting_list">
			<!-- 安全设置 -->
	        <div class="tab-pane active">
	       		<div class="title">未绑定帐号</div>
				
				<table class="table abind">
				<?php foreach($weibos as $weibo){ ?>
				<?php if(!$binds[$weibo['id']]){ ?>
		        <tr>
		        	<td><?php echo $weibo['name']; ?></td>
					<td><a class="btn pull-right abindbtn" style="height: 22px;" href="javascript:;" id="weibo_bind_<?php echo $weibo['id']; ?>"  onclick="openBindWindow('/member/weibo/bind/?id=<?php echo $weibo[id]; ?>');">绑 定</a></td>
		        </tr>
		        <?php } ?>
		        <?php } ?>
		        </table>
				
				<div class="title">已绑定帐号</div>	
		        <table class="table abind">
	        	<?php foreach($weibos as $weibo){ ?>
				<?php if($binds[$weibo['id']]){ ?>
		        <tr>
		        	<td><?php echo $weibo['name']; ?></td>
					<td><a class="btn pull-right abindbtn" style="height: 22px;" href="/member/weibo/unbind/?id=<?php echo $weibo[id]; ?>" id="weibo_unbind_<?php echo $weibo['id']; ?>" onclick="ajaxmenu(event, this.id, 1)">取消绑定</a></td>
		        </tr>
		        <?php } ?>
		        <?php } ?>
		        </table>	        	
	        </div>
        </div>
	</div>
<?php include_once('E:\yyx\runtime/views\./templates/default\footer.php');?>