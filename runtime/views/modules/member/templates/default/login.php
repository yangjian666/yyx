<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $seo['title']; ?></title>
<meta name="description" content="<?php echo $seo['description']; ?>" />
<meta name="keywords" content="<?php echo $seo['keywords']; ?>" />

<link rel="stylesheet" href="http://yyx.796dice.com:8080/res/css/bootstrap.min.css" />
<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/jquery/jquery-1.9.0.min.js"></script>
<!--<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/bootstrap.min.js"></script>-->
<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/bootstrap-modal.js"></script>
<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/functions.js"></script>
<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/validation/jquery.validate.min.js"></script>
<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/validation/additional-methods.min.js"></script>
<link rel="stylesheet" href="http://yyx.796dice.com:8080/res/css/style.css" />

<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/bootstrap-tab.js"></script>
<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/bootstrap-dropdown.js"></script>
<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/global.js"></script>
<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/string.extends.js"></script>
<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/uc_common.js"></script>
<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/uc_menu.js"></script>
<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/uc_ajax.js"></script>
<link rel="stylesheet" href="http://yyx.796dice.com:8080/res/css/dialog.css" />

</head>
<body>
	
<div id="append_parent"></div>
<div id="ajaxwaitid" style="display: none;">Loading...</div>	
	
	<div class="container reg_header"><a href="<?php echo get_config('site_url')?>"><img src="http://yyx.796dice.com:8080/res/images/logo.gif" /></a></div>
	
	<div class="container reg_body">
		<div class="container reg_left">
			<div class="list">
				<div class="msg">
					<p class="t">用户坐庄</p>
					<p class="c">任何注册用户都可自主发起竞猜成为庄家，并且获得全部大盘收益。</p>
				</div>
				
				<div class="msg">
					<p class="t">多类竞猜</p>
					<p class="c">足球、财经、彩票...等主流竞猜模式，通过预言星轻松勾选立刻发布。</p>
				</div>
				
				<div class="msg">
					<p class="t">自定义</p>
					<p class="c">您已超越了我们，竞猜内容您定，吃喝玩乐等...皆可成为赌注内容。</p>
				</div>
				
				<div class="msg">
					<p class="t">分享竞猜</p>
					<p class="c">将您的竞猜，或您参与的竞猜。通过微博、QQ等...方式快速分享给朋友。</p>
				</div>
				
				<div class="msg">
					<p class="t">收益兑换</p>
					<p class="c">用户参与竞猜、坐庄发起竞猜的收益，可通过平台即时兑换。</p>
				</div>																	
			</div>
			
			<div class="line"></div>
			
			<!-- 注册模块 -->
			<!--
			<div id="regModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="regModalLabel" aria-hidden="true">
				
				<form action="/member/register/register/" id="register_form" method="post">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 id="myModalLabel">会员注册</h4>
					</div>
					
					<div class="modal-body">
						
						<?php if(R::getConfig()->getConfig('invite_open')){ ?>
						<div class="control-group">
							<label for="yqcode">邀请码</label>
							<div class="controls">
								<input type="text" id="yqcode" name="yqcode" class="span2" value="<?php echo $request->getParameter(yqcode) ?>">
							</div>
						</div>
						<?php } ?>
						
						<div class="control-group">
							<label for="username">用户名</label>
							<div class="controls">
								<input type="text" id="name" name="name" class="span4">
								<span for="name" generated="true" class="error">注册后不能修改</span>
							</div>
						</div>
						
						<div class="control-group">
							<label for="email">邮箱</label>
							<div class="controls">
								<input type="text" id="email"  name="email" class="span4">
								<span for="email" generated="true" class="error">用来找回密码，注册后不能修改</span>
							</div>
						</div>
						
						<div class="row">
							<div class="control-group span2">
								<label for="password">密码</label>
								<div class="controls">
									<input type="password" id="password" name="password" class="span2">
								</div>
							</div>
							<div class="control-group span2">
								<label for="re_password">重复密码</label>
								<div class="controls">
									<input type="password" id="repassword" name="repassword" class="span2">
								</div>
							</div>
						</div>
						
						<div class="control-group">
							<label for="yzcode">验证码</label>
							<div class="controls">
								<input type="text" id="code" name="code" class="span2"><img src="/ajax/verify/image/" id="image" alt="点击重新获取" title="点击重新获取" onclick="showVerificationCode('image')">
							</div>
						</div>																		
						
					</div>
					
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary submit" value="注册" />
						<a href="#" class="login" data-dismiss="modal" aria-hidden="true">已有帐有，去登录</a>
					</div>
				</form>
			</div>
			
			<a href="#regModal" class="btn btn-primary regbtn" data-toggle="modal" role="button" />注册帐号</a>
			-->			
			<a onclick="ajaxmenu(event, this.id, 1)" id="user_register" class="btn btn-primary regbtn" href="/member/register/">注册帐号</a>
		</div>
		
		<div class="container reg_right">
			<form action="/member/login/login/" id="register_form" method="post">
			<div class="userdiv">
				<input type="text" class="username" name="account" placeholder="用户名或邮箱" value=""/>
				<div class="username_icon"></div>
			</div>
			
			<div class="passdiv">
				<input type="password" class="password" name="password" placeholder="密码" value="" />
				<div class="password_icon"></div>
				<span class="password_forget"><a href="/member/password/findAccount/">忘记密码</a></span>
			</div>						
			
			<label class="cookie"><input type="checkbox" class="cbox" name="keep" value="10"> 十天内免登录（请勿在公用电脑上勾选此项）</label>
			<input type="submit" class="btn loginbtn" value="登 录" />
			</form>
		</div>
		
		<div class="applogin">
			<div class="title">使用第三方帐号登录</div>
			<div class="app">
				<a href="/member/login/app/?id=1"><img src="http://yyx.796dice.com:8080/res/images/sina.gif" /></a> &nbsp;&nbsp;&nbsp;&nbsp;
				<a href="/member/login/app/?id=2"><img src="http://yyx.796dice.com:8080/res/images/qq.gif" /></a>
			</div>
		</div>
		
	</div>
	
	<div class="footer">
		<div class="footer_bottom">
			<div class="footer_bottom_body">
				 <span class="pull-right"><?php echo get_config('site_name')?></span>
				 <span><?php echo get_config('copyright')?></span>				
			</div>			
		</div>
	</div>
	
</body>
</html>
<script type="text/javascript">
var yqcode = <?php echo( isset($_GET['yqcode'])?$_GET['yqcode']:0) ?> ;
if(yqcode > 0)
{
	ajaxmenu('onclick', 'user_register', 1, 0, 'yqfun');
}

function yqfun()
{
	$('#yqcode').val(yqcode);
}

$(document).ready(function(){   
    
    /* 设置默认属性 */   
    $.validator.setDefaults({   
      submitHandler: function(form) {form.submit();  }   
    });
    
    // 中文字两个字节   
    jQuery.validator.addMethod("byteRangeLength", function(value, element, param) {   
      var length = value.length;   
      for(var i = 0; i < value.length; i++){   
       if(value.charCodeAt(i) > 127){   
        length++;   
       }   
      }   
      return this.optional(element) || ( length >= param[0] && length <= param[1] );   
    }, "请确保输入的值在3-15个字节之间(一个中文字算2个字节)");   
      
    // 字符验证   
    jQuery.validator.addMethod("userName", function(value, element) {   
      return this.optional(element) || /^[\u0391-\uFFE5\w]+$/.test(value);   
    }, "用户名只能包括中文字、英文字母、数字和下划线"); 
    
	//用户名
    jQuery.validator.addMethod("userNameEnable", function(value, element) {   
		var enable = false;
	 	$.ajax({
	 		url : '/ajax/user/nameCheck/',
	 		type : "POST",
	 		cache : false,
	 		data : {'name':value  },
	 		dataType : "json",
	 		async : false,
	 		success : function(result) {
	 		    enable = result.state?true:false;
	 		}
	 	    });
	 	return enable;
	    }, "用户名已被使用"); 
    //邮箱验证
    jQuery.validator.addMethod("emailEnable", function(value, element) {   
	var enable = false;
 	$.ajax({
 		url : '/ajax/user/emailCheck/',
 		type : "POST",
 		cache : false,
 		data : {'email':value  },
 		dataType : "json",
 		async : false,
 		success : function(result) {
 		    enable = result.state?true:false;
 		}
 	    });
 	return enable;
    }, "邮箱已被使用");  
    // 验证码验证   
    jQuery.validator.addMethod("isVerifyCode", function(value, element) {   
	var enable = false;
 	$.ajax({
 		url : '/ajax/verify/imageVerify/',
 		type : "POST",
 		cache : false,
 		data : {'code':value  },
 		dataType : "json",
 		async : false,
 		success : function(result) {
 		    enable = result.state?true:false;
 		}
 	    });
 	return enable;
    }, "验证码验证失败");   
      
    $('#register_form').validate({
    /* 设置验证规则 */   
      rules: {   
       name: {   
        required: true,   
        userName: true,   
        byteRangeLength: [3,15],
        userNameEnable: true
       },   
       password: {   
        required: true,   
        minlength: 6   
       },   
       repassword: {   
        required: true,   
        minlength: 6,   
        equalTo: "#password"   
       },   
       email: {   
	    required: true,
        email: true,
        emailEnable: true
       },   
       code: {   
	   	required:true,
	   	isVerifyCode: "验证码不正确"
       }   
      },   
    /* 设置错误信息 */   
      messages: {   
       name: {   
        required: "请填写用户名", 
        userName: "用户名只能包括中文字、英文字母、数字和下划线",
        byteRangeLength: "用户名必须在3-15个字符之间(一个中文字算2个字符)",
        userNameEnable:'用户名已被使用'
       },   
       password: {   
        required: "请填写密码",   
        minlength: "密码长度至少6位"   
       },   
       repassword: {
        required: "请填写确认密码",   
        equalTo: "两次密码输入不相同",
        minlength: "密码长度至少6位"
       },   
       email: {   
        required: "请填写您的邮箱",
        email: "邮箱格式不正确",
        emailEnable:'邮箱已被使用'
       },   
       code: {   
        required: "请输入验证码",   
        isVerifyCode: "验证码不正确"
       }   
      },   
    /* 错误信息的显示位置 */   
      errorPlacement: function(error, element) {   
       error.appendTo( element.parent() );   
      },   
    /* 验证通过时的处理 */   
      success: function(label) {   
       // set   as text for IE   
       label.html(" ").addClass("checked");   
      },   
    /* 获得焦点时不验证 */   
      onkeyup: false   
    });   
      
    // 输入框获得焦点时，样式设置   
    $('input').focus(function(){   
      if($(this).is(":text") || $(this).is(":password"))   
       $(this).addClass('focus');   
      if ($(this).hasClass('have_tooltip')) {   
       $(this).parent().parent().removeClass('field_normal').addClass('field_focus');   
      }   
    });   
      
    // 输入框失去焦点时，样式设置   
    $('input').blur(function() {   
      $(this).removeClass('focus');   
      if ($(this).hasClass('have_tooltip')) {   
       $(this).parent().parent().removeClass('field_focus').addClass('field_normal');   
      }   
    });   
    });   
</script>