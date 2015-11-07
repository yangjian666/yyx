<?php include_once('E:\yyx\runtime/views\modules/admin\templates/default\header.php');?>
<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/string.extends.js"></script>
<script type="text/javascript" src="http://yyx.796dice.com:8080/res/js/admin/param.js"></script>
<style>
.param_name{margin-right:10px;  }
#params li{height:30px;  }
</style>
<div class="KK_ManageList_content">
	<?php include_once('E:\yyx\runtime/views\modules/admin\templates/default\menu.php');?>
    <div class="KK_ManageList_mainRt_side right">
    	<div class="KK_ManageList_mainbox_top"></div>
        <div class="KK_ManageList_mainbox">
        	<div class="KK_ManageList_mainbox_inner">
            	<div class="KK_ManageList_position">当前位置 &gt;&gt; 竞猜管理 &gt;&gt; 结果判定</div>
                <h3>
	                <span class="right" style="margin-right: 15px;">
	                    <a href="<?php echo $index_url; ?>" style="float: right;">返回列表</a>
	                </span>
                </h3>
                <form action="<?php echo url("/$currentModule/$currentAction/result/") ?>" method="post" onsubmit="return opConfirm('操作不可恢复，是否继续')">
                    <div class="KK_content_list2_con marginTop10">
                        <div class="KK_content_list2_table">
                            <table>
                                <colgroup>
                                    <col style="width:17%;" />
                                    <col style="width:83%;" />
                                </colgroup>
                                <tr>
                                    <td class="name">说明:</td>
                                    <td class="cot">
                                    	如足球的竞猜参数结果就是两支队伍的比分数,财经和彩票的竞猜参数结果就是开盘号码
                                    </td>
                                </tr>
                                <tr>
                                    <td class="name">判定对象:</td>
                                    <td class="cot">
                                    	<?php echo $item->getTitle(); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="name">结果:</td>
                                    <td class="cot">
                                    <ul id="params">
                                    	<?php foreach($item->getParams() as $param){ ?>
                                    	<li>
                                    	<span class="param_name"><?php echo $param->getLabel(); ?>:</span><input type="text" value="<?php echo $param->getValue(); ?>" class="txt" name="<?php echo $param->getName(); ?>"/>
                                    	</li>
                                    	<?php } ?>
                                    </ul>
                                    </td>
                                </tr>
                            </table>
                            <table>
                                <colgroup>
                                    <col style="width:17%;" />
                                    <col style="width:83%;" />
                                </colgroup>
                                <tr>
                                    <td class="name">&nbsp;</td>
                                    <td class="cot">&nbsp;
                                    	<input type="hidden" name="id" value="<?php echo $item->getId(); ?>" />
                                        <input type="submit"class="btn" value="结果判定"/>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="KK_ManageList_mainbox_bot"></div>
    </div>
    <div class="clear"></div>
</div>
<?php include_once('E:\yyx\runtime/views\modules/admin\templates/default\footer.php');?>