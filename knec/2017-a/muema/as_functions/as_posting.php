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
	//client_name, client_fullname, client_sex, client_email, client_joined, client_mobile, client_address, client_web, client_avatar
	
	function as_new_client(){
		$database = new As_Dbconn();			
		$New_Item_Details = array(
			'client_fullname' => trim($_POST['fullname']),
			'client_email' => trim($_POST['email']),
			'client_mobile' => as_slug_this($_POST['mobile']),
			'client_address' => trim($_POST['address']),
			'client_joined' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->as_insert( 'as_client', $New_Item_Details ); 
	}
			
	function as_update_client($clientid) {
		$database = new As_Dbconn();	
		$Update_Item_Details = array(
			'client_fullname' => trim($_POST['fullname']),
			'client_email' => trim($_POST['email']),
			'client_mobile' => as_slug_this($_POST['mobile']),
			'client_address' => trim($_POST['address']),
			'client_joined' => date('Y-m-d H:i:s'),
		);
		$where_clause = array('clientid' => $clientid);
		$updated = $database->as_update( 'as_client', $Update_Item_Details, $where_clause, 1 );
		if( $updated )	{	}
	
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
 	//paymentid, payment_paidby, payment_amount, payment_paid, payment_session, payment_stoptime, payment_place, payment_paidby, payment_paid, 
	
	function as_add_new_payment(){
		$database = new As_Dbconn();			
		$New_Item_Details = array(
			'payment_amount' => trim($_POST['amount']),
			'payment_session' => trim($_POST['session']),
			'payment_date' => trim($_POST['date']),
		    'payment_paid' => date('Y-m-d H:i:s'),
			'payment_paidby' => trim($_POST['clientid']),
		);
			
		$add_query = $database->as_insert( 'as_payment', $New_Item_Details ); 
	}
			
	function as_update_payment($paymentid) {
		$database = new As_Dbconn();	
		$Update_Item_Details = array(
			'payment_amount' => trim($_POST['amount']),
			'payment_session' => trim($_POST['session']),
		);
		$where_clause = array('paymentid' => $paymentid);
		$updated = $database->as_update( 'as_payment', $Update_Item_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
?>