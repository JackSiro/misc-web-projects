<?php
	session_start();
	require( 'js_config.php' );
	include JS_FUNC.'js_dbconn.php';
	require JS_FUNC.'js_base.php';
	include JS_FUNC.'js_options.php';
	include JS_FUNC.'js_paging.php';
	include JS_FUNC.'js_posting.php';
	include JS_FUNC.'js_users.php';
 	
	
	/* Functions */
	
	include 'js_pages.php';
	
 	$js_loginid = isset( $_SESSION['doctors_user'] ) ? $_SESSION['doctors_user'] : "";
	
	$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
	$myaccount = isset( $_SESSION['doctors_account'] ) ? $_SESSION['doctors_account'] : "";
	
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
	case 'category_all':  category_all();
		break;
	case 'category_new': category_new();
		break;
	case 'category_view': category_view();
		break;
	case 'doctor_all':  doctor_all();
		break;
	case 'doctor_new': doctor_new();
		break;
	case 'doctor_view': doctor_view();
		break;
	case 'appointment_all': appointment_all();
		break;
	case 'appointment_search': appointment_search();
		break;
	case 'appointment_new':  appointment_new();
		break;
	case 'appointment_view': appointment_view();
		break;
	case 'appointment_edit':  appointment_edit();
		break;
	case 'appointment_delete':  appointment_delete();
		break;
	case 'user_all': user_all();
		break;
	case 'user_new':  user_new();
		break;
	case 'user_view': user_view();
		break;
	case 'profile': 
		if ($myaccount) js_profile();
		break;
	case 'options':  js_options();
		break; 	
    default:
		appointment_all();
}

function js_homepage() {
	$results = array();
	$results['pageTitle'] = "Cereals Doctors";
	$results['pageAction'] = "Dashboard";  
	require( JS_INC . "js_homepage.php" );
}

function js_options() {
	$results = array();
	$results['pageTitle'] = "Cereals Doctors";
	$results['pageAction'] = "Options"; 
	$js_loginid = isset( $_SESSION['doctors_user'] ) ? $_SESSION['doctors_user'] : "";
	
	if ( isset( $_POST['SaveSite'] ) ) {
			
		js_set_option('sitename', $_POST['sitename'], $js_loginid);	
		js_set_option('slogan', $_POST['slogan'], $js_loginid);
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
