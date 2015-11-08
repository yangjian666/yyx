<?php include_once('E:\yyx\runtime/views\modules/admin\templates/default\header.php');?>

<div class="KK_ManageList_content">
	<?php include_once('E:\yyx\runtime/views\modules/admin\templates/default\menu.php');?>
    <div class="KK_ManageList_mainRt_side right">
    	<div class="KK_ManageList_mainbox_top"></div>
        <div class="KK_ManageList_mainbox">
        	<div class="KK_ManageList_mainbox_inner">
            	<div class="KK_ManageList_position">当前位置 &gt;&gt; 商城管理 &gt;&gt; 兑换抽奖</div>
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
		                                <input type="text" class="txt" name="userId" value="<?php echo $request->getParameter(userId) ?>" style="width:100px" />
		                                 &nbsp;
		                               	发货状态:
		                               	<select name="sendStatus">
		                               		<option value="0" <?php if(!$sendStatus){ ?>selected<?php } ?>>全部</option>
		                               		<option value="1" <?php if($sendStatus == 1){ ?>selected<?php } ?>>未发货</option>
		                               		<option value="2" <?php if($sendStatus == 2){ ?>selected<?php } ?>>已发货</option>
		                               	</select>
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
	                </span>
	            </h3>
                    <table id="" class="list_table" cellpadding="0" cellspacing="0" border="0">
					<thead>
					<tr>
						<th align="left">商品</th>
						<th align="left">用户</th>
						<th align="left">收件人</th>
						<th align="left">收件手机</th>
						<th align="left">收件地址</th>
						<th align="left">兑换/抽奖</th>
						<th align="left">发货状态</th>
						<th align="left">创建时间</th>
						<th align="left" width="100px">操作</th>
					</tr>
					</thead>
					<tbody>
						<?php foreach($items as $item){ ?>
						<tr>
								<td align="left"><a href="<?php echo url("/goods/view/?id=$item[goods_id]") ?>" target="_blank"><?php echo $goodses[$item['goods_id']]['title']; ?></a></td>
								<td align="left"><a href="<?php echo url("/admin/user/view/?id=$item[user_id]") ?>" target="_blank"><?php echo $users[$item['user_id']]['name']; ?></a></td>
								<td align="left"><?php echo $item['username']; ?></td>
								<td align="left"><?php echo $item['mobile']; ?></td>
								<td align="left"><?php echo $item['address']; ?></td>
								<td align="left"><?php if($item['is_lottery']){ ?>抽奖<?php }else{ ?>兑换<?php } ?></td>
								<td align="left"><?php if($item['send_status']){ ?>已发货<?php }else{ ?>未发货<?php } ?></td>
								<td align="left"><?php echo date('Y-m-d', $item['create_time'])?></td>
								<td align="left">
									<?php if(!$item['send_status']){ ?>
									<a href="<?php echo url("$currentModule/$currentAction/shipments/?id=$item[id]") ?>" onclick="return opConfirm();">发货</a>
									<?php }else{ ?>
									无操作
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