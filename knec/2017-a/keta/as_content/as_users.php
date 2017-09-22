<?php
	
function user_all() {
	$results = array();
	$results['pageTitle'] = "MIS";
	$results['pageAction'] = "Users";  
	require( AS_INC . "AS_USER_all.php" );
}

function user_new() {
	$results = array();
	$results['pageTitle'] = "MIS";
	$results['pageAction'] = "Newuser"; 
	
	if ( isset( $_POST['AddUser'] ) ) {
		as_add_new_user();
		header( "Location: index.php?action=user_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_add_new_user();
		header( "Location: index.php?action=user_all");						
	}  else {
		require( AS_INC . "AS_USER_new.php" );
	}	
	
}
function user_view() {
	$results = array();
	$results['pageTitle'] = "MIS";
	$results['pageAction'] = "Viewuser"; 
	$AS_USERid = isset( $_GET['AS_USERid'] ) ? $_GET['AS_USERid'] : "";
	
	$as_db_query = "SELECT * FROM AS_USER WHERE userid = '$AS_USERid'";
	$database = new As_DbConn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $userid, $user_name) = $database->get_row( $as_db_query );
		$results['user'] = $userid;
	} else  {
		return false;
		header( "Location: index.php?action=user_all");	
	}
	
	require( AS_INC . "AS_USER_view.php" );
		
}

function profile() {
	$results = array();
	$results['pageTitle'] = "MIS";
	$results['pageAction'] = "Profile"; 
	$AS_USERname = $_SESSION['clients_user'];
	
	$as_db_query = "SELECT * FROM AS_USER WHERE user_name = '$AS_USERname'";
	$database = new As_DbConn();
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