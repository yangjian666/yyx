<?php include_once('E:\yyx\runtime/views\./templates/default\header.php');?>
	
	<div class="user_body">
		<div class="searcharea">
			<form method="GET" action="/member/list/">
				<label for="name">用户名:</label>
				<input type="text" name="name" id="name" class="span2" value="" />
				&nbsp;&nbsp;
				<label for="sex">性别:</label>
				<select name="sex" style="width: 100px;">
					<option value="all">不限</option>
					<option value="1">男</option>
					<option value="2">女</option>
				</select>
				&nbsp;&nbsp;
				<label for="province">地区:</label>
				<select name="province" onchange="if(this.value=='all'){$('#select_city').hide();  }else{getCitySelect(this.value, 'select_city', 1) }" style="width:160px;">
					<option value="all">全部</option>
					<?php foreach($province_arr as $pro){ ?>
						<option value="<?php echo $pro[name]; ?>" <?php echo $sel; ?>><?php echo $pro[name]; ?></option>							
					<?php } ?>
				</select>
				<select name="city" id="select_city" style="width:160px;display:none;">
				</select>
				&nbsp;&nbsp;
				<input type="submit" value="搜索" class="btn" style="margin-bottom: 10px;"/>				
			</form>
		</div>	
		
		<div class="caption">好友列表</div>
        <ul class="nav nav-tabs" id="user_tab">
			<li><a href="/member/list/t-3.shtml">金币排行</a></li>
			<li><a href="/member/list/t-2.shtml">积分排行</a></li>
			<li><a href="/member/list/t-1.shtml">胜率排行</a></li>
			<li class="active"><a href="/member/friend/">我的好友</a></li>
	        <li><a href="/member/list/">全部用户</a></li>						
        </ul>
        
        <div class="tab-content user_list">
	        
			<!-- 全部 -->
			<div class="tab-pane active" id="t1">
				<?php if($items){ ?>
				<?php $index = ($page-1)*$perpage; ?>
				<?php foreach($items as $item){ ?>
				<?php $index++ ?>
				<div class="useritem" id="item_follow_cancel_<?php echo $item[id]; ?>">
					<div class="s1"><?php echo $index; ?></div>
					<div class="userface"><a href="<?php echo url("/member/space/?uid=$item[id]") ?>"><img src="<?php echo $item['avatar']; ?>" /></a></div>
					<div class="username">
						<a href="<?php echo url("/member/space/?uid=$item[id]") ?>"><?php echo $item['name']; ?></a>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<span><?php if($item['sex'] == 1){ ?> 男 <?php }elseif($item['sex'] == 2){ ?> 女 <?php } ?></span>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<span><?php echo $item[province]; ?>&nbsp;<?php echo $item[city]; ?></span>
					</div>
					<div class="userinfo">
						<p>积分：<span class="c"><?php echo $item['available_integral']; ?></span></p>
						<p>金币：<span class="m"><?php echo $item['available_money']; ?></span></p>
						<p>竞猜：<?php echo $item['guess_count']; ?> 场</p>
						<p>成功率：<?php echo $item['accuracy']; ?>% 胜率</p>	
					</div>
					<div class="operbtn">
						<a href="/member/friend/cancel/?uid=<?php echo $item[id]; ?>" class="btn" onclick="ajaxmenu(event, this.id, 1, 2000, 'ajaxMenuDelete')" id="follow_cancel_<?php echo $item[id]; ?>" >取消好友</a>
					</div>
				</div>
				<?php } ?>
				<?php }else{ ?>
					<div style="text-align: center; font-size: 14px; padding: 20px;">
						暂无好友信息
					</div>
				<?php } ?>
				
				<?php echo $pages; ?>
	        </div>
        </div>
	</div>
<?php include_once('E:\yyx\runtime/views\./templates/default\footer.php');?>