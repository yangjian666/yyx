<?php include_once('E:\yyx\runtime/views\modules/admin\templates/default\header.php');?>
<div class="KK_ManageList_content">
	<?php include_once('E:\yyx\runtime/views\modules/admin\templates/default\menu.php');?>
    <div class="KK_ManageList_mainRt_side right">
    	<div class="KK_ManageList_mainbox_top"></div>
        <div class="KK_ManageList_mainbox">
        	<div class="KK_ManageList_mainbox_inner">
            	<div class="KK_ManageList_position">当前位置 &gt;&gt; 竞猜管理 &gt;&gt; 修改玩法</div>
                <h3>
	                <span class="right" style="margin-right: 15px;">
	                    <a href="<?php echo $index_url; ?>" style="float: right;">竞猜分类列表</a>
	                </span>
                </h3>
                <form action="<?php echo $update_url; ?>" method="post" onsubmit="return checkForm(this);">
                    <div class="KK_content_list2_con marginTop10">
                        <div class="KK_content_list2_table">
                            <table>
                                <colgroup>
                                    <col style="width:17%;" />
                                    <col style="width:83%;" />
                                </colgroup>
                                <tr>
                                    <td class="name"><span class="must">*</span>玩法名称</td>
                                    <td class="cot"><input type="text" class="txt" name="m_name" value="<?php echo $item['name']; ?>"/></td>
                                </tr>
                                 <tr>
                                    <td class="name">玩法说明资讯ID</td>
                                    <td class="cot"><input type="text" class="txt" name="m_news_id" value="<?php echo $item['news_id']; ?>"/></td>
                                </tr>
                                <tr>
                                    <td class="name">玩法简介</td>
                                    <td class="cot">
                                        <textarea rows="5" cols="31" name="m_summary"><?php echo $item['summary']; ?></textarea>
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
                                    <td class="cot">
                                        <input type="hidden" name="id" value="<?php echo $item[id]; ?>" />
                                        <input type="hidden" name="old_class" value="<?php echo $item['class']; ?>" />
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