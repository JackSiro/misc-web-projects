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
	
	include 'as_pages.php';
	
 	$as_loginid = isset( $_SESSION['clients_user'] ) ? $_SESSION['clients_user'] : "";
	
	$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
	$myaccount = isset( $_SESSION['clients_account'] ) ? $_SESSION['clients_account'] : "";
	
	if ( $action != "login" && $action != "logout" && $action != "register" 
			&& $action != "forgot_password" && $action != "recover_password"
			&& $action != "forgot_username" && $action != "recover_username"
			&& $action != "logout" && $action != "complaint_submitted" && !$as_loginid && 
			$action != "complaints" ) { as_signin();
	   exit;
	} 
       
switch ( $action ) {
	case 'complaints': as_complaints();
		break;
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
	case 'client_all':  client_all();
		break;
	case 'client_new': client_new();
		break;
	case 'client_view': client_view();
		break;
	case 'complaint_all': complaint_all();
		break;
	case 'complaint_search': complaint_search();
		break;
	case 'complaint_new':  complaint_new();
		break;
	case 'complaint_view': complaint_view();
		break;
	case 'complaint_edit':  complaint_edit();
		break;
	case 'complaint_delete':  complaint_delete();
		break;
	case 'user_all': user_all();
		break;
	case 'user_new':  user_new();
		break;
	case 'user_view': user_view();
		break;
	case 'profile': 
		if ($myaccount) as_profile();
		break;
	case 'options':  as_options();
		break;
	case 'complaint_submitted':  complaint_submitted();
		break; 	
    default:
		as_homepage();
}

function as_homepage() {
	$results = array();
	$results['pageTitle'] = "MIS";
	$results['pageAction'] = "Dashboard";  
	require( AS_INC . "as_homepage.php" );
}

function as_complaints() {
	$results = array();
	$results['pageTitle'] = "MIS";
	$results['pageAction'] = "Dashboard";  
	if ( isset( $_POST['SubmitComplaint'] ) ) {			
		$client = as_new_client();
		as_new_complaint($client);	
		header( "Location: index.php?action=complaint_submitted");	
	}  else {
		require( AS_INC . "as_complaints.php" );
	}
}

function complaint_submitted() {
	$results = array();
	$results['pageTitle'] = "MIS";
	$results['pageAction'] = "Dashboard"; 
	require( AS_INC . "as_complaint_submitted.php" );	
}

function as_options() {
	$results = array();
	$results['pageTitle'] = "MIS";
	$results['pageAction'] = "Options"; 
	$as_loginid = isset( $_SESSION['clients_user'] ) ? $_SESSION['clients_user'] : "";
	
	if ( isset( $_POST['SaveSite'] ) ) {			
		as_set_option('sitename', $_POST['sitename'], $as_loginid);	
		as_set_option('slogan', $_POST['slogan'], $as_loginid);
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
