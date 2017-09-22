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
		
	function as_add_new_item(){
		$raw_file_name = basename($_FILES["item_icon"]["name"]);
		$temp_file_name = $_FILES["item_icon"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		
		$finalname = 'item_'.time().'.'.$upload_file_ext[1];
		$target_file = AS_TARGET . $finalname;
		$imageFileItem = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $as_icon = $finalname;
		else $as_icon = "item_default.jpg";		
		
		$database = new As_Dbconn();			
					
		$New_Item_Details = array(			
			'item_icon' => trim($as_icon),
			'item_title' => trim($_POST['item_title']),
			'item_slug' => as_slug_this($_POST['item_title']),
			'item_container' => trim($_POST['item_container']),
			'item_items' => trim($_POST['item_items']),
			'item_price' => trim($_POST['item_price']),
			'item_unit' => trim($_POST['item_unit']),
			'item_content' => trim($_POST['item_content']),
			'item_created' => date('Y-m-d H:i:s'),
			'item_createdby' => $_POST['loginid'],
		);
			
		$add_query = $database->as_insert( 'as_item', $New_Item_Details );
	}
			
	function as_edit_item($itemid) {
		$raw_file_name = basename($_FILES["filename"]["name"]);
		$temp_file_name = $_FILES["filename"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'item_'.time().'.'.$upload_file_ext[1];
		$target_file = AS_TARGET . $finalname;
		$imageFileItem = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $as_icon = $finalname;
		else $as_icon = $_POST['categoryicon'];		
		
		if(empty($_POST['slug'])) {
		    $as_slug = trim($_POST['slug']);
		} else $as_slug = as_slug_this($_POST['title']);
		
		$database = new As_Dbconn();	
		$Update_Item_Details = array(
			'item_icon' => trim($as_icon),
			'item_title' => trim($_POST['title']),
			'item_slug' => $as_slug,
			'item_content' => trim($_POST['content']),
			'item_updated' => date('Y-m-d H:i:s'),
			'item_updatedby' => "1",
		);
		$where_clause = array('itemid' => $itemid);
		$updated = $database->as_update( 'as_item', $Update_Item_Details, $where_clause, 1 );
		if( $updated )	{	}
	
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
	
	function as_add_new_sales(){
		$database = new As_Dbconn();			
		$New_stock_Details = array(
			'sales_itemid' => trim($_POST['category']),
			'sales_itemid' => trim($_POST['category']),
			'sales_itemid' => trim($_POST['category']),
			'sales_itemid' => $itemid,
			'sales_servedby' => $_SESSION['siteuser_user'],
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