<?php
	
function facilitator_all() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "Users";  
	require( AS_INC . "as_facilitator_all.php" );
}

function facilitator_new() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "Newfacilitator"; 
	
	if ( isset( $_POST['AddUser'] ) ) {
		as_add_new_facilitator();
		header( "Location: index.php?action=facilitator_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_add_new_facilitator();
		header( "Location: index.php?action=facilitator_all");						
	}  else {
		require( AS_INC . "as_facilitator_new.php" );
	}	
	
}
function facilitator_view() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "Viewfacilitator"; 
	$as_facilitatorid = isset( $_GET['as_facilitatorid'] ) ? $_GET['as_facilitatorid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "SELECT * FROM as_facilitator WHERE facilitatorid = '$as_facilitatorid'";
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $facilitatorid, $facilitator_name) = $database->get_row( $as_db_query );
		$results['facilitator'] = $facilitatorid;
	} else  {
		return false;
		header( "Location: index.php?action=facilitator_all");	
	}
	
	require( AS_INC . "as_facilitator_view.php" );
		
}

function facilitator_delete() {
	$as_facilitatorid = isset( $_GET['as_facilitatorid'] ) ? $_GET['as_facilitatorid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_facilitator WHERE facilitatorid = '$as_facilitatorid'";
	$delete = array(
		'facilitatorid' => $as_facilitatorid,
	);
	$deleted = $database->delete( 'as_facilitator', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=facilitator_all");	
	}
}
	
function profile() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "Profile"; 
	$as_username = $_SESSION['sitefacilitator_facilitator'];
	
	$as_db_query = "SELECT * FROM as_facilitator WHERE facilitator_name = '$as_username'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $facilitatorid, $facilitator_name) = $database->get_row( $as_db_query );
		$results['facilitator'] = $facilitatorid;
	} else  {
		return false;
		header( "Location: index.php?action=facilitators");	
	}
	
	require( AS_INC . "as_viewfacilitator.php" );
		
}


function forgot_username() {
	$results = array();
	$results['pageTitle'] = "Doctors Appointment";
	$results['pageAction'] = "ForgotUsername"; 
	
	if ( isset( $_POST['ForgotUsername'] ) ) {
		$email = $_POST['username'];
		$password = md5($_POST['password']);
		as_recover_username($email, $password);
		header( "Location: index.php?action=recovered_username");		
	}  else {
		require( AS_INC . "as_forgot_username.php" );
	}	
	
}

function forgot_password() {
	$results = array();
	$results['pageTitle'] = "Doctors Appointment";
	$results['pageAction'] = "ForgotPassword"; 
	
	if ( isset( $_POST['ForgotPassword'] ) ) {
		$username = $_POST['username'];
		$email = $_POST['email'];
		as_recover_password($username, $email);
		header( "Location: index.php?action=recover_password");		
	}  else {
		require( AS_INC . "as_forgot_password.php" );
	}	
	
}

function recover_username() {
	$results = array();
	$results['pageTitle'] = "Doctors Appointment";
	$results['pageAction'] = "RecoveredUsername"; 
	require( AS_INC . "as_recover_username.php" );
	
}

function recover_password() {
	$results = array();
	$results['pageTitle'] = "Doctors Appointment";
	$results['pageAction'] = "RecoveredPassword"; 
	
	if ( isset( $_POST['RecoverPassword'] ) ) {
		$username = $_POST['username'];
		$password = md5($_POST['passwordcon']);
		as_change_password($username);
		header( "Location: index.php");		
	}  else {
		require( AS_INC . "as_recover_password.php" );
	}
}

?>