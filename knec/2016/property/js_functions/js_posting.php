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
	//rent_tenant, rent_amount, rent_field, rent_paid
	function js_add_new_rent(){
		$database = new Js_Dbconn();			
		$New_House_Details = array(			
			'rent_tenant' => trim($_POST['tenant']),
			'rent_amount' => trim($_POST['amount']),
			'rent_payment' => trim($_POST['payment']),
			'rent_paid' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->js_insert( 'js_rent', $New_House_Details ); 
	}
			
	function js_add_new_house(){
		$database = new Js_Dbconn();			
		$New_House_Details = array(			
			'house_number' => trim($_POST['number']),
			'house_size' => trim($_POST['size']),
			'house_location' => trim($_POST['location']),
			'house_type' => trim($_POST['type']),
			'house_prices' => trim($_POST['prices']),
			'house_created' => date('Y-m-d H:i:s'),
			'house_createdby' => "1",
		);
			
		$add_query = $database->js_insert( 'js_house', $New_House_Details ); 
	}
			
	function js_edit_house($houseid) {
		
		$database = new Js_Dbconn();	
		$Update_House_Details = array(
			'house_number' => trim($_POST['number']),
			'house_size' => trim($_POST['size']),
			'house_location' => trim($_POST['location']),
			'house_type' => trim($_POST['type']),
			'house_prices' => trim($_POST['prices']),
			'house_updated' => date('Y-m-d H:i:s'),
			'house_updatedby' => "1",
		);
		$where_clause = array('houseid' => $houseid);
		$updated = $database->js_update( 'js_house', $Update_House_Details, $where_clause, 1 );
		if( $updated )	{	}
	
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
 	
	function js_add_new_tenant(){
		
		$database = new Js_Dbconn();			
		$New_House_Details = array(
			'tenant_name' => trim($_POST['name']),
			'tenant_house' => trim($_POST['house']),
			'tenant_idno' => js_slug_this($_POST['idno']),
			'tenant_status' => trim($_POST['status']),
			'tenant_contacts' => trim($_POST['contacts']),
		    'tenant_posted' => date('Y-m-d H:i:s'),
		    'tenant_postedby' => "1",
		);
			
		$add_query = $database->js_insert( 'js_tenant', $New_House_Details ); 
	}
			
	function js_edit_tenant($tenantid) {
		
		$database = new Js_Dbconn();	
		$Update_House_Details = array(
			'tenant_name' => trim($_POST['name']),
			'tenant_house' => trim($_POST['house']),
			'tenant_idno' => js_slug_this($_POST['idno']),
			'tenant_status' => trim($_POST['status']),
			'tenant_contacts' => trim($_POST['contacts']),
		    'tenant_posted' => date('Y-m-d H:i:s'),
		    'tenant_postedby' => "1",
		);
		$where_clause = array('tenantid' => $tenantid);
		$updated = $database->js_update( 'js_tenant', $Update_House_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
	
		