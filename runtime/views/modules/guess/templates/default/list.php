<?php include_once('E:\yyx\runtime/views\./templates/default\header.php');?>
	
	<div class="list_body">
		<div class="left">
			<div class="content">
				
				<div class="filterlist">
					<div class="fitem">
						<div class="caption">竞猜分类</div>
						<ul>
							<li><a <?php if(!$params['cateid'] && !$params['custom']){ ?>class="sel"<?php } ?> href="<?php echo url("/guess/list/?history=$params[history]&cateid=0&custom=0&wealth=$params[wealth]&odds=$params[odds]&time=$params[time]&keyword=$params[keyword]&range=$params[range]") ?>">全部</a></li>
							<?php foreach($rootCategorys as $category){ ?>
							<li><a <?php if($params['cateid'] == $category['id']){ ?>class="sel"<?php } ?> href="<?php echo url("/guess/list/?history=$params[history]&cateid=$category[id]&custom=0&wealth=$params[wealth]&odds=$params[odds]&time=$params[time]&keyword=$params[keyword]&range=$params[range]") ?>" ><?php echo $category[name]; ?></a></li>
							<?php } ?>
							<li><a <?php if($params['custom']){ ?>class="sel"<?php } ?> href="<?php echo url("/guess/list/?history=$params[history]&cateid=0&custom=1&wealth=$params[wealth]&odds=$params[odds]&time=$params[time]&keyword=$params[keyword]&range=$params[range]") ?>">自定义</a></li>
						</ul>
					</div>
					<div class="fitem">
						<div class="caption">下注类型</div>
						<ul>
							<li><a <?php if(!$params['wealth']){ ?>class="sel"<?php } ?> href="<?php echo url("/guess/list/?history=$params[history]&cateid=$params[cateid]&custom=$params[custom]&wealth=0&odds=$params[odds]&time=$params[time]&keyword=$params[keyword]&range=$params[range]") ?>">全部</a></li>
							<li><a <?php if($params['wealth'] == '1'){ ?>class="sel"<?php } ?> href="<?php echo url("/guess/list/?history=$params[history]&cateid=$params[cateid]&custom=$params[custom]&wealth=1&odds=$params[odds]&time=$params[time]&keyword=$params[keyword]&range=$params[range]") ?>">金币</a></li>
							<li><li><a <?php if($params['wealth'] == '3'){ ?>class="sel"<?php } ?> href="<?php echo url("/guess/list/?history=$params[history]&cateid=$params[cateid]&custom=$params[custom]&wealth=3&odds=$params[odds]&time=$params[time]&keyword=$params[keyword]&range=$params[range]") ?>">LTC</a></li>
                            <li><a <?php if($params['wealth'] == '4'){ ?>class="sel"<?php } ?> href="<?php echo url("/guess/list/?history=$params[history]&cateid=$params[cateid]&custom=$params[custom]&wealth=4&odds=$params[odds]&time=$params[time]&keyword=$params[keyword]&range=$params[range]") ?>">BTC</a></li>
                            <li><a <?php if($params['wealth'] == '5'){ ?>class="sel"<?php } ?> href="<?php echo url("/guess/list/?history=$params[history]&cateid=$params[cateid]&custom=$params[custom]&wealth=5&odds=$params[odds]&time=$params[time]&keyword=$params[keyword]&range=$params[range]") ?>">DOGE</a></li>
                            <li><a <?php if($params['wealth'] == '2'){ ?>class="sel"<?php } ?> href="<?php echo url("/guess/list/?history=$params[history]&cateid=$params[cateid]&custom=$params[custom]&wealth=2&odds=$params[odds]&time=$params[time]&keyword=$params[keyword]&range=$params[range]") ?>">积分</a></li>
							<li><a <?php if($params['wealth'] == '6'){ ?>class="sel"<?php } ?> href="<?php echo url("/guess/list/?history=$params[history]&cateid=$params[cateid]&custom=$params[custom]&wealth=6&odds=$params[odds]&time=$params[time]&keyword=$params[keyword]&range=$params[range]") ?>">吃喝玩乐</a></li>
						</ul>
					</div>
					<div class="fitem">
						<div class="caption">赔率类型</div>
						<ul>
							<li><a <?php if(!$params['odds']){ ?>class="sel"<?php } ?> href="<?php echo url("/guess/list/?history=$params[history]&cateid=$params[cateid]&custom=$params[custom]&wealth=$params[wealth]&odds=0&time=$params[time]&keyword=$params[keyword]&range=$params[range]") ?>">全部</a></li>
							<li><a <?php if($params['odds'] == '1'){ ?>class="sel"<?php } ?> href="<?php echo url("/guess/list/?history=$params[history]&cateid=$params[cateid]&custom=$params[custom]&wealth=$params[wealth]&odds=1&time=$params[time]&keyword=$params[keyword]&range=$params[range]") ?>">固定赔率</a></li>
							<li><a <?php if($params['odds'] == '2'){ ?>class="sel"<?php } ?> href="<?php echo url("/guess/list/?history=$params[history]&cateid=$params[cateid]&custom=$params[custom]&wealth=$params[wealth]&odds=2&time=$params[time]&keyword=$params[keyword]&range=$params[range]") ?>">浮动赔率</a></li>
							<li><a <?php if($params['odds'] == '3'){ ?>class="sel"<?php } ?> href="<?php echo url("/guess/list/?history=$params[history]&cateid=$params[cateid]&custom=$params[custom]&wealth=$params[wealth]&odds=3&time=$params[time]&keyword=$params[keyword]&range=$params[range]") ?>">组合赔率</a></li>
						</ul>
					</div>
					<div class="fitem">
						<div class="caption">发布时间</div>
						<ul>
							<li><a <?php if(!$params['time']){ ?>class="sel"<?php } ?> href="<?php echo url("/guess/list/?history=$params[history]&cateid=$params[cateid]&custom=$params[custom]&wealth=$params[wealth]&odds=$params[odds]&time=0&keyword=$params[keyword]&range=$params[range]") ?>">全部</a></li>
							<li><a <?php if($params['time'] == '1'){ ?>class="sel"<?php } ?> href="<?php echo url("/guess/list/?history=$params[history]&cateid=$params[cateid]&custom=$params[custom]&wealth=$params[wealth]&odds=$params[odds]&time=1&keyword=$params[keyword]&range=$params[range]") ?>">1天之内</a></li>
							<li><a <?php if($params['time'] == '3'){ ?>class="sel"<?php } ?> href="<?php echo url("/guess/list/?history=$params[history]&cateid=$params[cateid]&custom=$params[custom]&wealth=$params[wealth]&odds=$params[odds]&time=3&keyword=$params[keyword]&range=$params[range]") ?>">3天之内</a></li>
							<li><a <?php if($params['time'] == '7'){ ?>class="sel"<?php } ?> href="<?php echo url("/guess/list/?history=$params[history]&cateid=$params[cateid]&custom=$params[custom]&wealth=$params[wealth]&odds=$params[odds]&time=7&keyword=$params[keyword]&range=$params[range]") ?>">7天之内</a></li>
						</ul>
					</div>
				</div>
				
				<div class="guess_list">
					<ul class="nav nav-tabs" id="list_tab">
			        	<li <?php if(!$params['history']){ ?>class="active"<?php } ?>><a href="/guess/list/">全部竞猜</a></li>
						<li <?php if($params['history']){ ?>class="active"<?php } ?>><a href="/guess/list/history-1.shtml">历史竞猜</a></li>		
		        	</ul>
					
					<label class="checkbox">
						<input type="checkbox" onclick="justFriend(this);" <?php if($params[range] == 1){ ?>checked<?php } ?>> 仅查看好友竞猜
					</label>
					<div class="tip">
						排序方式：
						<select>
							<option <?php if(!$params['otime']){ ?>selected<?php } ?> value="<?php echo url("/guess/list/?history=$params[history]&cateid=$params[cateid]&custom=$params[custom]&wealth=$params[wealth]&odds=$params[odds]&time=$params[time]&keyword=$params[keyword]&range=$params[range]&otime=0&ocount=$params[ocount]&owealth=$params[owealth]") ?>" onclick="window.location=this.value">按时间</option>
							<option <?php if($params['otime'] == 'asc'){ ?>selected<?php } ?> value="<?php echo url("/guess/list/?history=$params[history]&cateid=$params[cateid]&custom=$params[custom]&wealth=$params[wealth]&odds=$params[odds]&time=$params[time]&keyword=$params[keyword]&range=$params[range]&otime=asc&ocount=$params[ocount]&owealth=$params[owealth]") ?>" onclick="window.location=this.value">升序</option>
							<option <?php if($params['otime'] == 'desc'){ ?>selected<?php } ?> value="<?php echo url("/guess/list/?history=$params[history]&cateid=$params[cateid]&custom=$params[custom]&wealth=$params[wealth]&odds=$params[odds]&time=$params[time]&keyword=$params[keyword]&range=$params[range]&otime=desc&ocount=$params[ocount]&owealth=$params[owealth]") ?>" onclick="window.location=this.value">降序</option>
						</select>
						<select>
							<option <?php if(!$params['ocount']){ ?>selected<?php } ?> value="<?php echo url("/guess/list/?history=$params[history]&cateid=$params[cateid]&custom=$params[custom]&wealth=$params[wealth]&odds=$params[odds]&time=$params[time]&keyword=$params[keyword]&range=$params[range]&otime=$params[otime]&ocount=0&owealth=$params[owealth]") ?>" onclick="window.location=this.value">按参与人数</option>
							<option <?php if($params['ocount'] == 'asc'){ ?>selected<?php } ?> value="<?php echo url("/guess/list/?history=$params[history]&cateid=$params[cateid]&custom=$params[custom]&wealth=$params[wealth]&odds=$params[odds]&time=$params[time]&keyword=$params[keyword]&range=$params[range]&otime=$params[otime]&ocount=asc&owealth=$params[owealth]") ?>" onclick="window.location=this.value">升序</option>
							<option <?php if($params['ocount'] == 'desc'){ ?>selected<?php } ?> value="<?php echo url("/guess/list/?history=$params[history]&cateid=$params[cateid]&custom=$params[custom]&wealth=$params[wealth]&odds=$params[odds]&time=$params[time]&keyword=$params[keyword]&range=$params[range]&otime=$params[otime]&ocount=desc&owealth=$params[owealth]") ?>" onclick="window.location=this.value">降序</option>
						</select>
						<select>
							<option <?php if(!$params['owealth']){ ?>selected<?php } ?> value="<?php echo url("/guess/list/?history=$params[history]&cateid=$params[cateid]&custom=$params[custom]&wealth=$params[wealth]&odds=$params[odds]&time=$params[time]&keyword=$params[keyword]&range=$params[range]&otime=$params[otime]&ocount=$params[ocount]&owealth=0") ?>" onclick="window.location=this.value">按投注</option>
							<option <?php if($params['owealth'] == 'asc'){ ?>selected<?php } ?> value="<?php echo url("/guess/list/?history=$params[history]&cateid=$params[cateid]&custom=$params[custom]&wealth=$params[wealth]&odds=$params[odds]&time=$params[time]&keyword=$params[keyword]&range=$params[range]&otime=$params[otime]&ocount=$params[ocount]&owealth=asc") ?>" onclick="window.location=this.value">升序</option>
							<option <?php if($params['owealth'] == 'desc'){ ?>selected<?php } ?> value="<?php echo url("/guess/list/?history=$params[history]&cateid=$params[cateid]&custom=$params[custom]&wealth=$params[wealth]&odds=$params[odds]&time=$params[time]&keyword=$params[keyword]&range=$params[range]&otime=$params[otime]&ocount=$params[ocount]&owealth=desc") ?>" onclick="window.location=this.value">降序</option>
						</select>						
					</div>
					
					<div class="tab-content list_content">
						<div class="tab-pane active">
							<?php include_once('E:\yyx\runtime/views\./templates/default\guess_box.php');?>
							<?php echo $pages; ?>
				        </div>
					</div>
				</div>
												
			</div>			
		</div>
		
		<div class="right">
			<?php include_once('E:\yyx\runtime/views\./templates/default\notice_box.php');?>
			<?php include_once('E:\yyx\runtime/views\./templates/default\invite_box.php');?>
			<!--
			<div class="ulist">
				<div class="title">您可能感兴趣的用户</div>
				<?php include_once('E:\yyx\runtime/views\./templates/default\users_list_box.php');?>	
			</div>
			-->
			
			<div class="ad">
				<?php include_once('E:\yyx\runtime/views\./templates/default\ad_box.php');?>				
			</div>
		</div>
		
		<div class="clear"></div>
	</div>
	<script type="text/javascript">
	<!--
	function justFriend(checkbox){
	    var url = '/guess/list/?history=<?php echo $params[history]; ?>';
	    if(checkbox.checked){
			url += '&range=1';
	    }else{
			url += '&range=0';
	    }
		window.location= url;
	}
	//-->
	</script>
<?php include_once('E:\yyx\runtime/views\./templates/default\footer.php');?>