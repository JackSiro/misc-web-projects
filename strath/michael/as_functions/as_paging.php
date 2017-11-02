<?php	
/*
	File: as_functions/as_paging.php
	Description: declaration of variables and functions that manage a page request

*/

	$pageTitle = (isset( $as_pageinfo['pageTitle'] ) ? $as_pageinfo['pageTitle'] : "")." - ".as_siteTitle;
	$pageAdminTitle = (isset( $as_pageinfo['pageTitle'] ) ? $as_pageinfo['pageTitle'] : "")." - ".as_siteTitle." | Admin";
	$pageAction = isset( $as_pageinfo['pageAction'] ) ? $as_pageinfo['pageAction'] : "Home";
    $pageKeywords = isset( $as_pageinfo['siteKeywords'] ) ? $as_pageinfo['siteKeywords'] : as_get_option('as_keywords');
    $pageDescription = isset( $as_pageinfo['siteDescription'] ) ? $as_pageinfo['siteDescription'] : as_get_option('as_description');
    $as_loginid = isset( $_SESSION['siteuser_userid'] ) ? $_SESSION['siteuser_userid'] : "";
	$as_level = isset( $_SESSION['siteuser_userid'] ) ? $_SESSION['siteuser_userid'] : "";
	
    $as_db_query = "SELECT * FROM as_user WHERE userid='$as_loginid'";
	//new instance of database class
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $userid, $user_name, $user_fname, $user_lname, $user_sex, $user_password, $user_mobile, $user_email, $user_group, $user_level, $user_avatar, $user_joined, $user_lastseen, $user_updated) = $database->get_row( $as_db_query );
	} else  {
		return false;
	}
	
	function as_error_message()
	{
		if( isset($_SESSION['AS_ERRMSG_ARR']) && is_array($_SESSION['AS_ERRMSG_ARR']) && count($_SESSION['AS_ERRMSG_ARR']) >0 ) { ?>
		<div class="col-error panel panel-default">
			<ul class="panel-body as_list">							
			<?php foreach($_SESSION['AS_ERRMSG_ARR'] as $as_error_msg) { ?>
				<li class="as_error" id="as_error"><?php echo $as_error_msg ?></li>
			<?php } ?>
			</ul>
		  </div>
		<?php unset($_SESSION['AS_ERRMSG_ARR']); 
		}
	}
	
	function as_success_message()
	{
		if( isset($_SESSION['AS_SUCCMSG_ARR']) && is_array($_SESSION['AS_SUCCMSG_ARR']) && count($_SESSION['AS_SUCCMSG_ARR']) >0 ) { ?>
		<div class="col-success panel panel-default">
			<ul class="panel-body as_list">							
			<?php foreach($_SESSION['AS_SUCCMSG_ARR'] as $as_succ_msg) { ?>
				<li class="as_success" id="as_success"><?php echo $as_succ_msg ?></li>
			<?php } ?>
			</ul>
		  </div>
		<?php unset($_SESSION['AS_SUCCMSG_ARR']); 
		}
	}
?>