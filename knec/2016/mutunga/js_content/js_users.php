<?php
	
function user_all() {
	$results = array();
	$results['pageTitle'] = "Nafaka Electronicss Suppliers";
	$results['pageAction'] = "Users";  
	require( JS_INC . "js_user_all.php" );
}

function user_new() {
	$results = array();
	$results['pageTitle'] = "Nafaka Electronicss Suppliers";
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
	$results['pageTitle'] = "Nafaka Electronicss Suppliers";
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

function user_delete() {
	$js_userid = isset( $_GET['js_userid'] ) ? $_GET['js_userid'] : "";
	
	$database = new Js_Dbconn();
	$js_db_query = "DELETE * FROM js_user WHERE userid = '$js_userid'";
	$delete = array(
		'userid' => $js_userid,
	);
	$deleted = $database->delete( 'js_user', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=user_all");	
	}
}
	
function profile() {
	$results = array();
	$results['pageTitle'] = "Nafaka Electronicss Suppliers";
	$results['pageAction'] = "Profile"; 
	$js_username = $_SESSION['mutunga_user'];
	
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


function forgot_username() {
	$results = array();
	$results['pageTitle'] = "Doctors Appointment";
	$results['pageAction'] = "ForgotUsername"; 
	
	if ( isset( $_POST['ForgotUsername'] ) ) {
		$email = $_POST['username'];
		$password = md5($_POST['password']);
		js_recover_username($email, $password);
		header( "Location: index.php?action=recovered_username");		
	}  else {
		require( JS_INC . "js_forgot_username.php" );
	}	
	
}

function forgot_password() {
	$results = array();
	$results['pageTitle'] = "Doctors Appointment";
	$results['pageAction'] = "ForgotPassword"; 
	
	if ( isset( $_POST['ForgotPassword'] ) ) {
		$username = $_POST['username'];
		$email = $_POST['email'];
		js_recover_password($username, $email);
		header( "Location: index.php?action=recover_password");		
	}  else {
		require( JS_INC . "js_forgot_password.php" );
	}	
	
}

function recover_username() {
	$results = array();
	$results['pageTitle'] = "Doctors Appointment";
	$results['pageAction'] = "RecoveredUsername"; 
	require( JS_INC . "js_recover_username.php" );
	
}

function recover_password() {
	$results = array();
	$results['pageTitle'] = "Doctors Appointment";
	$results['pageAction'] = "RecoveredPassword"; 
	
	if ( isset( $_POST['RecoverPassword'] ) ) {
		$username = $_POST['username'];
		$password = md5($_POST['passwordcon']);
		js_change_password($username);
		header( "Location: index.php");		
	}  else {
		require( JS_INC . "js_recover_password.php" );
	}
}

?>