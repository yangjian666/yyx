<?php include_once('D:\phpStudy\yyx-master\runtime/views\modules/admin\templates/default\header.php');?>

<div class="KK_ManageList_content">
	<?php include_once('D:\phpStudy\yyx-master\runtime/views\modules/admin\templates/default\menu.php');?>
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
		                                标题:
		                                <input type="text" class="txt" name="title" value="<?php echo $request->getParameter(title) ?>" style="width:100px" />
		                                 &nbsp;
		                               	分类:
		                               	<select name="cateid" onchange="subCategorySelect(this.value, 'sub_cateid')">
		                               		<option value="0" <?php if(!$cateid){ ?>selected<?php } ?>>全部</option>
		                               		<?php foreach($rootCategorys as $category){ ?>
		                               		<option value="<?php echo $category['id']; ?>" <?php if($cateid == $category['id']){ ?>selected<?php } ?>><?php echo $category['name']; ?></option>
		                               		<?php } ?>
		                               	</select>
		                               	<select name="sub_cateid" id="sub_cateid">
		                               		<option value="0" <?php if(!$sub_cateid){ ?>selected<?php } ?>>全部</option>
		                               		<?php foreach($subCategorys as $category){ ?>
		                               		<option value="<?php echo $category['id']; ?>" <?php if($sub_cateid == $category['id']){ ?>selected<?php } ?>><?php echo $category['name']; ?></option>
		                               		<?php } ?>
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
	                     <a href="<?php echo $act_url; ?>add/" style="float: right;">添加</a>
	                </span>
	            </h3>
	            
                    <table id="" class="list_table" cellpadding="0" cellspacing="0" border="0">
					<thead>
					<tr>
						<th align="left">竞猜点标题</th>
						<th align="left">竞猜分类</th>
						<th align="left">竞猜个数</th>
						<th align="left">参与截止时间</th>
						<th align="left">创建时间</th>
						<th align="left" width="180px">操作</th>
					</tr>
					</thead>
					<tbody>
						<?php foreach($items as $item){ ?>
						<tr>
								<td align="left"><?php echo $item['title']; ?></td>
								<td align="left"><?php echo $categorys[$item[cate_id]]['name']; ?></td>
								<td align="left"><?php echo $item['guess_count']; ?></td>
								<td align="left"><?php echo date('Y-m-d H:i', $item['play_deadline'])?></td>
								<td align="left"><?php echo date('Y-m-d H:i', $item['create_time'])?></td>
								<td align="left">
									<?php if($item['status'] == GuessPoint::STATUS_RUDGED){ ?>
									已判定，无操作
									<?php }elseif($item['status'] == GuessPoint::STATUS_NORMAL){ ?>
										<?php if(time() > $item['play_deadline']){ ?>
											<a href="<?php echo url("/$currentModule/$currentAction/result/?id=$item[id]") ?>">结果判定</a>&nbsp;
										<?php } ?>
										<?php if(!$item['guess_count']){ ?>
											<a href="<?php echo url("/$currentModule/$currentAction/edit/?id=$item[id]") ?>">编辑</a>&nbsp;
											<a href="<?php echo url("/$currentModule/$currentAction/del/?id=$item[id]") ?>">删除</a>&nbsp;
										<?php } ?>
									<?php }else{ ?>
										<a href="<?php echo url("/$currentModule/$currentAction/enable/?id=$item[id]") ?>">启用</a>&nbsp;
										<?php if(!$item['guess_count']){ ?>
											<a href="<?php echo url("/$currentModule/$currentAction/edit/?id=$item[id]") ?>">编辑</a>&nbsp;
											<a href="<?php echo url("/$currentModule/$currentAction/del/?id=$item[id]") ?>">删除</a>&nbsp;
											<a href="<?php echo url("/$currentModule/$currentAction/param/?id=$item[id]") ?>">编辑参数</a>&nbsp;
										<?php } ?>
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

<?php include_once('D:\phpStudy\yyx-master\runtime/views\modules/admin\templates/default\footer.php');?>