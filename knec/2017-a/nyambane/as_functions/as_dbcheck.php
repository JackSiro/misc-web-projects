<?php
	
	$database = new As_Dbconn();
	
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
	//visitid, visit_amount, visit_date, visit_session, visit_paidby, visit_paid, 
	$as_Table_Details = array(	
		'visitid int(11) NOT NULL AUTO_INCREMENT',
		'visit_amount int(10) unsigned DEFAULT NULL',
		'visit_date varchar(100) NOT NULL',
		'visit_session varchar(100) NOT NULL',
		'visit_paidby int(10) unsigned DEFAULT NULL',
		'visit_paid datetime DEFAULT NULL',
		'visit_updatedby int(10) unsigned DEFAULT NULL',
		'visit_updated datetime DEFAULT NULL',
		'PRIMARY KEY (visitid)',
		);
	$add_query = $database->as_table_exists_create( 'as_visit', $as_Table_Details ); 
		
	//visitor_name, visitor_fullname, visitor_sex, visitor_email, visitor_joined, visitor_mobile, visitor_address, visitor_web, visitor_avatar
	
	$as_Table_Details = array(	
		'visitorid int(11) NOT NULL AUTO_INCREMENT',
		'visitor_name varchar(50) NOT NULL',
		'visitor_fullname varchar(50) NOT NULL',
		'visitor_sex varchar(10) NOT NULL',
		'visitor_email varchar(200) NOT NULL',
		'visitor_joined datetime DEFAULT NULL',
		'visitor_mobile varchar(50) NOT NULL',
		'visitor_address varchar(50) NOT NULL',
		'visitor_web varchar(100) NOT NULL',
		'visitor_avatar varchar(50) NOT NULL DEFAULT "visitor_default.jpg"',
		'PRIMARY KEY (visitorid)',
		);
	$add_query = $database->as_table_exists_create( 'as_visitor', $as_Table_Details ); 
	
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
	$add_query = $database->as_table_exists_create( 'as_user', $as_Table_Details ); 
	
?>