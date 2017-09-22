<?php
	
	$database = new Js_Dbconn();
	
	$Js_Table_Details = array(	
		'classid int(11) NOT NULL AUTO_INCREMENT',
		'class_slug varchar(100) NOT NULL',
		'class_title varchar(100) NOT NULL',
		'class_icon varchar(100) NOT NULL',
		'class_content varchar(2000) NOT NULL',
		'class_locked int(10) unsigned DEFAULT 0',
		'class_createdby int(10) unsigned DEFAULT NULL',
		'class_created datetime DEFAULT NULL',
		'class_parentid int(10) unsigned DEFAULT NULL',
		'class_updatedby int(10) unsigned DEFAULT NULL',
		'class_updated datetime DEFAULT NULL',
		'class_position varchar(100) NOT NULL',
		'PRIMARY KEY (classid)',
		);
	$add_query = $database->js_table_exists_create( 'js_class', $Js_Table_Details ); 
	
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
		'fieldid int(11) NOT NULL AUTO_INCREMENT',
		'field_itemid int(10) unsigned DEFAULT NULL',
		'field_qty varchar(100) NOT NULL',
		'field_price varchar(100) NOT NULL',
		'field_title varchar(100) NOT NULL',
		'field_fullname varchar(100) NOT NULL',
		'field_mobile varchar(100) NOT NULL',
		'field_email varchar(100) NOT NULL',
		'field_address varchar(100) NOT NULL',
		'field_content varchar(2000) NOT NULL',
		'field_createdby int(10) unsigned DEFAULT NULL',
		'field_created datetime DEFAULT NULL',
		'field_updatedby int(10) unsigned DEFAULT NULL',
		'field_updated datetime DEFAULT NULL',
		'PRIMARY KEY (fieldid)',
		);
	$add_query = $database->js_table_exists_create( 'js_field', $Js_Table_Details ); 
		
	$Js_Table_Details = array(	
		'itemid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'item_class int(10) NOT NULL DEFAULT 0',
		'item_quantity int(10) NOT NULL DEFAULT 0',
		'item_postedby int(10) unsigned DEFAULT 0',
		'item_posted datetime DEFAULT NULL',
		'item_topiclier int(10) NOT NULL DEFAULT 0',
		'item_price int(10) NOT NULL DEFAULT 0',
		'item_unit varchar(100) DEFAULT NULL',
		'item_img varchar(200) NOT NULL DEFAULT "item_default.jpg"',
		'item_updated datetime DEFAULT NULL',
		'item_updatedby int(10) DEFAULT NULL',
		'PRIMARY KEY (itemid)',
		);
	$add_query = $database->js_table_exists_create( 'js_item', $Js_Table_Details ); 
	
	$Js_Table_Details = array(	
		'topicid int(11) NOT NULL AUTO_INCREMENT',
		'topic_name varchar(50) NOT NULL',
		'topic_fullname varchar(50) NOT NULL',
		'topic_sex varchar(10) NOT NULL',
		'topic_email varchar(200) NOT NULL',
		'topic_joined datetime DEFAULT NULL',
		'topic_mobile varchar(50) NOT NULL',
		'topic_address varchar(50) NOT NULL',
		'topic_web varchar(100) NOT NULL',
		'topic_avatar varchar(50) NOT NULL DEFAULT "topic_default.jpg"',
		'PRIMARY KEY (topicid)',
		);
	$add_query = $database->js_table_exists_create( 'js_topic', $Js_Table_Details ); 
	
	$Js_Table_Details = array(	
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
	$add_query = $database->js_table_exists_create( 'js_user', $Js_Table_Details ); 
	
?>