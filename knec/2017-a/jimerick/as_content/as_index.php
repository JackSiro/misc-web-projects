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
	
 	$as_loginid = isset( $_SESSION['mysitei_user'] ) ? $_SESSION['mysitei_user'] : "";
	
	$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
	$myaccount = isset( $_SESSION['mysitei_account'] ) ? $_SESSION['mysitei_account'] : "";
	
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
	case 'billing_all': billing_all();
		break;
	case 'billing_view': billing_view();
		break;
	case 'billing_new':  billing_new();
		break;
	case 'patient_all': patient_all();
		break;
	case 'patient_new':  patient_new();
		break;
	case 'patient_view': patient_view();
		break;
	case 'patient_edit':  patient_edit();
		break;
	case 'patient_delete':  patient_delete();
		break;
	case 'user_all': user_all();
		break;
	case 'user_new':  user_new();
		break;
	case 'user_view': user_view();
		break;
	case 'user_edit':  user_edit();
		break;
	case 'profile': 
		if ($myaccount) as_profile();
		break;
	case 'options':  as_options();
		break; 		
    default:
		as_homepage();
}

function as_homepage() {
	$results = array();
	$results['pageTitle'] = "AP System";
	$results['pageAction'] = "Dashboard";
	
	if ( isset( $_POST['Submitbills'] ) ) {
		as_submit_bills();
		header( "Location: index.php?action=billings_all");
	}  else {
		require( AS_INC . "as_homepage.php" );
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
	
function user_all() {
	$results = array();
	$results['pageTitle'] = "AP System";
	$results['pageAction'] = "Users";  
	require( AS_INC . "as_user_all.php" );
}

function user_new() {
	$results = array();
	$results['pageTitle'] = "AP System";
	$results['pageAction'] = "Newuser"; 
	
	if ( isset( $_POST['AddUser'] ) ) {
		as_add_new_user();
		header( "Location: index.php?action=user_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_add_new_user();
		header( "Location: index.php?action=user_all");						
	}  else {
		require( AS_INC . "as_user_new.php" );
	}	
	
}
function user_view() {
	$results = array();
	$results['pageTitle'] = "AP System";
	$results['pageAction'] = "Viewuser"; 
	$as_userid = isset( $_GET['as_userid'] ) ? $_GET['as_userid'] : "";
	
	$as_db_query = "SELECT * FROM as_user WHERE userid = '$as_userid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $userid, $user_name) = $database->get_row( $as_db_query );
		$results['user'] = $userid;
	} else  {
		return false;
		header( "Location: index.php?action=user_all");	
	}
	
	require( AS_INC . "as_user_view.php" );
		
}

function profile() {
	$results = array();
	$results['pageTitle'] = "AP System";
	$results['pageAction'] = "Profile"; 
	$as_username = $_SESSION['mysitei_user'];
	
	$as_db_query = "SELECT * FROM as_user WHERE user_name = '$as_username'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $userid, $user_name) = $database->get_row( $as_db_query );
		$results['user'] = $userid;
	} else  {
		return false;
		header( "Location: index.php?action=users");	
	}
	
	require( AS_INC . "as_viewuser.php" );
		
}

?>
