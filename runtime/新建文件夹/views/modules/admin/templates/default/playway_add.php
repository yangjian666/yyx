<?php include_once('E:\yyx\runtime/views\modules/admin\templates/default\header.php');?>
<div class="KK_ManageList_content">
	<?php include_once('E:\yyx\runtime/views\modules/admin\templates/default\menu.php');?>
    <div class="KK_ManageList_mainRt_side right">
    	<div class="KK_ManageList_mainbox_top"></div>
        <div class="KK_ManageList_mainbox">
        	<div class="KK_ManageList_mainbox_inner">
            	<div class="KK_ManageList_position">当前位置 &gt;&gt; 竞猜管理 &gt;&gt; 添加玩法</div>
                <h3>
	                <span class="right" style="margin-right: 15px;">
	                    <a href="<?php echo $index_url; ?>" style="float: right;">返回列表</a>
	                </span>
                </h3>
                <form action="<?php echo $insert_url; ?>" method="post" onsubmit="return checkForm(this);" enctype="multipart/form-data">
                    <div class="KK_content_list2_con marginTop10">
                        <div class="KK_content_list2_table">
                            <table>
                                <colgroup>
                                    <col style="width:17%;" />
                                    <col style="width:83%;" />
                                </colgroup>
                                <tr>
                                	<td class="name">添加说明</td>
                                    <td class="cot">上传的玩法插件到网站根目录下的/playways/目录，必须确保目录有写权限</td>
                                </tr>
                                <tr>
                                    <td class="name"><span class="must">*</span>玩法插件压缩包</td>
                                    <td class="cot">
                                    <input type="file" id="playway" name="playway" /> <span id="input_tip">只支持格式为zip的压缩包</span>
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
<?php include_once('E:\yyx\runtime/views\modules/admin\templates/default\footer.php');?>