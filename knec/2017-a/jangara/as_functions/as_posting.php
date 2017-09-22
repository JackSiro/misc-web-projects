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
	//worker_name, worker_fullname, worker_sex, worker_email, worker_joined, worker_mobile, worker_address, worker_web, worker_avatar
	
	function as_new_worker(){
		$database = new As_Dbconn();			
		$New_Item_Details = array(
			'worker_fullname' => trim($_POST['fullname']),
			'worker_email' => trim($_POST['email']),
			'worker_mobile' => as_slug_this($_POST['mobile']),
			'worker_address' => trim($_POST['address']),
			'worker_joined' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->as_insert( 'as_worker', $New_Item_Details ); 
	}
			
	function as_edit_worker($workerid) {
		$database = new As_Dbconn();	
		$Update_Item_Details = array(
			'worker_fullname' => trim($_POST['fullname']),
			'worker_email' => trim($_POST['email']),
			'worker_mobile' => as_slug_this($_POST['mobile']),
			'worker_address' => trim($_POST['address']),
			'worker_joined' => date('Y-m-d H:i:s'),
		);
		$where_clause = array('workerid' => $workerid);
		$updated = $database->as_update( 'as_worker', $Update_Item_Details, $where_clause, 1 );
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
 	//scheduleid, schedule_worker, schedule_type, schedule_day, schedule_starttime, schedule_stoptime, schedule_place, schedule_createdby, schedule_created, 
	
	function as_add_new_schedule(){
		$database = new As_Dbconn();			
		$New_Item_Details = array(
			'schedule_type' => trim($_POST['type']),
			'schedule_worker' => trim($_POST['workerid']),
			'schedule_day' => trim($_POST['day']),
			'schedule_starttime' => trim($_POST['starttime']),
			'schedule_stoptime' => trim($_POST['stoptime']),
			'schedule_place' => trim($_POST['place']),
		    'schedule_created' => date('Y-m-d H:i:s'),
		    'schedule_createdby' => "1",
		);
			
		$add_query = $database->as_insert( 'as_schedule', $New_Item_Details ); 
	}
			
	function as_edit_schedule($scheduleid) {
		$database = new As_Dbconn();	
		$Update_Item_Details = array(
			'schedule_cat' => trim($_POST['type']),
			'schedule_title' => trim($_POST['title']),
			'schedule_slug' => $as_slug,
			'schedule_content' => trim($_POST['content']),
			'schedule_publisher' => trim($_POST['publisher']),
			'schedule_code' => trim($_POST['code']),
			'schedule_subject' => trim($_POST['subject']),
			'schedule_img' => trim($as_image),
		    'schedule_posted' => date('Y-m-d H:i:s'),
		    'schedule_postedby' => "1",
		);
		$where_clause = array('scheduleid' => $scheduleid);
		$updated = $database->as_update( 'as_schedule', $Update_Item_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
?>