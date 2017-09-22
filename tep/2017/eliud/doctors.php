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
		case 'new': 
			as_newdoc();
			break;
		case 'view': 
			as_viewdoc();
			break;
		default:
			as_alldocs();
	}

	function as_alldocs() {
		$results = array();
		$results['pageTitle'] = "All Doctors";
		$results['pageAction'] = "AllDocs"; 
		
		require( AS_INC . "as_doctor_all.php" );
		
	}

	function as_newdoc() {
		$results = array();
		$results['pageTitle'] = "Meet Your Doctor";
		$results['pageAction'] = "NewDoctor"; 
		
		if ( isset( $_POST['AddDoctor'] ) ) {
			as_add_new_doctor();
			header( "Location: doctors.php");		
		}  else {
			require( AS_INC . "as_doctor_new.php" );
		}
	}

	function as_viewdoc() {
		$results = array();
		$results['pageTitle'] = "Meet Your Doctor";
		$results['pageAction'] = "ViewDoctor"; 
		
		$doctorid = isset( $_GET['as_doctorid'] ) ? $_GET['as_doctorid'] : "";
		
		if ( isset( $_POST['EditDoctor'] ) ) {
			as_edit_doctor($doctorid);
			header( "Location: doctors.php");		
		}  else {
			require( AS_INC . "as_doctor_view.php" );
		}	
		
	}
?>