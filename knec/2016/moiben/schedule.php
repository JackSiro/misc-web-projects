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
	
	/*
	if ( $action != "login" && $action != "logout" && $action != "register" 
			&& $action != "forgot_password" && $action != "recover_password"
			&& $action != "forgot_username" && $action != "recover_username"
			&& $action != "logout" && !$js_loginid ) {
			
			js_signin();
	   exit;
	} */
      
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
    default:
		js_scheduler();
}

function js_scheduler() {
	$results = array();
	$results['pageTitle'] = "Moiben Outpatient Hospital";
	$results['pageAction'] = "Homepage";  
	require( JS_INC . "js_schedule.php" );
}

?>