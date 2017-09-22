<?php
	  
 function billing_all() {
	$results = array();
	$results['pageTitle'] = "AP System";
	$results['pageAction'] = "All billings"; 
	
	require( AS_INC . "as_billing_all.php" );
 }

  function billing_new() {
	$results = array();
	$results['pageTitle'] = "AP System";
	$results['pageAction'] = "Newbilling"; 
	
	if ( isset( $_POST['Submitbills'] ) ) {
		as_submit_bills();
		header( "Location: index.php?action=billing_all");
	}  else {
		require( AS_INC . "as_billing_new.php" );
	}
  }
  
  function billing_view() {
	$results = array();
	$results['pageTitle'] = "AP System";
	$results['pageAction'] = "Viewbilling"; 
	$as_billidid = isset( $_GET['as_billidid'] ) ? $_GET['as_billidid'] : "";
	
	$as_db_query = "SELECT * FROM as_billing WHERE billidid = '$as_billidid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $billidid) = $database->get_row( $as_db_query );
		$results['billid'] = $billid;
	} else  {
		return false;
		header( "Location: index.php?action=billing_all");	
	}
		
	if ( isset( $_POST['Updatebills'] ) ) {
		$billid = $_POST['billid'];
		as_update_bills($billid);
		header( "Location: index.php?action=billing_view&&as_billingid=".$billid);
	}  else {
		require( AS_INC . "as_billing_view.php" );
	}
  }
	  
 function patient_all() {
	$results = array();
	$results['pageTitle'] = "AP System";
	$results['pageAction'] = "All patients"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$as_search = $_POST['as_search'];
		$as_catid = $_POST['as_catid'];
		
		header( "Location: index.php?action=as_search&&as_search=".$as_search."&&as_catid=".$as_catid);
								
	}  else {	
		require( AS_INC . "as_patient_all.php" );
	}
 }

  function patient_new() {
	$results = array();
	$results['pageTitle'] = "AP System";
	$results['pageAction'] = "Newpatient"; 
	
	if ( isset( $_POST['Addpatient'] ) ) {
		as_add_new_patient();
		header( "Location: index.php?action=patient_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_add_new_patient();
		header( "Location: index.php?action=patient_all");						
	}  else {
		require( AS_INC . "as_patient_new.php" );
	}
}

 function patient_view() {
	$results = array();
	$results['pageTitle'] = "AP System";
	$results['pageAction'] = "Viewpatient"; 
	$as_patientid = isset( $_GET['as_patientid'] ) ? $_GET['as_patientid'] : "";
	
	$as_db_query = "SELECT * FROM as_patient WHERE patientid = '$as_patientid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $patientid) = $database->get_row( $as_db_query );
		$results['patient'] = $patientid;
	} else  {
		return false;
		header( "Location: index.php?action=patient_all");	
	}
	
	if ( isset( $_POST['Updatepatient'] ) ) {
		as_edit_patient($as_patientid);
		header( "Location: index.php?action=patient_view&&as_patientid=".$as_patientid);
	}  else {
		require( AS_INC . "as_patient_view.php" );
	}
}

 function patient_delete() {
	$as_patientid = isset( $_GET['as_patientid'] ) ? $_GET['as_patientid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_patient WHERE patientid = '$as_patientid'";
	$delete = array(
		'patientid' => $as_patientid,
	);
	$deleted = $database->delete( 'as_patient', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=patient_all");	
	}
 }

	
function register() {
	$results = array();
	$results['pageTitle'] = "clients complaint";
	$results['pageAction'] = "Register"; 
	
	if ( isset( $_POST['Register'] ) ) {
		as_register_me();
		header( "Location: index.php");		
	}  else {
		require( AS_INC . "as_user_register.php" );
	}	
	
}

function forgot_username() {
	$results = array();
	$results['pageTitle'] = "clients complaint";
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
	$results['pageTitle'] = "clients complaint";
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
	$results['pageTitle'] = "clients complaint";
	$results['pageAction'] = "RecoveredUsername"; 
	require( AS_INC . "as_recover_username.php" );
	
}

function recover_password() {
	$results = array();
	$results['pageTitle'] = "clients complaint";
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