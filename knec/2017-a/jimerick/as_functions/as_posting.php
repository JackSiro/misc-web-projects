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
 	
	function as_submit_bills(){
		$database = new As_Dbconn();			
		$new_patient_details = array(
			'bill_patient' => trim($_POST['patient']),
			'bill_title' => trim($_POST['description']),
			'bill_expected' => trim($_POST['expected']),
			'bill_billing' => trim($_POST['amount']),
		    'bill_posted' => date('Y-m-d H:i:s'),
		    'bill_postedby' => "1",
		);
			
		$add_query = $database->as_insert( 'as_billing', $new_patient_details ); 
	}
	
	function as_update_bills($billid){
		$database = new As_Dbconn();			
		$Update_Item_Details = array(
			'bill_title' => trim($_POST['description']),
			'bill_expected' => trim($_POST['expected']),
			'bill_billing' => trim($_POST['amount']),
		    'bill_updated' => date('Y-m-d H:i:s'),
		    'bill_updatedby' => "1",
		);
		 
		$where_clause = array('billid' => $billid);
		$updated = $database->as_update( 'as_billing', $Update_Item_Details, $where_clause, 1 );
	}
	
	function as_add_new_patient(){
		$database = new As_Dbconn();			
		$new_patient_details = array(
			'patient_name' => trim($_POST['fullname']),
			'patient_sex' => trim($_POST['sex']),
			'patient_location' => trim($_POST['location']),
			'patient_sickness' => trim($_POST['sickness']),
			'patient_type' => trim($_POST['type']),
		    'patient_posted' => date('Y-m-d H:i:s'),
		    'patient_postedby' => "1",
		);			
		$add_query = $database->as_insert( 'as_patient', $new_patient_details ); 
	}
		
	function as_edit_patient($patientid) {
		$database = new As_Dbconn();
		
		$update_patient_details = array(
			'patient_name' => trim($_POST['fullname']),
			'patient_sex' => trim($_POST['sex']),
			'patient_location' => trim($_POST['location']),
			'patient_sickness' => trim($_POST['sickness']),
			'patient_type' => trim($_POST['type']),
		    'patient_updated' => date('Y-m-d H:i:s'),
		    'patient_updatedby' => "1",
		);
		$where_clause = array('patientid' => $patientid);
		$updated = $database->as_update( 'as_patient', $update_patient_details, $where_clause, 1 );
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
	
?>