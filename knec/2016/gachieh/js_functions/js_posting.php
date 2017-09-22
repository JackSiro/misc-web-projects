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
		
	function js_add_new_farmer(){
		$database = new Js_Dbconn();			
		$New_Farmer_Details = array(			
			'farmer_fullname' => trim($_POST['fullname']),
			'farmer_mobile' => trim($_POST['mobile']),
			'farmer_email' => trim($_POST['email']),
			'farmer_gender' => trim($_POST['gender']),
			'farmer_address' => trim($_POST['address']),
		);
			
		$add_query = $database->js_insert( 'js_farmer', $New_Farmer_Details ); 
	}
			
	function js_edit_farmer($farmerid) {
		
		$database = new Js_Dbconn();	
		$Update_Farmer_Details = array(
			'farmer_fullname' => trim($_POST['fullname']),
			'farmer_mobile' => trim($_POST['mobile']),
			'farmer_email' => trim($_POST['email']),
			'farmer_gender' => trim($_POST['gender']),
			'farmer_address' => trim($_POST['address']),
		);
		$where_clause = array('farmerid' => $farmerid);
		$updated = $database->js_update( 'js_farmer', $Update_Farmer_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
 		
	function js_add_admin($admin_username) {		
		$database = new Js_Dbconn();	
		$Update_Admin_Details = array(
			'employee_group' => trim($_POST['admin_role']),
		);
		$where_clause = array('employee_name' => $admin_username);
		$updated = $database->js_update( 'js_employee', $Update_Admin_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
 	
	function js_add_new_session(){
		
		$database = new Js_Dbconn();			
		$New_Item_Details = array(
			'session_starttime' => trim($_POST['starttime']),
			'session_endtime' => trim($_POST['endtime']),
			'session_workingperiod' => trim($_POST['workingperiod']),
		);
			
		$add_query = $database->js_insert( 'js_session', $New_Item_Details ); 
	}
			
	function js_edit_session($sessionid) {
		
		$database = new Js_Dbconn();	
		$Update_Item_Details = array(
			'session_starttime' => trim($_POST['starttime']),
			'session_endtime' => trim($_POST['endtime']),
			'session_workingperiod' => trim($_POST['workingperiod']),
		);
		$where_clause = array('sessionid' => $sessionid);
		$updated = $database->js_update( 'js_session', $Update_Item_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
	
		