<?php include_once('E:\yyx\runtime/views\modules/admin\templates/default\header.php');?>

<div class="KK_ManageList_content">
	<?php include_once('E:\yyx\runtime/views\modules/admin\templates/default\menu.php');?>
    <div class="KK_ManageList_mainRt_side right">
    	<div class="KK_ManageList_mainbox_top"></div>
        <div class="KK_ManageList_mainbox">
        	<div class="KK_ManageList_mainbox_inner">
            	<div class="KK_ManageList_position">当前位置 &gt;&gt; 竞猜管理 &gt;&gt; 竞猜</div>
            	

				<div class="seachbox">
		            <div class="content2">
		                <form action="<?php echo $index_url; ?>" name="searchForm" method="get">
		                <table class="form-table">
		                    <tbody>
		                        <tr>
		                            <td >
		                                用户ID:
		                                <input type="text" class="txt" name="id" value="<?php echo $request->getParameter(id) ?>" style="width:100px" />
		                                &nbsp;
		                                竞猜标题:
		                                <input type="text" class="txt" name="title" value="<?php echo $request->getParameter(title) ?>" style="width:100px" />
		                                 &nbsp;
		                               	下注形式:
		                               	<select name="wealth_type">
		                               		<option value="0" <?php if(!$wealth_type){ ?>selected<?php } ?>>全部</option>
		                               		<option value="1" <?php if($wealth_type == 1){ ?>selected<?php } ?>>金币</option>
                                            <option value="3" <?php if($wealth_type == 3){ ?>selected<?php } ?>>LTC</option>
                                            <option value="4" <?php if($wealth_type == 4){ ?>selected<?php } ?>>BTC</option>
                                            <option value="5" <?php if($wealth_type == 5){ ?>selected<?php } ?>>DOGE</option>
		                               		<option value="2" <?php if($wealth_type == 2){ ?>selected<?php } ?>>积分</option>
		                               		<option value="3" <?php if($wealth_type == 6){ ?>selected<?php } ?>>自定义</option>
		                               	</select>										
										&nbsp;
										竞猜状态:
		                               	<select name="status">
		                               		<option value="0" <?php if(!$status){ ?>selected<?php } ?>>全部</option>
		                               		<option value="1" <?php if($status == 1){ ?>selected<?php } ?>>待审核</option>
		                               		<option value="2" <?php if($status == 2){ ?>selected<?php } ?>>审核通过</option>
		                               		<option value="3" <?php if($status == 3){ ?>selected<?php } ?>>提交判定</option>
		                               		<option value="4" <?php if($status == 4){ ?>selected<?php } ?>>已结束</option>
		                               		<option value="5" <?php if($status == 5){ ?>selected<?php } ?>>已关闭</option>
		                               	</select>
				                        <br /><br />
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
						<th align="left">竞猜标题</th>
						<th align="left">坐庄用户</th>
						<th align="left">财富托管</th>
						<th align="left">参与情况</th>
						<th align="left">竞猜状态</th>
						<th align="left">创建时间</th>
						<th align="left" width="150px">操作</th>
					</tr>
					</thead>
					<tbody>
						<?php foreach($items as $item){ ?>
						<tr>
								<td align="left"><a href="/guess/adminReview/?id=<?php echo $item['id']; ?>" target="_blank"><?php echo $item['title']; ?></a></td>
								<td align="left"><?php echo $users[$item[user_id]]['name']; ?></td>
								<td align="left"><?php if($item['wealth_type'] == 1){ ?>金币/<?php echo $item['keep_wealth']; ?><?php }elseif($item['wealth_type'] == 3){ ?>LTC/<?php echo $item['keep_wealth']; ?><?php }elseif($item['wealth_type'] == 4){ ?>BTC/<?php echo $item['keep_wealth']; ?><?php }elseif($item['wealth_type'] == 5){ ?>DOGE/<?php echo $item['keep_wealth']; ?><?php }elseif($item['wealth_type'] == 2){ ?>积分/<?php echo $item['keep_wealth']; ?><?php }else{ ?><?php echo $item['custom_type']; ?><?php } ?></td>
								<td align="left"><?php echo $item['play_count']; ?>/<?php echo $item['play_wealth']; ?></td>
								<td align="left">
									<?php if($item['status'] == 0){ ?>待审核
									<?php }elseif($item['status'] == 1){ ?>审核通过
									<?php }elseif($item['status'] == 2){ ?>提交判定
									<?php }elseif($item['status'] == 3){ ?>已结束
									<?php }elseif($item['status'] == 4){ ?>已关闭
									<?php }else{ ?>不详<?php } ?>
								</td>
								<td align="left"><?php echo date('Y-m-d', $item['create_time'])?></td>
								<td align="left">
									<?php if($item['status'] == 0){ ?>
									<a href="<?php echo url("/$currentModule/$currentAction/check/?id=$item[id]") ?>">审核通过</a>&nbsp;
									<a href="<?php echo url("/$currentModule/$currentAction/close/?id=$item[id]") ?>">关闭</a>&nbsp;
									<?php }elseif($item['status'] == 2){ ?>
									<a href="<?php echo url("/$currentModule/$currentAction/rudge/?id=$item[id]") ?>">结果判定</a>&nbsp;
									<?php } ?>
									<a href="<?php echo url("/$currentModule/$currentAction/del/?id=$item[id]") ?>">删除</a>&nbsp;
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