<?php include_once('E:\yyx\runtime/views\./templates/default\header.php');?>
	<div class="exchange_body">
        <ul class="nav nav-tabs" id="exchange_tab">
	        <li><a href="/goods/list/">所有奖品</a></li>			
			<li  class="active"><a href="/goods/my/">我的奖品</a></li>
        </ul>
        
        <div class="tab-content exchange_list">
			<div id="t2">
		        <table class="table table-striped myex">
		       	<thead>
				<tr>
					<th>奖品名称</th>
					<th>获取方式</th>
					<th>收货地址</th>
					<th>状态</th>
					<th>操作</th>
		       	</tr>
				</thead>
				<tbody>
				<?php if($items){ ?>
				<?php foreach($items as $item){ ?>
				<tr>
					<td><a target="_blank" href="<?php echo url("/goods/view/?id=$item[goods_id]") ?>" title="<?php echo $goods[$item['goods_id']][title]; ?>"><?php echo mb_substr($goods[$item[goods_id]][title],0,16,'utf-8') ?></a></td>
					<td><?php if($item['is_exchange']){ ?>兑换<?php }else{ ?>抽奖<?php } ?></td>
					<td><?php echo $item['address']; ?> <?php echo $item['username']; ?> <?php echo $item['mobile']; ?></td>
					<td><?php if($item['receive_status']){ ?>已收货<?php }elseif($item['send_status']){ ?>已发货<?php }else{ ?>未发货<?php } ?></td>
					<td>
					<?php if($item['send_status'] && !$item['receive_status']){ ?>
					<a href="/goods/exchange/receive/?id=<?php echo $item['id']; ?>" onclick="return comfirmAjaxMenu(event, this.id, 1, 2000, 'refreshPage(2000)')" id="exchange_receive_<?php echo $item[id]; ?>">确认收货</a>
					<?php }else{ ?>
					无操作
					<?php } ?>
					</td>
				</tr>
				<?php } ?>
				<?php }else{ ?>
				<tr>
					<td colspan="5">没有找到你的奖品记录</td>
				</tr>
				<?php } ?>
				
				</tbody>								
		        </table>	        
			</div>
			<?php echo $pages; ?>
        </div>
         
	</div>
<?php include_once('E:\yyx\runtime/views\./templates/default\footer.php');?>