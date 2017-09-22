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
		
	function js_add_new_section(){
		$raw_file_name = basename($_FILES["filename"]["name"]);
		$temp_file_name = $_FILES["filename"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'section_'.time().'.'.$upload_file_ext[1];
		$target_file = JS_TARGET .  $finalname;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $js_icon = $finalname;
		else $js_icon = "section_default.jpg";		
		
		$database = new Js_Dbconn();			
		$New_Section_Details = array(			
			'section_icon' => trim($js_icon),
			'section_title' => trim($_POST['title']),
			'section_slug' => js_slug_this($_POST['title']),
			'section_content' => trim($_POST['content']),
			'section_created' => date('Y-m-d H:i:s'),
			'section_createdby' => "1",
		);
			
		$add_query = $database->js_insert( 'js_section', $New_Section_Details ); 
	}
			
	function js_edit_section($sectionid) {
		$raw_file_name = basename($_FILES["filename"]["name"]);
		$temp_file_name = $_FILES["filename"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'section_'.time().'.'.$upload_file_ext[1];
		$target_file = JS_TARGET .  $finalname;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $js_icon = $finalname;
		else $js_icon = $_POST['sectionicon'];		
		
		if(empty($_POST['slug'])) {
		    $js_slug = trim($_POST['slug']);
		} else $js_slug = js_slug_this($_POST['title']);
		
		$database = new Js_Dbconn();	
		$Update_Section_Details = array(
			'section_icon' => trim($js_icon),
			'section_title' => trim($_POST['title']),
			'section_slug' => $js_slug,
			'section_content' => trim($_POST['content']),
			'section_updated' => date('Y-m-d H:i:s'),
			'section_updatedby' => "1",
		);
		$where_clause = array('sectionid' => $sectionid);
		$updated = $database->js_update( 'js_section', $Update_Section_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
 		
	function js_add_admin($admin_username) {		
		$database = new Js_Dbconn();	
		$Update_Admin_Details = array(
			'student_group' => trim($_POST['admin_role']),
		);
		$where_clause = array('student_name' => $admin_username);
		$updated = $database->js_update( 'js_student', $Update_Admin_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
 	
	function js_add_new_book(){
		$raw_file_icon = basename($_FILES["fileicon"]["name"]);
		$temp_file_icon = $_FILES["fileicon"]["tmp_name"];		
		$upload_file_extt = explode(".", $raw_file_icon);
		$upload_file_icon = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_extt[0])));
		$finalicon = 'book_'.time().'.'.$upload_file_extt[1];
		$target_filet = JS_TARGET .  $finalicon;
		$imageFileType = pathinfo($target_filet,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_icon, $target_filet)) $js_image = $finalicon;
		else $js_image = "";
		
		$raw_file_name = basename($_FILES["filename"]["name"]);
		$temp_file_name = $_FILES["filename"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'book_'.time().'.'.$upload_file_ext[1];
		$target_file = JS_UPLOADS .  $finalname;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $js_document = $finalname;
		else $js_document = "";
		
		$database = new Js_Dbconn();			
		$New_Item_Details = array(
			'book_section' => trim($_POST['section']),
			'book_title' => trim($_POST['title']),
			'book_slug' => js_slug_this($_POST['title']),
			'book_content' => trim($_POST['content']),
			'book_publisher' => trim($_POST['publisher']),
			'book_code' => trim($_POST['code']),
			'book_subject' => trim($_POST['subject']),
			'book_img' => trim($js_image),
			'book_file' => trim($js_document),
		    'book_posted' => date('Y-m-d H:i:s'),
		    'book_postedby' => "1",
		);
			
		$add_query = $database->js_insert( 'js_book', $New_Item_Details ); 
	}
			
	function js_edit_book($bookid) {
		$raw_file_name = basename($_FILES["filename"]["name"]);
		$temp_file_name = $_FILES["filename"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'book_'.time().'.'.$upload_file_ext[1];
		$target_file = JS_TARGET .  $finalname;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $js_image = $finalname;
		else $js_image = $_POST['bookimg'];		
		
		if(empty($_POST['slug'])) {
		    $js_slug = trim($_POST['slug']);
		} else $js_slug = js_slug_this($_POST['title']);
		
		$database = new Js_Dbconn();	
		$Update_Item_Details = array(
			'book_section' => trim($_POST['section']),
			'book_title' => trim($_POST['title']),
			'book_slug' => $js_slug,
			'book_content' => trim($_POST['content']),
			'book_publisher' => trim($_POST['publisher']),
			'book_code' => trim($_POST['code']),
			'book_subject' => trim($_POST['subject']),
			'book_img' => trim($js_image),
		    'book_posted' => date('Y-m-d H:i:s'),
		    'book_postedby' => "1",
		);
		$where_clause = array('bookid' => $bookid);
		$updated = $database->js_update( 'js_book', $Update_Item_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
	
		