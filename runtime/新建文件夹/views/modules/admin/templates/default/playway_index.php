<?php include_once('E:\yyx\runtime/views\modules/admin\templates/default\header.php');?>

<div class="KK_ManageList_content">
	<?php include_once('E:\yyx\runtime/views\modules/admin\templates/default\menu.php');?>
    <div class="KK_ManageList_mainRt_side right">
    	<div class="KK_ManageList_mainbox_top"></div>
        <div class="KK_ManageList_mainbox">
        	<div class="KK_ManageList_mainbox_inner">
            	<div class="KK_ManageList_position">当前位置 &gt;&gt; 竞猜管理 &gt;&gt; 玩法</div>
            	
                <h3>
	                <span class="right" style="margin-right: 15px;">
	                    <a href="<?php echo $act_url; ?>add/" style="float: right;">添加</a>
	                </span>
	            </h3>
	            
                    <table id="" class="list_table" cellpadding="0" cellspacing="0" border="0">
					<thead>
					<tr>
						<th align="left">玩法名称</th>
						<th align="left">玩法类名</th>
						<th align="left">玩法简介</th>
						<th align="left">状态</th>
						<th align="left" width="100px">操作</th>
					</tr>
					</thead>
					<tbody>
						<?php foreach($items as $item){ ?>
						<tr>
								<td align="left"><?php echo $item['name']; ?></td>
								<td align="left"><?php echo $item['class']; ?></td>
								<td align="left"><?php echo $item['summary']; ?></td>
								<td align="left"><?php if($item['status']){ ?>启用<?php }else{ ?>禁用<?php } ?></td>
								<td align="left">
									<a href="<?php echo url("/$currentModule/$currentAction/edit/?id=$item[id]") ?>">编辑</a>
									<?php if(!$item['status']){ ?>
									<a href="<?php echo url("/$currentModule/$currentAction/del/?id=$item[id]") ?>" onclick="return opConfirm();">删除</a>
									<a href="<?php echo url("/$currentModule/$currentAction/enable/?id=$item[id]") ?>" onclick="return opConfirm('启用后不能删除，你确认吗？');">启用</a>
									<?php } ?>
								</td>
						</tr>
						<?php } ?>
					</tbody>
					</table>
				<?php if($pages){ ?>
				 <div class="page">
					<?php echo $pages; ?>
				　</div>
				 <?php } ?>
            </div>
        </div>
        <div class="KK_ManageList_mainbox_bot"></div>
    </div>
    <div class="clear"></div>
</div>

<?php include_once('E:\yyx\runtime/views\modules/admin\templates/default\footer.php');?>