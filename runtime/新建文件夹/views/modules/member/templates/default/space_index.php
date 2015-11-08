<?php include_once('E:\yyx\runtime/views\./templates/default\header.php');?>
	<div class="home_body">
		<?php include_once('E:\yyx\runtime/views\modules/member\templates/default\space_user_info_box.php');?>
		
		<div class="left">
	        <ul class="nav nav-tabs" id="home_tab">
	        	<li class="active"><a href="<?php echo url("/member/space/guess/?uid={$user->getId()}") ?>">他的竞猜</a></li>
	        </ul>
			
			<?php include_once('E:\yyx\runtime/views\modules/member\templates/default\space_guess_box.php');?>
		</div>
		
		<div class="right">
			<div class="ulist" style="border: 0px;">
				<div class="title" style="border-radius: 0px;" >他的好友</div>
					<?php include_once('E:\yyx\runtime/views\./templates/default\users_list_box.php');?>		
			</div>
		</div>
		
		<div class="clear"></div>
	</div>
<?php include_once('E:\yyx\runtime/views\./templates/default\footer.php');?>