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
	//attendant_name, attendant_fullname, attendant_sex, attendant_email, attendant_joined, attendant_mobile, attendant_address, attendant_web, attendant_avatar
	
	function as_new_attendant(){
		$database = new As_Dbconn();			
		$New_Item_Details = array(
			'attendant_fullname' => trim($_POST['fullname']),
			'attendant_email' => trim($_POST['email']),
			'attendant_mobile' => as_slug_this($_POST['mobile']),
			'attendant_address' => trim($_POST['address']),
			'attendant_joined' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->as_insert( 'as_attendant', $New_Item_Details ); 
	}
			
	function as_update_attendant($attendantid) {
		$database = new As_Dbconn();	
		$Update_Item_Details = array(
			'attendant_fullname' => trim($_POST['fullname']),
			'attendant_email' => trim($_POST['email']),
			'attendant_mobile' => as_slug_this($_POST['mobile']),
			'attendant_address' => trim($_POST['address']),
			'attendant_joined' => date('Y-m-d H:i:s'),
		);
		$where_clause = array('attendantid' => $attendantid);
		$updated = $database->as_update( 'as_attendant', $Update_Item_Details, $where_clause, 1 );
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
		    'payment_paid' => date('Y-m-d H:i:s'),
			'payment_paidby' => trim($_POST['attendantid']),
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