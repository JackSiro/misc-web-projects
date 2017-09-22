<?php
	  
 function rating_all() {
	$results = array();
	$results['pageTitle'] = "AP System";
	$results['pageAction'] = "All Ratings"; 
	
	require( AS_INC . "as_rating_all.php" );
 }

  function rating_new() {
	$results = array();
	$results['pageTitle'] = "AP System";
	$results['pageAction'] = "Newrating"; 
	
	if ( isset( $_POST['SubmitRates'] ) ) {
		as_submit_rates();
		header( "Location: index.php?action=rating_all");
	}  else {
		require( AS_INC . "as_rating_new.php" );
	}
  }
	  
 function worker_all() {
	$results = array();
	$results['pageTitle'] = "AP System";
	$results['pageAction'] = "All Workers"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$as_search = $_POST['as_search'];
		$as_catid = $_POST['as_catid'];
		
		header( "Location: index.php?action=as_search&&as_search=".$as_search."&&as_catid=".$as_catid);
								
	}  else {	
		require( AS_INC . "as_worker_all.php" );
	}
 }

  function worker_new() {
	$results = array();
	$results['pageTitle'] = "AP System";
	$results['pageAction'] = "Newworker"; 
	
	if ( isset( $_POST['AddWorker'] ) ) {
		as_add_new_worker();
		header( "Location: index.php?action=worker_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_add_new_worker();
		header( "Location: index.php?action=worker_all");						
	}  else {
		require( AS_INC . "as_worker_new.php" );
	}	
	
}

 function worker_view() {
	$results = array();
	$results['pageTitle'] = "AP System";
	$results['pageAction'] = "Viewworker"; 
	$as_workerid = isset( $_GET['as_workerid'] ) ? $_GET['as_workerid'] : "";
	
	$as_db_query = "SELECT * FROM as_worker WHERE workerid = '$as_workerid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $workerid) = $database->get_row( $as_db_query );
		$results['worker'] = $workerid;
	} else  {
		return false;
		header( "Location: index.php?action=worker_all");	
	}
		
	if ( isset( $_POST['SaveChanges'] ) ) {
		as_edit_worker($as_workerid);
		header( "Location: index.php?action=worker_edit&&as_workerid=".$as_workerid);						
	}   else {
		require( AS_INC . "as_worker_view.php" );
	}
	
}

 function worker_delete() {
	$as_workerid = isset( $_GET['as_workerid'] ) ? $_GET['as_workerid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_worker WHERE workerid = '$as_workerid'";
	$delete = array(
		'workerid' => $as_workerid,
	);
	$deleted = $database->delete( 'as_worker', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=worker_all");	
	}
 }

 	  
 function request_all() {
	$results = array();
	$results['pageTitle'] = "Mkangara Agrovet Requests";
	$results['pageAction'] = "All Requests"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$as_search = $_POST['as_search'];
		$as_catid = $_POST['as_catid'];
		
		header( "Location: index.php?action=as_search&&as_search=".$as_search."&&as_catid=".$as_catid);
								
	}  else {	
		require( AS_INC . "as_request_all.php" );
	}
 }

  function request_new() {
	$results = array();
	$results['pageTitle'] = "Mkangara Agrovet Requests";
	$results['pageAction'] = "Newrequest"; 
	
	if ( isset( $_POST['AddRequest'] ) ) {
		as_add_new_request();
		header( "Location: index.php?action=request_all");						
	}  else {
		require( AS_INC . "as_request_new.php" );
	}	
	
}

 function request_view() {
	$results = array();
	$results['pageTitle'] = "Mkangara Agrovet Requests";
	$results['pageAction'] = "Viewrequest"; 
	$as_requestid = isset( $_GET['as_requestid'] ) ? $_GET['as_requestid'] : "";
	
	$as_db_query = "SELECT * FROM as_request WHERE requestid = '$as_requestid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $requestid) = $database->get_row( $as_db_query );
		$results['request'] = $requestid;
	} else  {
		return false;
		header( "Location: index.php?action=request_all");	
	}
		
	if ( isset( $_POST['SaveChanges'] ) ) {
		as_edit_request($as_requestid);
		header( "Location: index.php?action=request_edit&&as_requestid=".$as_requestid);						
	}   else {
		require( AS_INC . "as_request_view.php" );
	}
	
}

 function request_delete() {
	$as_requestid = isset( $_GET['as_requestid'] ) ? $_GET['as_requestid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_request WHERE requestid = '$as_requestid'";
	$delete = array(
		'requestid' => $as_requestid,
	);
	$deleted = $database->delete( 'as_request', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=request_all");	
	}
 }

  	  
 function invoice_all() {
	$results = array();
	$results['pageTitle'] = "Mkangara Agrovet Invoices";
	$results['pageAction'] = "All Invoices"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$as_search = $_POST['as_search'];
		$as_catid = $_POST['as_catid'];
		
		header( "Location: index.php?action=as_search&&as_search=".$as_search."&&as_catid=".$as_catid);
								
	}  else {	
		require( AS_INC . "as_invoice_all.php" );
	}
 }

  function invoice_new() {
	$results = array();
	$results['pageTitle'] = "Mkangara Agrovet Invoices";
	$results['pageAction'] = "Newinvoice"; 
	
	if ( isset( $_POST['AddInvoice'] ) ) {
		as_add_new_invoice();
		header( "Location: index.php?action=invoice_all");						
	}  else {
		require( AS_INC . "as_invoice_new.php" );
	}	
	
}

 function invoice_view() {
	$results = array();
	$results['pageTitle'] = "Mkangara Agrovet Invoices";
	$results['pageAction'] = "Viewinvoice"; 
	$as_invoiceid = isset( $_GET['as_invoiceid'] ) ? $_GET['as_invoiceid'] : "";
	
	$as_db_query = "SELECT * FROM as_invoice WHERE invoiceid = '$as_invoiceid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $invoiceid) = $database->get_row( $as_db_query );
		$results['invoice'] = $invoiceid;
	} else  {
		return false;
		header( "Location: index.php?action=invoice_all");	
	}
		
	if ( isset( $_POST['SaveChanges'] ) ) {
		as_edit_invoice($as_invoiceid);
		header( "Location: index.php?action=invoice_edit&&as_invoiceid=".$as_invoiceid);						
	}   else {
		require( AS_INC . "as_invoice_view.php" );
	}
	
}

 function invoice_delete() {
	$as_invoiceid = isset( $_GET['as_invoiceid'] ) ? $_GET['as_invoiceid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_invoice WHERE invoiceid = '$as_invoiceid'";
	$delete = array(
		'invoiceid' => $as_invoiceid,
	);
	$deleted = $database->delete( 'as_invoice', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=invoice_all");	
	}
 }

	  
 function payment_all() {
	$results = array();
	$results['pageTitle'] = "Mkangara Agrovet Payments";
	$results['pageAction'] = "All Payments"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$as_search = $_POST['as_search'];
		$as_catid = $_POST['as_catid'];
		
		header( "Location: index.php?action=as_search&&as_search=".$as_search."&&as_catid=".$as_catid);
								
	}  else {	
		require( AS_INC . "as_payment_all.php" );
	}
 }

  function payment_new() {
	$results = array();
	$results['pageTitle'] = "Mkangara Agrovet Payments";
	$results['pageAction'] = "Newpayment"; 
	
	if ( isset( $_POST['AddPayment'] ) ) {
		as_add_new_payment();
		header( "Location: index.php?action=payment_all");						
	}  else {
		require( AS_INC . "as_payment_new.php" );
	}	
	
}

 function payment_view() {
	$results = array();
	$results['pageTitle'] = "Mkangara Agrovet Payments";
	$results['pageAction'] = "Viewpayment"; 
	$as_paymentid = isset( $_GET['as_paymentid'] ) ? $_GET['as_paymentid'] : "";
	
	$as_db_query = "SELECT * FROM as_payment WHERE paymentid = '$as_paymentid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $paymentid) = $database->get_row( $as_db_query );
		$results['payment'] = $paymentid;
	} else  {
		return false;
		header( "Location: index.php?action=payment_all");	
	}
		
	if ( isset( $_POST['SaveChanges'] ) ) {
		as_edit_payment($as_paymentid);
		header( "Location: index.php?action=payment_edit&&as_paymentid=".$as_paymentid);						
	}   else {
		require( AS_INC . "as_payment_view.php" );
	}
	
}

 function payment_delete() {
	$as_paymentid = isset( $_GET['as_paymentid'] ) ? $_GET['as_paymentid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_payment WHERE paymentid = '$as_paymentid'";
	$delete = array(
		'paymentid' => $as_paymentid,
	);
	$deleted = $database->delete( 'as_payment', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=payment_all");	
	}
 }

	  
 function schedule_all() {
	$results = array();
	$results['pageTitle'] = "Mkangara Agrovet Schedules";
	$results['pageAction'] = "All Schedules"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$as_search = $_POST['as_search'];
		$as_catid = $_POST['as_catid'];
		
		header( "Location: index.php?action=as_search&&as_search=".$as_search."&&as_catid=".$as_catid);
								
	}  else {	
		require( AS_INC . "as_schedule_all.php" );
	}
 }

  function schedule_new() {
	$results = array();
	$results['pageTitle'] = "Mkangara Agrovet Schedules";
	$results['pageAction'] = "Newschedule"; 
	
	if ( isset( $_POST['AddSchedule'] ) ) {
		as_add_new_schedule();
		header( "Location: index.php?action=schedule_all");						
	}  else {
		require( AS_INC . "as_schedule_new.php" );
	}	
	
}

 function schedule_view() {
	$results = array();
	$results['pageTitle'] = "Mkangara Agrovet Schedules";
	$results['pageAction'] = "Viewschedule"; 
	$as_scheduleid = isset( $_GET['as_scheduleid'] ) ? $_GET['as_scheduleid'] : "";
	
	$as_db_query = "SELECT * FROM as_schedule WHERE scheduleid = '$as_scheduleid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $scheduleid) = $database->get_row( $as_db_query );
		$results['schedule'] = $scheduleid;
	} else  {
		return false;
		header( "Location: index.php?action=schedule_all");	
	}
		
	if ( isset( $_POST['SaveChanges'] ) ) {
		as_edit_schedule($as_scheduleid);
		header( "Location: index.php?action=schedule_edit&&as_scheduleid=".$as_scheduleid);						
	}   else {
		require( AS_INC . "as_schedule_view.php" );
	}
	
}

 function schedule_delete() {
	$as_scheduleid = isset( $_GET['as_scheduleid'] ) ? $_GET['as_scheduleid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_schedule WHERE scheduleid = '$as_scheduleid'";
	$delete = array(
		'scheduleid' => $as_scheduleid,
	);
	$deleted = $database->delete( 'as_schedule', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=schedule_all");	
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