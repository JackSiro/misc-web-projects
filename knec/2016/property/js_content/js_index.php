<?php
	session_start();
	require( 'js_config.php' );
	include JS_FUNC.'js_dbconn.php';
	require JS_FUNC.'js_base.php';
	include JS_FUNC.'js_options.php';
	include JS_FUNC.'js_paging.php';
	include JS_FUNC.'js_posting.php';
	include JS_FUNC.'js_users.php';
 	
 	$js_loginid = isset( $_SESSION['property_loggedin'] ) ? $_SESSION['property_loggedin'] : "";
	
	$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
	$myaccount = isset( $_SESSION['property_account'] ) ? $_SESSION['property_account'] : "";
	
	if ( $action != "login" && $action != "logout" && $action != "register" 
			&& $action != "forgot_password" && $action != "recover_password"
			&& $action != "forgot_username" && $action != "recover_username"
			&& $action != "logout" && !$js_loginid ) {
			
			js_signin();
	   exit;
	} 
    
	include 'js_pages.php';
	
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
	case 'houses':  houses();
		break;
	case 'newhouse': newhouse();
		break;
	case 'viewhouse': viewhouse();
		break;
	case 'tenants': tenants();
		break;
	case 'newtenant':  newtenant();
		break;
	case 'viewtenant': viewtenant();
		break;
	case 'edittenant':  edittenant();
		break;
	case 'deletetenant':  deletetenant();
		break;
	case 'rents': rents();
		break;
	case 'newrent':  newrent();
		break;
	case 'viewrent': viewrent();
		break;
	case 'users': users();
		break;
	case 'newuser':  newuser();
		break;
	case 'viewuser': viewuser();
		break;
	case 'profile': 
		if ($myaccount) profile();
		else dashboard();
		break;
	case 'options':  options();
		break;  
    default:
		dashboard();
}


	function js_signin() {

		$results = array();
		$results['pageTitle'] = "Online Property"; 
		$results['pageAction'] = "Sign In";
		
		if ( isset( $_POST['SignMeIn'] ) ) {
		$loginname = $_POST['username'];
		$loginkey = md5($_POST['password']);
		
            if (js_let_me_user($loginname, $loginkey)){
			$_SESSION['property_loggedin'] = js_let_me_user($loginname, $loginkey);
			$_SESSION['property_account'] = js_logged_account($loginname);
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
	$results['pageTitle'] = "Online Property";
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
	$results['pageTitle'] = "Online Property";
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
	$results['pageTitle'] = "Online Property";
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
	$results['pageTitle'] = "Online Property";
	$results['pageAction'] = "RecoveredUsername"; 
	require( JS_INC . "js_recover_username.php" );
	
}

function recover_password() {
	$results = array();
	$results['pageTitle'] = "Online Property";
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
	$results['pageTitle'] = "Online Property";
	$results['pageAction'] = "Dashboard";  
	require( JS_INC . "js_dashboard.php" );
}

?>
