<?php include_once('E:\yyx\runtime/views\./templates/default\header.php');?>
	<div class="article_body">
        
		<div class="left">
			<div class="alink">当前位置：<a href="/">首页</a> > 说明</div>
			<ul>
				<?php if($items){ ?>
				<?php foreach($items as $item){ ?>
				<li><a href="<?php echo url("/news/view/?id={$item[id]}") ?>"><?php echo $item['title']; ?></a> <span><?php echo date('Y-m-d', $item['create_time'])?></span></li>
				<?php } ?>
				<?php }else{ ?>
				<li>暂无说明</li>
				<?php } ?>
			</ul>
			
		</div>
		
		<div class="right">
			<?php include_once('E:\yyx\runtime/views\modules/news\templates/default\categorys.php');?>
		</div>
		
		<div class="clear"></div>
				
	</div>
<?php include_once('E:\yyx\runtime/views\./templates/default\footer.php');?>