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
		
	function as_add_new_type(){
		$raw_file_name = basename($_FILES["filename"]["name"]);
		$temp_file_name = $_FILES["filename"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'type_'.time().'.'.$upload_file_ext[1];
		$target_file = AS_TARGET . $finalname;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $as_icon = $finalname;
		else $as_icon = "type_default.jpg";		
		
		$database = new As_Dbconn();			
		$New_Category_Details = array(			
			'type_icon' => trim($as_icon),
			'type_title' => trim($_POST['title']),
			'type_slug' => as_slug_this($_POST['title']),
			'type_content' => trim($_POST['content']),
			'type_created' => date('Y-m-d H:i:s'),
			'type_createdby' => "1",
		);
			
		$add_query = $database->as_insert( 'as_type', $New_Category_Details ); 
	}
			
	function as_edit_type($catid) {
		$raw_file_name = basename($_FILES["filename"]["name"]);
		$temp_file_name = $_FILES["filename"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'type_'.time().'.'.$upload_file_ext[1];
		$target_file = AS_TARGET . $finalname;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $as_icon = $finalname;
		else $as_icon = $_POST['caticon'];		
		
		if(empty($_POST['slug'])) {
		    $as_slug = trim($_POST['slug']);
		} else $as_slug = as_slug_this($_POST['title']);
		
		$database = new As_Dbconn();	
		$Update_Category_Details = array(
			'type_icon' => trim($as_icon),
			'type_title' => trim($_POST['title']),
			'type_slug' => $as_slug,
			'type_content' => trim($_POST['content']),
			'type_updated' => date('Y-m-d H:i:s'),
			'type_updatedby' => "1",
		);
		$where_clause = array('catid' => $catid);
		$updated = $database->as_update( 'as_type', $Update_Category_Details, $where_clause, 1 );
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
 	
	function as_add_new_item(){
		$raw_file_name = basename($_FILES["filename"]["name"]);
		$temp_file_name = $_FILES["filename"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'item_'.time().'.'.$upload_file_ext[1];
		$target_file = AS_TARGET . $finalname;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $as_image = $finalname;
		else $as_image = "item_default.jpg";		
			
		$database = new As_Dbconn();			
		$New_Item_Details = array(
			'item_type' => trim($_POST['type']),
			'item_supplier' => trim($_POST['supplier']),
			'item_img' => trim($as_image),
			'item_unit' => trim($_POST['unit']),
			'item_quantity' => trim($_POST['quantity']),
			'item_price' => trim($_POST['price']),
		    'item_posted' => date('Y-m-d H:i:s'),
		    'item_postedby' => "1",
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
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $as_image = $finalname;
		else $as_image = $_POST['itemimg'];		
		
		if(empty($_POST['slug'])) {
		    $as_slug = trim($_POST['slug']);
		} else $as_slug = as_slug_this($_POST['title']);
		
		$database = new As_Dbconn();	
		$Update_Item_Details = array(
			'item_cat' => trim($_POST['type']),
			'item_title' => trim($_POST['title']),
			'item_slug' => $as_slug,
			'item_content' => trim($_POST['content']),
			'item_publisher' => trim($_POST['publisher']),
			'item_code' => trim($_POST['code']),
			'item_subject' => trim($_POST['subject']),
			'item_img' => trim($as_image),
		    'item_posted' => date('Y-m-d H:i:s'),
		    'item_postedby' => "1",
		);
		$where_clause = array('itemid' => $itemid);
		$updated = $database->as_update( 'as_item', $Update_Item_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	function as_add_new_order(){
		//itemid, unit, itemtitle, quantity, fullname, mobile, email, address, content
		//order_itemid, order_qty, order_title, order_fullname, order_mobile, order_email, order_address, order_content, order_createdby, order_created		
		$database = new As_Dbconn();			
		$New_Item_Details = array(
			'order_itemid' => $_POST['itemid'],
			'order_price' => $_POST['quantity'] * $_POST['itemprice'],
			'order_qty' => $_POST['quantity'],
			'order_title' => trim($_POST['itemtitle']),
			'order_fullname' => trim($_POST['fullname']),
			'order_mobile' => trim($_POST['mobile']),
			'order_email' => trim($_POST['address']),
			'order_content' => trim($_POST['content']),
			'order_address' => trim($_POST['price']),
		    'order_created' => date('Y-m-d H:i:s'),
		    'order_createdby' => "1",
		);
			
		$add_query = $database->as_insert( 'as_order', $New_Item_Details ); 
	}
			
	
?>