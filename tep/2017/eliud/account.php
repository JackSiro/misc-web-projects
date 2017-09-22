<?php
	session_start();
	require( 'as_config.php' );
	include AS_FUNC.'as_dbconn.php';
	require AS_FUNC.'as_base.php';
	include AS_FUNC.'as_options.php';
	include AS_FUNC.'as_paging.php';
	include AS_FUNC.'as_posting.php';
	include AS_FUNC.'as_users.php';
 	
 	$as_loginid = isset( $_SESSION['loggedin'] ) ? $_SESSION['loggedin'] : "";
	
	$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
	$myaccount = isset( $_SESSION['account'] ) ? $_SESSION['account'] : "";
      
	switch ( $action ) {
		case 'login':
			signin_now();
			break;
		case 'register': 
			register_now();
			break;
		case 'forgot_password': 
			forgot_password();
			break;
		case 'recover_password': 
			recover_password();
			break;
		case 'forgot_username': 
			forgot_username();
			break;
		case 'recover_username': 
			recover_username();
			break;
		case 'logout': 
			as_logout();
			break;
		default:
			as_profile();
	}
		

	function signin_now() {
		$results = array();
		$results['pageTitle'] = "Meet Your Doctor"; 
		$results['pageAction'] = "Sign In";
		
		if (isset($_POST['DoctorSignin'])) {
			$loginname = $_POST['username'];
			$loginkey = md5($_POST['password']);
		
			if (as_let_me_doctor($loginname, $loginkey)){
				$_SESSION['loggedin'] = as_let_me_doctor($loginname, $loginkey);
				$_SESSION['account'] = as_logged_account($loginname);
				$_SESSION['type'] = 'Doctor';
				header( "Location: index.php" );
				
			}   
		}  else if (isset($_POST['PatientSignin'])) {
			$loginname = $_POST['username'];
			$loginkey = md5($_POST['password']);
		
			if (as_let_me_patient($loginname, $loginkey)){
				$_SESSION['loggedin'] = as_let_me_patient($loginname, $loginkey);
				$_SESSION['account'] = as_logged_account($loginname);
				$_SESSION['type'] = 'Patient';
				header( "Location: index.php" );
				
			}  
		} else require( AS_INC."as_signin.php" );
	}
	
	function register_now() {
		$results = array();
		$results['pageTitle'] = "Meet Your Doctor";
		$results['pageAction'] = "Register"; 
		
		if ( isset( $_POST['Register'] ) ) {
			as_add_new_patient();
			header( "Location: index.php");		
		}  else {
			require( AS_INC . "as_register.php" );
		}	
		
	}

?>