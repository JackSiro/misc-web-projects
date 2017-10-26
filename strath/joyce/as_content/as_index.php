<?php
	session_start();
	require( 'as_config.php' );
	include AS_FUNC.'as_dbconn.php';
	require AS_FUNC.'as_base.php';
	include AS_FUNC.'as_options.php';
	include AS_FUNC.'as_paging.php';
	include AS_FUNC.'as_posting.php';
	include AS_FUNC.'as_users.php';
 		
	include 'as_pages.php';
	
	$action 	= isset( $_GET['action'] ) ? $_GET['action'] : "";
	$myaccount 	= isset( $_SESSION['voting_account'] ) ? $_SESSION['voting_account'] : "";
	$myuserid 	= isset( $_SESSION['voting_userid'] ) ? $_SESSION['voting_userid'] : "";
	
	if ( $action != "login" && $action != "logout" && $action != "register" 
			&& $action != "forgot_password" && $action != "recover_password"
			&& $action != "forgot_username" && $action != "recover_username"
			&& $action != "logout" && !$myuserid ) {
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
	case 'class_all':  class_all();
		break;
	case 'class_new': class_new();
		break;
	case 'class_view': class_view();
		break;
	case 'voter_all': voter_all();
		break;
	case 'search': search();
		break;
	case 'voter_new':  voter_new();
		break;
	case 'voter_view': voter_view();
		break;
	case 'voter_edit': voter_edit();
		break;
	case 'deletevoter': deletevoter();
		break;
	case 'elecpost_new':  elecpost_new();
		break;
	case 'elecpost_all':  elecpost_all();
		break;
	case 'elecpost_view': elecpost_view();
		break;
	case 'elecpost_edit': elecpost_edit();
		break;
	case 'deleteelecpost': deleteelecpost();
		break;
	case 'candidate_all':  candidate_all();
		break;
	case 'candidate_new':  candidate_new();
		break;
	case 'candidate_view': candidate_view();
		break;
	case 'candidate_edit': candidate_edit();
		break;
	case 'deletemark': deletemark();
		break;
	case 'official_all': official_all();
		break;
	case 'official_new':  official_new();
		break;
	case 'official_view': official_view();
		break;
	case 'vote_now':  vote_now();
		break;
	case 'profile':  profile();
		break;
	case 'options':  options();
		break;  
    default:
		dashboard();
}

function as_signin() {
	$results = array();
	$results['pageTitle'] = "Management Information System"; 
	$results['pageAction'] = "Sign In";
	
	if ( isset( $_POST['SignMeIn'] ) ) {
		$loginname = $_POST['username'];
		$loginkey = md5($_POST['password']);
		as_login_user($loginname, $loginkey);
		header( "Location: index.php" );
	} else require( AS_INC."as_signin.php" );
}
	
function register() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Register"; 
	
	if ( isset( $_POST['Register'] ) ) {
		as_register_me();
		header( "Location: index.php");		
	}  else {
		require( AS_INC . "as_register.php" );
	}	
	
}

  function forgot_username() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
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
	$results['pageTitle'] = "Management Information System";
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
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "RecoveredUsername"; 
	require( AS_INC . "as_recover_username.php" );
	
}

function recover_password() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
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

function dashboard() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Dashboard";  
	require( AS_INC . "as_dashboard.php" );
}

function vote_now() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Dashboard";  
	require( AS_INC . "as_vote_now.php" );
}

function options() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Options"; 
	$myuserid = isset( $_SESSION['voting_userid'] ) ? $_SESSION['voting_userid'] : "";
	
	if ( isset( $_POST['SaveSite'] ) ) {               
		$database = new As_Dbconn();
		as_set_option('sitename', $_POST['as_sitename'], $myuserid);	
		as_set_option('slogan', $_POST['as_slogan'], $myuserid);
		as_set_option('siteurl', $_POST['as_siteurl'], $myuserid);
		as_set_option('elecpost', $database->get_count('as_elecpost'), $myuserid);
		
		header( "Location: index.php?action=options");						
	}  else if ( isset( $_POST['CancelSave'] ) ) {
		header( "Location: index.php?action=options");						
	}  else {
		require( AS_INC . "as_options.php" );
	}	
}

function profile() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Profile"; 
	$as_username = $_SESSION['voting_userid'];
	
	$as_db_query = "SELECT * FROM as_official WHERE official_name = '$as_username'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $officialid, $official_name) = $database->get_row( $as_db_query );
		$results['official'] = $officialid;
	} else  {
		return false;
		header( "Location: index.php?action=official_all");	
	}
	
	require( AS_INC . "as_viewofficial.php" );
		
}
?>
