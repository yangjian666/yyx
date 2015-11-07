<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title; ?></title>
<link rel="stylesheet" href="http://yyx.796dice.com:8080/res/css/admin/manage.css" />
<link rel="stylesheet" href="http://yyx.796dice.com:8080/res/css/admin/style.css" />
<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/jquery/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/tab.js"></script>
<script>
	var jq = jQuery;
</script>
</head>
<body class="<?php echo $background; ?>" id="body_div">
<div class="KK_ManageNav">
    <div class="KK_ManageNav_link left"><a href="<?php echo get_config('site_url')?>"><?php echo get_config('site_name')?>首页</a></div>
</div>

<div class="wrapper960">
	<div class="KK_ManageIndex_mainbox_inner" >
    	<div class="KK_ManageIndex_mainbox_inner">
        	<div class="Error_top"></div>
		    <div class="Error_box">
		        <div class="Error_jump">
		            <h2><?php echo $message; ?></h2>
		            <?php foreach($links as $link){ ?>
		            <p><a href="<?php echo $link[1]; ?>"><?php echo $link[0]; ?></a></p>
		            <?php } ?>
		        </div>
		    </div>
		    <div class="Error_bot"></div>
        </div>
    </div>	
</div>

<?php if($autoUrl){ ?>
<script type="text/javascript" language="javascript">
    var redirect = "<?php echo $autoUrl; ?>";
    var jump = <?php echo $jump; ?>;
    var waittime = <?php echo $time; ?>;
    jQuery("#jump_status").css({"float":"right", "margin-right":"20px" }).text("正在转跳...");
    setTimeout(function(){window.location.href = redirect }, waittime*1000);
</script>
<?php } ?>
</body>
</html>
