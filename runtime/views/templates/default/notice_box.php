<?php if(!$hidePlacard){ ?>
<script type="text/javascript" src="http://www.yyx-test.com//res/js/jquery/jquery.cookie.js"></script>
<div class="notice" id="notice">
	<a class="close" data-dismiss="alert" href="javascript:;" onclick="closePlacard();">&times;</a>
	<div class="notice_title">预言星公告</div>
	<div class="notice_content"><?php echo get_config('placard')?></div>
</div>
<?php } ?>