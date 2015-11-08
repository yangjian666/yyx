<?php include_once('D:\phpStudy\yyx-master\runtime/views\modules/admin\templates/default\header.php');?>
<script type="text/javascript" src="http://www.yyx-test.com//res/js/string.extends.js"></script>
<script type="text/javascript" src="http://www.yyx-test.com//res/js/admin/param.js"></script>
<style>
.param_name{margin-right:10px;  }
#params li{height:30px;  }
</style>
<div class="KK_ManageList_content">
	<?php include_once('D:\phpStudy\yyx-master\runtime/views\modules/admin\templates/default\menu.php');?>
    <div class="KK_ManageList_mainRt_side right">
    	<div class="KK_ManageList_mainbox_top"></div>
        <div class="KK_ManageList_mainbox">
        	<div class="KK_ManageList_mainbox_inner">
            	<div class="KK_ManageList_position">当前位置 &gt;&gt; 竞猜管理 &gt;&gt; 编辑参数</div>
                <h3>
	                <span class="right" style="margin-right: 15px;">
	                    <a href="<?php echo $index_url; ?>" style="float: right;">返回列表</a>
	                </span>
                </h3>
                <form action="<?php echo url("/$currentModule/$currentAction/param/") ?>" method="post">
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
                                    	竞猜点的参数通常是被竞猜对象，如足球的竞猜参数就是两支队伍,财经和彩票的竞猜参数就是开盘号码
                                    </td>
                                </tr>
                                <tr>
                                    <td class="name">编辑对象:</td>
                                    <td class="cot">
                                    	<?php echo $item['title']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="name">参数:</td>
                                    <td class="cot">
                                    <p><a href="javascript:;" onclick="ParamUtil.addParam()" style="float:right; margin-right:15px;">添加参数</a></p>
                                    <ul id="params">
                                    	<?php foreach($item['params'] as $param){ ?>
                                    	<li>
                                    	<input name="params[]" class="txt" value="<?php echo $param->getLabel(); ?>"/>
                                    	<a href="javascript:;" onclick="ParamUtil.deleteParam(this)">删除</a>
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
                                    	<input type="hidden" name="id" value="<?php echo $item['id']; ?>" />
                                        <input type="submit"class="btn" value="保  存"/>
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
<?php include_once('D:\phpStudy\yyx-master\runtime/views\modules/admin\templates/default\footer.php');?>