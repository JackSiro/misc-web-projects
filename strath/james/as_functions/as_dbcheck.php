<?php
	
	$database = new As_Dbconn();
	
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
	
	//planid, plan_title, plan_price, plan_instal, plan_irate, plan_benefit, plan_image
	$As_Table_Details = array(	
		'planid int(11) NOT NULL AUTO_INCREMENT',
		'plan_title varchar(100) NOT NULL',
		'plan_price int(10) unsigned DEFAULT NULL',
		'plan_instal int(10) unsigned DEFAULT NULL',
		'plan_irate varchar(100) NOT NULL',
		'plan_benefit varchar(100) NOT NULL',
		'plan_image varchar(100) NOT NULL',
		'plan_createdby int(10) unsigned DEFAULT NULL',
		'plan_created datetime DEFAULT NULL',
		'plan_updatedby int(10) unsigned DEFAULT NULL',
		'plan_updated datetime DEFAULT NULL',
		'PRIMARY KEY (planid)',
		);
	$add_query = $database->as_table_exists_create( 'as_plan', $As_Table_Details ); 
	
	//client_name, client_mobile, client_email, client_location, client_cyear, client_cvalue, client_cmodel, client_cirate, client_plan, client_registeredby, client_registered, client_updated, client_updatedby
	$As_Table_Details = array(	
		'clientid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'client_name varchar(100) DEFAULT NULL',
		'client_mobile varchar(100) DEFAULT NULL',
		'client_email varchar(100) DEFAULT NULL',
		'client_location varchar(1000) DEFAULT NULL',
		'client_cyear varchar(10) DEFAULT NULL',
		'client_cvalue int(10) unsigned DEFAULT 0',
		'client_cmodel varchar(100) DEFAULT NULL',
		'client_cirate int(10) unsigned DEFAULT 0',
		'client_plan int(10) unsigned DEFAULT 0',
		'client_registeredby int(10) unsigned DEFAULT 0',
		'client_registered datetime DEFAULT NULL',
		'client_updated datetime DEFAULT NULL',
		'client_updatedby int(10) DEFAULT NULL',
		'PRIMARY KEY (clientid)',
		);
	$add_query = $database->as_table_exists_create( 'as_client', $As_Table_Details ); 
	
	//user_name, user_fname, user_surname, user_sex, user_password, user_email, user_group, user_joined
	$As_Table_Details = array(	
		'userid int(11) NOT NULL AUTO_INCREMENT',
		'user_name varchar(50) NOT NULL',
		'user_fname varchar(50) NOT NULL',
		'user_surname varchar(50) NOT NULL',
		'user_sex varchar(10) NOT NULL',
		'user_password text NOT NULL',
		'user_email varchar(200) NOT NULL',
		'user_group varchar(50) NOT NULL DEFAULT "client"',
		'user_joined datetime DEFAULT NULL',
		'user_mobile varchar(50) NOT NULL',
		'PRIMARY KEY (userid)',
		);
	$add_query = $database->as_table_exists_create( 'as_user', $As_Table_Details ); 
	
?>