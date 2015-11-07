<div class="KK_ManageList_l_side left">
	<div class="KK_ManageList_menu">
    	<div class="KK_ManageList_menu_top"><h2>功能菜单</h2></div>
        <div class="KK_ManageList_menu_con">
        	<ul class="KK_ManageList_menu_list">
        	<?php foreach($menu_list as $v){ ?>
				<li>
					<dl class="tit" <?php if($v['url']){ ?>style="cursor:pointer;" onclick="window.location.href='<?php echo $v['url']; ?>'"<?php } ?>><?php echo $v[name]; ?></dl>
	                <dl class="submenu">
	                <?php foreach($v[sub] as $_v){ ?>
	                    <dd class="submenu">
	                        <?php if($_v['url']){ ?>
	                        <a href="<?php echo $_v['url']; ?>"><?php echo $_v['name']; ?></a>
	                        <?php }else{ ?>
	                        <?php echo $_v[name]; ?>
	                        <?php } ?>
	                    </dd>
	                <?php } ?>
	                </dl>
                </li>
            <?php } ?>
            </ul>
        </div>
        <div class="KK_ManageList_menu_bot"></div>
    </div>
</div>