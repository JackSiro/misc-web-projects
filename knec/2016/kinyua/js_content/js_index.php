<?php
	session_start();
	require( 'js_config.php' );
	include JS_FUNC.'js_dbconn.php';
	require JS_FUNC.'js_base.php';
	include JS_FUNC.'js_options.php';
	include JS_FUNC.'js_paging.php';
	include JS_FUNC.'js_posting.php';
	include JS_FUNC.'js_employees.php';
 	
	include 'js_pages.php';
	
 	$js_loginid = isset( $_SESSION['kinyua_user'] ) ? $_SESSION['kinyua_user'] : "";
	
	$page = isset( $_GET['page'] ) ? $_GET['page'] : "";
	$myaccount = isset( $_SESSION['kinyua_account'] ) ? $_SESSION['kinyua_account'] : "";
	      
  switch ( $page ) {
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
	case 'vehicle_all':  vehicle_all();
		break;
	case 'vehicle_new': vehicle_new();
		break;
	case 'vehicle_view': vehicle_view();
		break;
	case 'book_now':  ticket_new();
		break;
	case 'ticket_all': ticket_all();
		break;
	case 'ticket_view': ticket_view();
		break;
	case 'ticket_edit':  ticket_edit();
		break;
	case 'ticket_delete':  ticket_delete();
		break;
	case 'employee_all': employee_all();
		break;
	case 'employee_new':  employee_new();
		break;
	case 'employee_view': employee_view();
		break;
	case 'town_all': town_all();
		break;
	case 'town_new':  town_new();
		break;
	case 'town_view': town_view();
		break;
	case 'profile': 
		if ($myaccount) js_profile();
		break;
	case 'options':  js_options();
		break; 
	case 'booking':  js_booking();
		break;	
    default:
		js_booking();
}

function js_booking() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "Dashboard"; 
	
	if ( isset( $_POST['StartBooking'] ) ) {		
		header( "Location: index.php?page=book_now&&date=".$_POST['datetravel']."&&type=".$_POST['type']."&&townfrom=".$_POST['townfrom']."&&townto=".$_POST['townto']);						
	}  else {	
		require( JS_INC . "js_homepage.php" );
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

function js_options() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "Options"; 
	$js_loginid = isset( $_SESSION['kinyua_user'] ) ? $_SESSION['kinyua_user'] : "";
	
	if ( isset( $_POST['SaveSite'] ) ) {
			
		js_set_option('sitename', $_POST['sitename'], $js_loginid);	
		js_set_option('keywords', $_POST['keywords'], $js_loginid);
		js_set_option('description', $_POST['description'], $js_loginid);
		js_set_option('siteurl', $_POST['siteurl'], $js_loginid);
		
		header( "Location: index.php?page=options");						
	}  else if ( isset( $_POST['CancelSave'] ) ) {
		header( "Location: index.php?page=options");						
	}  else {
		require( JS_INC . "js_options.php" );
	}
	
}

?>
