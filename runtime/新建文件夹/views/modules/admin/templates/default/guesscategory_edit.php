<?php include_once('E:\yyx\runtime/views\modules/admin\templates/default\header.php');?>
<div class="KK_ManageList_content">
	<?php include_once('E:\yyx\runtime/views\modules/admin\templates/default\menu.php');?>
    <div class="KK_ManageList_mainRt_side right">
    	<div class="KK_ManageList_mainbox_top"></div>
        <div class="KK_ManageList_mainbox">
        	<div class="KK_ManageList_mainbox_inner">
            	<div class="KK_ManageList_position">当前位置 &gt;&gt; 竞猜管理 &gt;&gt; 修改竞猜分类</div>
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
                                    <td class="name">上级分类</td>
                                    <td class="cot">
                                        <select name='m_parent_id' id='' class=''><option value=''>请选择</option><?php foreach($parents as $option){echo "<option value='$option[id]' ";if($option[id] == $item[parent_id])echo 'selected=selected';echo ">$option[name]</option>";} ?></select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="name"><span class="must">*</span>分类名称</td>
                                    <td class="cot"><input type="text" class="txt" name="m_name" value="<?php echo $item['name']; ?>"/></td>
                                </tr>
                                <tr>
                                    <td class="name"><span class="must">*</span>竞猜点参数个数</td>
                                    <td class="cot"><input type="text" class="txt" name="m_parameter_count" value="<?php echo $item['parameter_count']; ?>" /></td>
                                </tr>
                                <tr>
                                    <td class="name">启用状态</td>
                                    <td class="cot">
                                        <input class="rad" type="radio" name="m_status" value="1" <?php if($item['status']){ ?>checked<?php } ?>  />yes
                                        <input class="rad" type="radio" name="m_status" value="0" <?php if(!$item['status']){ ?>checked<?php } ?> />no
                                    </td>
                                </tr>
                                 <tr>
                                    <td class="name">固定赔率状态</td>
                                    <td class="cot">
                                        <input class="rad" type="radio" name="m_fixed_odds" value="1" <?php if($item['fixed_odds']){ ?>checked<?php } ?> />yes
                                        <input class="rad" type="radio" name="m_fixed_odds" value="0" <?php if(!$item['fixed_odds']){ ?>checked<?php } ?>/>no
                                    </td>
                                </tr>
                                 <tr>
                                    <td class="name">浮动赔率状态</td>
                                    <td class="cot">
                                        <input class="rad" type="radio" name="m_float_odds" value="1" <?php if($item['float_odds']){ ?>checked<?php } ?> />yes
                                        <input class="rad" type="radio" name="m_float_odds" value="0" <?php if(!$item['float_odds']){ ?>checked<?php } ?>/>no
                                    </td>
                                </tr>
                                <tr>
                                    <td class="name">排序</td>
                                    <td class="cot"><input type="text" class="txt" name="m_sort_num" value="<?php echo $item['sort_num']; ?>" /></td>
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