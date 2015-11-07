<?php include_once('E:\yyx\runtime/views\modules/admin\templates/default\header.php');?>
<script>
	function checkForm(form){
		var name = getFormValue(form, 'm_name');
		if(name == null || name == 'undefined' || name == ''){
			alert('名称不能为空');
			return false;
		}
		return true;
	}
</script>
<div class="KK_ManageList_content">
	<?php include_once('E:\yyx\runtime/views\modules/admin\templates/default\menu.php');?>
    <div class="KK_ManageList_mainRt_side right">
    	<div class="KK_ManageList_mainbox_top"></div>
        <div class="KK_ManageList_mainbox">
        	<div class="KK_ManageList_mainbox_inner">
            	<div class="KK_ManageList_position">当前位置 &gt;&gt; 用户管理 &gt;&gt;  修改用户</div>
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
                                    <td class="name"><span class="must">*</span>姓名</td>
                                    <td class="cot">
                                    	<input type="text" class="txt" name="m_name" value="<?php echo $item['name']; ?>" readonly disabled/>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="name">新密码</td>
                                    <td class="cot">
                                    	<input type="text" class="txt" name="new_password" value="" /><span class="input_tip">不修改密码请留空</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="name">手机</td>
                                    <td class="cot">
                                    	<input type="text" class="txt" name="m_mobile" value="<?php echo $item['mobile']; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                 <td class="name">昵名</td>
                                    <td class="cot">
                                    	<input type="text" class="txt" name="m_nickname" value="<?php echo $item['nickname']; ?>" />
                                    </td>
                                </tr>
                                 <tr>
                                 <td class="name">居住地址</td>
                                    <td class="cot">
                                    	<input type="text" class="txt" name="m_address" value="<?php echo $item['address']; ?>" />
                                    </td>
                                </tr>
                                 <tr>
                                 <td class="name">可用金币</td>
                                    <td class="cot">
                                    	<input type="text" class="txt" name="m_available_money" value="<?php echo $item['available_money']; ?>" />
                                    </td>
                                </tr>
                                 <tr>
                                 <td class="name">可用积分</td>
                                    <td class="cot">
                                    	<input type="text" class="txt" name="m_available_integral" value="<?php echo $item['available_integral']; ?>" />
                                    </td>
                                </tr>
                                 <tr>
                                 <td class="name">查看次数</td>
                                    <td class="cot">
                                    	<input type="text" class="txt" name="m_views" value="<?php echo $item['views']; ?>" />
                                    </td>
                                </tr>
                                 <tr>
                                 <td class="name">庄家级别</td>
                                    <td class="cot">
                                    	<input type="text" class="txt" name="m_makers_level" value="<?php echo $item['makers_level']; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                	<td class="name">允许登陆</td>
                                    <td class="cot">
                                    	<input type="radio" name="m_allow_login" value="0" <?php if(!$item['allow_login']){ ?>checked<?php } ?>>否
                                    	<input type="radio" name="m_allow_login" value="1" <?php if($item['allow_login']){ ?>checked<?php } ?>>是
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