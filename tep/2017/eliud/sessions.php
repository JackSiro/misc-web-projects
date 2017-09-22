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
			as_newsess();
			break;
		case 'view': 
			as_viewsess();
			break;
		default:
			as_allsessions();
	}

	function as_allsessions() {
		$results = array();
		$results['pageTitle'] = "All Sessions";
		$results['pageAction'] = "AllSessions"; 
		
		require( AS_INC . "as_session_all.php" );
		
	}
	
	function as_newsess() {
		$results = array();
		$results['pageTitle'] = "Meet Your Doctor";
		$results['pageAction'] = "NewSession"; 
		
		if ( isset( $_POST['AddSession'] ) ) {
			as_add_new_session();
			header( "Location: sessions.php");		
		}  else {
			require( AS_INC . "as_session_new.php" );
		}	
		
	}

	function as_viewsess() {
		$results = array();
		$results['pageTitle'] = "Meet Your Doctor";
		$results['pageAction'] = "NewSession"; 
		
		$sessionid = isset( $_GET['as_sessionid'] ) ? $_GET['as_sessionid'] : "";
		
		if ( isset( $_POST['EditSession'] ) ) {
			as_edit_session($sessionid);
			header( "Location: sessions.php");		
		}  else {
			require( AS_INC . "as_session_view.php" );
		}	
		
	}

?>