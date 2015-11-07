<?php include_once('E:\yyx\runtime/views\modules/admin\templates/default\header.php');?>

<div class="KK_ManageList_content">
	<?php include_once('E:\yyx\runtime/views\modules/admin\templates/default\menu.php');?>
    <div class="KK_ManageList_mainRt_side right">
    	<div class="KK_ManageList_mainbox_top"></div>
        <div class="KK_ManageList_mainbox">
        	<div class="KK_ManageList_mainbox_inner">
            	<div class="KK_ManageList_position">当前位置 &gt;&gt; 用户管理 &gt;&gt; 充值</div>
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
				                         充值状态:
		                               <select name="status">
		                               		<option value="0" <?php if(!$status){ ?>selected<?php } ?>>全部</option>
		                               		<option value="2" <?php if($status == 2){ ?>selected<?php } ?>>成功</option>
		                               		<option value="1" <?php if($status == 1){ ?>selected<?php } ?>>未支付</option>
		                               	</select>
		                                &nbsp;
		                                充值时间
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
						<th align="left">充值金额</th>
						<th align="left">充值类型</th>
						<th align="left">充值状态</th>
						<th align="left">充值时间</th>
					</tr>
					</thead>
					<tbody>
						<?php foreach($items as $item){ ?>
						<tr>
								<td align="left"><?php echo $item['user_id']; ?></td>
								<td align="left"><?php echo $users[$item['user_id']]['name']; ?></td>
								<td align="left"><?php echo $item['money']; ?></td>
								<td align="left"><?php echo $item['mobile']; ?></td>
								<td align="left"><?php echo $payTypes[$item['pay_type']]; ?></td>
								<td align="left"><?php if($item['status']){ ?>成功<?php }else{ ?>未支付<?php } ?></td>
								<td align="left"><?php echo date('Y-m-d i:m', $item['create_time'])?></td>
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