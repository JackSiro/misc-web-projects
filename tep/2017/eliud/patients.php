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
			as_newpat();
			break;
		case 'view': 
			as_viewpat();
			break;
		default:
			as_allpats();
	}

	function as_allpats() {
		$results = array();
		$results['pageTitle'] = "All Patients";
		$results['pageAction'] = "AllPats"; 
		
		require( AS_INC . "as_patient_all.php" );
		
	}

?>