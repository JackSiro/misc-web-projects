<?php
	session_start();
	require( 'as_config.php' );
	require AS_FUNC.'as_base.php';
	include AS_FUNC.'as_options.php';
	include AS_FUNC.'as_paging.php';
	include AS_FUNC.'as_posting.php';
	include AS_FUNC.'as_users.php';
 		
	/* Functions */
	
	include 'as_pages.php';
	
 	$as_signinid = isset( $_SESSION['siteuser_user'] ) ? $_SESSION['siteuser_user'] : "";
	
	$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
	$myaccount = isset( $_SESSION['siteuser_account'] ) ? $_SESSION['siteuser_account'] : "";
	
	if ( $action != "signin" && $action != "signout" && $action != "signup" 
			&& $action != "forgot_password" && $action != "recover_password"
			&& $action != "forgot_username" && $action != "recover_username"
			&& $action != "signout" && !$as_signinid ) { 
			as_signin();
	   exit;
	} 
      
switch ( $action ) {
	case 'signin': as_signin();
		break;
	case 'signup': as_signup();
		break;
	case 'forgot_password': forgot_password();
		break;
	case 'recover_password': recover_password();
		break;
	case 'forgot_username': forgot_username();
		break;
	case 'recover_username': recover_username();
		break;
	case 'signout': signout();
		break;
	case 'products':
	case 'item_all':  item_all();
		break;
	case 'item_new': item_new();
		break;
	case 'item_sell': item_sell();
		break;
	case 'item_edit': item_edit();
		break;
	case 'item_delete': item_delete();
		break;
	case 'users':
	case 'user_all': user_all();
		break;
	case 'user_new':  user_new();
		break;
	case 'user_view': user_view();
		break;
	case 'user_edit': user_edit();
		break;
	case 'user_delete': user_delete();
		break;
	case 'options':  as_options();
		break; 
	case 'buyers':
	case 'buyer_all':  buyer_all();
		break;
	case 'sales':
	case 'sales_all':  sales_all();
		break;
	case 'sales_view': sales_view();
		break;	
	case 'sales_delete': sales_delete();
		break;
	case 'dashboard': as_dashboard();
		break;		
    default:
		item_all();
}

function buyer_all() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = " Items";  
	require( AS_INC . "as_buyer_all.php" );
}

function as_homepage() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "HomePage";  
	require( AS_INC . "as_homepage.php" );
}

function as_dashboard() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "Dashboard";  
	require( AS_INC . "as_dashboard.php" );
}

function sales_now() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "Voting Now"; 
	$as_signinid = isset( $_SESSION['siteuser_user'] ) ? $_SESSION['siteuser_user'] : "";
	
	if ( isset( $_POST['SubmitMyPrescription'] ) ) {
		$database = new As_Dbconn();
		$as_db_query = "SELECT * FROM as_item ORDER BY itemid ASC";
		$results = $database->get_results( $as_db_query );
		foreach( $results as $row ) as_sales_now($row['itemid'], $_POST['item_'.$row['itemid']], $_POST['salesid']);
		as_has_salesd($_POST['salesid']);
		header( "Location: index.php");	
	}  else {
		require( AS_INC . "sales_now.php" );
	}
}

function as_options() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "Options"; 
	$as_signinid = isset( $_SESSION['siteuser_user'] ) ? $_SESSION['siteuser_user'] : "";
	
	if ( isset( $_POST['SaveSite'] ) ) {
			
		as_set_option('sitename', $_POST['sitename'], $as_signinid);	
		as_set_option('slogan', $_POST['slogan'], $as_signinid);
		as_set_option('description', $_POST['description'], $as_signinid);
		as_set_option('siteurl', $_POST['siteurl'], $as_signinid);
		
		header( "Location: index.php?action=options");						
	}  else if ( isset( $_POST['CancelSave'] ) ) {
		header( "Location: index.php?action=options");						
	}  else {
		require( AS_INC . "as_options.php" );
	}
	
}

?>
