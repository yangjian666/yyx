<?php include_once('E:\yyx\runtime/views\./templates/default\header.php');?>
<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/guess.js"></script>
<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/json2.js"></script>
<style>
<!--
	select{margin-bottom: 0px; }
-->
</style>
	<div class="post_body">
		<div class="caption">系统竞猜</div>
        <ul class="nav nav-tabs" id="post_tab">
			<li><a href="/guess/add/custom/">自定义竞猜</a></li>
	        <li class="active"><a href="/guess/add/">系统竞猜</a></li>			
        </ul>
        
		<form id="ajaxform" name="ajaxform" action="/guess/add/?inajax=1" method="post"> 
        <div class="tab-content post_list">
	        
			<!-- 发布竞猜 -->
			<div class="tab-pane active" id="t1">
				<dl class="dl-horizontal">
					<dt>竞猜点：</dt>
					<dd class="c9" id="selects">
						<select class="span2" id="cateid" name="cateid" onchange="subCategorySelect(this.value, 'sub_cateid', '请选择小分类')">
							<option value="">请选择大分类</option>
							<?php foreach($rootCategorys as $category){ ?>
                            <option value="<?php echo $category['id']; ?>" <?php if($cateid == $category['id']){ ?>selected<?php } ?>><?php echo $category['name']; ?></option>
                            <?php } ?>
						</select>
						<select style="display:none;" class="span2" name="sub_cateid" id="sub_cateid" onchange="guessPointSelect(this.value, 'guess_point_id')">
							<option value="">请选择小分类</option>
                            <?php foreach($subCategorys as $category){ ?>
                            <option value="<?php echo $category['id']; ?>" <?php if($sub_cateid == $category['id']){ ?>selected<?php } ?>><?php echo $category['name']; ?></option>
                            <?php } ?>
						</select>
						<select  style="display:none;" class="span4" name="guess_point_id" id="guess_point_id" onchange="guessPointSelected(this.value)">
							<option value="">请选择竞猜点</option>
						</select>
						&nbsp;<a href="javascript:;" style="display:none;" id="load_template_button" class="btn" onclick="loadGuessAddTemplate()">确定并加载模板</a>
					</dd>
					</dl>
					<dl class="dl-horizontal" id="guess_add_template">
					
					</dl>
	        </div>
			
        </div>
		</form>
	</div>
	
	<!-- 添加玩法 -->
<?php include_once('E:\yyx\runtime/views\./templates/default\footer.php');?>