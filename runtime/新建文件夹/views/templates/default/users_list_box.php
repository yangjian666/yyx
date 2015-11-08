<div class="content">
	<?php if($userList){ ?>
	<?php foreach($userList as $item){ ?>
	<div class="useritem">
		<img src="<?php echo $item['avatar']; ?>" />
		<a href="<?php echo url("/member/space/?uid=$item[id]") ?>"><?php echo $item['name']; ?></a>
		<ul>
			<li class="a">竞猜<span><?php echo $item['guess_count']; ?></span>场&nbsp;胜率<span><?php echo $item['accuracy']; ?>%</span></li>
			<li class="b">
			<?php if(!$item['province'] && !$item['city']){ ?>
			<span>地址不详</span>
			<?php }else{ ?>
			<span><?php echo $item['province']; ?><?php echo $item['city']; ?></span>
			<?php } ?>
			</li>
		</ul>
	</div>
	<?php } ?>
	<?php }else{ ?>
	<div>暂无信息</div>
	<?php } ?>
</div>