<?php include_once('E:\yyx\runtime/views\modules/admin\templates/default\header.php');?>

<div class="KK_ManageList_content">
    <?php include_once('E:\yyx\runtime/views\modules/admin\templates/default\menu.php');?>
    <div class="KK_ManageList_mainRt_side right">
        <div class="KK_ManageList_mainbox_top"></div>
        <div class="KK_ManageList_mainbox">
            <div class="KK_ManageList_mainbox_inner">
                <div class="KK_ManageList_position">当前位置&gt;&gt; 系统管理 &gt;&gt; 系统设置</div>
                <div class="KK_content_list2_tab">
                    <ul class="tab">
                        <?php foreach($tab_list as $key=>$val){ ?>
                        <li id="tabone<?php echo $key; ?>" onmouseover="setTab('tabone',<?php echo $key; ?>,<?php echo $tab_num; ?>);" <?php if($key == 1){ ?>class="hover"<?php } ?>><?php echo get_lang($val.'_tab_config') ?></li>
                        <?php } ?>
                    </ul>
                </div>
                <form action="<?php echo $update_url; ?>" method="post" onsubmit="return checkForm(this);" enctype="multipart/form-data">
                    <div class="KK_content_list2_con marginTop10">
                        <div class="KK_content_list2_table">
                            <?php foreach($tab_list as $key1=>$val1){ ?>
                                <div id="con_tabone_<?php echo $key1; ?>" <?php if($key1 == 1){ ?>class="hover"<?php }else{ ?>style="display:none;"<?php } ?>>
                                    <table>
                                        <colgroup>
                                            <col style="width:17%;" />
                                            <col style="width:83%;" />
                                        </colgroup>
                                        <?php foreach($info as $key=>$val){ ?>
                                            <?php if($val['tab'] == $val1){ ?>
                                                <tr <?php if($val['type'] == 'hidden'){ ?> style="display:none;"<?php } ?>>
                                                    <td class="name"><?php echo get_lang($val['key'].'_config') ?></td>
                                                    <td class="cot">
                                                        <?php if($val['type'] == 'text'){ ?>
                                                            <input class="txt" type="text" name="config[<?php echo $val['id']; ?>]" value="<?php echo $val['value']; ?>" style="width:300px;" />
                                                        <?php }elseif($val['type'] == 'password'){ ?>
                                                            <input class="txt" type="password" name="config[<?php echo $val['id']; ?>]" value="<?php echo $val['value']; ?>" style="width:300px;" />
                                                        <?php }elseif($val['type'] == 'hidden'){ ?>
                                                            <input type="hidden" name="config[<?php echo $val['id']; ?>]" value="<?php echo $val['value']; ?>" />
                                                        <?php }elseif($val['type'] == 'textarea'){ ?>
                                                            <textarea name="config[<?php echo $val['id']; ?>]" cols="50" rows="5"><?php echo $val['value']; ?></textarea>
                                                        <?php }elseif($val['type'] == 'select'){ ?>
                                                            <select name="config[<?php echo $val['id']; ?>]">
                                                                <?php foreach($val['options'] as $key2=>$val2){ ?>
                                                                <option value="<?php echo $val2; ?>" <?php if($val2==$val['value']){ ?>selected="selected"<?php } ?>><?php echo $val2; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        <?php }elseif($val['type'] == 'radio'){ ?>
                                                            <?php foreach($val['options'] as $radioK=>$radioV){ ?>
                                                            <input name="config[<?php echo $val['id']; ?>]" type="radio" value="<?php echo $radioV[val]; ?>" <?php if($radioV[val]==$val['value']){ ?>checked="checked"<?php } ?>><?php echo $radioV[text]; ?></input>
                                                            <?php } ?>
                                                        <?php }elseif($val['type'] == 'checkbox'){ ?>
                                                            <input type="hidden" name="config[<?php echo $val['id']; ?>][]" value="" />
                                                            <?php foreach($val['value'] as $chbK=>$chbV){ ?>
                                                            <input name="config[<?php echo $val['id']; ?>][]" type="checkbox" value="<?php echo $chbV[val]; ?>"<?php if(in_array($chbV[val], $val[valuearr])){ ?> checked="checked"<?php } ?>><?php echo $chbV[text]; ?></input>
                                                            <?php } ?>
                                                        <?php }elseif($val['type'] == 'editor'){ ?>
                                                            <textarea name="config[<?php echo $val[id]; ?>]" id="<?php echo $val[id]; ?>" style="width:500px; height:400px;"><?php echo $val['value']; ?></textarea>
                                                            <script src="<?php echo get_config('site_url')?>/res/js/kindeditor/kindeditor-min.js"></script>
                                                            <script type="text/javascript">
                                                                var editor;
                                                                var uploadUrl = '/upload/index/index/admin-1'.shtml;
                                                                var editorID = "<?php echo $val[id]; ?>";
                                                                KindEditor.ready(function(K) {
                                                                    editor = K.create('#'+editorID, {
                                                                        uploadJson: uploadUrl
                                                                    });
                                                                });
                                                            </script>
                                                        <?php }elseif($val['type'] == 'file'){ ?>
                                                            <?php if($val['value']){ ?>
                                                                <div><img src="<?php echo get_config('upload_save_url')?><?php echo $val[value]; ?>" /></div>
                                                            <?php } ?>
                                                            <input type="file" name="<?php echo $val[parent_tab]; ?>_<?php echo $val[key]; ?>" />
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        <?php } ?>
                                    </table>
                                    <table>
                                        <colgroup>
                                            <col style="width:17%;" />
                                            <col style="width:83%;" />
                                        </colgroup>
                                        <tr>
                                            <td class="name">&nbsp;</td>
                                            <td class="cot">&nbsp;
                                                <input type="submit" class="btn" value="保  存"/>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            <?php } ?>
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
