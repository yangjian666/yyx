<?php include_once('E:\yyx\runtime/views\./templates/default\header.php');?>
<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/My97DatePicker/WdatePicker.js"></script>
	<div class="post_body">
		<div class="caption">自定义竞猜</div>
        <ul class="nav nav-tabs" id="post_tab">
			<li class="active"><a href="/guess/add/custom/">自定义竞猜</a></li>
	        <li><a href="/guess/add/">系统竞猜</a></li>			
        </ul>
        
		<form id="ajaxform" name="ajaxform" action="/guess/add/custom/?inajax=1" method="post"> 
        <div class="tab-content post_list">
	        
			<!-- 自定义竞猜 -->
			<div class="tab-pane active" id="t2">
				<dl class="dl-horizontal">
					<dt>竞猜标题：</dt>
					<dd class="c9">
						<input type="text" class="span4" name="title" value="" /><span class="input_tip">标题不能为空</span>
					</dd>
					<dt>竞猜截止时间：</dt>
					<dd class="c9">
						<?php
						$deadlineFormat = "{'dateFmt':'yyyy-MM-dd HH:mm', 'maxDate':'{$playDeadline }'}";
						?>
						 <input type="text" class="span2 Wdate" name="play_start_time" value="<?php echo date('Y-m-d H:i') ?>" onClick="WdatePicker(<?php echo $deadlineFormat; ?>)"/>&nbsp;-&nbsp;
						 <input type="text" class="span2 Wdate" name="play_deadline" value="<?php echo $recomdedDeadline; ?>" onClick="WdatePicker(<?php echo $deadlineFormat; ?>)"/>
						 <span class="input_tip">最大截止时间为<?php echo $playDeadline; ?></span>
					</dd>
					<dt>下注形式：</dt>
					<dd>
						<?php foreach($customTypes as $type){ ?>
						<label class="radio inline">
							<input type="radio" name="custom_type" value="<?php echo $type['name']; ?>"  onclick="$('#my_custom_type').hide();"/><?php echo $type['name']; ?>
						</label>
						<?php } ?>
						<label class="radio inline">
							<input type="radio" name="custom_type" value="" onclick="$('#my_custom_type').show();"/>自定义
						</label>
						<div id="my_custom_type" style="display:none;">
						<input type="text" class="span2" name="my_custom_type" style="width: 180px;"/><span class="input_tip">最长50个中文</span>
						</div>
					</dd>
					<dt>自定义选项：</dt>
					<dd>
						 <div id="options">
						 	<div><input type="text" class="span3" name="options[]"/> <a href="javascript:;" onclick="deleteOption(this)">删除</a></div>
						 	<div><input type="text" class="span3" name="options[]"/> <a href="javascript:;" onclick="deleteOption(this)">删除</a></div>
						 </div>
						 <a href="javascript:;" onclick="addOption()">添加选项..</a>
					</dd>					
					<dt>竞猜范围：</dt>
					<dd>
						<label class="radio inline">
							<input type="radio" name="play_role" value="0" checked="checked" /> 允许所有会员参与竞猜
						</label>
						<label class="radio inline">
							<input type="radio" name="play_role" value="1" /> 只允许好友参与竞猜
						</label>						
					</dd>
					<dt>邀请好友参与：</dt>
					<dd>
						<label class="radio inline">
							<input type="radio" name="invite_friend" value="1" checked="checked" /> 发送邀请通知
						</label>
						<label class="radio inline">
							<input type="radio" name="invite_friend" value="0" /> 不邀请
						</label>	
					</dd>					
					
					<dt>竞猜说明：</dt>
					<dd>
						<textarea style="width: 380px; height: 100px;" name="summary"></textarea>						
					</dd>
					
					
					<dd class="post_btn" id="playWays">
					<input type="submit" class="btn btn-primary savebtn" value="发布竞猜" onclick="return ajaxPostForm('ajaxform', '', 'postFormHandle', '1000', '__ajaxform')"/>
					<span class="ajaxform_tip" id="__ajaxform"></span>
					</dd>
															
				</dl>
		
	        </div>

        </div>
		</form>
	</div>
	<script>
		function addOption(){
		    var option = '<div><input type="text" class="span3" name="options[]"/> <a href="javascript:;" onclick="deleteOption(this)">删除</a></div>';
		    $('#options').append(option);
		}
		
		function deleteOption(link){
		    $(link).parent().remove();
		}
	</script>
<?php include_once('E:\yyx\runtime/views\./templates/default\footer.php');?>