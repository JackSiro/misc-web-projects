<?php
	
	$database = new As_Dbconn();
	
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
	
	$As_Table_Details = array(	
		'examid int(11) NOT NULL AUTO_INCREMENT',
		'exam_studentid int(10) unsigned DEFAULT NULL',
		'exam_title varchar(2000) NOT NULL',
		'exam_date varchar(2000) NOT NULL',
		'exam_postedby int(10) unsigned DEFAULT NULL',
		'exam_posted datetime DEFAULT NULL',
		'PRIMARY KEY (examid)',
	);
	$add_query = $database->as_table_exists_create( 'as_exam', $As_Table_Details ); 
	
	//fee_studentid, fee_unit, fee_amount, fee_posted, fee_postedby, 
	$As_Table_Details = array(	
		'feeid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'fee_studentid int(10) NOT NULL DEFAULT 0',
		'fee_amount int(10) NOT NULL DEFAULT 0',
		'fee_posted datetime DEFAULT NULL',
		'fee_postedby int(10) unsigned DEFAULT 0',
		'fee_updated datetime DEFAULT NULL',
		'fee_updatedby int(10) DEFAULT NULL',
		'PRIMARY KEY (feeid)',
	);
	$add_query = $database->as_table_exists_create( 'as_fee', $As_Table_Details ); 
	
	//studentid, student_admno, student_name, student_class, student_sex, student_password, student_fee, student_comment, student_field1, student_fee, student_createdby, student_created
	$As_Table_Details = array(	
		'studentid int(11) NOT NULL AUTO_INCREMENT',
		'student_admno varchar(100) NOT NULL',
		'student_name varchar(100) NOT NULL',
		'student_class varchar(50) NOT NULL',
		'student_sex int(10) unsigned DEFAULT 0',
		'student_password varchar(100) NOT NULL',
		'student_fee varchar(100) NOT NULL',
		'student_comment int(10) unsigned DEFAULT 0',
		'student_field1 int(10) unsigned DEFAULT 0',
		'student_field2 int(10) NOT NULL DEFAULT 0',
		'student_createdby int(10) unsigned DEFAULT NULL',
		'student_created datetime DEFAULT NULL',
		'student_updatedby int(10) unsigned DEFAULT NULL',
		'student_updated datetime DEFAULT NULL',
		'PRIMARY KEY (studentid)',
	);
	$add_query = $database->as_table_exists_create( 'as_student', $As_Table_Details ); 
	
	$As_Table_Details = array(	
		'userid int(11) NOT NULL AUTO_INCREMENT',
		'user_name varchar(50) NOT NULL',
		'user_fname varchar(50) NOT NULL',
		'user_surname varchar(50) NOT NULL',
		'user_sex varchar(10) NOT NULL',
		'user_password text NOT NULL',
		'user_email varchar(200) NOT NULL',
		'user_group varchar(50) NOT NULL DEFAULT "buyer"',
		'user_joined datetime DEFAULT NULL',
		'user_mobile varchar(50) NOT NULL',
		'user_web varchar(100) NOT NULL',
		'user_avatar varchar(50) NOT NULL DEFAULT "user_default.jpg"',
		'PRIMARY KEY (userid)',
	);
	$add_query = $database->as_table_exists_create( 'as_user', $As_Table_Details ); 
	
?>