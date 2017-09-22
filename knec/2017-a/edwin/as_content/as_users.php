<?php
	
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