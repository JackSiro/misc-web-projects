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
		
	function js_add_new_department(){
		$target_dir = "file:///D:/Web/htdocs/college/js_media/";
		$raw_file_name = basename($_FILES["filename"]["name"]);
		$temp_file_name = $_FILES["filename"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'department_'.time().'.'.$upload_file_ext[1];
		$target_file = $target_dir . $finalname;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $js_icon = $finalname;
		else $js_icon = "department_default.jpg";		
		
		$database = new Js_Dbconn();			
		$New_Category_Details = array(			
			'department_icon' => trim($js_icon),
			'department_title' => trim($_POST['title']),
			'department_slug' => js_slug_this($_POST['title']),
			'department_content' => trim($_POST['content']),
			'department_created' => date('Y-m-d H:i:s'),
			'department_createdby' => "1",
		);
			
		$add_query = $database->js_insert( 'js_department', $New_Category_Details ); 
	}
			
	function js_edit_department($departmentid) {
		$target_dir = "file:///D:/Web/htdocs/college/js_media/";
		$raw_file_name = basename($_FILES["filename"]["name"]);
		$temp_file_name = $_FILES["filename"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'department_'.time().'.'.$upload_file_ext[1];
		$target_file = $target_dir . $finalname;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $js_icon = $finalname;
		else $js_icon = $_POST['departmenticon'];		
		
		if(empty($_POST['slug'])) {
		    $js_slug = trim($_POST['slug']);
		} else $js_slug = js_slug_this($_POST['title']);
		
		$database = new Js_Dbconn();	
		$Update_Category_Details = array(
			'department_icon' => trim($js_icon),
			'department_title' => trim($_POST['title']),
			'department_slug' => $js_slug,
			'department_content' => trim($_POST['content']),
			'department_updated' => date('Y-m-d H:i:s'),
			'department_updatedby' => "1",
		);
		$where_clause = array('departmentid' => $departmentid);
		$updated = $database->js_update( 'js_department', $Update_Category_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
 		
	function js_add_admin($admin_username) {		
		$database = new Js_Dbconn();	
		$Update_Admin_Details = array(
			'lecturer_group' => trim($_POST['admin_role']),
		);
		$where_clause = array('lecturer_name' => $admin_username);
		$updated = $database->js_update( 'js_lecturer', $Update_Admin_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
 	
	function js_add_new_student(){
		$target_dir = "file:///D:/Web/htdocs/college/js_media/";
		$raw_file_name = basename($_FILES["filename"]["name"]);
		$temp_file_name = $_FILES["filename"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'student_'.time().'.'.$upload_file_ext[1];
		$target_file = $target_dir . $finalname;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $js_image = $finalname;
		else $js_image = "student_default.jpg";		
			 
		$database = new Js_Dbconn();			
		$New_Student_Details = array(
		//name, admno, department, course, class, gender, fees 
		//student_admission, student_department, student_name, student_course, student_fee, student_gender, student_class, student_img
			'student_name' => trim($_POST['name']),
			'student_admission' => trim($_POST['admno']),
			'student_department' => trim($_POST['department']),
			'student_course' => trim($_POST['course']),
			'student_class' => trim($_POST['class']),
			'student_gender' => trim($_POST['gender']),
			'student_fee' => trim($_POST['fees']),
			'student_img' => trim($js_image),
		    'student_posted' => date('Y-m-d H:i:s'),
		    'student_postedby' => "1",
		);
			
		$add_query = $database->js_insert( 'js_student', $New_Student_Details ); 
	}
			
	function js_edit_student($studentid) {
		$target_dir = "file:///D:/Web/htdocs/college/js_media/";
		$raw_file_name = basename($_FILES["filename"]["name"]);
		$temp_file_name = $_FILES["filename"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'student_'.time().'.'.$upload_file_ext[1];
		$target_file = $target_dir . $finalname;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $js_image = $finalname;
		else $js_image = $_POST['studentimg'];		
		
		if(empty($_POST['slug'])) {
		    $js_slug = trim($_POST['slug']);
		} else $js_slug = js_slug_this($_POST['title']);
		
		$database = new Js_Dbconn();	
		$Update_Student_Details = array(
			'student_name' => trim($_POST['name']),
			'student_admission' => trim($_POST['admno']),
			'student_department' => trim($_POST['department']),
			'student_course' => trim($_POST['course']),
			'student_class' => trim($_POST['class']),
			'student_gender' => trim($_POST['gender']),
			'student_fee' => trim($_POST['fees']),
			'student_img' => trim($js_image),
		    'student_posted' => date('Y-m-d H:i:s'),
		    'student_postedby' => "1",
		);
		$where_clause = array('studentid' => $studentid);
		$updated = $database->js_update( 'js_student', $Update_Student_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
	
		