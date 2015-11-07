<?php include_once('E:\yyx\runtime/views\./templates/default\header.php');?>
	<div class="exchange_body">
        <ul class="nav nav-tabs" id="exchange_tab">
	        <li class="active"><a href="/goods/list/">所有奖品</a></li>			
			<li><a href="/goods/my/">我的奖品</a></li>
        </ul>
        
        <div class="tab-content exchange_list">
	        
			<!-- 所有奖品 -->
			<div class="tab-pane active" id="t1">
				<div class="title">幸运抽奖</div>
				<?php foreach($items as $item){ ?>
					<?php if($item['can_lottery']){ ?>
					<?php $hasLottery = true; ?>
					<div class="pitem">
						<div class="pimg"><a href="<?php echo url("/goods/view/?id={$item[id]}") ?>"><img src="<?php echo $item[image]; ?>" alt="<?php echo $item[title]; ?>" title="<?php echo $item[title]; ?>"/></a></div>
					</div>
					<?php } ?>
				<?php } ?>
				<?php if(!$hasLottery){ ?>
				<div class="pitem">
					暂无抽奖奖品
				</div>
				<?php } ?>

				<div class="title">积分兑换</div>
				
				<?php foreach($items as $item){ ?>
					<?php if($item['can_exchange']){ ?>
					<?php $hasExchange = true; ?>
					<div class="pitem">
						<div class="pimg"><a href="<?php echo url("/goods/view/?id={$item[id]}") ?>"><img src="<?php echo $item[image]; ?>" alt="<?php echo $item[title]; ?>" title="<?php echo $item[title]; ?>"/></a></div>
					</div>
					<?php } ?>
				<?php } ?>
				<?php if(!$hasExchange){ ?>
				<div class="pitem">
					暂无兑换奖品
				</div>
				<?php } ?>						
	        </div>
	        
        </div>
	</div>
<?php include_once('E:\yyx\runtime/views\./templates/default\footer.php');?>