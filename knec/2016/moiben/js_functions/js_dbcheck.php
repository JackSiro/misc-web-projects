<?php
	
	$database = new Js_Dbconn();
	
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
		'sessionid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'sess_doctor varchar(50) DEFAULT NULL',
		'sess_patient varchar(50) DEFAULT NULL',
		'sess_timein varchar(50) DEFAULT NULL',
		'sess_timeout varchar(50) DEFAULT NULL',
		'sess_createdby int(10) unsigned DEFAULT 0',
		'sess_created datetime DEFAULT NULL',
		'sess_publisher varchar(1000) DEFAULT NULL',
		'sess_updated datetime DEFAULT NULL',
		'sess_updatedby int(10) DEFAULT NULL',
		'PRIMARY KEY (sessionid)',
		);
	$add_query = $database->js_table_exists_create( 'js_session', $Js_Table_Details ); 
	
	$Js_Table_Details = array(	
		'staffid int(11) NOT NULL AUTO_INCREMENT',
		'staff_fullname varchar(50) NOT NULL',
		'staff_station varchar(200) NOT NULL',
		'staff_task varchar(50) NOT NULL',
		'staff_mobile varchar(50) NOT NULL',
		'staff_joined datetime DEFAULT NULL',
		'staff_avatar varchar(50) NOT NULL DEFAULT "user_default.jpg"',
		'PRIMARY KEY (staffid)',
		);
	$add_query = $database->js_table_exists_create( 'js_staff', $Js_Table_Details ); 
			
	$Js_Table_Details = array(	
		'patid int(11) NOT NULL AUTO_INCREMENT',
		'pat_fullname varchar(50) NOT NULL',
		'pat_sex varchar(50) NOT NULL',
		'pat_email varchar(100) NOT NULL',
		'pat_address varchar(200) NOT NULL',
		'pat_mobile varchar(50) NOT NULL',
		'pat_joined datetime DEFAULT NULL',
		'PRIMARY KEY (patid)',
		);
	$add_query = $database->js_table_exists_create( 'js_patient', $Js_Table_Details ); 
	
	$Js_Table_Details = array(	
		'userid int(11) NOT NULL AUTO_INCREMENT',
		'user_name varchar(50) NOT NULL',
		'user_fullname varchar(50) NOT NULL',
		'user_sex varchar(10) NOT NULL',
		'user_password text NOT NULL',
		'user_email varchar(200) NOT NULL',
		'user_group varchar(50) NOT NULL DEFAULT "user"',
		'user_joined datetime DEFAULT NULL',
		'user_mobile varchar(50) NOT NULL',
		'user_web varchar(100) NOT NULL',
		'user_avatar varchar(50) NOT NULL DEFAULT "user_default.jpg"',
		'PRIMARY KEY (userid)',
		);
	$add_query = $database->js_table_exists_create( 'js_user', $Js_Table_Details ); 
	
	
?>