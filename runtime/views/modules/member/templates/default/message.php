<?php include_once('E:\yyx\runtime/views\./templates/default\header.php');?>
	<div class="msg_body">
		
		<div class="caption">
			<div class="r">
				<!--<a href="#" class="set">私信设置</a>-->
				<a href="/member/message/send/" class="btn btn-primary sendmsg" id="message_send" onclick="ajaxmenu(event, this.id, 1)">发私信</a>
			</div>
			私信
		</div>

		<div class="msg_list">
			<?php if($items){ ?>
			<?php foreach($items as $item){ ?>
			<div class="msg_item" id="item_message_<?php echo $item['id']; ?>">
				<?php if($item['from_uid']){ ?>
				<p class="f"><a href="<?php echo url("/member/space/?uid=$item[from_uid]") ?>">
					<?php if(!empty($_USERS[$item['from_uid']]['avatar'])){ ?>
					<img src="<?php echo $_USERS[$item['from_uid']]['avatar']; ?>" />
					<?php }else{ ?>
					<img src="/res/images/avatar.gif" />
					<?php } ?>
				</a></p>
				<p class="n"><a href="<?php echo url("/member/space/?uid=$item[from_uid]") ?>"><?php echo $_USERS[$item['from_uid']]['name']; ?></a></p>
				<p class="c"><?php echo $item['content']; ?></p>
				<p class="t"><?php echo date('Y-m-d H:i:s', $item['create_time'])?></p>
				<p class="d">
					<?php if($item['new']){ ?>
					<a href="/member/message/read/?id=<?php echo $item[id]; ?>" class="btn" id="message_read_<?php echo $item['id']; ?>" onclick="return ajaxmenu(event, this.id, 1, 2000, 'ajaxMenuDeleteV2')">已读</a>
					<?php } ?>
					<?php if($item['from_uid']){ ?>
					<a href="/member/message/reply/?id=<?php echo $item[id]; ?>" class="btn" id="message_reply_<?php echo $item['id']; ?>" onclick="ajaxmenu(event, this.id, 1)">回复</a>
					<?php } ?>
					<a href="/member/message/delete/?id=<?php echo $item[id]; ?>" class="btn" id="message_<?php echo $item['id']; ?>" onclick="return comfirmAjaxMenu(event, this.id, 1, 2000, 'ajaxMenuDelete')">删除</a>
				</p>
				<?php }else{ ?>
				<p class="f"><img src="<?php echo User::AVATAR_SYSTEM ?>" /></p>
				<p class="n"><a href="javascript:;"><?php echo get_config('site_name')?></a></p>
				<p class="c"><?php echo $item['content']; ?></p>
				<p class="t"><?php echo date('Y-m-d H:i:s', $item['create_time'])?></p>
				<p class="d">
					<?php if($item['new']){ ?>
					<a href="/member/message/read/?id=<?php echo $item[id]; ?>" class="btn" id="message_read_<?php echo $item['id']; ?>" onclick="return ajaxmenu(event, this.id, 1, 2000, 'ajaxMenuDeleteV2')">已读</a>
					<?php } ?>
					<?php if($item['from_uid']){ ?>
					<a href="/member/message/reply/?id=<?php echo $item[id]; ?>" class="btn" id="message_reply_<?php echo $item['id']; ?>" onclick="ajaxmenu(event, this.id, 1)">回复</a>
					<?php } ?>
					<a href="/member/message/delete/?id=<?php echo $item[id]; ?>" class="btn" id="message_<?php echo $item['id']; ?>" onclick="return comfirmAjaxMenu(event, this.id, 1, 2000, 'ajaxMenuDelete')">删除</a>
				</p>
				<?php } ?>
			</div>
			<?php } ?>
			<?php echo $pages; ?>
			<?php }else{ ?>
			<p>暂无私信</p>
			<?php } ?>
		</div>
				
	</div>
<?php include_once('E:\yyx\runtime/views\./templates/default\footer.php');?>