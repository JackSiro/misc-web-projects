<?php
	session_start();
	require( 'as_config.php' );
	include AS_FUNC.'as_dbconn.php';
	require AS_FUNC.'as_base.php';
	include AS_FUNC.'as_options.php';
	include AS_FUNC.'as_paging.php';
	include AS_FUNC.'as_posting.php';
	include AS_FUNC.'as_facilitator.php';
 		
	/* Functions */
	
	include 'as_resource.php';
	include 'as_beneficiary.php';	
	include 'as_facilitator.php';	
	include 'as_group.php';
	
 	$as_signinid = isset( $_SESSION['sitefacilitator_facilitator'] ) ? $_SESSION['sitefacilitator_facilitator'] : "";
	
	$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
	$myaccount = isset( $_SESSION['sitefacilitator_account'] ) ? $_SESSION['sitefacilitator_account'] : "";
	
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
	case 'beneficiary_all':  beneficiary_all();
		break;
	case 'beneficiary_new': beneficiary_new();
		break;
	case 'beneficiary_view': beneficiary_view();
		break;
	case 'beneficiary_edit': beneficiary_edit();
		break;
	case 'beneficiary_delete': beneficiary_delete();
		break;
	case 'resource_all': resource_all();
		break;
	case 'resource_search': resource_search();
		break;
	case 'resource_new':  resource_new();
		break;
	case 'facilitator_all': facilitator_all();
		break;
	case 'facilitator_new':  facilitator_new();
		break;
	case 'facilitator_view': facilitator_view();
		break;
	case 'facilitator_edit': facilitator_edit();
		break;
	case 'facilitator_delete': facilitator_delete();
		break;
	case 'group_new':  group_new();
		break;
	case 'group_all':  group_all();
		break;
	case 'profile': as_profile();
		break;
	case 'options':  as_options();
		break; 
	case 'group_all':  group_all();
		break;
	case 'group_view': group_view();
		break;	
	case 'group_edit':  group_edit();
		break;
	case 'group_delete': group_delete();
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
	
	if ( isset( $_POST['SubmitExamss'] ) ) {
		as_add_new_group();
		header( "Location: index.php");	
	}  else {
		require( AS_INC . "as_homepage.php" );
	}
}

function as_dashboard() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "index.php?action=dashboard";  
	
	if ( isset( $_POST['SubmitExamss'] ) ) {
		as_add_new_group();
		header( "Location: index.php");	
	}  else {
		require( AS_INC . "as_dashboard.php" );
	}
}

function as_options() {
	$results = array();
	$results['pageTitle'] = "AP System";
	$results['pageAction'] = "Options"; 
	$as_loginid = isset( $_SESSION['mysitei_user'] ) ? $_SESSION['mysitei_user'] : "";
	
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
