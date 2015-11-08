<ul>
	<li><a href="/news/list/">全部</a></li>
	<?php foreach($categorys as $category){ ?>
	<li><a href="<?php echo url("/news/list/?cate={$category['id']}") ?>"><?php echo $category['name']; ?></a></li>
	<?php } ?>
</ul>