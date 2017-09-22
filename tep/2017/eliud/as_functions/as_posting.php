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
			
	function as_add_new_session(){
		$database = new As_Dbconn();			
		$New_Item_Details = array(			
			'sess_doctor' => trim($_POST['doctor']),
			'sess_patient' => trim($_POST['patient']),
			'sess_timein' => trim($_POST['timein']),
			'sess_timeout' => trim($_POST['timeout']),
			'sess_created' => date('Y-m-d H:i:s'),
			'sess_createdby' => "1",
		);
			
		$add_query = $database->as_insert( 'as_session', $New_Item_Details ); 
	}
	
	//message_parentid, message_content, message_sentby, message_sender, message_sentto, message_receiver, message_sent, 
	//senderid, sendergrp, recipient,group 
	function as_add_new_message(){
		$database = new As_Dbconn();			
		$New_Item_Details = array(			
			'message_content' => trim($_POST['content']),
			'message_sentby' => trim($_POST['senderid']),
			'message_sender' => trim($_POST['sendergrp']),
			'message_sentto' => trim($_POST['recipient']),
			'message_receiver' => trim($_POST['group']),
			'message_sent' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->as_insert( 'as_message', $New_Item_Details ); 
	}
	
	function as_add_new_message_thread(){
		$database = new As_Dbconn();			
		$New_Item_Details = array(			
			'message_parentid' => trim($_POST['messageid']),
			'message_content' => trim($_POST['content']),
			'message_sentby' => trim($_POST['senderid']),
			'message_sender' => trim($_POST['sendergrp']),
			'message_sent' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->as_insert( 'as_message', $New_Item_Details ); 
	}
		
	function as_edit_category($catid) {
		$target_dir = "file:///D:/Web/htdocs/library/as_media/";
		$raw_file_name = basename($_FILES["filename"]["name"]);
		$temp_file_name = $_FILES["filename"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'cat_'.time().'.'.$upload_file_ext[1];
		$target_file = $target_dir . $finalname;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $as_icon = $finalname;
		else $as_icon = $_POST['caticon'];		
		
		if(empty($_POST['slug'])) {
		    $as_slug = trim($_POST['slug']);
		} else $as_slug = as_slug_this($_POST['title']);
		
		$database = new As_Dbconn();	
		$Update_Item_Details = array(
			'cat_icon' => trim($as_icon),
			'cat_title' => trim($_POST['title']),
			'cat_slug' => $as_slug,
			'cat_content' => trim($_POST['content']),
			'cat_updated' => date('Y-m-d H:i:s'),
			'cat_updatedby' => "1",
		);
		$where_clause = array('catid' => $catid);
		$updated = $database->as_update( 'as_category', $Update_Item_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
 		
	function as_add_admin($admin_username) {		
		$database = new As_Dbconn();	
		$Update_Admin_Details = array(
			'doctor_group' => trim($_POST['admin_role']),
		);
		$where_clause = array('doctor_code' => $admin_username);
		$updated = $database->as_update( 'as_doctor', $Update_Admin_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
 	
	function as_add_new_item(){
		$target_dir = "file:///D:/Web/htdocs/library/as_media/";
		$raw_file_name = basename($_FILES["filename"]["name"]);
		$temp_file_name = $_FILES["filename"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'item_'.time().'.'.$upload_file_ext[1];
		$target_file = $target_dir . $finalname;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $as_image = $finalname;
		else $as_image = "item_default.jpg";		
			 
		$database = new As_Dbconn();			
		$New_Item_Details = array(
			'item_cat' => trim($_POST['category']),
			'item_title' => trim($_POST['title']),
			'item_slug' => as_slug_this($_POST['title']),
			'item_content' => trim($_POST['content']),
			'item_publisher' => trim($_POST['publisher']),
			'item_code' => trim($_POST['code']),
			'item_subject' => trim($_POST['subject']),
			'item_img' => trim($as_image),
		    'item_posted' => date('Y-m-d H:i:s'),
		    'item_postedby' => "1",
		);
			
		$add_query = $database->as_insert( 'as_elibrary', $New_Item_Details ); 
	}
			
	function as_edit_item($itemid) {
		$target_dir = "file:///D:/Web/htdocs/library/as_media/";
		$raw_file_name = basename($_FILES["filename"]["name"]);
		$temp_file_name = $_FILES["filename"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'item_'.time().'.'.$upload_file_ext[1];
		$target_file = $target_dir . $finalname;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $as_image = $finalname;
		else $as_image = $_POST['itemimg'];		
		
		if(empty($_POST['slug'])) {
		    $as_slug = trim($_POST['slug']);
		} else $as_slug = as_slug_this($_POST['title']);
		
		$database = new As_Dbconn();	
		$Update_Item_Details = array(
			'item_cat' => trim($_POST['category']),
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
		$updated = $database->as_update( 'as_elibrary', $Update_Item_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
	
		