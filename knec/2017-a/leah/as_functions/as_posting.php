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
	//item_name, item_code, item_description, item_unit, item_created
	
	function as_new_item(){
		$database = new As_Dbconn();			
		$New_Item_Details = array(
			'item_name' => trim($_POST['name']),
			'item_code' => trim($_POST['code']),
			'item_description' => trim($_POST['description']),
			'item_unit' => trim($_POST['unit']),
			'item_created' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->as_insert( 'as_item', $New_Item_Details ); 
	}
			
	function as_update_item($itemid) {
		$database = new As_Dbconn();	
		$Update_Item_Details = array(
			'item_name' => trim($_POST['name']),
			'item_code' => trim($_POST['code']),
			'item_description' => trim($_POST['description']),
			'item_unit' => trim($_POST['unit']),
		);
		$where_clause = array('itemid' => $itemid);
		$updated = $database->as_update( 'as_item', $Update_Item_Details, $where_clause, 1 );
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
	
 	//recordid, record_item, record_place, record_time, record_date, record_measure	
	function as_add_new_record(){
		$database = new As_Dbconn();			
		$New_Item_Details = array(
			'record_item' => trim($_POST['itemid']),
			'record_place' => trim($_POST['place']),
			'record_time' => trim($_POST['time']),
			'record_date' => trim($_POST['date']),
			'record_measure' => trim($_POST['measure']),
		    'record_posted' => date('Y-m-d H:i:s'),
			'record_postedby' => "1",
		);
			
		$add_query = $database->as_insert( 'as_record', $New_Item_Details ); 
	}
			
	function as_update_record($recordid) {
		$database = new As_Dbconn();	
		$Update_Item_Details = array(
			'record_item' => trim($_POST['title']),
			'record_place' => trim($_POST['place']),
			'record_time' => trim($_POST['time']),
			'record_date' => trim($_POST['date']),
		);
		$where_clause = array('recordid' => $recordid);
		$updated = $database->as_update( 'as_record', $Update_Item_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
?>