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
 	
	function as_add_new_customer(){
		$database = new As_Dbconn();			
		$New_Item_Details = array(
			'customer_name' => trim($_POST['name']),
			'customer_address' => trim($_POST['address']),
			'customer_sex' => trim($_POST['sex']),
		    'customer_registered' => date('Y-m-d H:i:s'),
		    'customer_registeredby' => "1",
		);			
		$add_query = $database->as_insert( 'as_customer', $New_Item_Details ); 
	}
			
	function as_edit_customer($customerid) {
		$database = new As_Dbconn();	
		$Update_Item_Details = array(
			'customer_address' => trim($_POST['name']),
			'customer_name' => trim($_POST['admno']),
			'customer_sex' => trim($_POST['class']),
			'customer_course' => trim($_POST['course']),
			'customer_sex' => trim($_POST['class']),
			'customer_mobile' => trim($_POST['gender']),
			'customer_fee' => trim($_POST['fees']),
		    'customer_registered' => date('Y-m-d H:i:s'),
		    'customer_registeredby' => "1",
		);
		$where_clause = array('customerid' => $customerid);
		$updated = $database->as_update( 'as_customer', $Update_Item_Details, $where_clause, 1 );
	}	
	
	function as_add_new_salesitem(){
		$database = new As_Dbconn();			
		$New_Item_Details = array(
			'salesitem_title' => trim($_POST['title']),
			'salesitem_content' => trim($_POST['content']),
			'salesitem_price' => trim($_POST['price']),
			'salesitem_type' => trim($_POST['type']),
		    'salesitem_created' => date('Y-m-d H:i:s'),
		    'salesitem_createdby' => "1",
		);			
		$add_query = $database->as_insert( 'as_salesitem', $New_Item_Details ); 
	}
			
	function as_edit_salesitem($salesitemid) {
		$database = new As_Dbconn();	
		$Update_Item_Details = array(
			'salesitem_title' => trim($_POST['title']),
			'salesitem_content' => trim($_POST['content']),
			'salesitem_price' => trim($_POST['price']),
			'salesitem_type' => trim($_POST['type']),
		    'salesitem_updated' => date('Y-m-d H:i:s'),
		    'salesitem_updatedby' => "1",
		);
		$where_clause = array('salesitemid' => $salesitemid);
		$updated = $database->as_update( 'as_salesitem', $Update_Item_Details, $where_clause, 1 );
	}
	