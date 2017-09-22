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
	//visitor_name, visitor_fullname, visitor_sex, visitor_email, visitor_joined, visitor_mobile, visitor_address, visitor_web, visitor_avatar
	
	function as_new_visitor(){
		$database = new As_Dbconn();			
		$New_Item_Details = array(
			'visitor_fullname' => trim($_POST['fullname']),
			'visitor_email' => trim($_POST['email']),
			'visitor_mobile' => as_slug_this($_POST['mobile']),
			'visitor_address' => trim($_POST['address']),
			'visitor_joined' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->as_insert( 'as_visitor', $New_Item_Details ); 
	}
			
	function as_update_visitor($visitorid) {
		$database = new As_Dbconn();	
		$Update_Item_Details = array(
			'visitor_fullname' => trim($_POST['fullname']),
			'visitor_email' => trim($_POST['email']),
			'visitor_mobile' => as_slug_this($_POST['mobile']),
			'visitor_address' => trim($_POST['address']),
			'visitor_joined' => date('Y-m-d H:i:s'),
		);
		$where_clause = array('visitorid' => $visitorid);
		$updated = $database->as_update( 'as_visitor', $Update_Item_Details, $where_clause, 1 );
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
 	//visitid, visit_paidby, visit_amount, visit_paid, visit_session, visit_stoptime, visit_place, visit_paidby, visit_paid, 
	
	function as_add_new_visit(){
		$database = new As_Dbconn();			
		$New_Item_Details = array(
			'visit_amount' => trim($_POST['amount']),
			'visit_session' => trim($_POST['session']),
			'visit_date' => trim($_POST['date']),
		    'visit_paid' => date('Y-m-d H:i:s'),
			'visit_paidby' => trim($_POST['visitorid']),
		);
			
		$add_query = $database->as_insert( 'as_visit', $New_Item_Details ); 
	}
			
	function as_update_visit($visitid) {
		$database = new As_Dbconn();	
		$Update_Item_Details = array(
			'visit_amount' => trim($_POST['amount']),
			'visit_session' => trim($_POST['session']),
		);
		$where_clause = array('visitid' => $visitid);
		$updated = $database->as_update( 'as_visit', $Update_Item_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
?>