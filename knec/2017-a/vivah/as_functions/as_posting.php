<?php
	// POSTING FUNCTIONS
	// Begin Studenting Functions 
	
	function as_slug_this($content) {
		return preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "-", strtolower($content)));
	}
	
	function as_slug_is(){
		if(empty($_POST['slug'])) {
		    $as_slug = trim($_POST['slug']);
		} else $as_slug = as_slug_this($_POST['title']);
		
	}
	
	function as_add_new_beneficiary(){
		$database = new As_Dbconn();
		$New_Item_Details = array(
			'beneficiary_name' => trim($_POST['beneficiary_name']),
			'beneficiary_code' => trim($_POST['beneficiary_code']),
			'beneficiary_institution' => trim($_POST['beneficiary_institution']),
			'beneficiary_address' => trim($_POST['beneficiary_address']),
			'beneficiary_dateofbirth' => trim($_POST['beneficiary_dateofbirth']),
			'beneficiary_email' => trim($_POST['beneficiary_email']),
			'beneficiary_guardian' => trim($_POST['beneficiary_guardian']),
			'beneficiary_region' => trim($_POST['beneficiary_region']),
			'beneficiary_registered' => date('Y-m-d H:i:s'),
			'beneficiary_registeredby' => "1",
		);
			
		$add_query = $database->as_insert( 'as_beneficiary', $New_Item_Details );
	}
			
	function as_edit_beneficiary($beneficiaryid) {
		$database = new As_Dbconn();	
		$Update_Student_Details = array(
			'beneficiary_name' => trim($_POST['beneficiary_name']),
			'beneficiary_code' => trim($_POST['beneficiary_code']),
			'beneficiary_institution' => trim($_POST['beneficiary_institution']),
			'beneficiary_address' => trim($_POST['beneficiary_address']),
			'beneficiary_dateofbirth' => trim($_POST['beneficiary_dateofbirth']),
			'beneficiary_email' => trim($_POST['beneficiary_email']),
			'beneficiary_guardian' => trim($_POST['beneficiary_guardian']),
			'beneficiary_region' => trim($_POST['beneficiary_region']),
			'beneficiary_updated' => date('Y-m-d H:i:s'),
			'beneficiary_updatedby' => "1",
		);
		$where_clause = array('beneficiaryid' => $beneficiaryid);
		$updated = $database->as_update( 'as_beneficiary', $Update_Student_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
 			
	function as_beneficiary_dateofbirth($beneficiaryid, $beneficiaryfee) {
		$database = new As_Dbconn();	
		$Update_Student_Details = array(
			'beneficiary_dateofbirth' => trim($beneficiaryfee),
		);
		$where_clause = array('beneficiaryid' => $beneficiaryid);
		$updated = $database->as_update( 'as_beneficiary', $Update_Student_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
 	
	function as_add_beneficiary_dateofbirth(){
		$database = new As_Dbconn();
		$beneficiaryid = trim($_POST['beneficiary']);
		$amount = trim($_POST['amount']);
		$New_resource_Details = array(
			'resource_beneficiaryid' => $beneficiaryid,
			'resource_title' => $quantity,
		    'resource_posted' => date('Y-m-d H:i:s'),
		    'resource_postedby' => 1,
		);			
		$add_query = $database->as_insert( 'as_resource', $New_resource_Details );
		as_beneficiary_dateofbirth($beneficiaryid, $amount);
	}
	
	function as_register_beneficiary(){
		$database = new As_Dbconn();
		$New_resource_Details = array(
			'group_beneficiaryid' => trim($_POST['beneficiary']),
			'group_title' => trim($_POST['title']),
			'group_year' => trim($_POST['date']),
		    'group_posted' => date('Y-m-d H:i:s'),
		    'group_postedby' => 1,
		);			
		$add_query = $database->as_insert( 'as_resource', $New_resource_Details );
	}
	//resource_beneficiary, resource_title, resource_content
	function as_resource_allocate(){
		$database = new As_Dbconn();
		$New_resource_Details = array(
			'resource_beneficiary' => trim($_POST['beneficiary']),
			'resource_title' => trim($_POST['resource_title']),
			'resource_content' => trim($_POST['resource_content']),
		    'resource_posted' => date('Y-m-d H:i:s'),
		    'resource_postedby' => 1,
		);			
		$add_query = $database->as_insert( 'as_resource', $New_resource_Details );
	}
				
	function as_add_admin($admin_username) {		
		$database = new As_Dbconn();	
		$Update_Admin_Details = array(
			'facilitator_group' => trim($_POST['admin_role']),
		);
		$where_clause = array('facilitator_name' => $admin_username);
		$updated = $database->as_update( 'as_facilitator', $Update_Admin_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
 		
	function as_edit_fee($resourceid) {
		$database = new As_Dbconn();			
		$New_resource_Details = array(
			'resource_beneficiaryid' => trim($_POST['category']),
			'resource_unit' => trim($_POST['fullname']),
			'resource_title' => trim($_POST['slogan']),
			'beneficiary_updated' => date('Y-m-d H:i:s'),
			'beneficiary_updatedby' => "1",
		);
		$where_clause = array('resourceid' => $resourceid);
		$updated = $database->as_update( 'as_resource', $Update_resource_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
	function as_add_new_group(){
		$database = new As_Dbconn();		
		$beneficiaryid = trim($_POST['beneficiary_beneficiaryid']);
		$quantity = trim($_POST['beneficiary_quantity']);
		
		$New_Item_Details = array(
			'group_beneficiaryid' => $beneficiaryid,
			'group_quantity' => $quantity,
			'group_prices' => trim($_POST['total_price']),
			//'group_servedby' => $_SESSION['facilitatorid'],
		    'group_served' => date('Y-m-d H:i:s'),
		);
		
		$add_query = $database->as_insert( 'as_group', $New_Item_Details );
		$beneficiaryfee = as_beneficiary_dateofbirths($beneficiaryid) - $quantity;
		as_beneficiary_dateofbirth($beneficiaryid, $beneficiaryfee);
	}
			
	function as_has_groupd($clientid) {		
		$database = new As_Dbconn();	
		$Update_Client_Details = array('client_groupd' => "1");
		$where_clause = array('clientid' => $clientid);
		$updated = $database->as_update( 'as_client', $Update_Client_Details, $where_clause, 1 );
		if( $updated )	{	}	
	}		
	
?>