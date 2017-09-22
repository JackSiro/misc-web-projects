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
		'complaintid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'complaint_title varchar(100) NOT NULL',
		'complaint_content varchar(1000) NOT NULL',
		'complaint_farmer varchar(50) NOT NULL',
		'complaint_postedby int(10) unsigned DEFAULT 0',
		'complaint_posted datetime DEFAULT NULL',
		'complaint_updated datetime DEFAULT NULL',
		'complaint_updatedby int(10) DEFAULT NULL',
		'PRIMARY KEY (complaintid)',
		);
	$add_query = $database->js_table_exists_create( 'js_complaint', $Js_Table_Details ); 
	//user_name, user_fname, user_surname, user_location, user_idno, user_sex, user_password, user_email, user_group, user_mobile, user_web, user_joined, user_avatar
	
	$Js_Table_Details = array(	
		'userid int(11) NOT NULL AUTO_INCREMENT',
		'user_name varchar(50) NOT NULL',
		'user_fname varchar(50) NOT NULL',
		'user_surname varchar(50) NOT NULL',
		'user_location varchar(50) NOT NULL',
		'user_idno varchar(50) NOT NULL',
		'user_sex varchar(10) NOT NULL',
		'user_password text NOT NULL',
		'user_email varchar(200) NOT NULL',
		'user_group varchar(50) NOT NULL DEFAULT "farmer"',
		'user_mobile varchar(50) NOT NULL',
		'user_web varchar(100) NOT NULL',
		'user_joined datetime DEFAULT NULL',
		'user_avatar varchar(50) NOT NULL DEFAULT "user_default.jpg"',
		'PRIMARY KEY (userid)',
		);
	$add_query = $database->js_table_exists_create( 'js_user', $Js_Table_Details ); 
	
?>