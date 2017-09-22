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
			as_newmess();
			break;
		case 'view': 
			as_viewmess();
			break;
		default:
			as_allmess();
	}

	function as_allmess() {
		$results = array();
		$results['pageTitle'] = "All Message";
		$results['pageAction'] = "AllMess"; 
		
		require( AS_INC . "as_message_all.php" );
		
	}

	function as_newmess() {
		$results = array();
		$results['pageTitle'] = "Meet Your Doctor";
		$results['pageAction'] = "NewMessage"; 
		
		if ( isset( $_POST['SendMessage'] ) ) {
			as_add_new_message();
			header( "Location: messages.php");		
		}  else {
			require( AS_INC . "as_message_new.php" );
		}
	}

	function as_viewmess() {
		$results = array();
		$results['pageTitle'] = "Meet Your Doctor";
		$results['pageAction'] = "ViewMessage"; 
		
		$messageid = isset( $_GET['messageid'] ) ? $_GET['messageid'] : "";
		
		if ( isset( $_POST['SendMessage'] ) ) {
			as_add_new_message_thread();
			header( "Location: messages.php?action=view&&messageid=".$messageid);		
		}  else {
			require( AS_INC . "as_message_view.php" );
		}	
		
	}
?>