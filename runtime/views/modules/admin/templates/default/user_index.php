<?php include_once('E:\yyx\runtime/views\modules/admin\templates/default\header.php');?>

<div class="KK_ManageList_content">
	<?php include_once('E:\yyx\runtime/views\modules/admin\templates/default\menu.php');?>
    <div class="KK_ManageList_mainRt_side right">
    	<div class="KK_ManageList_mainbox_top"></div>
        <div class="KK_ManageList_mainbox">
        	<div class="KK_ManageList_mainbox_inner">
            	<div class="KK_ManageList_position">当前位置 &gt;&gt; 用户管理 &gt;&gt; 用户</div>
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
		                                用户ID:
		                                <input type="text" class="txt" name="id" value="<?php echo $request->getParameter(id) ?>" style="width:100px" />
		                                &nbsp;
		                                用户名称:
		                                <input type="text" class="txt" name="name" value="<?php echo $request->getParameter(name) ?>" style="width:100px" />
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
	                <!--     <a href="<?php echo $act_url; ?>add/" style="float: right;">添加</a>  -->
	                </span>
	            </h3>
	            
                    <table id="" class="list_table" cellpadding="0" cellspacing="0" border="0">
					<thead>
					<tr>
						<th align="left">用户ID</th>
						<th align="left">用户名</th>
						<th align="left">邮箱</th>
						<th align="left">金币/冻结</th>
						<th align="left">积分/冻结</th>
						<th align="left">上次登陆时间</th>
						<th align="left">注册时间</th>
						<th align="left" width="100px">操作</th>
					</tr>
					</thead>
					<tbody>
						<?php foreach($items as $item){ ?>
						<tr>
								<td align="left"><?php echo $item['id']; ?></td>
								<td align="left"><?php echo $item['name']; ?></td>
								<td align="left"><?php echo $item['email']; ?></td>
								<td align="left"><?php echo $item['available_money']; ?>/<?php echo $item['freeze_money']; ?></td>
								<td align="left"><?php echo $item['available_integral']; ?>/<?php echo $item['freeze_integral']; ?></td>
								<td align="left"><?php echo date('Y-m-d', $item['last_login_time'])?></td>
								<td align="left"><?php echo date('Y-m-d', $item['register_time'])?></td>
								<td align="left">
									<a href="<?php echo url("/$currentModule/$currentAction/edit/?id=$item[id]") ?>">编辑</a>&nbsp;
							<!-- 		<a href="<?php echo url("/$currentModule/$currentAction/detail/?id=$item[id]") ?>">详细</a>  -->
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