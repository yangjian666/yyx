<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title; ?></title>
<link rel="stylesheet" href="http://yyx.796dice.com:8080/res/css/admin/manage.css" />
<link rel="stylesheet" href="http://yyx.796dice.com:8080/res/css/admin/style.css" />
<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/jquery/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/jquery/jquery.cookie.js"></script>
<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/global.js"></script>
<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/functions.js"></script>
<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/admin/dataList.js"></script>
<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/tab.js"></script>
<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/My97DatePicker/WdatePicker.js"></script>
<?php echo $validateJs; ?>
<script>
	var jq = jQuery;
</script>
<script type="text/javascript">
<!--
//指定当前组模块URL地址
var URL = '/$currentModule}/<?php echo $currentAction; ?>/<?php echo $currentMethod; ?>';
var ROOT_PATH = '';
var APP = '/<?php echo $currentModule; ?>/';
var STATIC = '/res/images/admin/';
var VAR_ACTION = 'act';
var VAR_METHOD = 'met';
var CURR_MODULE = '<?php echo $currentModule; ?>';
var CURR_ACTION = '<?php echo $currentAction; ?>';
var CURR_METHOD = '<?php echo $currentMethod; ?>';
var FILED_EDIT_METHOD = 'field';

//定义JS中使用的语言变量
var CONFIRM_DELETE = '你确定要删除选择项吗？';
var AJAX_LOADING = '提交请求中，请稍候...';
var AJAX_ERROR = 'AJAX请求发生错误！';
var ALREADY_REMOVE = '已删除';
var SEARCH_LOADING = '搜索中...';
var CLICK_EDIT_CONTENT = '点击修改内容';
//-->
</script>
</head>
<body class="<?php echo $background; ?>" id="body_div">

<div class="KK_ManageBgChange_box">
	<ul class="KK_ManageBgChange_list">
    	<li class="ico_1" jqval="1"></li>
        <li class="ico_2" jqval="2"></li>
        <li class="ico_3" jqval="3"></li>
        <li class="ico_4" jqval="4"></li>
        <li class="ico_5" jqval="5"></li>
        <li class="ico_6" jqval="6"></li>
        <li class="ico_7" jqval="7"></li>
        <li class="ico_8" jqval="8"></li>
    </ul>  
</div><!-- /header -->

<div class="KK_ManageNav">
    <div class="KK_ManageNav_link left">
    	<a href="<?php echo get_config('site_url')?>">预言星首页</a>
    </div>
    <?php if($manager){ ?>
    <div class="KK_ManageSear right">
            <span class="s2">您好，<?php echo $manager[name]; ?><a href="/admin/logout/">[退出]</a><a href="/admin/password/">[修改密码]</a></span>
            <span class="s1">
                <a href="/admin/index/"><img src="http://yyx.796dice.com:8080/res/images/admin/btn1.gif" style="padding-right:0px;" /></a>
                &nbsp;&nbsp;
            </span>
        </div>
    <?php } ?>
</div>
<?php if($currentAction !='login' && $currentAction != 'index'){ ?>
<div class="KK_ManageTop">
	<div class="wrapper960">
    	<div class="KK_ManageMenu left">
        	<ul class="u1">
                <li class="ico_2"><a href="/admin/guess/" >竞猜管理</a></li>
                <li class="ico_3"><a href="/admin/user/" >用户管理</a></li>
                <li class="ico_5"><a href="/admin/exchange/" >商城管理</a></li>
                <li class="ico_3"><a href="/admin/manager/">管理员管理</a></li>
                <li class="ico_5"><a href="/admin/news/">文章管理</a></li>
                <li class="ico_1"><a href="/admin/config/">系统管理</a></li>
            </ul>
        </div>
    </div>
</div>
<?php } ?>

<div class="KK_Manage_loginTips" style="display:none;">
	<b class="close" jqid="KK_Manage_loginTips_close">关闭</b>
    <div class="KK_Manage_loginTips_txt"></div>
</div>

<div class="KK_loading">
    <div class="inner">
        <div>
            <div class="ajax-loader"></div>
            <p>Loading<span>...</span></p>
        </div>
    </div>
</div>

<script type="text/javascript">
<!--
var time_id;
jq(document).ready(function(){
	jq(".KK_ManageBgChange_list").find("li").click(function(){
		jq("#body_div").attr("class","body_KK_Manage"+jq(this).attr("jqval"));
		jq.get("/common/index/changeBackground/",{"css_name":"body_KK_Manage"+jq(this).attr("jqval")  },function(a){  },'json');
	});
	jq("[jqid='KK_Manage_loginTips_close']").click(function(){
		jq(".KK_Manage_loginTips").slideUp("slow");		
	});
	jq(".KK_Manage_loginTips").hover(function(){
		jq(this).animate({opacity:1  },"slow");
	},function(){
		jq(this).animate({opacity:0.9  },"slow");
	});
	
	jq(".KK_loading").hide();
	showMessage();
});
//-->
</script>