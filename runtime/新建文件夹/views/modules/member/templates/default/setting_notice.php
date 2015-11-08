<?php include_once('E:\yyx\runtime/views\./templates/default\header.php');?>
<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/uploadify/swfobject.js"></script>
<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/uploadify/jquery.uploadify.v2.1.4.min.js"></script>
	<div class="setting_body">
		<div class="caption">通知动态设置</div>
        <ul class="nav nav-tabs" id="setting_tab">
        	<li><a href="/member/weibo/">微博绑定</a></li>
	        <li><a href="/member/setting/password/">密码设置</a></li>			
			<li class="active"><a href="/member/setting/notice/">通知动态</a></li>
	        <li><a href="/member/setting/base/">基本资料</a></li>			
        </ul>
        
        <div class="tab-content setting_list">
	        
			<!-- 通知动态 -->
			<div class="tab-pane active" id="t2">
				<form action="/member/setting/notice/" method="post">
				<div class="title">通知设置</div>
				<?php
					$configTemplate = $user->getConfigTemplate();
					$configs = $user->getConfigs();
				?>
				<div class="content">
					<div class="tip">什么情况下给我发送通知</div>
					<?php foreach($configTemplate['notice'] as $key=>$name){ ?>
					<label class="checkbox ls"><input type="checkbox" name="<?php echo $key; ?>" value="1" <?php if($configs[$key]){ ?>checked<?php } ?>><?php echo $name; ?></label>
					<?php } ?>
					<div class="controls-row"></div>
				</div>

				<div class="title">动态设置</div>
				<div class="content">
					<?php foreach($configTemplate['trend'] as $key=>$config){ ?>
						<div class="tip"><?php echo $config['name']; ?></div>
						<?php foreach($config['options'] as $value=>$name){ ?>
						<label class="radio ls"><input type="radio" name="<?php echo $key; ?>" value="<?php echo $value; ?>" <?php if($configs[$key] == $value){ ?>checked="checked"<?php } ?>> <?php echo $name; ?></label>
						<?php } ?>
					<?php } ?>
					<div class="controls-row"></div>
				</div>
				
				<div class="setting_btn">
					<input type="submit" value="保存修改" class="btn btn-primary savebtn" />
				</div>		
				</form>	        
			</div>
        </div>
	</div>
<?php include_once('E:\yyx\runtime/views\./templates/default\footer.php');?>