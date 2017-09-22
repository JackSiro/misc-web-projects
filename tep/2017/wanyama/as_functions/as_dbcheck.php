<?php
	
	$database = new As_Dbconn();
	//certificateid, certificate_student, certificate_title, certificate_event, certificate_content, certificate_remark
	$As_Table_Details = array(	
		'certificateid int(11) NOT NULL AUTO_INCREMENT',
		'certificate_student int(10) unsigned DEFAULT NULL',
		'certificate_title varchar(100) NOT NULL',
		'certificate_event varchar(1000) NOT NULL',
		'certificate_content varchar(1000) NOT NULL',
		'certificate_remark varchar(100) NOT NULL',
		'certificate_sighned varchar(100) NOT NULL',
		'certificate_createdby int(10) unsigned DEFAULT NULL',
		'certificate_created datetime DEFAULT NULL',
		'certificate_updatedby int(10) unsigned DEFAULT NULL',
		'certificate_updated datetime DEFAULT NULL',
		'PRIMARY KEY (certificateid)',
		);
	$add_query = $database->as_table_exists_create( 'as_certificate', $As_Table_Details ); 
	
	//classid, class_term, class_year, class_title
	$As_Table_Details = array(	
		'classid int(11) NOT NULL AUTO_INCREMENT',
		'class_term int(10) unsigned DEFAULT NULL',
		'class_year varchar(100) NOT NULL',
		'class_title varchar(100) NOT NULL',
		'class_createdby int(10) unsigned DEFAULT NULL',
		'class_created datetime DEFAULT NULL',
		'class_updatedby int(10) unsigned DEFAULT NULL',
		'class_updated datetime DEFAULT NULL',
		'PRIMARY KEY (classid)',
		);
	$add_query = $database->as_table_exists_create( 'as_class', $As_Table_Details ); 
	
	$As_Table_Details = array(	
		'optid int(11) NOT NULL AUTO_INCREMENT',
		'title varchar(100) NOT NULL',
		'content varchar(2000) NOT NULL',
		'createdby int(10) unsigned DEFAULT NULL',
		'created datetime DEFAULT NULL',
		'updatedby int(10) unsigned DEFAULT NULL',
		'updated datetime DEFAULT NULL',
		'PRIMARY KEY (optid)',
		);
	$add_query = $database->as_table_exists_create( 'as_options', $As_Table_Details ); 
	//student_admission, student_class, student_name, student_course, student_fee, student_gender, student_class, student_img
	$As_Table_Details = array(	
		'studentid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'student_admission varchar(100) DEFAULT NULL',
		'student_class int(10) NOT NULL DEFAULT 0',
		'student_name varchar(100) DEFAULT NULL',
		'student_gender varchar(1000) DEFAULT NULL',
		'student_registeredby int(10) unsigned DEFAULT 0',
		'student_registered datetime DEFAULT NULL',
		'student_updated datetime DEFAULT NULL',
		'student_updatedby int(10) DEFAULT NULL',
		'PRIMARY KEY (studentid)',
		);
	$add_query = $database->as_table_exists_create( 'as_student', $As_Table_Details ); 
	
	$As_Table_Details = array(	
		'adminid int(11) NOT NULL AUTO_INCREMENT',
		'admin_name varchar(50) NOT NULL',
		'admin_fname varchar(50) NOT NULL',
		'admin_surname varchar(50) NOT NULL',
		'admin_sex varchar(10) NOT NULL',
		'admin_password text NOT NULL',
		'admin_email varchar(200) NOT NULL',
		'admin_group varchar(50) NOT NULL DEFAULT "student"',
		'admin_joined datetime DEFAULT NULL',
		'admin_mobile varchar(50) NOT NULL',
		'PRIMARY KEY (adminid)',
		);
	$add_query = $database->as_table_exists_create( 'as_admin', $As_Table_Details ); 
	
?>