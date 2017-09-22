<?php
	// POSTING FUNCTIONS
	// Begin Posting Functions 
	
	function js_slug_this($content) {
		return preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "-", strtolower($content)));
	}
	
	function js_slug_is(){
		if(empty($_POST['slug'])) {
		    $js_slug = trim($_POST['slug']);
		} else $js_slug = js_slug_this($_POST['title']);
		
	}
		
	function js_add_admin($admin_username) {		
		$database = new Js_Dbconn();	
		$Update_Admin_Details = array(
			'user_group' => trim($_POST['admin_role']),
		);
		$where_clause = array('user_name' => $admin_username);
		$updated = $database->js_update( 'js_user', $Update_Admin_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
 	
	function js_add_new_product(){
			
		$database = new Js_Dbconn();			
		$new_product_details = array(
			'product_title' => trim($_POST['title']),
			'product_quantity' => trim($_POST['quantity']),
			'product_price' => trim($_POST['price']),
			'product_price' => trim($_POST['price']),
		    'product_posted' => date('Y-m-d H:i:s'),
		    'product_postedby' => "1",
		);
			
		$add_query = $database->js_insert( 'js_product', $new_product_details ); 
	}
			
	function js_edit_product($productid) {
		$database = new Js_Dbconn();	
		
		$update_product_details = array(
			'product_title' => trim($_POST['title']),
			'product_quantity' => trim($_POST['quantity']),
			'product_price' => trim($_POST['price']),
			'product_price' => trim($_POST['price']),
		);
		$where_clause = array('productid' => $productid);
		$updated = $database->js_update( 'js_product', $update_product_details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
	function js_add_new_request(){
			
		$database = new Js_Dbconn();			
		$new_request_details = array(
			'request_type' => trim($_POST['title']),
			'request_item' => trim($_POST['quantity']),
			'request_payment' => trim($_POST['price']),
			'request_payment' => trim($_POST['price']),
		    'request_posted' => date('Y-m-d H:i:s'),
		    'request_postedby' => "1",
		);
			
		$add_query = $database->js_insert( 'js_request', $new_request_details ); 
	}
			
	function js_edit_request($requestid) {
		$database = new Js_Dbconn();	
		
		$update_request_details = array(
			'request_type' => trim($_POST['title']),
			'request_item' => trim($_POST['quantity']),
			'request_payment' => trim($_POST['price']),
			'request_payment' => trim($_POST['price']),
		);
		$where_clause = array('requestid' => $requestid);
		$updated = $database->js_update( 'js_request', $update_request_details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
	function js_add_new_invoice(){
			
		$database = new Js_Dbconn();			
		$new_invoice_details = array(
			'invoice_type' => trim($_POST['title']),
			'invoice_amount' => trim($_POST['quantity']),
			'invoice_item' => trim($_POST['price']),
			'invoice_item' => trim($_POST['price']),
		    'invoice_posted' => date('Y-m-d H:i:s'),
		    'invoice_postedby' => "1",
		);
			
		$add_query = $database->js_insert( 'js_invoice', $new_invoice_details ); 
	}
			
	function js_edit_invoice($invoiceid) {
		$database = new Js_Dbconn();	
		
		$update_invoice_details = array(
			'invoice_type' => trim($_POST['title']),
			'invoice_amount' => trim($_POST['quantity']),
			'invoice_item' => trim($_POST['price']),
			'invoice_item' => trim($_POST['price']),
		);
		$where_clause = array('invoiceid' => $invoiceid);
		$updated = $database->js_update( 'js_invoice', $update_invoice_details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
	function js_add_new_payment(){
			
		$database = new Js_Dbconn();			
		$new_payment_details = array(
			'payment_amount' => trim($_POST['title']),
			'payment_payer' => trim($_POST['quantity']),
			'payment_payee' => trim($_POST['price']),
			'payment_payee' => trim($_POST['price']),
		    'payment_posted' => date('Y-m-d H:i:s'),
		    'payment_postedby' => "1",
		);
			
		$add_query = $database->js_insert( 'js_payment', $new_payment_details ); 
	}
			
	function js_edit_payment($paymentid) {
		$database = new Js_Dbconn();	
		
		$update_payment_details = array(
			'payment_amount' => trim($_POST['title']),
			'payment_payer' => trim($_POST['quantity']),
			'payment_payee' => trim($_POST['price']),
			'payment_payee' => trim($_POST['price']),
		);
		$where_clause = array('paymentid' => $paymentid);
		$updated = $database->js_update( 'js_payment', $update_payment_details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
	function js_add_new_schedule(){
			
		$database = new Js_Dbconn();			
		$new_schedule_details = array(
			'schedule_user' => trim($_POST['title']),
			'schedule_time' => trim($_POST['quantity']),
			'schedule_transport' => trim($_POST['price']),
			'schedule_transport' => trim($_POST['price']),
		    'schedule_posted' => date('Y-m-d H:i:s'),
		    'schedule_postedby' => "1",
		);
			
		$add_query = $database->js_insert( 'js_schedule', $new_schedule_details ); 
	}
			
	function js_edit_schedule($scheduleid) {
		$database = new Js_Dbconn();	
		
		$update_schedule_details = array(
			'schedule_user' => trim($_POST['title']),
			'schedule_time' => trim($_POST['quantity']),
			'schedule_transport' => trim($_POST['price']),
			'schedule_transport' => trim($_POST['price']),
		);
		$where_clause = array('scheduleid' => $scheduleid);
		$updated = $database->js_update( 'js_schedule', $update_schedule_details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
	
?>