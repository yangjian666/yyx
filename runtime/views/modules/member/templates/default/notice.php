<?php include_once('D:\phpStudy\yyx-master\runtime/views\./templates/default\header.php');?>
	<div class="notice_body">
		<div class="caption">
			<div class="r">
				<a href="/member/setting/notice/" class="set">通知设置</a>
				<a href="/member/notice/ignore/" class="btn read" data-toggle="modal" role="button">全部已读</a>
			</div>
			通知
		</div>
		<?php if($items){ ?>
		<?php foreach($items as $item){ ?>
		<div class="notice_list">
			<div class="notice_item">
				<?php echo $item['notice']; ?> <span>(<?php echo date('Y-m-d H:i:s', $item['create_time'])?>)</span>
				
				<?php if($item['new'] && $item['status'] == 0){ ?>
					<a style="float:right" href="/member/notice/read/?id=<?php echo $item[id]; ?>" class="btn" id="notice_read_<?php echo $item['id']; ?>" onclick="return ajaxmenu(event, this.id, 1, 2000, 'ajaxMenuDeleteV2')">已读</a>
				<?php } ?>
				
				<?php if($item['status'] == 1){ ?>
					<span style="float: right;" id="applyspan_<?php echo $item[id]; ?>">
						<a style="float:right;" href="/member/notice/friend/?id=<?php echo $item[id]; ?>&oper=0" class="btn" id="notice_read_<?php echo $item['id']; ?>_0" onclick="return ajaxmenu(event, this.id, 1, 2000, 'afterApplyFriend(0,<?php echo $item[id]; ?>)')">拒绝</a>
						<a style="float:right; margin-right: 5px;" href="/member/notice/friend/?id=<?php echo $item[id]; ?>&oper=1" class="btn" id="notice_read_<?php echo $item['id']; ?>_1" onclick="return ajaxmenu(event, this.id, 1, 2000, 'afterApplyFriend(1,<?php echo $item[id]; ?>)')">通过</a>
					</span>
				<?php }elseif($item['status'] == 2){ ?>
					<span style="float: right; margin-right: 5px; color: green; font-size: 14px;">已通过</span>
				<?php }elseif($item['status'] == 3){ ?>					
					<span style="float: right; margin-right: 5px; color: #ff6600; font-size: 14px;">已拒绝</span>
				<?php } ?>		
			</div>
		</div>
		<?php } ?>
		<div class="clear"></div>
		<?php echo $pages; ?>
		<?php }else{ ?>
		<p>暂无通知</p>
		<?php } ?>
	</div>
<?php include_once('D:\phpStudy\yyx-master\runtime/views\./templates/default\footer.php');?>