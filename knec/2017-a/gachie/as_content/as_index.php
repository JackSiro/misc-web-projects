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
	include 'as_users.php';	
	include 'as_apartments.php';
	include 'as_tenants.php';
	
 	$as_loginid = isset( $_SESSION['appsmata_user'] ) ? $_SESSION['appsmata_user'] : "";
	
	$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
	$myaccount = isset( $_SESSION['appsmata_account'] ) ? $_SESSION['appsmata_account'] : "";
	
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
	case 'user_all': user_all();
		break;
	case 'user_new':  user_new();
		break;
	case 'user_view': user_view();
		break;
	case 'rating_all': rating_all();
		break;
	case 'rating_new':  rating_new();
		break;
	case 'apartment_all': apartment_all();
		break;
	case 'apartment_new':  apartment_new();
		break;
	case 'apartment_view': apartment_view();
		break;
	case 'apartment_delete': apartment_delete();
		break;
	case 'profile': 
		if ($myaccount) as_profile();
		break;
	case 'options':  as_options();
		break; 
	case 'tenant_new': tenant_new();
		break;	
	case 'tenant_all':  tenant_all();
		break;
	case 'tenant_view': tenant_view();
		break;		
    default:
		as_homepage();
}

function as_homepage() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Dashboard";  
	require( AS_INC . "as_homepage.php" );
}

function as_options() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Options"; 
	$as_loginid = isset( $_SESSION['appsmata_user'] ) ? $_SESSION['appsmata_user'] : "";
	
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
