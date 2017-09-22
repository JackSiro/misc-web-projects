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
	
 	$js_loginid = isset( $_SESSION['mysitei_user'] ) ? $_SESSION['mysitei_user'] : "";
	
	$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
	$myaccount = isset( $_SESSION['mysitei_account'] ) ? $_SESSION['mysitei_account'] : "";
	
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
	case 'product_all': product_all();
		break;
	case 'product_new':  product_new();
		break;
	case 'product_view': product_view();
		break;
	case 'product_edit':  product_edit();
		break;
	case 'product_delete':  product_delete();
		break;
	case 'request_all': request_all();
		break;
	case 'request_new':  request_new();
		break;
	case 'request_view': request_view();
		break;
	case 'request_edit':  request_edit();
		break;
	case 'request_delete':  request_delete();
		break;
	case 'invoice_all': invoice_all();
		break;
	case 'invoice_new':  invoice_new();
		break;
	case 'invoice_view': invoice_view();
		break;
	case 'invoice_edit':  invoice_edit();
		break;
	case 'invoice_delete':  invoice_delete();
		break;
	case 'schedule_all': schedule_all();
		break;
	case 'schedule_new':  schedule_new();
		break;
	case 'schedule_view': schedule_view();
		break;
	case 'schedule_edit':  schedule_edit();
		break;
	case 'schedule_delete':  schedule_delete();
		break;
	case 'profile': 
		if ($myaccount) js_profile();
		break;
	case 'options':  js_options();
		break; 		
    default:
		js_homepage();
}

function js_homepage() {
	$results = array();
	$results['pageTitle'] = "Mkangara Agrovet Products";
	$results['pageAction'] = "Dashboard";  
	require( JS_INC . "js_homepage.php" );
}

function js_options() {
	$results = array();
	$results['pageTitle'] = "Mkangara Agrovet Products";
	$results['pageAction'] = "Options"; 
	$js_loginid = isset( $_SESSION['mysitei_user'] ) ? $_SESSION['mysitei_user'] : "";
	
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
