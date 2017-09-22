<?php
	// POSTING FUNCTIONS
	// Begin Druging Functions 
	
	function as_slug_this($content) {
		return preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "-", strtolower($content)));
	}
	
	function as_slug_is(){
		if(empty($_POST['slug'])) {
		    $as_slug = trim($_POST['slug']);
		} else $as_slug = as_slug_this($_POST['title']);
		
	}
		
	function as_add_new_drug(){
		$database = new As_Dbconn();		
					
		$New_Item_Details = array(
			'drug_title' => trim($_POST['drug_title']),
			'drug_slug' => as_slug_this($_POST['drug_title']),
			'drug_container' => trim($_POST['drug_container']),
			'drug_items' => trim($_POST['drug_items']),
			'drug_price' => trim($_POST['drug_price']),
			'drug_unit' => trim($_POST['drug_unit']),
			'drug_content' => trim($_POST['drug_content']),
			'drug_created' => date('Y-m-d H:i:s'),
			'drug_createdby' => $_POST['loginid'],
		);
			
		$add_query = $database->as_insert( 'as_drug', $New_Item_Details );
	}
			
	function as_edit_drug($drugid) {
		if(empty($_POST['slug'])) $as_slug = trim($_POST['slug']);
		else $as_slug = as_slug_this($_POST['title']);
		
		$database = new As_Dbconn();	
		$Update_Drug_Details = array(
			'drug_title' => trim($_POST['title']),
			'drug_slug' => $as_slug,
			'drug_content' => trim($_POST['content']),
			'drug_updated' => date('Y-m-d H:i:s'),
			'drug_updatedby' => "1",
		);
		$where_clause = array('drugid' => $drugid);
		$updated = $database->as_update( 'as_drug', $Update_Drug_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
 			
	function as_drug_stock($drugid, $drugstock) {
		$database = new As_Dbconn();	
		$Update_Drug_Details = array(
			'drug_stock' => trim($drugstock),
		);
		$where_clause = array('drugid' => $drugid);
		$updated = $database->as_update( 'as_drug', $Update_Drug_Details, $where_clause, 1 );
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
 	
	function as_add_new_stock(){
		$database = new As_Dbconn();
		$drugid = trim($_POST['drug']);
		$quantity = trim($_POST['quantity']);
		$New_stock_Details = array(
			'stock_drugid' => $drugid,
			'stock_quantity' => $quantity,
		    'stock_posted' => date('Y-m-d H:i:s'),
		    'stock_postedby' => 1,
		);			
		$add_query = $database->as_insert( 'as_stock', $New_stock_Details );
		$drugstock = as_drug_items($drugid) * $quantity;
		as_drug_stock($drugid, $drugstock);
	}
			
	function as_edit_stock($stockid) {
		$database = new As_Dbconn();			
		$New_stock_Details = array(
			'stock_drugid' => trim($_POST['category']),
			'stock_unit' => trim($_POST['fullname']),
			'stock_quantity' => trim($_POST['slogan']),
			'drug_updated' => date('Y-m-d H:i:s'),
			'drug_updatedby' => "1",
		);
		$where_clause = array('stockid' => $stockid);
		$updated = $database->as_update( 'as_stock', $Update_stock_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
	function as_add_new_sales(){
		$database = new As_Dbconn();		
		$drugid = trim($_POST['drug_drugid']);
		$quantity = trim($_POST['drug_quantity']);
		
		$New_Item_Details = array(
			'sales_drugid' => $drugid,
			'sales_quantity' => $quantity,
			'sales_prices' => trim($_POST['total_price']),
			//'sales_servedby' => $_SESSION['userid'],
		    'sales_served' => date('Y-m-d H:i:s'),
		);
		
		$add_query = $database->as_insert( 'as_sales', $New_Item_Details );
		$drugstock = as_drug_stocks($drugid) - $quantity;
		as_drug_stock($drugid, $drugstock);
	}
			
	function as_has_salesd($clientid) {		
		$database = new As_Dbconn();	
		$Update_Client_Details = array('client_salesd' => "1");
		$where_clause = array('clientid' => $clientid);
		$updated = $database->as_update( 'as_client', $Update_Client_Details, $where_clause, 1 );
		if( $updated )	{	}	
	}		
	
?>