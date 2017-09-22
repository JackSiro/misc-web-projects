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
	//paymentid, payment_amount, payment_date, payment_session, payment_paidby, payment_paid, 
	$as_Table_Details = array(	
		'paymentid int(11) NOT NULL AUTO_INCREMENT',
		'payment_amount int(10) unsigned DEFAULT NULL',
		'payment_date varchar(100) NOT NULL',
		'payment_session varchar(100) NOT NULL',
		'payment_paidby int(10) unsigned DEFAULT NULL',
		'payment_paid datetime DEFAULT NULL',
		'payment_updatedby int(10) unsigned DEFAULT NULL',
		'payment_updated datetime DEFAULT NULL',
		'PRIMARY KEY (paymentid)',
		);
	$add_query = $database->as_table_exists_create( 'as_payment', $as_Table_Details ); 
		
	//client_name, client_fullname, client_sex, client_email, client_joined, client_mobile, client_address, client_web, client_avatar
	
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
	$add_query = $database->as_table_exists_create( 'as_user', $as_Table_Details ); 
	
?>