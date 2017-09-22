<?php
	
function user_all() {
	$results = array();
	$results['pageTitle'] = "Mkangara Agrovet Products";
	$results['pageAction'] = "Users";  
	require( JS_INC . "js_user_all.php" );
}

function user_new() {
	$results = array();
	$results['pageTitle'] = "Mkangara Agrovet Products";
	$results['pageAction'] = "Newuser"; 
	
	if ( isset( $_POST['AddUser'] ) ) {
		js_add_new_user();
		header( "Location: index.php?action=user_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		js_add_new_user();
		header( "Location: index.php?action=user_all");						
	}  else {
		require( JS_INC . "js_user_new.php" );
	}	
	
}
function user_view() {
	$results = array();
	$results['pageTitle'] = "Mkangara Agrovet Products";
	$results['pageAction'] = "Viewuser"; 
	$js_userid = isset( $_GET['js_userid'] ) ? $_GET['js_userid'] : "";
	
	$js_db_query = "SELECT * FROM js_user WHERE userid = '$js_userid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $userid, $user_name) = $database->get_row( $js_db_query );
		$results['user'] = $userid;
	} else  {
		return false;
		header( "Location: index.php?action=user_all");	
	}
	
	require( JS_INC . "js_user_view.php" );
		
}

function profile() {
	$results = array();
	$results['pageTitle'] = "Mkangara Agrovet Products";
	$results['pageAction'] = "Profile"; 
	$js_username = $_SESSION['mysitei_user'];
	
	$js_db_query = "SELECT * FROM js_user WHERE user_name = '$js_username'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $userid, $user_name) = $database->get_row( $js_db_query );
		$results['user'] = $userid;
	} else  {
		return false;
		header( "Location: index.php?action=users");	
	}
	
	require( JS_INC . "js_viewuser.php" );
		
}

?>