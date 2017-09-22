<?php
	session_start();
	require( 'js_config.php' );
	include JS_FUNC.'js_dbconn.php';
	require JS_FUNC.'js_base.php';
	include JS_FUNC.'js_options.php';
	include JS_FUNC.'js_paging.php';
	include JS_FUNC.'js_posting.php';
	include JS_FUNC.'js_employees.php';
 	
 	$js_loggedin = isset( $_SESSION['js_aherouser'] ) ? $_SESSION['js_aherouser'] : "";
	
	$js_pageaction = isset( $_GET['js_pageaction'] ) ? $_GET['js_pageaction'] : "";
	$js_loggedacc = isset( $_SESSION['js_aheroacc'] ) ? $_SESSION['js_aheroacc'] : "";
	
	if ( $js_pageaction != "login" && $js_pageaction != "logout" && $js_pageaction != "signup" 
			&& $js_pageaction != "manage_pass" && $js_pageaction != "recover_password"
			&& $js_pageaction != "manage_username" && $js_pageaction != "recover_username"
			&& $js_pageaction != "logout" && !$js_loggedin ) {
			
			js_signin();
	   exit;
	} 
    
	include 'js_pages.php';
	
switch ( $js_pageaction ) {
	case 'login': js_signin();
		break;
	case 'signup': signup();
		break;
	case 'manage_pass': manage_pass();
		break;
	case 'recover_password': recover_password();
		break;
	case 'manage_username': manage_username();
		break;
	case 'recover_username': recover_username();
		break;
	case 'logout': logout();
		break;
	case 'payslips':  payslips();
		break;
	case 'newpayslip': newpayslip();		
		break;
	case 'viewpayslip': viewpayslip();		
		break;
	case 'leaves': leaves();
		break;
	case 'newleave':  newleave();		
		break;
	case 'viewleave': viewleave();
		break;
	case 'editleave':  editleave();		
		break;
	case 'deleteleave':  deleteleave();		
		break;
	case 'departments': departments();
		break;
	case 'newdepartment':  newdepartment();		
		break;
	case 'viewdepartment': viewdepartment();
		break;
	case 'editdepartment':  editdepartment();		
		break;
	case 'deletedepartment':  deletedepartment();		
		break;
	case 'employees': employees();
		break;
	case 'newemployee':  newemployee();		
		break;
	case 'viewemployee': viewemployee();
		break;
	case 'deleteemployee':  deleteemployee();		
		break;
	case 'profile': if ($js_loggedacc) profile();
		
		break;
	case 'options':  
		options();
		
		break;  
    default:
		employees();
}


function js_signin() {

		$results = array();
		$results['pageTitle'] = "Ahero PaySlips"; 
		$results['pageAction'] = "Sign In";
		
		if ( isset( $_POST['SignMeIn'] ) ) {
		$loginname = $_POST['username'];
		$loginkey = md5($_POST['password']);
		
            if (js_let_me_user($loginname, $loginkey)){
			$_SESSION['js_aherouser'] = js_let_me_user($loginname, $loginkey);
			$_SESSION['js_aheroacc'] = js_logged_account($loginname);
			header( "Location: index.php" );
			
		}   else {
			
            require( JS_INC."js_signin.php" );
	    }
	
	  } else {
	
	    require( JS_INC."js_signin.php" );
 	 }

	}
	
function signup() {
	$results = array();
	$results['pageTitle'] = "Ahero PaySlips";
	$results['pageAction'] = "Sign Up"; 
	
	if ( isset( $_POST['Sign Up'] ) ) {
		js_register_me();
		header( "Location: index.php");		
	}  else {
		require( JS_INC . "js_register.php" );
	}	
	
}

function manage_username() {
	$results = array();
	$results['pageTitle'] = "Ahero PaySlips";
	$results['pageAction'] = "ForgotUsername"; 
	
	if ( isset( $_POST['ForgotUsername'] ) ) {
		$email = $_POST['username'];
		$password = md5($_POST['password']);
		js_recover_username($email, $password);
		header( "Location: index.php?js_pageaction=recovered_username");		
	}  else {
		require( JS_INC . "js_forgot_username.php" );
	}	
	
}

function manage_pass() {
	$results = array();
	$results['pageTitle'] = "Ahero PaySlips";
	$results['pageAction'] = "ForgotPassword"; 
	
	if ( isset( $_POST['ForgotPassword'] ) ) {
		$username = $_POST['username'];
		$email = $_POST['email'];
		js_recover_password($username, $email);
		header( "Location: index.php?js_pageaction=recover_password");		
	}  else {
		require( JS_INC . "js_forgot_password.php" );
	}	
	
}

function recover_username() {
	$results = array();
	$results['pageTitle'] = "Ahero PaySlips";
	$results['pageAction'] = "RecoveredUsername"; 
	require( JS_INC . "js_recover_username.php" );
	
}

function recover_password() {
	$results = array();
	$results['pageTitle'] = "Ahero PaySlips";
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
	$results['pageTitle'] = "Ahero PaySlips";
	$results['pageAction'] = "Dashboard";  
	require( JS_INC . "js_dashboard.php" );
}

?>
