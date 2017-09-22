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
		
	function as_new_complaint($clientid){
		$database = new As_DbConn();			
		$New_complaint_Details = array(			
			'complaint_client' => $clientid,
			'complaint_title' => trim($_POST['title']),
			'complaint_content' => trim($_POST['content']),
			'complaint_created' => date('Y-m-d H:i:s'),
		);			
		$add_query = $database->as_insert( 'as_complaint', $New_complaint_Details ); 
	}
		
	function as_new_client(){
		$database = new As_DbConn();			
		$New_complaint_Details = array(		
			'client_fullname' => trim($_POST['fullname']),
			'client_email' => trim($_POST['email']),
			'client_joined' => date('Y-m-d H:i:s'),
		);			
		$add_query = $database->as_insert( 'as_client', $New_complaint_Details );
		return $database->as_db_lastid();
	}
	
	function as_edit_complaint($complaintid) {
		$database = new As_DbConn();	
		$Update_complaint_Details = array(
			'complaint_icon' => trim($as_icon),
			'complaint_title' => trim($_POST['title']),
			'complaint_slug' => $as_slug,
			'complaint_content' => trim($_POST['content']),
			'complaint_updated' => date('Y-m-d H:i:s'),
			'complaint_updatedby' => "1",
		);
		$where_clause = array('complaintid' => $complaintid);
		$updated = $database->as_update( 'as_complaint', $Update_complaint_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
 	
	function as_new_reply($complaintid) {
		$database = new As_DbConn();	
		$Update_complaint_Details = array(
			'complaint_reply' => trim($_POST['contreply']),
		);
		$where_clause = array('complaintid' => $complaintid);
		$updated = $database->as_update( 'as_complaint', $Update_complaint_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
 		
	function as_add_admin($admin_username) {		
		$database = new As_DbConn();	
		$Update_Admin_Details = array(
			'user_group' => trim($_POST['admin_role']),
		);
		$where_clause = array('user_name' => $admin_username);
		$updated = $database->as_update( 'AS_USER', $Update_Admin_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
 	
	function as_add_new_complaint(){
		$database = new As_DbConn();			
		$New_Item_Details = array(
			'complaint_patient' => trim($_POST['patient']),
			'complaint_pgender' => trim($_POST['gender']),
			'complaint_clinic' => trim($_POST['clinic']),
			'complaint_reserve' => trim($_POST['reserve']),
			'complaint_dept' => trim($_POST['Complaint']),
			'complaint_client' => trim($_POST['client']),
			'complaint_datetime' => trim($_POST['datetime']),
			'complaint_amount' => trim($_POST['amount']),
			'complaint_payment' => trim($_POST['payment']),
		    'complaint_created' => date('Y-m-d H:i:s'),
		    'complaint_createdby' => "1",
		);
			
		$add_query = $database->as_insert( 'as_complaint', $New_Item_Details ); 
	}
			
	
?>