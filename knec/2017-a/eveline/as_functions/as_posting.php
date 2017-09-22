<?php
	// POSTING FUNCTIONS
	// Begin Studenting Functions 
	
	function as_slug_this($content) {
		return preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "-", strtolower($content)));
	}
	
	function as_slug_is(){
		if(empty($_POST['slug'])) {
		    $as_slug = trim($_POST['slug']);
		} else $as_slug = as_slug_this($_POST['title']);
		
	}
		
	function as_add_new_student(){
		$database = new As_Dbconn();
		$New_Item_Details = array(
			'student_name' => trim($_POST['student_name']),
			'student_admno' => trim($_POST['student_admno']),
			'student_comment' => trim($_POST['student_comment']),
			'student_class' => trim($_POST['student_class']),
			'student_password' => trim($_POST['student_password']),
			'student_sex' => trim($_POST['student_sex']),
			'student_created' => date('Y-m-d H:i:s'),
			'student_createdby' => $_POST['loginid'],
		);
			
		$add_query = $database->as_insert( 'as_student', $New_Item_Details );
	}
			
	function as_edit_student($studentid) {
		if(empty($_POST['slug'])) $as_slug = trim($_POST['slug']);
		else $as_slug = as_slug_this($_POST['title']);
		
		$database = new As_Dbconn();	
		$Update_Student_Details = array(
			'student_name' => trim($_POST['title']),
			'student_admno' => $as_slug,
			'student_sex' => trim($_POST['content']),
			'student_updated' => date('Y-m-d H:i:s'),
			'student_updatedby' => "1",
		);
		$where_clause = array('studentid' => $studentid);
		$updated = $database->as_update( 'as_student', $Update_Student_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
 			
	function as_student_fee($studentid, $studentfee) {
		$database = new As_Dbconn();	
		$Update_Student_Details = array(
			'student_fee' => trim($studentfee),
		);
		$where_clause = array('studentid' => $studentid);
		$updated = $database->as_update( 'as_student', $Update_Student_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
 	
	function as_add_student_fee(){
		$database = new As_Dbconn();
		$studentid = trim($_POST['student']);
		$amount = trim($_POST['amount']);
		$New_fee_Details = array(
			'fee_studentid' => $studentid,
			'fee_amount' => $quantity,
		    'fee_posted' => date('Y-m-d H:i:s'),
		    'fee_postedby' => 1,
		);			
		$add_query = $database->as_insert( 'as_fee', $New_fee_Details );
		as_student_fee($studentid, $amount);
	}
	
	function as_register_student(){
		$database = new As_Dbconn();
		$New_fee_Details = array(
			'exam_studentid' => trim($_POST['student']),
			'exam_title' => trim($_POST['title']),
			'exam_date' => trim($_POST['date']),
		    'exam_posted' => date('Y-m-d H:i:s'),
		    'exam_postedby' => 1,
		);			
		$add_query = $database->as_insert( 'as_fee', $New_fee_Details );
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
 		
	function as_edit_fee($feeid) {
		$database = new As_Dbconn();			
		$New_fee_Details = array(
			'fee_studentid' => trim($_POST['category']),
			'fee_unit' => trim($_POST['fullname']),
			'fee_amount' => trim($_POST['slogan']),
			'student_updated' => date('Y-m-d H:i:s'),
			'student_updatedby' => "1",
		);
		$where_clause = array('feeid' => $feeid);
		$updated = $database->as_update( 'as_fee', $Update_fee_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
	function as_add_new_exam(){
		$database = new As_Dbconn();		
		$studentid = trim($_POST['student_studentid']);
		$quantity = trim($_POST['student_quantity']);
		
		$New_Item_Details = array(
			'exam_studentid' => $studentid,
			'exam_quantity' => $quantity,
			'exam_prices' => trim($_POST['total_price']),
			//'exam_servedby' => $_SESSION['userid'],
		    'exam_served' => date('Y-m-d H:i:s'),
		);
		
		$add_query = $database->as_insert( 'as_exam', $New_Item_Details );
		$studentfee = as_student_fees($studentid) - $quantity;
		as_student_fee($studentid, $studentfee);
	}
			
	function as_has_examd($clientid) {		
		$database = new As_Dbconn();	
		$Update_Client_Details = array('client_examd' => "1");
		$where_clause = array('clientid' => $clientid);
		$updated = $database->as_update( 'as_client', $Update_Client_Details, $where_clause, 1 );
		if( $updated )	{	}	
	}		
	
?>