<?php
	session_start();
	require( 'as_config.php' );
	include AS_FUNC.'as_dbconn.php';
	require AS_FUNC.'as_base.php';
	include AS_FUNC.'as_options.php';
	include AS_FUNC.'as_paging.php';
	include AS_FUNC.'as_posting.php';
	include AS_FUNC.'as_users.php';
 	
	
	/* Functions */
	
	include 'as_items.php';
	include 'as_types.php';	
	include 'as_users.php';	
	include 'as_suppliers.php';
	include 'as_orders.php';
	
 	$as_loginid = isset( $_SESSION['nafaka_user'] ) ? $_SESSION['nafaka_user'] : "";
	
	$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
	$myaccount = isset( $_SESSION['nafaka_account'] ) ? $_SESSION['nafaka_account'] : "";
	
	if ( $action != "login" && $action != "logout" && $action != "register" 
			&& $action != "forgot_password" && $action != "recover_password"
			&& $action != "forgot_username" && $action != "recover_username"
			&& $action != "logout" && !$as_loginid ) {
			
			as_signin();
	   exit;
	} 
      
switch ( $action ) {
	case 'login': as_signin();
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
	case 'profile': 
		if ($myaccount) as_profile();
		break;
	case 'options':  as_options();
		break; 
	case 'order_all':  order_all();
		break;
	case 'order_view': order_view();
		break;		
    default:
		as_homepage();
}

	
function register() {
	$results = array();
	$results['pageTitle'] = "KTTC ELibrary Catalogue Management System";
	$results['pageAction'] = "Register"; 
	
	if ( isset( $_POST['Register'] ) ) {
		as_register_me();
		header( "Location: index.php");		
	}  else {
		require( AS_INC . "as_user_register.php" );
	}	
	
}


function as_homepage() {
	$results = array();
	$results['pageTitle'] = "Mazao Cereals Suppliers";
	$results['pageAction'] = "Dashboard";  
	require( AS_INC . "as_homepage.php" );
}

function as_options() {
	$results = array();
	$results['pageTitle'] = "Mazao Cereals Suppliers";
	$results['pageAction'] = "Options"; 
	$as_loginid = isset( $_SESSION['nafaka_user'] ) ? $_SESSION['nafaka_user'] : "";
	
	if ( isset( $_POST['SaveSite'] ) ) {
			
		as_set_option('sitename', $_POST['sitename'], $as_loginid);	
		as_set_option('keywords', $_POST['keywords'], $as_loginid);
		as_set_option('description', $_POST['description'], $as_loginid);
		as_set_option('siteurl', $_POST['siteurl'], $as_loginid);
		
		header( "Location: index.php?action=options");						
	}  else if ( isset( $_POST['CancelSave'] ) ) {
		header( "Location: index.php?action=options");						
	}  else {
		require( AS_INC . "as_options.php" );
	}
	
}

?>
