<?php
	
	$database = new Js_Dbconn();
	
	$Js_Table_Details = array(	
		'parkingslotid int(11) NOT NULL AUTO_INCREMENT',
		'parkingslot_title varchar(100) NOT NULL',
		'parkingslot_icon varchar(100) NOT NULL',
		'parkingslot_content varchar(2000) NOT NULL',
		'parkingslot_createdby int(10) unsigned DEFAULT NULL',
		'parkingslot_created datetime DEFAULT NULL',
		'parkingslot_updatedby int(10) unsigned DEFAULT NULL',
		'parkingslot_updated datetime DEFAULT NULL',
		'PRIMARY KEY (Parkingslotid)',
		);
	$add_query = $database->js_table_exists_create( 'js_parkingslot', $Js_Table_Details ); 
	
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
	//session_customer, session_parkingslot, session_datetime, session_amount, session_payment
	$Js_Table_Details = array(	
		'sessionid int(11) NOT NULL AUTO_INCREMENT',
		'session_customer varchar(100) NOT NULL',
		'session_parkingslot varchar(100) NOT NULL',
		'session_datetime varchar(100) NOT NULL',
		'session_amount varchar(100) NOT NULL',
		'session_payment varchar(100) NOT NULL',
		'session_createdby int(10) unsigned DEFAULT NULL',
		'session_created datetime DEFAULT NULL',
		'session_updatedby int(10) unsigned DEFAULT NULL',
		'session_updated datetime DEFAULT NULL',
		'PRIMARY KEY (sessionid)',
		);
	$add_query = $database->js_table_exists_create( 'js_session', $Js_Table_Details ); 
	//customer_name, customer_fullname, customer_sex, customer_email, customer_joined, 
	$Js_Table_Details = array(	
		'customerid int(11) NOT NULL AUTO_INCREMENT',
		'customer_name varchar(50) NOT NULL',
		'customer_fullname varchar(50) NOT NULL',
		'customer_sex varchar(10) NOT NULL',
		'customer_email varchar(200) NOT NULL',
		'customer_joined datetime DEFAULT NULL',
		'customer_mobile varchar(50) NOT NULL',
		'customer_address varchar(50) NOT NULL',
		'customer_web varchar(100) NOT NULL',
		'customer_avatar varchar(50) NOT NULL DEFAULT "customer_default.jpg"',
		'PRIMARY KEY (customerid)',
		);
	$add_query = $database->js_table_exists_create( 'js_customer', $Js_Table_Details ); 
	
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