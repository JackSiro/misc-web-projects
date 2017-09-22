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
		
	function js_add_new_class(){
		$raw_file_name = basename($_FILES["filename"]["name"]);
		$temp_file_name = $_FILES["filename"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'class_'.time().'.'.$upload_file_ext[1];
		$target_file = JS_TARGET . $finalname;
		$imageFileClass = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $js_icon = $finalname;
		else $js_icon = "class_default.jpg";		
		
		$database = new Js_Dbconn();			
		$New_Category_Details = array(			
			'class_icon' => trim($js_icon),
			'class_title' => trim($_POST['title']),
			'class_slug' => js_slug_this($_POST['title']),
			'class_content' => trim($_POST['content']),
			'class_created' => date('Y-m-d H:i:s'),
			'class_createdby' => "1",
		);
			
		$add_query = $database->js_insert( 'js_class', $New_Category_Details ); 
	}
			
	function js_edit_class($catid) {
		$raw_file_name = basename($_FILES["filename"]["name"]);
		$temp_file_name = $_FILES["filename"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'class_'.time().'.'.$upload_file_ext[1];
		$target_file = JS_TARGET . $finalname;
		$imageFileClass = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $js_icon = $finalname;
		else $js_icon = $_POST['caticon'];		
		
		if(empty($_POST['slug'])) {
		    $js_slug = trim($_POST['slug']);
		} else $js_slug = js_slug_this($_POST['title']);
		
		$database = new Js_Dbconn();	
		$Update_Category_Details = array(
			'class_icon' => trim($js_icon),
			'class_title' => trim($_POST['title']),
			'class_slug' => $js_slug,
			'class_content' => trim($_POST['content']),
			'class_updated' => date('Y-m-d H:i:s'),
			'class_updatedby' => "1",
		);
		$where_clause = array('catid' => $catid);
		$updated = $database->js_update( 'js_class', $Update_Category_Details, $where_clause, 1 );
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
 	
	function js_add_new_item(){
		$raw_file_name = basename($_FILES["filename"]["name"]);
		$temp_file_name = $_FILES["filename"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'item_'.time().'.'.$upload_file_ext[1];
		$target_file = JS_TARGET . $finalname;
		$imageFileClass = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $js_image = $finalname;
		else $js_image = "item_default.jpg";		
			
		$database = new Js_Dbconn();			
		$New_Item_Details = array(
			'item_class' => trim($_POST['class']),
			'item_topiclier' => trim($_POST['topiclier']),
			'item_img' => trim($js_image),
			'item_unit' => trim($_POST['unit']),
			'item_quantity' => trim($_POST['quantity']),
			'item_price' => trim($_POST['price']),
		    'item_posted' => date('Y-m-d H:i:s'),
		    'item_postedby' => "1",
		);
			
		$add_query = $database->js_insert( 'js_item', $New_Item_Details ); 
	}
			
	function js_edit_item($itemid) {
		$raw_file_name = basename($_FILES["filename"]["name"]);
		$temp_file_name = $_FILES["filename"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'item_'.time().'.'.$upload_file_ext[1];
		$target_file = JS_TARGET . $finalname;
		$imageFileClass = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $js_image = $finalname;
		else $js_image = $_POST['itemimg'];		
		
		if(empty($_POST['slug'])) {
		    $js_slug = trim($_POST['slug']);
		} else $js_slug = js_slug_this($_POST['title']);
		
		$database = new Js_Dbconn();	
		$Update_Item_Details = array(
			'item_cat' => trim($_POST['class']),
			'item_title' => trim($_POST['title']),
			'item_slug' => $js_slug,
			'item_content' => trim($_POST['content']),
			'item_publisher' => trim($_POST['publisher']),
			'item_code' => trim($_POST['code']),
			'item_subject' => trim($_POST['subject']),
			'item_img' => trim($js_image),
		    'item_posted' => date('Y-m-d H:i:s'),
		    'item_postedby' => "1",
		);
		$where_clause = array('itemid' => $itemid);
		$updated = $database->js_update( 'js_item', $Update_Item_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	function js_add_new_field(){
		//itemid, unit, itemtitle, quantity, fullname, mobile, email, address, content
		//field_itemid, field_qty, field_title, field_fullname, field_mobile, field_email, field_address, field_content, field_createdby, field_created		
		$database = new Js_Dbconn();			
		$New_Item_Details = array(
			'field_itemid' => $_POST['itemid'],
			'field_price' => $_POST['quantity'] * $_POST['itemprice'],
			'field_qty' => $_POST['quantity'],
			'field_title' => trim($_POST['itemtitle']),
			'field_fullname' => trim($_POST['fullname']),
			'field_mobile' => trim($_POST['mobile']),
			'field_email' => trim($_POST['address']),
			'field_content' => trim($_POST['content']),
			'field_address' => trim($_POST['price']),
		    'field_created' => date('Y-m-d H:i:s'),
		    'field_createdby' => "1",
		);
			
		$add_query = $database->js_insert( 'js_field', $New_Item_Details ); 
	}
			
	
?>