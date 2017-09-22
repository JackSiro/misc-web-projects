<?php
	
	$database = new Js_Dbconn();
	
	$Js_Table_Details = array(	
		'departmentid int(11) NOT NULL AUTO_INCREMENT',
		'department_slug varchar(100) NOT NULL',
		'department_title varchar(100) NOT NULL',
		'department_icon varchar(100) NOT NULL',
		'department_content varchar(2000) NOT NULL',
		'department_locked int(10) unsigned DEFAULT 0',
		'department_createdby int(10) unsigned DEFAULT NULL',
		'department_created datetime DEFAULT NULL',
		'department_parentid int(10) unsigned DEFAULT NULL',
		'department_updatedby int(10) unsigned DEFAULT NULL',
		'department_updated datetime DEFAULT NULL',
		'department_position varchar(100) NOT NULL',
		'PRIMARY KEY (departmentid)',
		);
	$add_query = $database->js_table_exists_create( 'js_department', $Js_Table_Details ); 
	
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
	//student_admission, student_department, student_name, student_course, student_fee, student_gender, student_class, student_img
	$Js_Table_Details = array(	
		'studentid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'student_admission varchar(100) DEFAULT NULL',
		'student_department int(10) NOT NULL DEFAULT 0',
		'student_name varchar(100) DEFAULT NULL',
		'student_course varchar(200) NOT NULL',
		'student_fee varchar(1000) DEFAULT NULL',
		'student_gender varchar(1000) DEFAULT NULL',
		'student_class varchar(1000) DEFAULT NULL',
		'student_img varchar(200) NOT NULL DEFAULT "student_default.jpg"',
		'student_postedby int(10) unsigned DEFAULT 0',
		'student_posted datetime DEFAULT NULL',
		'student_updated datetime DEFAULT NULL',
		'student_updatedby int(10) DEFAULT NULL',
		'PRIMARY KEY (studentid)',
		);
	$add_query = $database->js_table_exists_create( 'js_student', $Js_Table_Details ); 
	
	$Js_Table_Details = array(	
		'lecturerid int(11) NOT NULL AUTO_INCREMENT',
		'lecturer_name varchar(50) NOT NULL',
		'lecturer_fname varchar(50) NOT NULL',
		'lecturer_surname varchar(50) NOT NULL',
		'lecturer_sex varchar(10) NOT NULL',
		'lecturer_password text NOT NULL',
		'lecturer_email varchar(200) NOT NULL',
		'lecturer_group varchar(50) NOT NULL DEFAULT "student"',
		'lecturer_joined datetime DEFAULT NULL',
		'lecturer_mobile varchar(50) NOT NULL',
		'lecturer_web varchar(100) NOT NULL',
		'lecturer_avatar varchar(50) NOT NULL DEFAULT "lecturer_default.jpg"',
		'PRIMARY KEY (lecturerid)',
		);
	$add_query = $database->js_table_exists_create( 'js_lecturer', $Js_Table_Details ); 
	
?>