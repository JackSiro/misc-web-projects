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
		
	function js_add_new_category(){
		$raw_file_name = basename($_FILES["filename"]["name"]);
		$temp_file_name = $_FILES["filename"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'category_'.time().'.'.$upload_file_ext[1];
		$target_file = JS_TARGET . $finalname;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $js_icon = $finalname;
		else $js_icon = "category_default.jpg";		
		
		$database = new Js_Dbconn();			
		$New_Category_Details = array(			
			'category_icon' => trim($js_icon),
			'category_title' => trim($_POST['title']),
			'category_content' => trim($_POST['content']),
			'category_created' => date('Y-m-d H:i:s'),
			'category_createdby' => "1",
		);
			
		$add_query = $database->js_insert( 'js_category', $New_Category_Details ); 
	}
			
	function js_edit_category($catid) {
		$raw_file_name = basename($_FILES["filename"]["name"]);
		$temp_file_name = $_FILES["filename"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'category_'.time().'.'.$upload_file_ext[1];
		$target_file = JS_TARGET . $finalname;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $js_icon = $finalname;
		else $js_icon = $_POST['caticon'];		
		
		if(empty($_POST['slug'])) {
		    $js_slug = trim($_POST['slug']);
		} else $js_slug = js_slug_this($_POST['title']);
		
		$database = new Js_Dbconn();	
		$Update_Category_Details = array(
			'category_icon' => trim($js_icon),
			'category_title' => trim($_POST['title']),
			'category_slug' => $js_slug,
			'category_content' => trim($_POST['content']),
			'category_updated' => date('Y-m-d H:i:s'),
			'category_updatedby' => "1",
		);
		$where_clause = array('catid' => $catid);
		$updated = $database->js_update( 'js_category', $Update_Category_Details, $where_clause, 1 );
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
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $js_image = $finalname;
		else $js_image = "item_default.jpg";		
			
		$database = new Js_Dbconn();			
		$New_Item_Details = array(
			'item_category' => trim($_POST['category']),
			'item_doctor' => trim($_POST['doctor']),
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
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $js_image = $finalname;
		else $js_image = $_POST['itemimg'];		
		
		if(empty($_POST['slug'])) {
		    $js_slug = trim($_POST['slug']);
		} else $js_slug = js_slug_this($_POST['title']);
		
		$database = new Js_Dbconn();	
		$Update_Item_Details = array(
			'item_cat' => trim($_POST['category']),
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
	function js_add_new_appointment(){
		$database = new Js_Dbconn();			
		$New_Item_Details = array(
			'appointment_patient' => trim($_POST['patient']),
			'appointment_pgender' => trim($_POST['gender']),
			'appointment_clinic' => trim($_POST['clinic']),
			'appointment_reserve' => trim($_POST['reserve']),
			'appointment_dept' => trim($_POST['department']),
			'appointment_doctor' => trim($_POST['doctor']),
			'appointment_datetime' => trim($_POST['datetime']),
			'appointment_amount' => trim($_POST['amount']),
			'appointment_payment' => trim($_POST['payment']),
		    'appointment_created' => date('Y-m-d H:i:s'),
		    'appointment_createdby' => "1",
		);
			
		$add_query = $database->js_insert( 'js_appointment', $New_Item_Details ); 
	}
			
	
?>