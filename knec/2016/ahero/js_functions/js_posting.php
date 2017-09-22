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
		//payslip_number, payslip_jobcategory, payslip_salary, payslip_employee
	function js_add_new_payslip(){
		$database = new Js_Dbconn();			
		$New_PaySlip_Details = array(			
			'payslip_number' => trim($_POST['number']),
			'payslip_jobcategory' => trim($_POST['jobcategory']),
			'payslip_salary' => trim($_POST['salary']),
			'payslip_employee' => trim($_POST['employee']),
		);
			
		$add_query = $database->js_insert( 'js_payslip', $New_PaySlip_Details ); 
	}
			
	function js_edit_payslip($payslipid) {
		
		$database = new Js_Dbconn();	
		$Update_PaySlip_Details = array(
			'payslip_number' => trim($_POST['number']),
			'payslip_jobcategory' => trim($_POST['jobcategory']),
			'payslip_salary' => trim($_POST['salary']),
			'payslip_employee' => trim($_POST['employee']),
		);
		$where_clause = array('payslipid' => $payslipid);
		$updated = $database->js_update( 'js_payslip', $Update_PaySlip_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
 		
	function js_add_admin($admin_username) {		
		$database = new Js_Dbconn();	
		$Update_Admin_Details = array(
			'employee_group' => trim($_POST['admin_role']),
		);
		$where_clause = array('employee_name' => $admin_username);
		$updated = $database->js_update( 'js_employee', $Update_Admin_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
 	
	function js_add_new_leave(){
		
		$database = new Js_Dbconn();			
		$New_Item_Details = array(
			'leave_number' => trim($_POST['number']),
			'leave_name' => trim($_POST['name']),
			'leave_employee' => trim($_POST['employee']),
		);
			
		$add_query = $database->js_insert( 'js_leave', $New_Item_Details ); 
	}
			
	function js_edit_leave($leaveid) {
		
		$database = new Js_Dbconn();	
		$Update_Item_Details = array(
			'leave_number' => trim($_POST['number']),
			'leave_name' => trim($_POST['name']),
			'leave_employee' => trim($_POST['employee']),
		);
		$where_clause = array('leaveid' => $leaveid);
		$updated = $database->js_update( 'js_leave', $Update_Item_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
		
	function js_add_new_department(){
		
		$database = new Js_Dbconn();			
		$New_Item_Details = array(
			'department_number' => trim($_POST['number']),
			'department_name' => trim($_POST['name']),
		);
			
		$add_query = $database->js_insert( 'js_department', $New_Item_Details ); 
	}
	

	