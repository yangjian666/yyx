<?php include_once('E:\yyx\runtime/views\modules/admin\templates/default\header.php');?>
<div class="KK_ManageList_content">
	<?php include_once('E:\yyx\runtime/views\modules/admin\templates/default\menu.php');?>
    <div class="KK_ManageList_mainRt_side right">
    	<div class="KK_ManageList_mainbox_top"></div>
        <div class="KK_ManageList_mainbox">
        	<div class="KK_ManageList_mainbox_inner">
            	<div class="KK_ManageList_position">当前位置 &gt;&gt; 竞猜管理 &gt;&gt; 修改竞猜点</div>
                <h3>
	                <span class="right" style="margin-right: 15px;">
	                    <a href="<?php echo $index_url; ?>" style="float: right;">返回列表</a>
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
                                    <td class="name"><span class="must">*</span>分类</td>
                                    <td class="cot">
                                    	<select onchange="subCategorySelect(this.value, 'm_cate_id')">
		                               		<option value="0">全部</option>
		                               		<?php foreach($rootCategorys as $category){ ?>
		                               		<option value="<?php echo $category['id']; ?>" <?php if($currentCategory['parent_id'] == $category['id']){ ?>selected<?php } ?>><?php echo $category['name']; ?></option>
		                               		<?php } ?>
		                               	</select>
		                               	<select name="m_cate_id" id="m_cate_id">
		                               		<option value="<?php echo $currentCategory['id']; ?>" ><?php echo $currentCategory['name']; ?></option>
		                               	</select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="name"><span class="must">*</span>标题</td>
                                    <td class="cot"><input type="text" class="txt" name="m_title" value="<?php echo $item['title']; ?>"/></td>
                                </tr>
                                <tr>
                                    <td class="name"><span class="must">*</span>参与截止时间</td>
                                    <td class="cot"><input type="text" class="txt Wdate" name="m_play_deadline"  value="<?php echo $playDeadline; ?>" onClick="WdatePicker({'dateFmt':'yyyy-MM-dd HH:mm' })"/></td>
                                </tr>
                                <tr>
                                    <td class="name">状态</td>
                                    <td class="cot">
                                    	<input type="radio" name="m_status" value="0" <?php if(!$item['status']){ ?>checked<?php } ?>>no
                                    	<input type="radio" name="m_status" value="1"<?php if($item['status']){ ?>checked<?php } ?> >yes
                                    	<span class="input_tip">当参数个数和分类中指定的竞猜点参数个数不同时自动默认为no</span>
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
                                    	<input type="hidden" name="id" value="<?php echo $item['id']; ?>">
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