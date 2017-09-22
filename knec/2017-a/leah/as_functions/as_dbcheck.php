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
	
	//recordid, record_item, record_place, record_time, record_date, record_measure, record_postedby, record_posted, 
	$as_Table_Details = array(	
		'recordid int(11) NOT NULL AUTO_INCREMENT',
		'record_item int(10) unsigned DEFAULT NULL',
		'record_place varchar(100) NOT NULL',
		'record_time varchar(100) NOT NULL',
		'record_date varchar(100) NOT NULL',
		'record_measure varchar(100) NOT NULL',
		'record_postedby int(10) unsigned DEFAULT NULL',
		'record_posted datetime DEFAULT NULL',
		'PRIMARY KEY (recordid)',
		);
	$add_query = $database->as_table_exists_create( 'as_record', $as_Table_Details );		
	//item_name, item_code, item_description, item_unit, item_created
	
	$as_Table_Details = array(	
		'itemid int(11) NOT NULL AUTO_INCREMENT',
		'item_name varchar(50) NOT NULL',
		'item_code varchar(50) NOT NULL',
		'item_description varchar(10) NOT NULL',
		'item_unit varchar(200) NOT NULL',
		'item_created datetime DEFAULT NULL',
		'PRIMARY KEY (itemid)',
		);
	$add_query = $database->as_table_exists_create( 'as_item', $as_Table_Details ); 
	
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