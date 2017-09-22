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
	//foundid, found_title, found_content, found_place, found_postedby, found_posted, 
	$as_Table_Details = array(	
		'foundid int(11) NOT NULL AUTO_INCREMENT',
		'found_title varchar(100) NOT NULL',
		'found_content varchar(1000) NOT NULL',
		'found_place varchar(100) NOT NULL',
		'found_postedby int(10) unsigned DEFAULT NULL',
		'found_posted datetime DEFAULT NULL',
		'found_updatedby int(10) unsigned DEFAULT NULL',
		'found_updated datetime DEFAULT NULL',
		'PRIMARY KEY (foundid)',
		);
	$add_query = $database->as_table_exists_create( 'as_found', $as_Table_Details ); 
		
	//lost_title, lost_content, lost_place, lost_posted lost_email, lost_joined, lost_mobile, lost_address, lost_web, lost_avatar
	
	$as_Table_Details = array(	
		'lostid int(11) NOT NULL AUTO_INCREMENT',
		'lost_title varchar(100) NOT NULL',
		'lost_content varchar(1000) NOT NULL',
		'lost_place varchar(100) NOT NULL',
		'lost_postedby int(10) unsigned DEFAULT NULL',
		'lost_posted datetime DEFAULT NULL',
		'lost_updatedby int(10) unsigned DEFAULT NULL',
		'lost_updated datetime DEFAULT NULL',
		'PRIMARY KEY (lostid)',
		);
	$add_query = $database->as_table_exists_create( 'as_lost', $as_Table_Details ); 
	
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