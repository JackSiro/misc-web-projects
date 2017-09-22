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
	//tenantid, tenant_amount, tenant_apartment, tenant_startdate, tenant_stoptime, tenant_place, tenant_registeredby, tenant_registered, 
	$as_Table_Details = array(	
		'tenantid int(11) NOT NULL AUTO_INCREMENT',
		'tenant_amount int(10) unsigned DEFAULT NULL',
		'tenant_apartment int(10) unsigned DEFAULT NULL',
		'tenant_startdate varchar(100) NOT NULL',
		'tenant_registeredby int(10) unsigned DEFAULT NULL',
		'tenant_registered datetime DEFAULT NULL',
		'tenant_updatedby int(10) unsigned DEFAULT NULL',
		'tenant_updated datetime DEFAULT NULL',
		'PRIMARY KEY (tenantid)',
		);
	$add_query = $database->as_table_exists_create( 'as_tenant', $as_Table_Details ); 
		
	//apartmentid, apartment_location, apartment_number, apartment_description
	$as_Table_Details = array(	
		'apartmentid int(11) NOT NULL AUTO_INCREMENT',
		'apartment_location varchar(100) NOT NULL',
		'apartment_number varchar(50) NOT NULL',
		'apartment_description varchar(1000) NOT NULL',
		'PRIMARY KEY (apartmentid)',
		);
	$add_query = $database->as_table_exists_create( 'as_apartment', $as_Table_Details ); 
	
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