<?php include_once('E:\yyx\runtime/views\./templates/default\message_header.php');?>
<div class="container reg_body">
		<div class="container" style="background-color: white; padding: 50px 0px; width: 925px; text-align: center; font-size: 14px;">
			<?php echo $message; ?>
			
			<?php if($autoUrl){ ?>
			<br /><br /><span style="font-size: 12px; color: #666;"><?php echo $time; ?>秒后跳转... 请稍候!</span>
			<?php } ?>
			
            <?php foreach($links as $link){ ?>
            <p><a href="<?php echo $link[1]; ?>"><?php echo $link[0]; ?></a></p>
            <?php } ?>
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
<?php include_once('E:\yyx\runtime/views\./templates/default\message_footer.php');?>