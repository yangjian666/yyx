<?php include_once('D:\phpStudy\yyx-master\runtime/views\modules/admin\templates/default\header.php');?>

<div class="KK_ManageList_content">
	<?php include_once('D:\phpStudy\yyx-master\runtime/views\modules/admin\templates/default\menu.php');?>
    <div class="KK_ManageList_mainRt_side right">
    	<div class="KK_ManageList_mainbox_top"></div>
        <div class="KK_ManageList_mainbox">
        	<div class="KK_ManageList_mainbox_inner">
            	<div class="KK_ManageList_position">当前位置 &gt;&gt; 竞猜管理 &gt;&gt; 自定义类型</div>
                <h3>
	                <span class="right" style="margin-right: 15px;">
	                    <a href="<?php echo $act_url; ?>add/" style="float: right;">添加</a>
	                </span>
	            </h3>
	            
                    <!-- EasyPHP表格组件开始 -->
<table id="" class="list_table" cellpadding="0" cellspacing="0" border="0">
<thead><tr>
	<th  align='center' class="first"><a href="javascript:sortBy('id','<?php echo $nextsort;?>')" title='click_sort_title'>ID<?php if($order == 'id') echo "<img src='/res/images/{$sort}.gif' align='absmiddle'/>";?></a></th>
	<th  align='center' ><a href="javascript:sortBy('name','<?php echo $nextsort;?>')" title='click_sort_title'>类型<?php if($order == 'name') echo "<img src='/res/images/{$sort}.gif' align='absmiddle'/>";?></a></th>
	<th  align='center' ><a href="javascript:sortBy('sort_num','<?php echo $nextsort;?>')" title='click_sort_title'>排序<?php if($order == 'sort_num') echo "<img src='/res/images/{$sort}.gif' align='absmiddle'/>";?></a></th>
	<th width='100px'>操作</th>
</tr></thead>
<tbody>
<?php
foreach($items as $key=>$item){
?>
	<tr>
			<td align='center' class='first'><span><?php echo $item[id] ; ?></span></td>
			<td align='center' ><span class='pointer' onclick=textEdit(this,'<?php echo $item[id] ; ?>','name')><?php echo $item[name] ; ?></span></td>
			<td align='center' ><span class='pointer' onclick=textEdit(this,'<?php echo $item[id] ; ?>','sort_num')><?php echo $item[sort_num] ; ?></span></td>
			<td align='center'><a  href='<?php echo $act_url ; ?>edit/?id=<?php echo $item[id] ; ?>'>修改</a>&nbsp;&nbsp;<a  href='<?php echo $act_url ; ?>del/?id=<?php echo $item[id] ; ?>' onclick='return opConfirm();'>删除</a>&nbsp;&nbsp;</td>
	</tr>
<?php
}
?>
</tbody></table>
<!-- EasyPHP表格组件结束 -->

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

<?php include_once('D:\phpStudy\yyx-master\runtime/views\modules/admin\templates/default\footer.php');?>