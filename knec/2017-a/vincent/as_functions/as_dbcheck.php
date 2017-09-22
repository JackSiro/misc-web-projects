<?php
	
	$database = new As_Dbconn();
	
	$As_Table_Details = array(	
		'subjectid int(11) NOT NULL AUTO_INCREMENT',
		'subject_title varchar(100) NOT NULL',
		'subject_code varchar(100) NOT NULL',
		'subject_createdby int(10) unsigned DEFAULT NULL',
		'subject_created datetime DEFAULT NULL',
		'subject_updatedby int(10) unsigned DEFAULT NULL',
		'subject_updated datetime DEFAULT NULL',
		'PRIMARY KEY (subjectid)',
		);
	$add_query = $database->as_table_exists_create( 'as_subject', $As_Table_Details ); 
	
	//salesitemid, salesitem_title, salesitem_price, salesitem_content, salesitem_type
	$As_Table_Details = array(	
		'salesitemid int(11) NOT NULL AUTO_INCREMENT',
		'salesitem_title varchar(100) NOT NULL',
		'salesitem_price int(10) NOT NULL DEFAULT 0',
		'salesitem_content varchar(100) NOT NULL',
		'salesitem_type varchar(100) NOT NULL',
		'salesitem_createdby int(10) unsigned DEFAULT NULL',
		'salesitem_created datetime DEFAULT NULL',
		'salesitem_updatedby int(10) unsigned DEFAULT NULL',
		'salesitem_updated datetime DEFAULT NULL',
		'PRIMARY KEY (salesitemid)',
		);
	$add_query = $database->as_table_exists_create( 'as_salesitem', $As_Table_Details ); 
	
	$As_Table_Details = array(	
		'optid int(11) NOT NULL AUTO_INCREMENT',
		'title varchar(100) NOT NULL',
		'content varchar(2000) NOT NULL',
		'createdby int(10) unsigned DEFAULT NULL',
		'created datetime DEFAULT NULL',
		'updatedby int(10) unsigned DEFAULT NULL',
		'updated datetime DEFAULT NULL',
		'PRIMARY KEY (optid)',
		);
	$add_query = $database->as_table_exists_create( 'as_options', $As_Table_Details ); 
	//customer_name, customer_sex, customer_address, customer_course, customer_fee, customer_mobile
	$As_Table_Details = array(	
		'customerid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'customer_name varchar(100) DEFAULT NULL',
		'customer_sex int(10) NOT NULL DEFAULT 1',
		'customer_address varchar(100) DEFAULT NULL',
		'customer_mobile varchar(100) DEFAULT NULL',
		'customer_registeredby int(10) unsigned DEFAULT 0',
		'customer_registered datetime DEFAULT NULL',
		'customer_updated datetime DEFAULT NULL',
		'customer_updatedby int(10) DEFAULT NULL',
		'PRIMARY KEY (customerid)',
		);
	$add_query = $database->as_table_exists_create( 'as_customer', $As_Table_Details ); 
	
	$As_Table_Details = array(	
		'userid int(11) NOT NULL AUTO_INCREMENT',
		'user_name varchar(50) NOT NULL',
		'user_fname varchar(50) NOT NULL',
		'user_surname varchar(50) NOT NULL',
		'user_sex varchar(10) NOT NULL',
		'user_password text NOT NULL',
		'user_email varchar(200) NOT NULL',
		'user_group varchar(50) NOT NULL DEFAULT "customer"',
		'user_joined datetime DEFAULT NULL',
		'user_mobile varchar(50) NOT NULL',
		'PRIMARY KEY (userid)',
		);
	$add_query = $database->as_table_exists_create( 'as_user', $As_Table_Details ); 
	
?>