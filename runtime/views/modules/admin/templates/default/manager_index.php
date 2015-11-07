<?php include_once('E:\yyx\runtime/views\modules/admin\templates/default\header.php');?>

<div class="KK_ManageList_content">
	<?php include_once('E:\yyx\runtime/views\modules/admin\templates/default\menu.php');?>
    <div class="KK_ManageList_mainRt_side right">
    	<div class="KK_ManageList_mainbox_top"></div>
        <div class="KK_ManageList_mainbox">
        	<div class="KK_ManageList_mainbox_inner">
            	<div class="KK_ManageList_position">当前位置 &gt;&gt; 管理员管理 &gt;&gt; 管理员</div>
            	<div class="seachbox">
		            <div class="content2">
		                <form action="<?php echo $index_url; ?>" name="searchForm" method="get">
		                <table class="form-table">
		                    <tbody>
		                        <tr>
		                            <td width="10px">
		                                <img src="http://yyx.796dice.com:8080/res/images/icon_search.gif" border="0" alt="SEARCH" />
		                            </td>
		                            <td >
		                                管理员姓名:
		                                <input type="text" class="txt" name="name" value="<?php echo $request->getParameter(name) ?>" style="width:100px" />
		                                &nbsp;
		                               	所属管理组:
		                               	<select name='groupId' id='' class=''><option value=''>请选择</option><?php foreach($manageGroups as $option){echo "<option value='$option[id]' ";if($option[id] == $groupId)echo 'selected=selected';echo ">$option[name]</option>";} ?></select>
				                         &nbsp;
		                                创建时间
		                                 <input class="Wdate" type="text" name="startTime" value="<?php echo $request->getParameter(startTime) ?>" onClick="WdatePicker({'dateFmt':'yyyy-MM-dd HH:mm' })" style="width:150px" />
                                            -
                                            <input class="Wdate" type="text" name="endTime" value="<?php echo $request->getParameter(endTime) ?>" onClick="WdatePicker({'dateFmt':'yyyy-MM-dd HH:mm' })" style="width:150px" />
		                            </td>
		                            <td><input class="regular-button" type="submit" value="搜索" /></td>
		                        </tr>
		                    </tbody>
		                </table>
		                </form>
		            </div>
		        </div>
            	
                <h3>
	                <span class="right" style="margin-right: 15px;">
	                    <a href="<?php echo $act_url; ?>add/" style="float: right;">添加</a>
	                </span>
	            </h3>
	            
                    <!-- EasyPHP表格组件开始 -->
<table id="" class="list_table" cellpadding="0" cellspacing="0" border="0">
<thead><tr>
	<th  align='center' class="first"><a href="javascript:sortBy('id','<?php echo $nextsort;?>')" title='click_sort_title'>ID<?php if($order == 'id') echo "<img src='/res/images/{$sort}.gif' align='absmiddle'/>";?></a></th>
	<th  align='center' ><a href="javascript:sortBy('name','<?php echo $nextsort;?>')" title='click_sort_title'>姓名<?php if($order == 'name') echo "<img src='/res/images/{$sort}.gif' align='absmiddle'/>";?></a></th>
	<th  align='center' ><a href="javascript:sortBy('group_id','<?php echo $nextsort;?>')" title='click_sort_title'>所属管理组<?php if($order == 'group_id') echo "<img src='/res/images/{$sort}.gif' align='absmiddle'/>";?></a></th>
	<th  align='center' ><a href="javascript:sortBy('mobile','<?php echo $nextsort;?>')" title='click_sort_title'>手机<?php if($order == 'mobile') echo "<img src='/res/images/{$sort}.gif' align='absmiddle'/>";?></a></th>
	<th  align='center' ><a href="javascript:sortBy('last_login_time','<?php echo $nextsort;?>')" title='click_sort_title'>上次登陆时间<?php if($order == 'last_login_time') echo "<img src='/res/images/{$sort}.gif' align='absmiddle'/>";?></a></th>
	<th  align='left' ><a href="javascript:sortBy('create_time','<?php echo $nextsort;?>')" title='click_sort_title'>创建时间<?php if($order == 'create_time') echo "<img src='/res/images/{$sort}.gif' align='absmiddle'/>";?></a></th>
	<th width='100px'>操作</th>
</tr></thead>
<tbody>
<?php
foreach($items as $key=>$item){
?>
	<tr>
			<td align='center' class='first'><span><?php echo $item[id] ; ?></span></td>
			<td align='center' ><span class='pointer' onclick=textEdit(this,'<?php echo $item[id] ; ?>','name')><?php echo $item[name] ; ?></span></td>
			<td align='center' ><?php echo $manageGroups[$item[group_id]][name] ; ?></td>
			<td align='center' ><span class='pointer' onclick=textEdit(this,'<?php echo $item[id] ; ?>','mobile')><?php echo $item[mobile] ; ?></span></td>
			<td align='center' ><span><?php echo date('Y-m-d H:i:s', "$item[last_login_time]") ; ?></span></td>
			<td align='left' ><span><?php echo date('Y-m-d H:i:s', "$item[create_time]") ; ?></span></td>
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

<?php include_once('E:\yyx\runtime/views\modules/admin\templates/default\footer.php');?>