<?php include_once('E:\yyx\runtime/views\./templates/default\header.php');?>
<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/uploadify/swfobject.js"></script>
<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/uploadify/jquery.uploadify.v2.1.4.min.js"></script>
	<div class="setting_body">
		<div class="caption">申请庄家认证</div>
		<ul class="nav nav-tabs" id="setting_tab">
        	<li><a href="javascript::">&nbsp;</a></li>
        </ul>
        
        <div class="tab-content setting_list">
	        <div class="tab-pane active" id="t7">
	        <?php if($makersAuth['status'] == 1){ ?>
	        	恭喜你通过了庄家认证
	        <?php }elseif($makersAuth['status'] == -1){ ?>
	        	抱歉，管理员拒绝了你的申请，你可以继续修改并提交下面的申请内含。
	        <?php }elseif($makersAuth['status'] == 0){ ?>
	        	你的申请正在接受管理员的审核，请耐心等待！
	        <?php } ?>
	        <?php if($makersAuth['status'] != 1){ ?>
	        <form action="/member/auth/" method="post">
				<dl class="dl-horizontal ml40">
					<dt>标题：</dt>
					<dd>
						<input type="text" class="span3" name="title"  value="<?php echo $makersAuth['title']; ?>"/>
					</dd>
					<dt>内容：</dt>
					<dd>
						<textarea name="summary"><?php echo $makersAuth['summary']; ?></textarea>
					</dd>
				</dl>
				
				<div class="setting_btn">
					<input type="submit" value="申请认证" class="btn btn-primary savebtn" />
				</div>	
				</form>	
				<?php } ?>
	        </div>
        </div>
	</div>
<?php include_once('E:\yyx\runtime/views\./templates/default\footer.php');?>