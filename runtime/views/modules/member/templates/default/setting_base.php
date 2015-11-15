<?php include_once('D:\phpStudy\yyx-master\runtime/views\./templates/default\header.php');?>
<script type="text/javascript" src="http://www.yyx-test.com//res/js/uploadify/swfobject.js"></script>
<script type="text/javascript" src="http://www.yyx-test.com//res/js/uploadify/jquery.uploadify.v2.1.4.min.js"></script>
	<div class="setting_body">
		<div class="caption">基本资料设置</div>
        <ul class="nav nav-tabs" id="setting_tab">
	        <li><a href="/member/weibo/">微博绑定</a></li>		
	        <li><a href="/member/setting/password/">密码设置</a></li>			
			<li><a href="/member/setting/notice/">通知动态</a></li>
	        <li class="active"><a href="/member/setting/base/">基本资料</a></li>			
        </ul>
        
        <div class="tab-content setting_list">
	        
			<!-- 基本资料 -->
			<div class="tab-pane active" id="t1">
				<form action="/member/setting/base/" method="post">
				<dl class="dl-horizontal">
					<dt>邮箱：</dt>
					<dd class="c9"><?php echo $user->getEmail(); ?></dd>
					<dt>用户：</dt>
					<dd class="c9"><?php echo $user->getName(); ?></dd>
					<dt>性别：</dt>
					<dd>
						<label class="radio inline">
							<input type="radio" name="sex" value="1" <?php if($user->getSex() == '1'){ ?>checked="checked"<?php } ?> /> 男
						</label>
						<label class="radio inline">
							<input type="radio" name="sex" value="2" <?php if($user->getSex() == '2'){ ?>checked="checked"<?php } ?>/> 女
						</label>				
					</dd>
					<dt>生日：</dt>
					<dd>
						<select name="birthday_year" style="width: 100px;">
						<?php
						 $n = date('Y');
						 for($i=1900;$i<=$n;$i++){
						 	$sel = '';
							if($user->getBirthDayYear() == $i) $sel='selected="selected"';
							echo '<option value="'.$i.'" '. $sel .'>'.$i.'</option>';						 
						 }
						?>
						</select> 年
						
						<select name="birthday_month" style="width: 100px;">
						<?php
						 $n = 12;
						 for($i=1;$i<=$n;$i++){
						 	$sel = '';
							if($user->getBirthDayMonth() == $i) $sel='selected="selected"';
							echo '<option value="'.$i.'" '. $sel .'>'.$i.'</option>';						 
						 }
						?>						
						</select> 月
						
						<select name="birthday_day" style="width: 100px;">
						<?php
						 $n = 31;
						 for($i=1;$i<=$n;$i++){
						 	$sel = '';
							if($user->getBirthDayDay() == $i) $sel='selected="selected"';
							echo '<option value="'.$i.'" '. $sel .'>'.$i.'</option>';						 
						 }
						?>							
						</select> 日						

					</dd>
					<dt>现居地：</dt>
					<dd>
						<select name="province" style="width: 160px;" onchange="getCitySelect(this.value, 'select_city')">
							<?php foreach($province_arr as $pro){ ?>
							<?php if($pro[name]==$user->getProvince()) $sel='selected="selected"'; else $sel=''; ?>
							<option value="<?php echo $pro[name]; ?>" <?php echo $sel; ?>><?php echo $pro[name]; ?></option>							
							<?php } ?>							
						</select>
						
						<?php if(empty($city_arr)) $hstr='display:none;"'; else $hstr=''; ?>
						<select name="city" style="width: 160px;<?php echo $hstr; ?>" id="select_city">
							<?php foreach($city_arr as $city){ ?>
							<?php if($city[name]==$user->getCity()) $sel='selected="selected"'; else $sel=''; ?>
							<option value="<?php echo $city[name]; ?>" <?php echo $sel; ?>><?php echo $city[name]; ?></option>							
							<?php } ?>						
						</select>
					</dd>
					<dt>个性签名：</dt>
					<dd>
						<input type="text" class="span3" name="sign" value="<?php echo $user->getSign(); ?>" />
					</dd>
					<dt>个性网址：</dt>
					<dd class="c9 bb">
						 <?php $url=R::getConfig()->getConfig('site_url'); ?>
						 <?php echo $url; ?>/
						 <input type="text" class="span3" name="website" value="<?php echo $user->getWebsite(); ?>"/>
					</dd>					
				</dl>
				
				<div class="userface">
					<img src="<?php echo $user->getAvatar(); ?>" id="avatar_preview"/>
					<input type="hidden" id="avatar" name="avatar" value="<?php echo $user->getAvatar(); ?>">
					<p>头像设置(72*72px)</p>
					<p>支持jpg/gif/png等格式的图片</p>
					<p>
					<input id="file_upload" width="54" height="28" type="file" />
					<img class="upload_waiting" style="display:none" id="avatar_edit_waiting" src="/res/images/loading.gif">
					</p>
				</div>
				
				<div class="setting_btn">
					<input type="submit" value="保存修改" class="btn btn-primary savebtn" />
				</div>
				</form>				
	        </div>
        </div>
	</div>
	<script type="text/javascript">
			$(document).ready(function(){
			    bindAvatarUpload();
			});
		</script>
<?php include_once('D:\phpStudy\yyx-master\runtime/views\./templates/default\footer.php');?>