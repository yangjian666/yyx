<?php include_once('E:\yyx\runtime/views\modules/admin\templates/default\header.php');?>

<div class="KK_ManageList_content">
	<?php include_once('E:\yyx\runtime/views\modules/admin\templates/default\menu.php');?>
    <div class="KK_ManageList_mainRt_side right">
    	<div class="KK_ManageList_mainbox_top"></div>
        <div class="KK_ManageList_mainbox">
        	<div class="KK_ManageList_mainbox_inner">
            	<div class="KK_ManageList_position">当前位置 &gt;&gt; 资讯管理 &gt;&gt; 资讯</div>
            	<div class="seachbox">
		            <div class="content2">
		                <form action="<?php echo $index_url; ?>" name="searchForm" method="get">
		                <table class="form-table">
		                    <tbody>
		                        <tr>
		                            <td >
		                            选择分类:
		                            <select name="type" onchange="window.location.href='<?php echo $index_url; ?>?cate='+this.value;">
		                            <?php foreach($categorys as $category){ ?>
		                            <option value="<?php echo $category['id']; ?>" <?php if($category['id'] == $cate){ ?>selected<?php } ?>><?php echo $category['name']; ?></option>
		                            <?php } ?>
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
	                    <a href="<?php echo $act_url; ?>add/?type=<?php echo $type; ?>" style="float: right;">添加</a>
	                </span>
	            </h3>
	            
                    <!-- EasyPHP表格组件开始 -->
<table id="" class="list_table" cellpadding="0" cellspacing="0" border="0">
<thead><tr>
	<th  align='center' class="first"><a href="javascript:sortBy('title','<?php echo $nextsort;?>')" title='click_sort_title'>标题<?php if($order == 'title') echo "<img src='/res/images/{$sort}.gif' align='absmiddle'/>";?></a></th>
	<th  align='center' ><a href="javascript:sortBy('cate_id','<?php echo $nextsort;?>')" title='click_sort_title'>分类<?php if($order == 'cate_id') echo "<img src='/res/images/{$sort}.gif' align='absmiddle'/>";?></a></th>
	<th  align='center' ><a href="javascript:sortBy('views','<?php echo $nextsort;?>')" title='click_sort_title'>浏览数<?php if($order == 'views') echo "<img src='/res/images/{$sort}.gif' align='absmiddle'/>";?></a></th>
	<th  align='center' ><a href="javascript:sortBy('sort_num','<?php echo $nextsort;?>')" title='click_sort_title'>排序<?php if($order == 'sort_num') echo "<img src='/res/images/{$sort}.gif' align='absmiddle'/>";?></a></th>
	<th  align='left' ><a href="javascript:sortBy('create_time','<?php echo $nextsort;?>')" title='click_sort_title'>创建时间<?php if($order == 'create_time') echo "<img src='/res/images/{$sort}.gif' align='absmiddle'/>";?></a></th>
	<th width='150px'>操作</th>
</tr></thead>
<tbody>
<?php
foreach($items as $key=>$item){
?>
	<tr>
			<td align='center' class='first'><span class='pointer' onclick=textEdit(this,'<?php echo $item[id] ; ?>','title')><?php echo $item[title] ; ?></span></td>
			<td align='center' ><?php echo $categorys[$item[cate_id]][name] ; ?></td>
			<td align='center' ><span class='pointer' onclick=textEdit(this,'<?php echo $item[id] ; ?>','views')><?php echo $item[views] ; ?></span></td>
			<td align='center' ><span class='pointer' onclick=textEdit(this,'<?php echo $item[id] ; ?>','sort_num')><?php echo $item[sort_num] ; ?></span></td>
			<td align='left' ><span><?php echo date('Y-m-d H:i:s', "$item[create_time]") ; ?></span></td>
			<td align='center'><a    href='<?php echo $site_url ; ?>/news/view/?&id=<?php echo $item[id] ; ?>'>查看</a>&nbsp;&nbsp;<a  href='<?php echo $act_url ; ?>edit/?id=<?php echo $item[id] ; ?>'>修改</a>&nbsp;&nbsp;<a  href='<?php echo $act_url ; ?>del/?id=<?php echo $item[id] ; ?>' onclick='return opConfirm();'>删除</a>&nbsp;&nbsp;</td>
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