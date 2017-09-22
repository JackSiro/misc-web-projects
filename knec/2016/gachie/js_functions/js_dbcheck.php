<?php
	
	$database = new Js_Dbconn();
	//farmer_fullname, farmer_mobile, farmer_email, farmer_gender, farmer_address
	$Js_Table_Details = array(	
		'farmerid int(11) NOT NULL AUTO_INCREMENT',
		'farmer_fullname varchar(100) NOT NULL',
		'farmer_mobile varchar(100) NOT NULL',
		'farmer_email varchar(100) NOT NULL',
		'farmer_gender varchar(100) NOT NULL',
		'farmer_address varchar(2000) NOT NULL',
		'PRIMARY KEY (farmerid)',
		);
	$add_query = $database->js_table_exists_create( 'js_farmer', $Js_Table_Details ); 
	
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
		//session_starttime, session_endtime, session_workingperiod
	$Js_Table_Details = array(	
		'sessionid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'session_starttime varchar(100) DEFAULT NULL',
		'session_endtime varchar(100) DEFAULT NULL',
		'session_workingperiod varchar(100) DEFAULT NULL',
		'PRIMARY KEY (sessionid)',
		);
	$add_query = $database->js_table_exists_create( 'js_session', $Js_Table_Details ); 
	//employee_name, employee_fullname, employee_number, employee_mobile, employee_password, employee_email, employee_group, employee_joined
	$Js_Table_Details = array(	
		'employeeid int(11) NOT NULL AUTO_INCREMENT',
		'employee_name varchar(50) NOT NULL',
		'employee_fullname varchar(50) NOT NULL',
		'employee_number varchar(50) NOT NULL',
		'employee_mobile varchar(50) NOT NULL',
		'employee_password text NOT NULL',
		'employee_email varchar(200) NOT NULL',
		'employee_group varchar(50) NOT NULL DEFAULT "employee"',
		'employee_joined datetime DEFAULT NULL',
		'PRIMARY KEY (employeeid)',
		);
	$add_query = $database->js_table_exists_create( 'js_employee', $Js_Table_Details ); 
	
?>