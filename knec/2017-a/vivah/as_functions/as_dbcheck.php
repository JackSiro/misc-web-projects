<?php
	
	$database = new As_Dbconn();
	
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
	
	$As_Table_Details = array(	
		'groupid int(11) NOT NULL AUTO_INCREMENT',
		'group_beneficiaryid int(10) unsigned DEFAULT NULL',
		'group_title varchar(100) NOT NULL',
		'group_code varchar(100) NOT NULL',
		'group_gradyear varchar(100) NOT NULL',
		'group_year varchar(100) NOT NULL',
		'group_postedby int(10) unsigned DEFAULT NULL',
		'group_posted datetime DEFAULT NULL',
		'PRIMARY KEY (groupid)',
	);
	$add_query = $database->as_table_exists_create( 'as_group', $As_Table_Details ); 
	
	//resource_beneficiary, resource_title, resource_content
	$As_Table_Details = array(	
		'resourceid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'resource_beneficiary int(10) NOT NULL DEFAULT 0',
		'resource_title varchar(100) NOT NULL',
		'resource_content varchar(1000) NOT NULL',
		'resource_posted datetime DEFAULT NULL',
		'resource_postedby int(10) unsigned DEFAULT 0',
		'resource_updated datetime DEFAULT NULL',
		'resource_updatedby int(10) DEFAULT NULL',
		'PRIMARY KEY (resourceid)',
	);
	$add_query = $database->as_table_exists_create( 'as_resource', $As_Table_Details ); 
	
	//beneficiaryid, beneficiary_code, beneficiary_name, beneficiary_institution, beneficiary_email, beneficiary_password, beneficiary_dateofbirth, beneficiary_address, beneficiary_guardian, beneficiary_region
	$As_Table_Details = array(	
		'beneficiaryid int(11) NOT NULL AUTO_INCREMENT',
		'beneficiary_code varchar(100) NOT NULL',
		'beneficiary_name varchar(100) NOT NULL',
		'beneficiary_institution varchar(100) NOT NULL',
		'beneficiary_email varchar(50) NOT NULL',
		'beneficiary_password varchar(100) NOT NULL',
		'beneficiary_dateofbirth varchar(20) NOT NULL',
		'beneficiary_address varchar(100) NOT NULL',
		'beneficiary_guardian varchar(100) NOT NULL',
		'beneficiary_region varchar(100) NOT NULL',
		'beneficiary_registeredby int(10) unsigned DEFAULT NULL',
		'beneficiary_registered datetime DEFAULT NULL',
		'beneficiary_updatedby int(10) unsigned DEFAULT NULL',
		'beneficiary_updated datetime DEFAULT NULL',
		'PRIMARY KEY (beneficiaryid)',
	);
	$add_query = $database->as_table_exists_create( 'as_beneficiary', $As_Table_Details ); 
	
	$As_Table_Details = array(	
		'facilitatorid int(11) NOT NULL AUTO_INCREMENT',
		'facilitator_name varchar(50) NOT NULL',
		'facilitator_fname varchar(50) NOT NULL',
		'facilitator_surname varchar(50) NOT NULL',
		'facilitator_sex varchar(10) NOT NULL',
		'facilitator_password text NOT NULL',
		'facilitator_email varchar(200) NOT NULL',
		'facilitator_group varchar(50) NOT NULL DEFAULT "normal"',
		'facilitator_joined datetime DEFAULT NULL',
		'facilitator_mobile varchar(50) NOT NULL',
		'facilitator_occupation varchar(100) NOT NULL',
		'facilitator_organization varchar(50) NOT NULL',
		'PRIMARY KEY (facilitatorid)',
	);
	$add_query = $database->as_table_exists_create( 'as_facilitator', $As_Table_Details ); 
	
?>