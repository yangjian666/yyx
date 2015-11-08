<?php include_once('D:\phpStudy\yyx-master\runtime/views\modules/admin\templates/default\header.php');?>
<script type="text/javascript" src="http://www.yyx-test.com//res/js/jquery/jquery.selectAll.js"></script>

<div class="KK_ManageList_content">
	<?php include_once('D:\phpStudy\yyx-master\runtime/views\modules/admin\templates/default\menu.php');?>
    <div class="KK_ManageList_mainRt_side right">
    	<div class="KK_ManageList_mainbox_top"></div>
        <div class="KK_ManageList_mainbox">
        	<div class="KK_ManageList_mainbox_inner">
            	<div class="KK_ManageList_position">当前位置 &gt;&gt; 竞猜管理 &gt;&gt; 竞猜分类</div>
                <h3>
	                <span class="right" style="margin-right: 15px;">
	                    <a href="<?php echo $act_url; ?>add/" style="float: right;">添加</a>
	                </span>
	            </h3>
                <form action="<?php echo $act_url; ?>batch/" method="post">
                    <table id="" class="list_table" cellpadding="0" cellspacing="0" border="0">
					<thead>
					<tr>
						<th align="left">分类名称</th>
						<th align="left">启用状态</th>
						<th align="left">竞猜点参数个数</th>
						<th align="left">固定赔率状态</th>
						<th align="left">浮动赔率状态</th>
						<th align="left">排序</th>
						<th align="left" width="180px">操作</th>
					</tr>
					</thead>
					<tbody>
						<?php foreach($list as $item){ ?>
						<tr>
								<td align="left">
								<?php echo $item['name']; ?>
								</td>
								<td align="left">
								<?php if($item['status']){ ?>
								启用
								<?php }else{ ?>
								不启用
								<?php } ?>
								</td>
								<td align="left">
								<?php echo $item['parameter_count']; ?>
								</td>
								<td align="left">
								<?php if($item['fixed_odds']){ ?>
								启用
								<?php }else{ ?>
								不启用
								<?php } ?>
								</td>
								<td align="left">
								<?php if($item['float_odds']){ ?>
								启用
								<?php }else{ ?>
								不启用
								<?php } ?>
								</td>
								<td align="left"><?php echo $item['sort_num']; ?></td>
								<td align="left">
									<?php if(!$item['parent_id']){ ?>
									<a href="<?php echo url("/$currentModule/$currentAction/playWay/?id=$item[id]") ?>">玩法编辑</a>
									<?php } ?>
									<a href="<?php echo url("/$currentModule/$currentAction/edit/?id=$item[id]") ?>">编辑</a>
									<a href="<?php echo url("/$currentModule/$currentAction/del/?id=$item[id]") ?>" onclick="return opConfirm();">删除</a>
								</td>
						</tr>
						<?php } ?>
					</tbody>
					</table>
                </form>
            </div>
        </div>
        <div class="KK_ManageList_mainbox_bot"></div>
    </div>
    <div class="clear"></div>
</div>

<script type="text/javascript" language="javascript">
function showNewMenu(show){
    show ? jq("#move_menus").show() : jq("#move_menus").hide();
}
jq("#move_menus").hide();
jq().ready(function(){
    jq.selectAll({"allRel":"all_sel"  });
});
</script>

<?php include_once('D:\phpStudy\yyx-master\runtime/views\modules/admin\templates/default\footer.php');?>
