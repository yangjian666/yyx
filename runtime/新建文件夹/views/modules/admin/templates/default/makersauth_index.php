<?php include_once('E:\yyx\runtime/views\modules/admin\templates/default\header.php');?>

<div class="KK_ManageList_content">
	<?php include_once('E:\yyx\runtime/views\modules/admin\templates/default\menu.php');?>
    <div class="KK_ManageList_mainRt_side right">
    	<div class="KK_ManageList_mainbox_top"></div>
        <div class="KK_ManageList_mainbox">
        	<div class="KK_ManageList_mainbox_inner">
            	<div class="KK_ManageList_position">当前位置 &gt;&gt; 用户管理 &gt;&gt; 庄家认证</div>
            	<div class="seachbox">
		            <div class="content2">
		                <form action="<?php echo $index_url; ?>" name="searchForm" method="get">
		                <table class="form-table">
		                    <tbody>
		                        <tr>
		                            <td >
		                            选择认证状态:
		                            <select name="status" onchange="window.location.href='<?php echo $index_url; ?>?status='+this.value;">
		                            <option value="" <?php if(!$status){ ?>selected<?php } ?>>全部</option>
		                            <option value="0" <?php if($status == '0'){ ?>selected<?php } ?>>未处理</option>
		                            <option value="-1" <?php if($status == '-1'){ ?>selected<?php } ?>>已拒绝</option>
		                            <option value="1" <?php if($status == '1'){ ?>selected<?php } ?>>已通过</option>
		                            </select>
		                            </td>
		                        </tr>
		                    </tbody>
		                </table>
		                </form>
		            </div>
		        </div>
            	
                <h3>
	                <span class="right" style="margin-right: 15px;">
	                    
	                </span>
	            </h3>
	            
                    <!-- EasyPHP表格组件开始 -->
<table id="" class="list_table" cellpadding="0" cellspacing="0" border="0">
<thead><tr>
	<th  align='center' class="first"><a href="javascript:sortBy('id','<?php echo $nextsort;?>')" title='click_sort_title'>申请用户ID<?php if($order == 'id') echo "<img src='/res/images/{$sort}.gif' align='absmiddle'/>";?></a></th>
	<th  align='center' ><a href="javascript:sortBy('title','<?php echo $nextsort;?>')" title='click_sort_title'>申请标题<?php if($order == 'title') echo "<img src='/res/images/{$sort}.gif' align='absmiddle'/>";?></a></th>
	<th  align='center' ><a href="javascript:sortBy('summary','<?php echo $nextsort;?>')" title='click_sort_title'>申请语<?php if($order == 'summary') echo "<img src='/res/images/{$sort}.gif' align='absmiddle'/>";?></a></th>
	<th  align='left' ><a href="javascript:sortBy('create_time','<?php echo $nextsort;?>')" title='click_sort_title'>申请时间<?php if($order == 'create_time') echo "<img src='/res/images/{$sort}.gif' align='absmiddle'/>";?></a></th>
	<th  align='center' ><a href="javascript:sortBy('status','<?php echo $nextsort;?>')" title='click_sort_title'>当前状态<?php if($order == 'status') echo "<img src='/res/images/{$sort}.gif' align='absmiddle'/>";?></a></th>
	<th>操作</th>
</tr></thead>
<tbody>
<?php
foreach($items as $key=>$item){
?>
	<tr>
			<td align='center' class='first'><span><?php echo $item[id] ; ?></span></td>
			<td align='center' ><span><?php echo $item[title] ; ?></span></td>
			<td align='center' ><span><?php echo $item[summary] ; ?></span></td>
			<td align='left' ><span><?php echo date('Y-m-d H:i:s', "$item[create_time]") ; ?></span></td>
			<td align='center' ><span><?php echo $item[status] ; ?></span></td>
			<td align='center'><a    href='<?php echo $site_url ; ?>/admin/makersAuth/allow/?&id=<?php echo $item[id] ; ?>'>通过</a>&nbsp;&nbsp;<a    href='<?php echo $site_url ; ?>/admin/makersAuth/refuse/?&id=<?php echo $item[id] ; ?>'>拒绝</a>&nbsp;&nbsp;<a    href='<?php echo $site_url ; ?>/member/space/index/?&id=<?php echo $item[id] ; ?>'>查看用户</a>&nbsp;&nbsp;<a  href='<?php echo $act_url ; ?>del/?id=<?php echo $item[id] ; ?>' onclick='return opConfirm();'>删除</a>&nbsp;&nbsp;</td>
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

<?php include_once('E:\yyx\runtime/views\modules/admin\templates/default\footer.php');?>