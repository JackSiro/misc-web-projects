<?php
	session_start();
	require( 'as_config.php' );
	include AS_FUNC.'as_dbconn.php';
	require AS_FUNC.'as_base.php';
	include AS_FUNC.'as_options.php';
	include AS_FUNC.'as_paging.php';
	include AS_FUNC.'as_posting.php';
	include AS_FUNC.'as_users.php';

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
	case 'dashboard': as_dashboard();
		break;		
    default:
		as_dashboard();
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

	
function user_all() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "Users";  
	require( AS_INC . "as_user_all.php" );
}

function user_new() {
	$results = array();
	$results['pageTitle'] = "JS System";
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
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "Viewuser"; 
	$as_userid = isset( $_GET['as_userid'] ) ? $_GET['as_userid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "SELECT * FROM as_user WHERE userid = '$as_userid'";
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $userid, $user_name) = $database->get_row( $as_db_query );
		$results['user'] = $userid;
	} else  {
		return false;
		header( "Location: index.php?action=user_all");	
	}
	
	require( AS_INC . "as_user_view.php" );
		
}

function user_delete() {
	$as_userid = isset( $_GET['as_userid'] ) ? $_GET['as_userid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_user WHERE userid = '$as_userid'";
	$delete = array(
		'userid' => $as_userid,
	);
	$deleted = $database->delete( 'as_user', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=user_all");	
	}
}
	
function profile() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "Profile"; 
	$as_username = $_SESSION['siteuser_user'];
	
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


function forgot_username() {
	$results = array();
	$results['pageTitle'] = "Doctors Appointment";
	$results['pageAction'] = "ForgotUsername"; 
	
	if ( isset( $_POST['ForgotUsername'] ) ) {
		$email = $_POST['username'];
		$password = md5($_POST['password']);
		as_recover_username($email, $password);
		header( "Location: index.php?action=recovered_username");		
	}  else {
		require( AS_INC . "as_forgot_username.php" );
	}	
	
}

function forgot_password() {
	$results = array();
	$results['pageTitle'] = "Doctors Appointment";
	$results['pageAction'] = "ForgotPassword"; 
	
	if ( isset( $_POST['ForgotPassword'] ) ) {
		$username = $_POST['username'];
		$email = $_POST['email'];
		as_recover_password($username, $email);
		header( "Location: index.php?action=recover_password");		
	}  else {
		require( AS_INC . "as_forgot_password.php" );
	}	
	
}

function recover_username() {
	$results = array();
	$results['pageTitle'] = "Doctors Appointment";
	$results['pageAction'] = "RecoveredUsername"; 
	require( AS_INC . "as_recover_username.php" );
	
}

function recover_password() {
	$results = array();
	$results['pageTitle'] = "Doctors Appointment";
	$results['pageAction'] = "RecoveredPassword"; 
	
	if ( isset( $_POST['RecoverPassword'] ) ) {
		$username = $_POST['username'];
		$password = md5($_POST['passwordcon']);
		as_change_password($username);
		header( "Location: index.php");		
	}  else {
		require( AS_INC . "as_recover_password.php" );
	}
}

?>
