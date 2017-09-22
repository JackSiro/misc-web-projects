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
	//patientid, patient_name, patient_sex, patient_location, patient_sickness, patient_type, patient_comment, patient_postedby, patient_posted, patient_updated, patient_updatedby
	$As_Table_Details = array(	
		'patientid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'patient_name varchar(100) DEFAULT NULL',
		'patient_sex int(10) NOT NULL DEFAULT 0',
		'patient_location varchar(100) DEFAULT NULL',
		'patient_sickness varchar(100) DEFAULT NULL',
		'patient_type varchar(200) DEFAULT NULL',
		'patient_comment varchar(2000) DEFAULT NULL',
		'patient_postedby int(10) unsigned DEFAULT 0',
		'patient_posted datetime DEFAULT NULL',
		'patient_updated datetime DEFAULT NULL',
		'patient_updatedby int(10) DEFAULT NULL',
		'PRIMARY KEY (patientid)',
		);
	$add_query = $database->as_table_exists_create( 'as_patient', $As_Table_Details ); 
	//billid, bill_patient, bill_title, bill_billing, bill_expected, 
	$As_Table_Details = array(	
		'billid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'bill_patient int(10) NOT NULL DEFAULT 0',
		'bill_title varchar(100) DEFAULT NULL',
		'bill_billing int(10) NOT NULL DEFAULT 0',
		'bill_expected int(10) NOT NULL DEFAULT 0',
		'bill_postedby int(10) unsigned DEFAULT 0',
		'bill_posted datetime DEFAULT NULL',
		'bill_updated datetime DEFAULT NULL',
		'bill_updatedby int(10) DEFAULT NULL',
		'PRIMARY KEY (billid)',
		);
	$add_query = $database->as_table_exists_create( 'as_billing', $As_Table_Details ); 
	
	$As_Table_Details = array(	
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
	$add_query = $database->as_table_exists_create( 'as_user', $As_Table_Details ); 
	
?>