<?php include_once('D:\phpStudy\yyx-master\runtime/views\./templates/default\header.php');?>
<script type="text/javascript" src="http://www.yyx-test.com//res/js/uploadify/swfobject.js"></script>
<script type="text/javascript" src="http://www.yyx-test.com//res/js/uploadify/jquery.uploadify.v2.1.4.min.js"></script>
	<div class="setting_body">
		<div class="caption">金币收支明细</div>
        <ul class="nav nav-tabs" id="setting_tab">
	        <li><a href="/member/recharge/history/?wealth_type=<?php echo $_GET['wealth_type']; ?>">充值记录</a></li>
			<li class="active"><a href="/member/money/io/?wealth_type=<?php echo $_GET['wealth_type']; ?>">收支明细</a></li>
	        <li><a href="/member/money/?wealth_type=<?php echo $_GET['wealth_type']; ?>">我的金币</a></li>
        </ul>
        
        <div class="tab-content setting_list">
			<div class="tab-pane active">
				<table class="table mlist table-striped">
				<thead>
					<tr>
						<th>金币</th>
						<th>余额</th>
						<th>时间</th>
						<th>项目</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($items as $item){ ?>
					<?php if($item['from_user_id'] == $user->getId()){ ?>
			        <tr>
						<td>
						-<?php echo $item['wealth']; ?>
						</td>
						<td><?php echo $item['from_balance']; ?></td>
						<td><?php echo date('Y-m-d H:i', $item['create_time'])?></td>
						<td><?php echo $item['from_title']; ?></td>							
			        </tr>
			        <?php }else{ ?>
			        <tr>
						<td>
						+<?php echo $item['wealth']; ?>
						</td>
						<td><?php echo $item['to_balance']; ?></td>
						<td><?php echo date('Y-m-d H:i', $item['create_time'])?></td>
						<td><?php echo $item['to_title']; ?></td>							
			        </tr>
			        <?php } ?>
			        <?php } ?>
				</tbody>
		        </table>
	        </div>
	        <?php echo $pages; ?>
        </div>
	</div>
<?php include_once('D:\phpStudy\yyx-master\runtime/views\./templates/default\footer.php');?>