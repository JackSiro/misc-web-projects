<?php 
/*
	File: as_content/as_account_signin.php
	Description: page for signing in

*/


	$as_pageinfo = array();	 
	$as_pageinfo['pageTitle'] = 'Login to your Account';
	$database = new As_Dbconn();
	$inloginname = as_post_text('loginname');
	$inloginkey = as_post_text('loginkey');
	$inremember = as_post_text('remember_me');

	if (as_clicked('LetMeIn') && (strlen($inloginname) || strlen($inloginkey)) ) {
		if (strpos($inloginname, '@')!==false) {// handles can't contain @ symbols
			$matchusers=as_db_user_find_by_email($inloginname);
		} else {
			$matchusers=as_db_user_find_by_username($inloginname);
		}
		
		if (count($matchusers)==1) { 
			$inuserid=$matchusers[0];
			if (as_login_user($inuserid, md5($inloginkey))) {
				$as_db_query = "SELECT * FROM as_user WHERE userid='$inuserid'";
				list( $userid, $user_name, $user_fname, $user_lname, $user_sex, $user_password, $user_location, 
					$user_mobile, $user_email, $user_group, $user_level) = $database->get_row( $as_db_query );
				as_set_logged_in_user($userid, $user_name, $user_level);	
				header('Location: '.as_siteUrl.'index'.as_urlExt );
			} else {
				header('Location: '.as_siteUrl.'account/password_wrong'.as_urlExt );	
				//$errors['password']=as_lang('users/password_wrong');
			}
		} else {
			//$errors['emailhandle']=as_lang('users/user_not_found');
			header('Location: '.as_siteUrl.'account/user_not_found'.as_urlExt );
		}
	}
	
	require_once AS_FUNC."as_paging.php";		
	include AS_THEME."as_header.php";
 ?>
<div id="main_content">
    <div class="admin_login">
      <div class="left_box">
        <div class="top_left_box"> </div>
        <div class="center_left_box">
		
		<?php
				if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
								
				foreach($_SESSION['ERRMSG_ARR'] as $msg) {
					echo '<div class="error" id="error">',$msg,'</div>'; 
				}
				unset($_SESSION['ERRMSG_ARR']);
			} 
			?>
          <div class="box_title"><span>User Login</span></div>
		  <form action="<?php echo as_menu_handler('account/login') ?>" method="post" id="login">
          <div class="form">
            <div class="form_row">
              <label class="left">Username or Email: </label>
              <input type="text" name="loginname" class="form_input"/>
            </div>
            <div class="form_row">
              <label class="left">Password: </label>
              <input type="password" name="loginkey" class="form_input"/>
            </div>
            <div style="float:right; padding:10px 25px 0 0;">
              <input type="image" name="LetMeIn"  src="<?php echo as_siteUrl ?>as_themes/images/login.gif"/>
            </div>
          </div>
		  </form>
        </div>
        <div class="bottom_left_box"> </div>
      </div>
    </div>
  </div>

<?php  include AS_THEME."as_footer.php";  ?>