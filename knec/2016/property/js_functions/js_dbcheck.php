<?php
	
	$database = new Js_Dbconn();
	//$house_number, $house_size, $house_location, $house_type, $house_prices
	$Js_Table_Details = array(	
		'houseid int(11) NOT NULL AUTO_INCREMENT',
		'house_number varchar(100) NOT NULL',
		'house_size varchar(100) NOT NULL',
		'house_location varchar(100) NOT NULL',
		'house_type varchar(2000) NOT NULL',
		'house_prices varchar(2000) NOT NULL',
		'house_createdby int(10) unsigned DEFAULT NULL',
		'house_created datetime DEFAULT NULL',
		'house_parentid int(10) unsigned DEFAULT NULL',
		'house_updatedby int(10) unsigned DEFAULT NULL',
		'house_updated datetime DEFAULT NULL',
		'house_position varchar(100) NOT NULL',
		'PRIMARY KEY (houseid)',
		);
	$add_query = $database->js_table_exists_create( 'js_house', $Js_Table_Details ); 
	
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
	//$tenant_name, $tenant_house, $tenant_idno, $tenant_status, $tenant_contacts, $tenant_inquiries
	$Js_Table_Details = array(	
		'tenantid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'tenant_name varchar(100) DEFAULT NULL',
		'tenant_house int(10) NOT NULL DEFAULT 0',
		'tenant_idno varchar(200) NOT NULL',
		'tenant_status varchar(100) DEFAULT NULL',
		'tenant_contacts varchar(1000) DEFAULT NULL',
		'tenant_inquiries varchar(1000) DEFAULT NULL',
		'tenant_postedby int(10) unsigned DEFAULT 0',
		'tenant_posted datetime DEFAULT NULL',
		'tenant_updated datetime DEFAULT NULL',
		'tenant_updatedby int(10) DEFAULT NULL',
		'PRIMARY KEY (tenantid)',
		);
	$add_query = $database->js_table_exists_create( 'js_tenant', $Js_Table_Details ); 
	//rent_tenant, rent_amount, rent_payment, rent_paid
		$Js_Table_Details = array(	
		'rentid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'rent_tenant varchar(100) DEFAULT NULL',
		'rent_amount int(10) NOT NULL DEFAULT 0',
		'rent_payment varchar(1000) DEFAULT NULL',
		'rent_paid datetime DEFAULT NULL',
		'PRIMARY KEY (rentid)',
		);
	$add_query = $database->js_table_exists_create( 'js_rent', $Js_Table_Details ); 
	
	
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