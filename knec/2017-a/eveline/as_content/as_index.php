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
	
	include 'as_fees.php';
	include 'as_students.php';	
	include 'as_users.php';	
	include 'as_exam.php';
	
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
	case 'student_all':  student_all();
		break;
	case 'student_new': student_new();
		break;
	case 'student_view': student_view();
		break;
	case 'student_edit': student_edit();
		break;
	case 'student_delete': student_delete();
		break;
	case 'fee_all': fee_all();
		break;
	case 'fee_search': fee_search();
		break;
	case 'fee_new':  fee_new();
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
	case 'exam_new':  exam_new();
		break;
	case 'exam_all':  exam_all();
		break;
	case 'profile': as_profile();
		break;
	case 'options':  as_options();
		break; 
	case 'exam_all':  exam_all();
		break;
	case 'exam_view': exam_view();
		break;	
	case 'exam_edit':  exam_edit();
		break;
	case 'exam_delete': exam_delete();
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
		as_add_new_exam();
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
		as_add_new_exam();
		header( "Location: index.php");	
	}  else {
		require( AS_INC . "as_dashboard.php" );
	}
}

?>
