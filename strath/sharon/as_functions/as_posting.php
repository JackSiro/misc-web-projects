<?php
	// POSTING FUNCTIONS
	// Begin Iteming Functions 
	
	function as_slug_this($content) {
		return preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "-", strtolower($content)));
	}
	
	function as_slug_is(){
		if(empty($_POST['slug'])) {
		    $as_slug = trim($_POST['slug']);
		} else $as_slug = as_slug_this($_POST['title']);
		
	}
	
	function as_new_upload($filename, $default){
		$raw_file_name = basename($_FILES[$filename]["name"]);
		$temp_file_name = $_FILES[$filename]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'item_'.time().'.'.$upload_file_ext[1];
		$target_file = "./as_media/posts/" .  $finalname;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		if (copy($temp_file_name, $target_file)) return $finalname;
		else return $default;
	}
	
	function as_add_new_item(){
		$database = new As_Dbconn();
		$deposit 	= trim($_POST['item_deposit']);
		$months 	= trim($_POST['item_months']);
		$price 		= trim($_POST['item_price']);
		
		$New_Item_Details = array(	
			'item_name' 		=> trim($_POST['item_name']),
			'item_image' 		=> as_new_upload("item_image", "no_image.jpg"),
			'item_content' 		=> trim($_POST['item_content']),
			'item_price' 		=> $price,
			'item_deposit' 		=> $deposit,
			'item_instal' 		=> ($price - $deposit)/$months,
			'item_months' 		=> $months,
			'item_stock' 		=> trim($_POST['item_stock']),
			'item_created' 		=> date('Y-m-d H:i:s'),
			'item_createdby' 	=> $_POST['loginid'],
		);
		
		$add_query = $database->as_insert( 'as_item', $New_Item_Details );
	}
			
	function as_edit_item($itemid) {
		$database = new As_Dbconn();	
		$Update_Item_Details = array(
			'item_name' 		=> trim($_POST['item_name']),
			'item_image' 		=> as_new_upload("item_image", "no_image.jpg"),
			'item_content' 		=> trim($_POST['item_content']),
			'item_terms' 		=> trim($_POST['item_terms']),
			'item_price' 		=> trim($_POST['item_price']),
			'item_stock' 		=> trim($_POST['item_stock']),
		);
		$where_clause = array('itemid' => $itemid);
		$updated = $database->as_update( 'as_item', $Update_Item_Details, $where_clause, 1 );
	}
 			
	function as_item_stock($itemid, $itemstock) {
		$database = new As_Dbconn();	
		$Update_Item_Details = array(
			'item_stock' => trim($itemstock),
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
 	
	function as_add_new_stock(){
		$database = new As_Dbconn();
		$itemid = trim($_POST['item']);
		$quantity = trim($_POST['quantity']);
		$New_stock_Details = array(
			'stock_itemid' => $itemid,
			'stock_quantity' => $quantity,
		    'stock_posted' => date('Y-m-d H:i:s'),
		    'stock_postedby' => 1,
		);			
		$add_query = $database->as_insert( 'as_stock', $New_stock_Details );
		$itemstock = as_item_items($itemid) * $quantity;
		as_item_stock($itemid, $itemstock);
	}
			
	function as_edit_stock($stockid) {
		$raw_file_name = basename($_FILES["filename"]["name"]);
		$temp_file_name = $_FILES["filename"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'stock_'.time().'.'.$upload_file_ext[1];
		$target_file = AS_TARGET . $finalname;
		$imageFileItem = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $as_image = $finalname;
		else $as_image = $_POST['candimage'];
		
		$database = new As_Dbconn();			
		$New_stock_Details = array(
			'stock_itemid' => trim($_POST['category']),
			'stock_img' => trim($as_image),
			'stock_unit' => trim($_POST['fullname']),
			'stock_quantity' => trim($_POST['slogan']),
			'item_updated' => date('Y-m-d H:i:s'),
			'item_updatedby' => "1",
		);
		$where_clause = array('stockid' => $stockid);
		$updated = $database->as_update( 'as_stock', $Update_stock_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	function as_sell_item($as_itemid, $as_buyerid){
		$database = new As_Dbconn();			
		$New_stock_Details = array(
			'sales_itemid' => $as_itemid,
			'sales_buyerid' => $as_buyerid,
			'sales_paymode' => $_POST['paymode'],
			'sales_servedby' => $_POST['loginid'],
		    'sales_served' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->as_insert( 'as_sales', $New_stock_Details ); 
	}
			
	function as_has_salesd($clientid) {		
		$database = new As_Dbconn();	
		$Update_Client_Details = array('client_salesd' => "1");
		$where_clause = array('clientid' => $clientid);
		$updated = $database->as_update( 'as_client', $Update_Client_Details, $where_clause, 1 );
		if( $updated )	{	}	
	}		
	
?>