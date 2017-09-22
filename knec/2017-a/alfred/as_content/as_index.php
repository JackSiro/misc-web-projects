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
	
	include 'as_stocks.php';
	include 'as_drugs.php';	
	include 'as_users.php';	
	include 'as_sales.php';
	
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
	case 'drug_all':  drug_all();
		break;
	case 'drug_new': drug_new();
		break;
	case 'drug_view': drug_view();
		break;
	case 'drug_edit': drug_edit();
		break;
	case 'drug_delete': drug_delete();
		break;
	case 'stock_in': stock_in();
		break;
	case 'stock_all': stock_all();
		break;
	case 'stock_search': stock_search();
		break;
	case 'stock_new':  stock_new();
		break;
	case 'stock_view': stock_view();
		break;
	case 'stock_edit':  stock_edit();
		break;
	case 'stock_delete':  stock_delete();
		break;
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
	case 'sales_now':  sales_now();
		break;
	case 'profile': as_profile();
		break;
	case 'options':  as_options();
		break; 
	case 'sales_all':  sales_all();
		break;
	case 'sales_view': sales_view();
		break;	
	case 'sales_edit':  sales_edit();
		break;
	case 'sales_delete': sales_delete();
		break;
	case 'dashboard': as_dashboard();
		break;		
    default:
		as_dashboard();
}

function as_homepage() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "index.php";  
	
	if ( isset( $_POST['SubmitSales'] ) ) {
		as_add_new_sales();
		header( "Location: index.php");	
	}  else {
		require( AS_INC . "as_homepage.php" );
	}
}

function as_dashboard() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "index.php?action=dashboard";  
	
	if ( isset( $_POST['SubmitSales'] ) ) {
		as_add_new_sales();
		header( "Location: index.php");	
	}  else {
		require( AS_INC . "as_dashboard.php" );
	}
}

function sales_now() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "Voting Now"; 
	$as_signinid = isset( $_SESSION['siteuser_user'] ) ? $_SESSION['siteuser_user'] : "";
	
	if ( isset( $_POST['SubmitSales'] ) ) {
		$database = new As_Dbconn();
		$as_db_query = "SELECT * FROM as_drug ORDER BY drugid ASC";
		$results = $database->get_results( $as_db_query );
		foreach( $results as $row ) as_sales_now($row['drugid'], $_POST['drug_'.$row['drugid']], $_POST['salesid']);
		as_has_salesd($_POST['salesid']);
		header( "Location: index.php");	
	}  else {
		require( AS_INC . "sales_now.php" );
	}}

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
