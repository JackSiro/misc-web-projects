<?php
	
	$database = new As_DbConn();
	//complaintid, complaint_client, complaint_title, complaint_content, complaint_reply, complaint_createdby, complaint_created, complaint_updatedby, complaint_updated
	$as_Table_Details = array(	
		'complaintid int(11) NOT NULL AUTO_INCREMENT',
		'complaint_client int(10) unsigned DEFAULT NULL',
		'complaint_title varchar(2000) NOT NULL',
		'complaint_content varchar(20000) NOT NULL',
		'complaint_reply varchar(20000) NOT NULL',
		'complaint_createdby int(10) unsigned DEFAULT NULL',
		'complaint_created datetime DEFAULT NULL',
		'complaint_updatedby int(10) unsigned DEFAULT NULL',
		'complaint_updated datetime DEFAULT NULL',
		'PRIMARY KEY (complaintid)',
		);
	$add_query = $database->as_table_exists_create( 'as_complaint', $as_Table_Details ); 
	
	$as_Table_Details = array(	
		'optid int(11) NOT NULL AUTO_INCREMENT',
		'title varchar(100) NOT NULL',
		'content varchar(2000) NOT NULL',
		'createdby int(10) unsigned DEFAULT NULL',
		'created datetime DEFAULT NULL',
		'updatedby int(10) unsigned DEFAULT NULL',
		'updated datetime DEFAULT NULL',
		'PRIMARY KEY (optid)',
		);
	$add_query = $database->as_table_exists_create( 'as_options', $as_Table_Details ); 
	//clientid, client_name, client_fullname, client_sex, client_email
	$as_Table_Details = array(	
		'clientid int(11) NOT NULL AUTO_INCREMENT',
		'client_name varchar(50) NOT NULL',
		'client_fullname varchar(50) NOT NULL',
		'client_sex varchar(10) NOT NULL',
		'client_email varchar(200) NOT NULL',
		'client_joined datetime DEFAULT NULL',
		'client_mobile varchar(50) NOT NULL',
		'client_address varchar(50) NOT NULL',
		'client_web varchar(100) NOT NULL',
		'client_avatar varchar(50) NOT NULL DEFAULT "client_default.jpg"',
		'PRIMARY KEY (clientid)',
		);
	$add_query = $database->as_table_exists_create( 'as_client', $as_Table_Details ); 
	
	$as_Table_Details = array(	
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
	$add_query = $database->as_table_exists_create( 'AS_USER', $as_Table_Details ); 
	
?>