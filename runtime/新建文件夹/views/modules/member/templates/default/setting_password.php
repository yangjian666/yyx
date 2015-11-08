<?php include_once('E:\yyx\runtime/views\./templates/default\header.php');?>
<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/uploadify/swfobject.js"></script>
<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/uploadify/jquery.uploadify.v2.1.4.min.js"></script>
	<div class="setting_body">
		<div class="caption">密码设置</div>
        <ul class="nav nav-tabs" id="setting_tab">
        	<li><a href="/member/weibo/">微博绑定</a></li>	
	        <li class="active"><a href="/member/setting/password/">密码设置</a></li>			
			<li><a href="/member/setting/notice/">通知动态</a></li>
	        <li><a href="/member/setting/base/">基本资料</a></li>			
        </ul>
        
        <div class="tab-content setting_list">
			<!-- 安全设置 -->
	        <div class="tab-pane active" id="t4">
	        <form action="/member/setting/password/" method="post">
				<dl class="dl-horizontal ml40">
					<dt>当前密码：</dt>
					<dd>
						<input type="password" class="span3" name="old_password"/>
					</dd>
					<dt>新的密码：</dt>
					<dd>
						<input type="password" class="span3" name="new_password"/>
					</dd>
					<dt>确认密码：</dt>
					<dd>
						<input type="password" class="span3" name="re_new_password"/>
					</dd>
				</dl>
				
				<div class="setting_btn">
					<input type="submit" value="保存修改" class="btn btn-primary savebtn" />
				</div>			
				</form>		        	
	        </div>
        </div>
	</div>
<?php include_once('E:\yyx\runtime/views\./templates/default\footer.php');?>