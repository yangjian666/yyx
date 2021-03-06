<form id="playWayForm">
<h1>编辑[<?php echo $playWay->getName(); ?>]玩法</h1>
<a href="javascript:hideMenu();" title="关闭" class="float_del">关闭</a>
<div class="popupmenu_inner" id="wfModal" style="padding:20px;width:450px;">

		<div class="modal-body" style="padding-left: 20px;max-height: 1000px;">
			<div class="control-group">
				<dl class="dl-horizontal" style="margin-top: 0px;">
				<dt>选择赔率：</dt>
				<dd class="c9">
					<input type="hidden" name="id" value="<?php echo $playWay->getId(); ?>">
					<input type="hidden" name="name" value="<?php echo $playWay->getName(); ?>">
					<?php if($category['float_odds']){ ?>
					<label class="radio inline">
						<input type="radio" id="oddsType_<?php echo Guess::ODDS_TYPE_FLOAT ?>" name="oddsType" value="<?php echo Guess::ODDS_TYPE_FLOAT ?>" <?php if($category['float_odds']){ ?>checked="checked"<?php } ?> onclick="show('float_param',true, 0);show('fix_param',false, 0);"/> 浮动赔率
					</label>
					<?php } ?>
					<?php if($category['fixed_odds']){ ?>
					<label class="radio inline">
						<input type="radio"id="oddsType_<?php echo Guess::ODDS_TYPE_FIXED ?>"  name="oddsType" value="<?php echo Guess::ODDS_TYPE_FIXED ?>" <?php if(!$category['float_odds']){ ?>checked="checked"<?php } ?> onclick="show('float_param',false, 0);show('fix_param',true, 0);" /> 固定赔率
					</label>		
					<?php } ?>				
				</dd>
				<?php if($category['float_odds']){ ?>
				<div id="float_param" <?php if($category['float_odds']){ ?>style="display:block"<?php }else{ ?>style="display: none;"<?php } ?>>
					<dt>浮动比率：</dt>
					<dd class="c9">
						<select name="floatPercent" id="floatPercent">
						<option id="floatPercent_0_9" value="0.9">90%</option>
						<option id="floatPercent_0_8" value="0.8">80%</option>
						<option id="floatPercent_0_7" value="0.7">70%</option>
						</select>
					</dd>
					<dt>投注上限：</dt>
					<dd class="c9">
						<input type="text" id="floatBettingUpperLimit" name="floatBettingUpperLimit" class="span2" value="0"/> <span class="input_tip">0为不限</span>
					</dd>
					<dt>投注下限：</dt>
					<dd class="c9">
						<input type="text" id="floatBettingLowerLimit" name="floatBettingLowerLimit" class="span2" value="0"/> <span class="input_tip">0为不限</span>
					</dd>
					<dt>浮动赔率公式：</dt>
					<dd class="c9">
						选项浮动赔率＝(总投注额-选项投注额)*浮动比率/选项投注总额
					</dd>
				</div>
				<?php } ?>
				<?php if($category['fixed_odds']){ ?>
				<div id="fix_param" <?php if(!$category['float_odds']){ ?>style="display:block"<?php }else{ ?>style="display: none;"<?php } ?>>
					<table class="table">
						<thead>
							<tr><th>结果</th><th>赔率<span style="font-size:12;color:#aaa">(支持2位小数)</span></th></tr>
						</thead>
						<tbody>
						<?php if($parameter){ ?>
						<?php foreach($parameter->getOptions() as $option){ ?>
							<tr><td><?php echo $option->getLabel(); ?></td><td><input name="<?php echo $option->getValue(); ?>" id="odds_<?php echo $option->getValue(); ?>" value="1" type="text" class="odds span1 mb0" /></td></tr>
						<?php } ?>
						<?php } ?>
						</tbody>
					</table>
					
					<dt>投注上限：</dt>
					<dd class="c9">
						<input type="text" id="fixedBettingUpperLimit" name="fixedBettingUpperLimit" class="span2" value="10"/> <span class="input_tip">不能为空，至少为1</span>
					</dd>
					<dt>竞猜人数上限：</dt>
					<dd class="c9">
						<input type="text" id="playCountLimit" name="playCountLimit" class="span2" value="10"/> <span class="input_tip">不能为空，至少为1</span>
					</dd>
					<dt>托管额度公式：</dt>
					<dd class="c9">
						托管额度 = 竞猜人数上限*投注上限*最大赔率
					</dd>					
				</div>
				<?php } ?>
				</dl>

			</div>
		</div>
		

</div>
<div class="modal-footer">
	<span class="ajaxform_tip" id="error"></span>
	<input type="button" class="btn btn-primary submit" value="确定" onclick="GuessAddHelper.collectPlayWayDataAndAdd()"/>
</div>
</form>	