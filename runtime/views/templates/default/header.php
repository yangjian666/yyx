<?php global $_USERS ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta property="wb:webmaster" content="36ab9fddd34b4020" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php echo $seo['title']; ?></title>
    <meta name="description" content="<?php echo $seo['description']; ?>" />
    <meta name="keywords" content="<?php echo $seo['keywords']; ?>" />
    <link rel="stylesheet" href="http://www.yyx-test.com//res/css/bootstrap.min.css" />
    <!--<script type="text/javascript" src="http://www.yyx-test.com//res/js/bootstrap.min.js"></script>-->
    <script type="text/javascript" src="http://www.yyx-test.com//res/js/jquery/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="http://www.yyx-test.com//res/js/bootstrap-modal.js"></script>
    <script type="text/javascript" src="http://www.yyx-test.com//res/js/bootstrap-tab.js"></script>
    <script type="text/javascript" src="http://www.yyx-test.com//res/js/bootstrap-dropdown.js"></script>

    <script type="text/javascript" src="http://www.yyx-test.com//res/js/global.js"></script>
    <script type="text/javascript" src="http://www.yyx-test.com//res/js/string.extends.js"></script>
    <script type="text/javascript" src="http://www.yyx-test.com//res/js/functions.js"></script>
    <script type="text/javascript" src="http://www.yyx-test.com//res/js/uc_common.js"></script>
    <script type="text/javascript" src="http://www.yyx-test.com//res/js/uc_menu.js"></script>
    <script type="text/javascript" src="http://www.yyx-test.com//res/js/uc_ajax.js"></script>
    <link rel="stylesheet" href="http://www.yyx-test.com//res/css/style.css" />
    <link rel="stylesheet" href="http://www.yyx-test.com//res/css/dialog.css" />


</head>
<body>
<div id="append_parent"></div>
<div id="ajaxwaitid" style="display: none;">Loading...</div>
<div class="yyxnav">
    <div class="topnav">
        <div class="navbody">
            <div class="leftcontent">
                <a href="/guess/add/" class="postzz">我要坐庄</a>
            </div>

            <div class="rightcontent">
                <ul style="padding: 0px; margin:0px;">
                    <li><a href="/member/notice/" class="position_r">系统通知 <span class="numbg"><?php echo $user->getNewNoticeCount(); ?></span></a></li>
                    <!-- <li><a href="/guess/add/">我要坐庄</a></li> -->
                    <li class="msg"><a href="/member/message/" class="position_r">站内信 <span class="numbg" style="left:90px"><?php echo $user->getNewMessageCount(); ?></span></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle a" data-toggle="dropdown">个人中心</a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                            <li><a href="/member/setting/">用户设置</a></li>
                            <li><a href="<?php echo url("/member/space/?uid={$user->getId()}") ?>">个人主页</a></li>
                            <li><a href="/member/money/?wealth_type=1">我的金币</a></li>
                            <li><a href="/member/money/?wealth_type=4">我的比特币</a></li>
                            <li><a href="/member/money/?wealth_type=3">我的莱特币</a></li>
                            <li><a href="/member/money/?wealth_type=5">我的狗币</a></li>
                            <li><a href="/member/integral/">我的积分</a></li>
                            <?php if(!$user->getMakersLevel()){ ?>
                            <li><a href="/member/auth/">庄家认证</a></li>
                            <?php } ?>
                            <li class="divider"></li>
                            <li><a href="/member/logout">退出</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- <a href="/member/logout" class="exit">退出</a>-->
            </div>
        </div>
    </div>
</div>

<div class="logoarea">
    <div class="logo"><a href="<?php echo get_config('site_url')?>"><img src="/res/images/logo.gif" /></a></div>
    <div class="userinfo">
        <div class="l1">您好，<?php echo $user->getName(); ?></div>
        <div class="l2">
            <span class="cap1">金币</span>
            <span class="num"><?php echo $user->getAvailableMoney(); ?></span>

            <span class="cap2">积分</span>
            <span class="num"><?php echo $user->getAvailableIntegral(); ?></span>
        </div>
        <div class="face"><a href="<?php echo url("/member/space/?uid={$user->getId()}") ?>"><img src="<?php echo $user->getAvatar(); ?>" class="img-rounded" /></a></div>
    </div>
</div>

<div class="menu">
    <ul>
        <li><a href="/" <?php if($currentModule=='common'){ ?>class="sel"<?php } ?>>首 页</a></li>
        <li><a href="/guess/list/" <?php if($currentModule=='guess'){ ?>class="sel"<?php } ?>>竞 猜</a></li>
        <li><a href="/member/list/"<?php if($currentModule=='member'){ ?>class="sel"<?php } ?>>用 户</a></li>
        <li><a href="/goods/list/" <?php if($currentModule=='goods'){ ?>class="sel"<?php } ?>>兑 换</a></li>
        <li><a href="/news/list/" <?php if($currentModule=='news'){ ?>class="sel"<?php } ?>>说 明</a></li>
    </ul>

    <div class="search">
        <form action="<?php if($currentModule=='member'){ ?>/member/list/<?php }else{ ?>/guess/list/<?php } ?>" method="GET" id="search_form">
            <input class="search_input" type="text" placeholder="<?php if($currentModule=='member'){ ?>搜用户…<?php }else{ ?>搜竞猜…<?php } ?>" name="keyword"/>
            <a href="javascript:document.getElementById('search_form').submit();" class="search_btn"><img src="/res/images/search_btn.gif" /></a>
        </form>
    </div>
</div>