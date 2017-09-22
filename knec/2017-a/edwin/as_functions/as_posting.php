<?php
	// POSTING FUNCTIONS
	// Begin Posting Functions 
	
	function as_slug_this($content) {
		return preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "-", strtolower($content)));
	}
	
	function as_slug_is(){
		if(empty($_POST['slug'])) {
		    $as_slug = trim($_POST['slug']);
		} else $as_slug = as_slug_this($_POST['title']);
		
	}
		
	function as_add_admin($admin_username) {		
		$database = new As_Dbconn();	
		$Update_Admin_Details = array(
			'user_group' => trim($_POST['admin_role']),
		);
		$where_clause = array('user_name' => $admin_username);
		$updated = $database->as_update( 'as_user', $Update_Admin_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
 	
	function as_submit_rates(){
		$database = new As_Dbconn();			
		$new_worker_details = array(
			'rate_worker' => trim($_POST['worker']),
			'rate_rating' => trim($_POST['rating']),
			'rate_comment' => trim($_POST['comment']),
		    'rate_posted' => date('Y-m-d H:i:s'),
		    'rate_postedby' => "1",
		);
			
		$add_query = $database->as_insert( 'as_rating', $new_worker_details ); 
	}
	
	function as_add_new_worker(){
		$database = new As_Dbconn();			
		$new_worker_details = array(
			'worker_name' => trim($_POST['fullname']),
			'worker_sex' => trim($_POST['sex']),
			'worker_dept' => trim($_POST['department']),
			'worker_role' => trim($_POST['role']),
		    'worker_posted' => date('Y-m-d H:i:s'),
		    'worker_postedby' => "1",
		);
			
		$add_query = $database->as_insert( 'as_worker', $new_worker_details ); 
	}
		
	function as_edit_worker($workerid) {
		$database = new As_Dbconn();	
		
		$update_worker_details = array(
			'worker_name' => trim($_POST['title']),
			'worker_sex' => trim($_POST['quantity']),
			'worker_dept' => trim($_POST['price']),
			'worker_dept' => trim($_POST['price']),
		);
		$where_clause = array('workerid' => $workerid);
		$updated = $database->as_update( 'as_worker', $update_worker_details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
	function as_add_new_request(){
			
		$database = new As_Dbconn();			
		$new_request_details = array(
			'request_type' => trim($_POST['title']),
			'request_item' => trim($_POST['quantity']),
			'request_payment' => trim($_POST['price']),
			'request_payment' => trim($_POST['price']),
		    'request_posted' => date('Y-m-d H:i:s'),
		    'request_postedby' => "1",
		);
			
		$add_query = $database->as_insert( 'as_request', $new_request_details ); 
	}
			
	function as_edit_request($requestid) {
		$database = new As_Dbconn();	
		
		$update_request_details = array(
			'request_type' => trim($_POST['title']),
			'request_item' => trim($_POST['quantity']),
			'request_payment' => trim($_POST['price']),
			'request_payment' => trim($_POST['price']),
		);
		$where_clause = array('requestid' => $requestid);
		$updated = $database->as_update( 'as_request', $update_request_details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
	function as_add_new_invoice(){
			
		$database = new As_Dbconn();			
		$new_invoice_details = array(
			'invoice_type' => trim($_POST['title']),
			'invoice_amount' => trim($_POST['quantity']),
			'invoice_item' => trim($_POST['price']),
			'invoice_item' => trim($_POST['price']),
		    'invoice_posted' => date('Y-m-d H:i:s'),
		    'invoice_postedby' => "1",
		);
			
		$add_query = $database->as_insert( 'as_invoice', $new_invoice_details ); 
	}
			
	function as_edit_invoice($invoiceid) {
		$database = new As_Dbconn();	
		
		$update_invoice_details = array(
			'invoice_type' => trim($_POST['title']),
			'invoice_amount' => trim($_POST['quantity']),
			'invoice_item' => trim($_POST['price']),
			'invoice_item' => trim($_POST['price']),
		);
		$where_clause = array('invoiceid' => $invoiceid);
		$updated = $database->as_update( 'as_invoice', $update_invoice_details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
	function as_add_new_payment(){
			
		$database = new As_Dbconn();			
		$new_payment_details = array(
			'payment_amount' => trim($_POST['title']),
			'payment_payer' => trim($_POST['quantity']),
			'payment_payee' => trim($_POST['price']),
			'payment_payee' => trim($_POST['price']),
		    'payment_posted' => date('Y-m-d H:i:s'),
		    'payment_postedby' => "1",
		);
			
		$add_query = $database->as_insert( 'as_payment', $new_payment_details ); 
	}
			
	function as_edit_payment($paymentid) {
		$database = new As_Dbconn();	
		
		$update_payment_details = array(
			'payment_amount' => trim($_POST['title']),
			'payment_payer' => trim($_POST['quantity']),
			'payment_payee' => trim($_POST['price']),
			'payment_payee' => trim($_POST['price']),
		);
		$where_clause = array('paymentid' => $paymentid);
		$updated = $database->as_update( 'as_payment', $update_payment_details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
	function as_add_new_schedule(){
			
		$database = new As_Dbconn();			
		$new_schedule_details = array(
			'schedule_user' => trim($_POST['title']),
			'schedule_time' => trim($_POST['quantity']),
			'schedule_transport' => trim($_POST['price']),
			'schedule_transport' => trim($_POST['price']),
		    'schedule_posted' => date('Y-m-d H:i:s'),
		    'schedule_postedby' => "1",
		);
			
		$add_query = $database->as_insert( 'as_schedule', $new_schedule_details ); 
	}
			
	function as_edit_schedule($scheduleid) {
		$database = new As_Dbconn();	
		
		$update_schedule_details = array(
			'schedule_user' => trim($_POST['title']),
			'schedule_time' => trim($_POST['quantity']),
			'schedule_transport' => trim($_POST['price']),
			'schedule_transport' => trim($_POST['price']),
		);
		$where_clause = array('scheduleid' => $scheduleid);
		$updated = $database->as_update( 'as_schedule', $update_schedule_details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
	
?>