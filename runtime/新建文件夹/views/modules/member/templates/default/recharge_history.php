<?php include_once('E:\yyx\runtime/views\./templates/default\header.php');?>
<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/uploadify/swfobject.js"></script>
<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/uploadify/jquery.uploadify.v2.1.4.min.js"></script>
	<div class="setting_body">
		<div class="caption">充值记录</div>
        <ul class="nav nav-tabs" id="setting_tab">
	        <li class="active"><a href="/member/recharge/history/">充值记录</a></li>			
			<li><a href="/member/money/io/">收支明细</a></li>
	        <li><a href="/member/money/">我的金币</a></li>			
        </ul>
        
        <div class="tab-content setting_list">
			<div class="tab-pane active">
				<table class="table mlist table-striped">
				<thead>
					<tr>
						<th width="25%">订单号</th>
						<th width="15%">充值金额</th>
						<th width="15%">支付类型</th>
						<th width="20%">充值时间</th>
						<th width="15%">状态</th>
						<th width="10%">操作</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($items as $item){ ?>
			        <tr>
						<td><?php echo $item['sn']; ?></td>
						<td><?php echo $item['money']; ?></td>
						<td><?php if($item['pay_type'] == 'alipay'){ ?>支付宝<?php }else{ ?>网银<?php } ?></td>
						<td><?php echo date('Y-m-d H:i:s', $item['create_time'])?></td>
						<td><?php if($item['status']){ ?>冲值成功<?php }else{ ?>未支付<?php } ?></td>	
						<td><?php if(!$item['status']){ ?><a href="<?php echo url("/member/recharge/pay/?id=$item[id]") ?>" target="_blank">继续支付</a><?php }else{ ?>无操作<?php } ?></td>						
			        </tr>
			     <?php } ?>
				</tbody>
		        </table>
		        <?php echo $pages; ?>
	        </div>
        </div>
	</div>
<?php include_once('E:\yyx\runtime/views\./templates/default\footer.php');?>