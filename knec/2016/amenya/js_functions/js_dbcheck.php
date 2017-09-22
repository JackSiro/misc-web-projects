<?php
	
	$database = new Js_Dbconn();
	
	$Js_Table_Details = array(	
		'sectionid int(11) NOT NULL AUTO_INCREMENT',
		'section_slug varchar(100) NOT NULL',
		'section_title varchar(100) NOT NULL',
		'section_icon varchar(100) NOT NULL',
		'section_content varchar(2000) NOT NULL',
		'section_locked int(10) unsigned DEFAULT 0',
		'section_createdby int(10) unsigned DEFAULT NULL',
		'section_created datetime DEFAULT NULL',
		'section_parentid int(10) unsigned DEFAULT NULL',
		'section_updatedby int(10) unsigned DEFAULT NULL',
		'section_updated datetime DEFAULT NULL',
		'section_position varchar(100) NOT NULL',
		'PRIMARY KEY (sectionid)',
		);
	$add_query = $database->js_table_exists_create( 'js_section', $Js_Table_Details ); 
	
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
		
	$Js_Table_Details = array(	
		'bookid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'book_code varchar(100) DEFAULT NULL',
		'book_section int(10) NOT NULL DEFAULT 0',
		'book_slug varchar(200) NOT NULL',
		'book_title varchar(100) DEFAULT NULL',
		'book_content varchar(1000) DEFAULT NULL',
		'book_postedby int(10) unsigned DEFAULT 0',
		'book_posted datetime DEFAULT NULL',
		'book_publisher varchar(1000) DEFAULT NULL',
		'book_subject varchar(1000) DEFAULT NULL',
		'book_img varchar(200) NOT NULL DEFAULT "book_default.jpg"',
		'book_file varchar(200) NOT NULL',
		'book_updated datetime DEFAULT NULL',
		'book_updatedby int(10) DEFAULT NULL',
		'PRIMARY KEY (bookid)',
		);
	$add_query = $database->js_table_exists_create( 'js_book', $Js_Table_Details ); 
	
	$Js_Table_Details = array(	
		'studentid int(11) NOT NULL AUTO_INCREMENT',
		'student_name varchar(50) NOT NULL',
		'student_fname varchar(50) NOT NULL',
		'student_surname varchar(50) NOT NULL',
		'student_sex varchar(10) NOT NULL',
		'student_password text NOT NULL',
		'student_email varchar(200) NOT NULL',
		'student_group varchar(50) NOT NULL DEFAULT "student"',
		'student_joined datetime DEFAULT NULL',
		'student_mobile varchar(50) NOT NULL',
		'student_web varchar(100) NOT NULL',
		'student_avatar varchar(50) NOT NULL DEFAULT "student_default.jpg"',
		'PRIMARY KEY (studentid)',
		);
	$add_query = $database->js_table_exists_create( 'js_student', $Js_Table_Details ); 
	
?>