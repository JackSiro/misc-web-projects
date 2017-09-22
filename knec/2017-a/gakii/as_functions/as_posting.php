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
	//lost_title, lost_content, lost_place, lost_email, lost_joined, lost_mobile, lost_address, lost_web, lost_avatar
	
	function as_new_lost(){
		$database = new As_Dbconn();			
		$New_Item_Details = array(
			'lost_title' => trim($_POST['title']),
			'lost_place' => trim($_POST['place']),
			'lost_content' => trim($_POST['content']),
			'lost_posted' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->as_insert( 'as_lost', $New_Item_Details ); 
	}
			
	function as_update_lost($lostid) {
		$database = new As_Dbconn();	
		$Update_Item_Details = array(
			'lost_title' => trim($_POST['title']),
			'lost_place' => trim($_POST['place']),
			'lost_content' => trim($_POST['content']),
			'lost_posted' => date('Y-m-d H:i:s'),
		);
		$where_clause = array('lostid' => $lostid);
		$updated = $database->as_update( 'as_lost', $Update_Item_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
 		
	function as_new_found(){
		$database = new As_Dbconn();			
		$New_Item_Details = array(
			'found_title' => trim($_POST['title']),
			'found_place' => trim($_POST['place']),
			'found_content' => trim($_POST['content']),
			'found_posted' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->as_insert( 'as_found', $New_Item_Details ); 
	}
			
	function as_update_found($foundid) {
		$database = new As_Dbconn();	
		$Update_Item_Details = array(
			'found_title' => trim($_POST['title']),
			'found_place' => trim($_POST['place']),
			'found_content' => trim($_POST['content']),
			'found_posted' => date('Y-m-d H:i:s'),
		);
		$where_clause = array('foundid' => $foundid);
		$updated = $database->as_update( 'as_found', $Update_Item_Details, $where_clause, 1 );
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
 	
?>