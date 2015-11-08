<?php include_once('D:\phpStudy\yyx-master\runtime/views\modules/admin\templates/default\header.php');?>
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
            	<div class="KK_ManageList_position">当前位置 &gt;&gt; 竞猜管理 &gt;&gt; 编辑分类玩法</div>
                <h3>
	                <span class="right" style="margin-right: 15px;">
	                    <a href="<?php echo $index_url; ?>" style="float: right;">返回列表</a>
	                </span>
                </h3>
                <form action="<?php echo url("/$currentModule/$currentAction/playWay/") ?>" method="post">
                    <div class="KK_content_list2_con marginTop10">
                        <div class="KK_content_list2_table">
                            <table>
                                <colgroup>
                                    <col style="width:17%;" />
                                    <col style="width:83%;" />
                                </colgroup>
                                <tr>
                                    <td class="name">编辑对象:</td>
                                    <td class="cot">
                                    	<?php echo $item['name']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="name">玩法:</td>
                                    <td class="cot">
                                    <ul id="params">
                                    	<?php foreach($playWays as $playWay){ ?>
                                    	<li>
                                    	<input type="checkbox" name="play_ways[]" value="<?php echo $playWay['id']; ?>" <?php if(in_array($playWay['id'], $item['play_ways'])){ ?>checked<?php } ?>><?php echo $playWay['name']; ?>
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