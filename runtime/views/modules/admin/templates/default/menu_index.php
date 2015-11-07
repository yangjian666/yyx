<?php include_once('E:\yyx\runtime/views\modules/admin\templates/default\header.php');?>
<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/jquery/jquery.selectAll.js"></script>

<div class="KK_ManageList_content">
	<?php include_once('E:\yyx\runtime/views\modules/admin\templates/default\menu.php');?>
    <div class="KK_ManageList_mainRt_side right">
    	<div class="KK_ManageList_mainbox_top"></div>
        <div class="KK_ManageList_mainbox">
        	<div class="KK_ManageList_mainbox_inner">
            	<div class="KK_ManageList_position">当前位置 &gt;&gt; 系统管理 &gt;&gt; 系统菜单</div>
                <h3>
	                <span class="right" style="margin-right: 15px;">
	                    <a href="<?php echo $act_url; ?>add/" style="float: right;">添加</a>
	                </span>
	            </h3>
                <form action="<?php echo $act_url; ?>batch/" method="post">
                    <!-- EasyPHP表格组件开始 -->
<table id="admin_menu_table" class="list_table" cellpadding="0" cellspacing="0" border="0">
<thead><tr>
	<th  align='center' class="first">ID</th>
	<th  align='center' >菜单名称</th>
	<th  align='center' >是否显示</th>
	<th  align='left' >排序</th>
	<th width='100px'>操作</th>
</tr></thead>
<tbody>
<?php
foreach($list as $key=>$item){
?>
	<tr>
			<td align='center' class='first'><span><?php echo $item[id] ; ?></span></td>
			<td align='center' ><span><?php echo $item[name] ; ?></span></td>
			<td align='center' ><span class='pointer' onclick=toggleStatus(this,'<?php echo $item[id] ; ?>','status')><img src='/res/images/admin/status-<?php echo $item[status] ; ?>.gif' status='<?php echo $item[status] ; ?>'></span></td>
			<td align='left' ><span><?php echo $item[sort_num] ; ?></span></td>
			<td align='center'><a  href='<?php echo $act_url ; ?>edit/?id=<?php echo $item[id] ; ?>'>修改</a>&nbsp;&nbsp;<a  href='<?php echo $act_url ; ?>del/?id=<?php echo $item[id] ; ?>' onclick='return opConfirm();'>删除</a>&nbsp;&nbsp;</td>
	</tr>
<?php
}
?>
</tbody></table>
<!-- EasyPHP表格组件结束 -->

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

<?php include_once('E:\yyx\runtime/views\modules/admin\templates/default\footer.php');?>
