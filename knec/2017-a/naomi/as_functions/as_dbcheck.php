<?php
	
	$database = new As_Dbconn();
	//discussid, discuss_topic, discuss_content, discuss_postedby, discuss_posted
	$As_Table_Details = array(	
		'discussid int(11) NOT NULL AUTO_INCREMENT',
		'discuss_topic int(10) unsigned DEFAULT NULL',
		'discuss_content varchar(100) NOT NULL',
		'discuss_postedby int(10) unsigned DEFAULT NULL',
		'discuss_posted datetime DEFAULT NULL',
		'discuss_updatedby int(10) unsigned DEFAULT NULL',
		'discuss_updated datetime DEFAULT NULL',
		'PRIMARY KEY (discussid)',
		);
	$add_query = $database->as_table_exists_create( 'as_discuss', $As_Table_Details ); 
	
	//topicid, topic_title, topic_content, topic_participants, topic_createdby, topic_created
	$As_Table_Details = array(	
		'topicid int(11) NOT NULL AUTO_INCREMENT',
		'topic_title varchar(100) NOT NULL',
		'topic_content varchar(2000) NOT NULL',
		'topic_participants varchar(1000) NOT NULL',
		'topic_createdby int(10) unsigned DEFAULT NULL',
		'topic_created datetime DEFAULT NULL',
		'topic_updatedby int(10) unsigned DEFAULT NULL',
		'topic_updated datetime DEFAULT NULL',
		'PRIMARY KEY (topicid)',
		);
	$add_query = $database->as_table_exists_create( 'as_topic', $As_Table_Details ); 
	
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
	
	//groupid, group_title, group_content, group_createdby, group_created
	$As_Table_Details = array(	
		'groupid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'group_title varchar(100) DEFAULT NULL',
		'group_content varchar(1000) DEFAULT NULL',
		'group_createdby int(10) unsigned DEFAULT 0',
		'group_created datetime DEFAULT NULL',
		'group_updated datetime DEFAULT NULL',
		'group_updatedby int(10) DEFAULT NULL',
		'PRIMARY KEY (groupid)',
		);
	$add_query = $database->as_table_exists_create( 'as_group', $As_Table_Details ); 
	
	//studentid, student_name, student_fname, student_surname, student_sex, student_password, student_email, student_role, student_group, student_mobile, student_joined
	$As_Table_Details = array(	
		'studentid int(11) NOT NULL AUTO_INCREMENT',
		'student_name varchar(50) NOT NULL',
		'student_fname varchar(50) NOT NULL',
		'student_surname varchar(50) NOT NULL',
		'student_sex varchar(10) NOT NULL',
		'student_password text NOT NULL',
		'student_email varchar(200) NOT NULL',
		'student_role varchar(50) NOT NULL DEFAULT "student"',
		'student_group int(10) unsigned DEFAULT 0',
		'student_mobile varchar(50) NOT NULL',
		'student_joined datetime DEFAULT NULL',
		'PRIMARY KEY (studentid)',
		);
	$add_query = $database->as_table_exists_create( 'as_student', $As_Table_Details ); 
	
?>