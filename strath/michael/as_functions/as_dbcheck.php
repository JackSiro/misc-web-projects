<?php
/*
	File: as_functions/as_dbcheck.php
	Description: create database tables after checking for errors in database if they are missing

*/
	
	//new instance of database class
	$database = new As_Dbconn();
	
	// Begin creating as_crime database table
	$As_Table_Details = array(	
		'crimeid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'crime_category int(10) unsigned DEFAULT 0',
		'crime_title varchar(100) DEFAULT NULL',
		'crime_description varchar(10000) NOT NULL',
		'crime_date varchar(10000) NOT NULL',
		'crime_time varchar(100) DEFAULT NULL',
		'crime_suspect varchar(100) DEFAULT NULL',
		'crime_picture1 varchar(100) DEFAULT NULL',
		'crime_picture2 varchar(100) DEFAULT NULL',
		'crime_picture3 varchar(100) DEFAULT NULL',
		'crime_posted datetime DEFAULT NULL',
		'crime_postedby int(10) unsigned DEFAULT 0',
		'crime_updated date DEFAULT NULL',
		'crime_updatedby int(10) unsigned DEFAULT NULL',
		'PRIMARY KEY (crimeid)',
		);
	$add_query = $database->as_table_exists_create( 'as_crime', $As_Table_Details ); 
	// Finish creating as_crime database table
	
	// Begin creating as_category database table
	$As_Table_Details = array(	
		'categoryid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'category_title varchar(100) DEFAULT NULL',
		'category_code varchar(100) DEFAULT NULL',
		'category_content varchar(10000) NOT NULL',
		'category_created datetime DEFAULT NULL',
		'category_scount int(10) unsigned DEFAULT 0',
		'category_active int(10) unsigned DEFAULT 1',
		'PRIMARY KEY (categoryid)',
		);
	$add_query = $database->as_table_exists_create( 'as_category', $As_Table_Details ); 
	// finish creating as_category database table
	
	// Begin creating as_item database table
	$As_Table_Details = array(	
		'itemid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'item_title varchar(100) DEFAULT NULL',
		'item_value varchar(100) DEFAULT NULL',
		'item_date varchar(100) DEFAULT NULL',
		'item_time varchar(100) DEFAULT NULL',
		'item_place varchar(100) DEFAULT NULL',
		'item_person varchar(100) DEFAULT NULL',
		'item_idnumber varchar(100) DEFAULT NULL',
		'item_content varchar(10000) NOT NULL',
		'item_image varchar(10000) NOT NULL',
		'item_reported datetime DEFAULT NULL',
		'item_found int(10) unsigned DEFAULT 1',
		'PRIMARY KEY (itemid)',
		);
	$add_query = $database->as_table_exists_create( 'as_item', $As_Table_Details ); 
	// finish creating as_item database table
	
	// Begin creating as_site_options database table
	$As_Table_Details = array(	
		'optionid int(11) NOT NULL AUTO_INCREMENT',
		'option_title varchar(100) NOT NULL',
		'option_content varchar(2000) NOT NULL',
		'option_createdby int(10) unsigned DEFAULT NULL',
		'option_created datetime DEFAULT NULL',
		'option_updatedby int(10) unsigned DEFAULT NULL',
		'option_updated datetime DEFAULT NULL',
		'PRIMARY KEY (optionid)',
		);
	$add_query = $database->as_table_exists_create( 'as_site_options', $As_Table_Details ); 
	// finish creating as_site_options database table
	
	// Begin creating as_page database table
	$As_Table_Details = array(	
		'pageid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'page_homepage int(10) unsigned NOT NULL DEFAULT 0',
		'page_title varchar(200) DEFAULT NULL',
		'page_content varchar(40000) DEFAULT NULL',
		'page_slug varchar(100) DEFAULT NULL',
		'page_state int(10) unsigned NOT NULL DEFAULT 0',
		'page_views int(10) unsigned NOT NULL DEFAULT 0',
		'page_created datetime DEFAULT NULL',
		'page_createdby int(10) unsigned DEFAULT NULL',
		'page_updated datetime DEFAULT NULL',
		'page_updatedby int(10) unsigned DEFAULT NULL',
		'page_tatu smallint(5) unsigned NOT NULL DEFAULT 0',
		'page_nne smallint(5) unsigned NOT NULL DEFAULT 0',
		'page_tano smallint(5) unsigned NOT NULL DEFAULT 0',
		'PRIMARY KEY (pageid)',
		);
	$add_query = $database->as_table_exists_create( 'as_page', $As_Table_Details ); 
	// finish creating as_page database table
	
	// Begin creating as_user database table
	$As_Table_Details = array(	
		'userid int(11) NOT NULL AUTO_INCREMENT',
		'user_name varchar(50) NOT NULL',
		'user_fname varchar(50) NOT NULL',
		'user_lname varchar(50) NOT NULL',
		'user_mobile varchar(50) NOT NULL',
		'user_sex int(10) NOT NULL DEFAULT 1',
		'user_password text NOT NULL',
		'user_email varchar(200) NOT NULL',
		'user_group int(10) NOT NULL DEFAULT 0',
		'user_level int(10) NOT NULL DEFAULT 0',
		'user_avatar varchar(50) NOT NULL DEFAULT "user_default.jpg"',
		'user_location varchar(100) NOT NULL',
		'user_joined datetime DEFAULT NULL',
		'user_updated datetime DEFAULT NULL',
		'user_lastseen datetime DEFAULT NULL',
		'PRIMARY KEY (userid)',
		);
	$add_query = $database->as_table_exists_create( 'as_user', $As_Table_Details ); 
	// finish creating as_user database table
	
?>