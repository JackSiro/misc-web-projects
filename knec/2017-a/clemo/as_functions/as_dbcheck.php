<?php
	
	$database = new As_Dbconn();
	
	$As_Table_Details = array(	
		'subjectid int(11) NOT NULL AUTO_INCREMENT',
		'subject_title varchar(100) NOT NULL',
		'subject_code varchar(100) NOT NULL',
		'subject_createdby int(10) unsigned DEFAULT NULL',
		'subject_created datetime DEFAULT NULL',
		'subject_updatedby int(10) unsigned DEFAULT NULL',
		'subject_updated datetime DEFAULT NULL',
		'PRIMARY KEY (subjectid)',
		);
	$add_query = $database->as_table_exists_create( 'as_subject', $As_Table_Details ); 
	//marks_class,marks_student,marks_subject,marks_marks,marks_postedby,marks_posted
	$As_Table_Details = array(	
		'marksid int(11) NOT NULL AUTO_INCREMENT',
		'marks_class int(10) unsigned DEFAULT NULL',
		'marks_student int(10) unsigned DEFAULT NULL',
		'marks_subject int(10) unsigned DEFAULT NULL',
		'marks_marks int(10) unsigned DEFAULT NULL',
		'marks_postedby int(10) unsigned DEFAULT NULL',
		'marks_posted datetime DEFAULT NULL',
		'marks_updatedby int(10) unsigned DEFAULT NULL',
		'marks_updated datetime DEFAULT NULL',
		'PRIMARY KEY (marksid)',
		);
	$add_query = $database->as_table_exists_create( 'as_marks', $As_Table_Details ); 
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
		'teacherid int(11) NOT NULL AUTO_INCREMENT',
		'teacher_name varchar(50) NOT NULL',
		'teacher_fname varchar(50) NOT NULL',
		'teacher_surname varchar(50) NOT NULL',
		'teacher_sex varchar(10) NOT NULL',
		'teacher_password text NOT NULL',
		'teacher_email varchar(200) NOT NULL',
		'teacher_group varchar(50) NOT NULL DEFAULT "student"',
		'teacher_joined datetime DEFAULT NULL',
		'teacher_mobile varchar(50) NOT NULL',
		'PRIMARY KEY (teacherid)',
		);
	$add_query = $database->as_table_exists_create( 'as_teacher', $As_Table_Details ); 
	
?>