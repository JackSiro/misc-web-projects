<?php
	
	$database = new Js_Dbconn();
	
	$Js_Table_Details = array(	
		'catid int(11) NOT NULL AUTO_INCREMENT',
		'cat_slug varchar(100) NOT NULL',
		'cat_title varchar(100) NOT NULL',
		'cat_icon varchar(100) NOT NULL',
		'cat_content varchar(2000) NOT NULL',
		'cat_locked int(10) unsigned DEFAULT 0',
		'cat_createdby int(10) unsigned DEFAULT NULL',
		'cat_created datetime DEFAULT NULL',
		'cat_parentid int(10) unsigned DEFAULT NULL',
		'cat_updatedby int(10) unsigned DEFAULT NULL',
		'cat_updated datetime DEFAULT NULL',
		'cat_position varchar(100) NOT NULL',
		'PRIMARY KEY (catid)',
		);
	$add_query = $database->js_table_exists_create( 'js_category', $Js_Table_Details ); 
	
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
		'itemid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'item_code varchar(100) DEFAULT NULL',
		'item_cat int(10) NOT NULL DEFAULT 0',
		'item_slug varchar(200) NOT NULL',
		'item_title varchar(100) DEFAULT NULL',
		'item_content varchar(1000) DEFAULT NULL',
		'item_postedby int(10) unsigned DEFAULT 0',
		'item_posted datetime DEFAULT NULL',
		'item_publisher varchar(1000) DEFAULT NULL',
		'item_subject varchar(1000) DEFAULT NULL',
		'item_img varchar(200) NOT NULL DEFAULT "item_default.jpg"',
		'item_updated datetime DEFAULT NULL',
		'item_updatedby int(10) DEFAULT NULL',
		'PRIMARY KEY (itemid)',
		);
	$add_query = $database->js_table_exists_create( 'js_elibrary', $Js_Table_Details ); 
	
	$Js_Table_Details = array(	
		'userid int(11) NOT NULL AUTO_INCREMENT',
		'user_name varchar(50) NOT NULL',
		'user_fname varchar(50) NOT NULL',
		'user_surname varchar(50) NOT NULL',
		'user_sex varchar(10) NOT NULL',
		'user_password text NOT NULL',
		'user_email varchar(200) NOT NULL',
		'user_group varchar(50) NOT NULL DEFAULT "student"',
		'user_joined datetime DEFAULT NULL',
		'user_mobile varchar(50) NOT NULL',
		'user_web varchar(100) NOT NULL',
		'user_avatar varchar(50) NOT NULL DEFAULT "user_default.jpg"',
		'PRIMARY KEY (userid)',
		);
	$add_query = $database->js_table_exists_create( 'js_user', $Js_Table_Details ); 
	
?>