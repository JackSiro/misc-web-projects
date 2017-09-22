<?php
	session_start();
	require( 'js_config.php' );
	include JS_FUNC.'js_dbconn.php';
	require JS_FUNC.'js_base.php';
	include JS_FUNC.'js_options.php';
	include JS_FUNC.'js_paging.php';
	include JS_FUNC.'js_posting.php';
	include JS_FUNC.'js_users.php';
 	
 	$js_loginid = isset( $_SESSION['username_loggedin'] ) ? $_SESSION['username_loggedin'] : "";
	
	$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
	$myaccount = isset( $_SESSION['account'] ) ? $_SESSION['account'] : "";
	
	if ( $action != "login" && $action != "logout" && $action != "register" 
			&& $action != "forgot_password" && $action != "recover_password"
			&& $action != "forgot_username" && $action != "recover_username"
			&& $action != "logout" && !$js_loginid ) {
			
			js_signin();
	   exit;
	} 
      
switch ( $action ) {
	case 'login': js_signin();
		break;
	case 'register': register();
		break;
	case 'forgot_password': forgot_password();
		break;
	case 'recover_password': recover_password();
		break;
	case 'forgot_username': forgot_username();
		break;
	case 'recover_username': recover_username();
		break;
	case 'logout': logout();
		break;
	case 'categories':  categories();
		break;
	case 'newcat': 
		if ($myaccount != "student") newcat();
		else dashboard();
		break;
	case 'viewcat': 
		if ($myaccount != "student") viewcat();
		else dashboard();
		break;
	case 'elibrary': elibrary();
		break;
	case 'search': search();
		break;
	case 'newitem':  
		if ($myaccount != "student") newitem();
		else dashboard();
		break;
	case 'viewitem': viewitem();
		break;
	case 'edititem':  
		if ($myaccount != "student") edititem();
		else dashboard();
		break;
	case 'deleteitem':  
		if ($myaccount != "student") deleteitem();
		else dashboard();
		break;
	case 'users': users();
		break;
	case 'newuser':  
		if ($myaccount != "student") newuser();
		else dashboard();
		break;
	case 'viewuser': viewuser();
		break;
	case 'profile': 
		if ($myaccount) profile();
		else dashboard();
		break;
	case 'options':  
		if ($myaccount != "student") options();
		else dashboard();
		break;  
    default:
		dashboard();
}

function js_signin() {

		$results = array();
		$results['pageTitle'] = "KTTC ELibrary Catalogue Management System"; 
		$results['pageAction'] = "Sign In";
		
		if ( isset( $_POST['SignMeIn'] ) ) {
		$loginname = $_POST['username'];
		$loginkey = md5($_POST['password']);
		
            if (js_let_me_user($loginname, $loginkey)){
			$_SESSION['username_loggedin'] = js_let_me_user($loginname, $loginkey);
			$_SESSION['account'] = js_logged_account($loginname);
			header( "Location: index.php" );
			
		}   else {
			
            require( JS_INC."js_signin.php" );
	    }
	
	  } else {
	
	    require( JS_INC."js_signin.php" );
 	 }

	}
	
function register() {
	$results = array();
	$results['pageTitle'] = "KTTC ELibrary Catalogue Management System";
	$results['pageAction'] = "Register"; 
	
	if ( isset( $_POST['Register'] ) ) {
		js_register_me();
		header( "Location: index.php");		
	}  else {
		require( JS_INC . "js_register.php" );
	}	
	
}

  function forgot_username() {
	$results = array();
	$results['pageTitle'] = "KTTC ELibrary Catalogue Management System";
	$results['pageAction'] = "ForgotUsername"; 
	
	if ( isset( $_POST['ForgotUsername'] ) ) {
		$email = $_POST['username'];
		$password = md5($_POST['password']);
		js_recover_username($email, $password);
		header( "Location: index.php?action=recovered_username");		
	}  else {
		require( JS_INC . "js_forgot_username.php" );
	}	
}

  function forgot_password() {
	$results = array();
	$results['pageTitle'] = "KTTC ELibrary Catalogue Management System";
	$results['pageAction'] = "ForgotPassword"; 
	
	if ( isset( $_POST['ForgotPassword'] ) ) {
		$username = $_POST['username'];
		$email = $_POST['email'];
		js_recover_password($username, $email);
		header( "Location: index.php?action=recover_password");		
	}  else {
		require( JS_INC . "js_forgot_password.php" );
	}	
	
}

function recover_username() {
	$results = array();
	$results['pageTitle'] = "KTTC ELibrary Catalogue Management System";
	$results['pageAction'] = "RecoveredUsername"; 
	require( JS_INC . "js_recover_username.php" );
	
}

function recover_password() {
	$results = array();
	$results['pageTitle'] = "KTTC ELibrary Catalogue Management System";
	$results['pageAction'] = "RecoveredPassword"; 
	
	if ( isset( $_POST['RecoverPassword'] ) ) {
		$username = $_POST['username'];
		$password = md5($_POST['passwordcon']);
		js_change_password($username);
		header( "Location: index.php");		
	}  else {
		require( JS_INC . "js_recover_password.php" );
	}
}

function dashboard() {
	$results = array();
	$results['pageTitle'] = "KTTC ELibrary Catalogue Management System";
	$results['pageAction'] = "Dashboard";  
	require( JS_INC . "js_dashboard.php" );
}

function categories() {
	$results = array();
	$results['pageTitle'] = "KTTC ELibrary Catalogue Management System";
	$results['pageAction'] = "Categories";  
	require( JS_INC . "js_categories.php" );
}

function newcat() {
	$results = array();
	$results['pageTitle'] = "KTTC ELibrary Catalogue Management System";
	$results['pageAction'] = "Newcat"; 
	
	if ( isset( $_POST['AddCart'] ) ) {
		js_add_new_category();
		header( "Location: index.php?action=newcat");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		js_add_new_category();
		header( "Location: index.php?action=categories");						
	}  else {
		require( JS_INC . "js_newcat.php" );
	}	
	
}

function viewcat() {
	$results = array();
	$results['pageTitle'] = "KTTC ELibrary Catalogue Management System";
	$results['pageAction'] = "Viewcat"; 
	$js_catid = isset( $_GET['js_catid'] ) ? $_GET['js_catid'] : "";
	
	$js_db_query = "SELECT * FROM js_category WHERE catid = '$js_catid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $catid, $cat_slug) = $database->get_row( $js_db_query );
		$results['category'] = $catid;
	} else  {
		return false;
		header( "Location: index.php?action=categories");	
	}
	
	if ( isset( $_POST['SaveCart'] ) ) {
		js_edit_category($js_catid);
		header( "Location: index.php?action=viewcat&&js_catid=".$js_catid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		js_edit_category($js_catid);
		header( "Location: index.php?action=categories");						
	}  else {
		require( JS_INC . "js_viewcat.php" );
	}	
	
}
	  
function elibrary() {
	$results = array();
	$results['pageTitle'] = "KTTC ELibrary Catalogue Management System";
	$results['pageAction'] = "ELibrary"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$js_search = $_POST['js_search'];
		$js_catid = $_POST['js_catid'];
		
		header( "Location: index.php?action=search&&js_search=".$js_search."&&js_catid=".$js_catid);
								
	}  else {	
		require( JS_INC . "js_elibrary.php" );
	}
}

function search() {
	$results = array();
	$results['pageTitle'] = "KTTC ELibrary Catalogue Management System";
	$results['pageAction'] = "Search"; 
	$results['search'] = isset( $_GET['js_itemid'] ) ? $_GET['js_itemid'] : "";
	$results['searchcat'] = isset( $_GET['js_catid'] ) ? $_GET['js_catid'] : "";
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$js_search = $_POST['js_search'];
		$js_catid = $_POST['js_catid'];
		
		header( "Location: index.php?action=search&&js_search=".$js_search."&&js_catid=".$js_catid);
														
	}  else {	
		require( JS_INC . "js_elibrarys.php" );
	}
}
function newitem() {
	$results = array();
	$results['pageTitle'] = "KTTC ELibrary Catalogue Management System";
	$results['pageAction'] = "Newitem"; 
	
	if ( isset( $_POST['AddItem'] ) ) {
		js_add_new_item();
		header( "Location: index.php?action=newitem");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		js_add_new_item();
		header( "Location: index.php?action=elibrary");						
	}  else {
		require( JS_INC . "js_newitem.php" );
	}	
	
}

function viewitem() {
	$results = array();
	$results['pageTitle'] = "KTTC ELibrary Catalogue Management System";
	$results['pageAction'] = "Viewitem"; 
	$js_itemid = isset( $_GET['js_itemid'] ) ? $_GET['js_itemid'] : "";
	
	$js_db_query = "SELECT * FROM js_elibrary WHERE itemid = '$js_itemid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $itemid, $user_name) = $database->get_row( $js_db_query );
		$results['item'] = $itemid;
	} else  {
		return false;
		header( "Location: index.php?action=elibrary");	
	}
	
	require( JS_INC . "js_viewitem.php" );
	
}

function edititem() {
	$results = array();
	$results['pageTitle'] = "KTTC ELibrary Catalogue Management System";
	$results['pageAction'] = "Edititem"; 
	$js_itemid = isset( $_GET['js_itemid'] ) ? $_GET['js_itemid'] : "";
	
	$js_db_query = "SELECT * FROM js_elibrary WHERE itemid = '$js_itemid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $itemid) = $database->get_row( $js_db_query );
		$results['item'] = $itemid;
	} else  {
		return false;
		header( "Location: index.php?action=elibrary");	
	}
	
	if ( isset( $_POST['SaveItem'] ) ) {
		js_edit_item($js_itemid);
		header( "Location: index.php?action=edititem&&js_itemid=".$js_itemid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		js_edit_item($js_itemid);
		header( "Location: index.php?action=viewitem&&js_itemid=".$js_itemid);					
	}  else {
		require( JS_INC . "js_edititem.php" );
	}	
	
}

function user_delete() {
	$js_userid = isset( $_GET['js_userid'] ) ? $_GET['js_userid'] : "";
	
	$database = new Js_Dbconn();
	$js_db_query = "DELETE * FROM js_user WHERE userid = '$js_userid'";
	$delete = array(
		'userid' => $js_userid,
	);
	$deleted = $database->delete( 'js_user', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=user_all");	
	}
}

function users() {
	$results = array();
	$results['pageTitle'] = "KTTC ELibrary Catalogue Management System";
	$results['pageAction'] = "Users";  
	require( JS_INC . "js_users.php" );
}

function newuser() {
	$results = array();
	$results['pageTitle'] = "KTTC ELibrary Catalogue Management System";
	$results['pageAction'] = "Newuser"; 
	
	if ( isset( $_POST['AddUser'] ) ) {
		js_add_new_user();
		header( "Location: index.php?action=newuser");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		js_add_new_user();
		header( "Location: index.php?action=users");						
	}  else {
		require( JS_INC . "js_newuser.php" );
	}	
	
}
function viewuser() {
	$results = array();
	$results['pageTitle'] = "KTTC ELibrary Catalogue Management System";
	$results['pageAction'] = "Viewuser"; 
	$js_userid = isset( $_GET['js_userid'] ) ? $_GET['js_userid'] : "";
	
	$js_db_query = "SELECT * FROM js_user WHERE userid = '$js_userid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $userid, $user_name) = $database->get_row( $js_db_query );
		$results['user'] = $userid;
	} else  {
		return false;
		header( "Location: index.php?action=users");	
	}
	
	require( JS_INC . "js_viewuser.php" );
		
}

function profile() {
	$results = array();
	$results['pageTitle'] = "KTTC ELibrary Catalogue Management System";
	$results['pageAction'] = "Profile"; 
	$js_username = $_SESSION['username_loggedin'];
	
	$js_db_query = "SELECT * FROM js_user WHERE user_name = '$js_username'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $userid, $user_name) = $database->get_row( $js_db_query );
		$results['user'] = $userid;
	} else  {
		return false;
		header( "Location: index.php?action=users");	
	}
	
	require( JS_INC . "js_viewuser.php" );
		
}

function options() {
	$results = array();
	$results['pageTitle'] = "KTTC ELibrary Catalogue Management System";
	$results['pageAction'] = "Options"; 
	$js_loginid = isset( $_SESSION['username_loggedin'] ) ? $_SESSION['username_loggedin'] : "";
	
	if ( isset( $_POST['SaveSite'] ) ) {
			
		js_set_option('sitename', $_POST['sitename'], $js_loginid);	
		js_set_option('keywords', $_POST['keywords'], $js_loginid);
		js_set_option('description', $_POST['description'], $js_loginid);
		js_set_option('siteurl', $_POST['siteurl'], $js_loginid);
		
		header( "Location: index.php?action=options");						
	}  else if ( isset( $_POST['CancelSave'] ) ) {
		header( "Location: index.php?action=options");						
	}  else {
		require( JS_INC . "js_options.php" );
	}
	
}

?>
