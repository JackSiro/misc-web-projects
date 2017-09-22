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
	//apartment_name, apartment_fullname, apartment_sex, apartment_email, apartment_joined, apartment_mobile, apartment_address, apartment_web, apartment_avatar
	
	function as_new_apartment(){
		$database = new As_Dbconn();			
		$New_Item_Details = array(
			'apartment_location' => trim($_POST['location']),
			'apartment_number' => trim($_POST['number']),
			'apartment_description' => trim($_POST['description']),
		);
		$add_query = $database->as_insert( 'as_apartment', $New_Item_Details ); 
	}
			
	function as_edit_apartment($apartmentid) {
		$database = new As_Dbconn();	
		$Update_Item_Details = array(
			'apartment_location' => trim($_POST['location']),
			'apartment_number' => trim($_POST['number']),
			'apartment_description' => trim($_POST['description']),
		);
		$where_clause = array('apartmentid' => $apartmentid);
		$updated = $database->as_update( 'as_apartment', $Update_Item_Details, $where_clause, 1 );
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
 	//tenantid, tenant_registeredby, tenant_amount, tenant_registered, tenant_startdate, tenant_stoptime, tenant_place, tenant_registeredby, tenant_registered, 
	
	function as_add_new_tenant(){
		$database = new As_Dbconn();			
		$New_Item_Details = array(
			'tenant_amount' => trim($_POST['amount']),
			'tenant_startdate' => trim($_POST['session']),
		    'tenant_registered' => date('Y-m-d H:i:s'),
			'tenant_registeredby' => trim($_POST['apartmentid']),
		);
			
		$add_query = $database->as_insert( 'as_tenant', $New_Item_Details ); 
	}
			
	function as_edit_tenant($tenantid) {
		$database = new As_Dbconn();	
		$Update_Item_Details = array(
			'tenant_amount' => trim($_POST['amount']),
			'tenant_startdate' => trim($_POST['session']),
		    'tenant_registered' => date('Y-m-d H:i:s'),
			'tenant_registeredby' => trim($_POST['apartmentid']),
		);
		$where_clause = array('tenantid' => $tenantid);
		$updated = $database->as_update( 'as_tenant', $Update_Item_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
?>