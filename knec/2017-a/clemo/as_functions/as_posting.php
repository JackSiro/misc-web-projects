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
		
	function as_add_new_class(){
		$database = new As_Dbconn();			
		$New_Item_Details = array(			
			'class_title' => trim($_POST['title']),
			'class_term' => trim($_POST['term']),
			'class_year' => trim($_POST['year']),
			'class_created' => date('Y-m-d H:i:s'),
			'class_createdby' => "1",
		);
			
		$add_query = $database->as_insert( 'as_class', $New_Item_Details ); 
	}
			
	function as_edit_class($classid) {
		$database = new As_Dbconn();	
		$Update_Item_Details = array(
			'class_title' => trim($_POST['title']),
			'class_term' => trim($_POST['term']),
			'class_content' => trim($_POST['content']),
			'class_updated' => date('Y-m-d H:i:s'),
			'class_updatedby' => "1",
		);
		$where_clause = array('classid' => $classid);
		$updated = $database->as_update( 'as_class', $Update_Item_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
		
	function as_add_new_subject(){
		$database = new As_Dbconn();			
		$New_Item_Details = array(			
			'subject_title' => trim($_POST['title']),
			'subject_code' => trim($_POST['code']),
			'subject_created' => date('Y-m-d H:i:s'),
			'subject_createdby' => "1",
		);
			
		$add_query = $database->as_insert( 'as_subject', $New_Item_Details ); 
	}
			
	function as_edit_subject($subjectid) {
		$database = new As_Dbconn();	
		$Update_Item_Details = array(
			'subject_title' => trim($_POST['title']),
			'subject_code' => trim($_POST['code']),
			'subject_updated' => date('Y-m-d H:i:s'),
			'subject_updatedby' => "1",
		);
		$where_clause = array('subjectid' => $subjectid);
		$updated = $database->as_update( 'as_subject', $Update_Item_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
 	
	function as_add_new_marks(){
		$database = new As_Dbconn();			
		$New_Item_Details = array(			
			'marks_class' => trim($_POST['class']),
			'marks_student' => trim($_POST['student']),
			'marks_subject' => trim($_POST['subject']),
			'marks_marks' => trim($_POST['marks']),
			'marks_posted' => date('Y-m-d H:i:s'),
			'marks_postedby' => "1",
		);
			
		$add_query = $database->as_insert( 'as_marks', $New_Item_Details ); 
	}
			
	function as_edit_marks($marksid) {
		$database = new As_Dbconn();	
		$Update_Item_Details = array(
			'marks_class' => trim($_POST['class']),
			'marks_student' => trim($_POST['student']),
			'marks_subject' => trim($_POST['subject']),
			'marks_marks' => trim($_POST['marks']),
			'marks_updated' => date('Y-m-d H:i:s'),
			'marks_updatedby' => "1",
		);
		$where_clause = array('marksid' => $marksid);
		$updated = $database->as_update( 'as_marks', $Update_Item_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
		
	function as_add_admin($admin_username) {		
		$database = new As_Dbconn();	
		$Update_Admin_Details = array(
			'teacher_group' => trim($_POST['admin_role']),
		);
		$where_clause = array('teacher_name' => $admin_username);
		$updated = $database->as_update( 'as_teacher', $Update_Admin_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
 	
	function as_add_new_student(){
		$database = new As_Dbconn();			
		$New_Student_Details = array(
			'student_name' => trim($_POST['name']),
			'student_admission' => trim($_POST['admno']),
			'student_class' => trim($_POST['class']),
		    'student_registered' => date('Y-m-d H:i:s'),
		    'student_registeredby' => "1",
		);			
		$add_query = $database->as_insert( 'as_student', $New_Student_Details ); 
	}
			
	function as_edit_student($studentid) {
		$database = new As_Dbconn();	
		$Update_Student_Details = array(
			'student_name' => trim($_POST['name']),
			'student_admission' => trim($_POST['admno']),
			'student_class' => trim($_POST['class']),
			'student_course' => trim($_POST['course']),
			'student_class' => trim($_POST['class']),
			'student_gender' => trim($_POST['gender']),
			'student_fee' => trim($_POST['fees']),
		    'student_registered' => date('Y-m-d H:i:s'),
		    'student_registeredby' => "1",
		);
		$where_clause = array('studentid' => $studentid);
		$updated = $database->as_update( 'as_student', $Update_Student_Details, $where_clause, 1 );
	}	