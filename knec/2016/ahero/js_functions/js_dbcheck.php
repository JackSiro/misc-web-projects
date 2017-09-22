<?php
	
	$database = new Js_Dbconn();
	//payslip_number, payslip_jobcategory, payslip_salary, payslip_employee
	$Js_Table_Details = array(	
		'payslipid int(11) NOT NULL AUTO_INCREMENT',
		'payslip_number varchar(100) NOT NULL',
		'payslip_jobcategory varchar(100) NOT NULL',
		'payslip_salary varchar(100) NOT NULL',
		'payslip_employee varchar(100) NOT NULL',
		'PRIMARY KEY (payslipid)',
		);
	$add_query = $database->js_table_exists_create( 'js_payslip', $Js_Table_Details ); 
	
	$Js_Table_Details = array(	
		'optid int(11) NOT NULL AUTO_INCREMENT',
		'title varchar(100) NOT NULL',
		'content varchar(2000) NOT NULL',
		'createdby int(10) unsigned DEFAULT NULL',
		'created datetime DEFAULT NULL',
		'updatedby int(10) unsigned DEFAULT NULL',
		'updated datetime DEFAULT NULL',
		'PRIMARY KEY (optid)',
		);
	$add_query = $database->js_table_exists_create( 'js_options', $Js_Table_Details ); 
		//leave_number, leave_name, leave_employee
	$Js_Table_Details = array(	
		'leaveid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'leave_number varchar(100) DEFAULT NULL',
		'leave_name varchar(100) DEFAULT NULL',
		'leave_employee varchar(100) DEFAULT NULL',
		'PRIMARY KEY (leaveid)',
		);
	$add_query = $database->js_table_exists_create( 'js_leave', $Js_Table_Details ); 
	
	$Js_Table_Details = array(	
		'departmentid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'department_number varchar(100) DEFAULT NULL',
		'department_name varchar(100) DEFAULT NULL',
		'PRIMARY KEY (departmentid)',
		);
	$add_query = $database->js_table_exists_create( 'js_department', $Js_Table_Details ); 
	//employee_name, employee_fullname, employee_number, employee_mobile, employee_status, employee_account, employee_department, employee_leave, employee_idno, employee_jobgroup, employee_password, employee_group, employee_joined
	$Js_Table_Details = array(	
		'employeeid int(11) NOT NULL AUTO_INCREMENT',
		'employee_name varchar(50) NOT NULL',
		'employee_fullname varchar(50) NOT NULL',
		'employee_number varchar(50) NOT NULL',
		'employee_mobile varchar(50) NOT NULL',
		'employee_status varchar(50) NOT NULL',
		'employee_account varchar(50) NOT NULL',
		'employee_department varchar(50) NOT NULL',
		'employee_leave varchar(50) NOT NULL',
		'employee_idno varchar(50) NOT NULL',
		'employee_jobgroup varchar(50) NOT NULL',
		'employee_password text NOT NULL',
		'employee_email varchar(200) NOT NULL',
		'employee_group varchar(50) NOT NULL DEFAULT "employee"',
		'employee_joined datetime DEFAULT NULL',
		'PRIMARY KEY (employeeid)',
		);
	$add_query = $database->js_table_exists_create( 'js_employee', $Js_Table_Details ); 
	
?>