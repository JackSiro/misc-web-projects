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
	
	include 'js_items.php';
	include 'js_types.php';	
	include 'js_users.php';	
	include 'js_suppliers.php';
	include 'js_orders.php';
	
 	$js_loginid = isset( $_SESSION['nafaka_user'] ) ? $_SESSION['nafaka_user'] : "";
	
	$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
	$myaccount = isset( $_SESSION['nafaka_account'] ) ? $_SESSION['nafaka_account'] : "";
	
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
	case 'type_all':  type_all();
		break;
	case 'type_new': type_new();
		break;
	case 'type_view': type_view();
		break;
	case 'item_all': item_all();
		break;
	case 'item_search': item_search();
		break;
	case 'item_new':  item_new();
		break;
	case 'item_view': item_view();
		break;
	case 'item_edit':  item_edit();
		break;
	case 'item_delete':  item_delete();
		break;
	case 'user_all': user_all();
		break;
	case 'user_new':  user_new();
		break;
	case 'user_view': user_view();
		break;
	case 'supp_all': supp_all();
		break;
	case 'supp_new':  supp_new();
		break;
	case 'supp_view': supp_view();
		break;
	case 'supp_delete': supp_delete();
		break;
	case 'profile': 
		if ($myaccount) js_profile();
		break;
	case 'options':  js_options();
		break; 
	case 'order_all':  order_all();
		break;
	case 'order_view': order_view();
		break;		
    default:
		js_homepage();
}

function js_homepage() {
	$results = array();
	$results['pageTitle'] = "Katito Polytechic";
	$results['pageAction'] = "Dashboard";  
	require( JS_INC . "js_homepage.php" );
}

function js_options() {
	$results = array();
	$results['pageTitle'] = "Katito Polytechic";
	$results['pageAction'] = "Options"; 
	$js_loginid = isset( $_SESSION['nafaka_user'] ) ? $_SESSION['nafaka_user'] : "";
	
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
