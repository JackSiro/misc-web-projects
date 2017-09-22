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
		'sessionid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'sess_doctor int(10) unsigned DEFAULT 0',
		'sess_patient int(10) unsigned DEFAULT 0',
		'sess_timein varchar(50) DEFAULT NULL',
		'sess_timeout varchar(50) DEFAULT NULL',
		'sess_createdby int(10) unsigned DEFAULT 0',
		'sess_created datetime DEFAULT NULL',
		'sess_publisher varchar(1000) DEFAULT NULL',
		'sess_updated datetime DEFAULT NULL',
		'sess_updatedby int(10) DEFAULT NULL',
		'PRIMARY KEY (sessionid)',
		);
	$add_query = $database->as_table_exists_create( 'as_session', $As_Table_Details ); 
		//messageid, message_parentid, message_content, message_sentby, message_sender, message_sentto, message_receiver, message_sent, 
	$As_Table_Details = array(	
		'messageid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'message_parentid int(10) DEFAULT 0',
		'message_content varchar(10000) DEFAULT NULL',
		'message_sentby int(10) unsigned DEFAULT 0',
		'message_sender varchar(100) DEFAULT NULL',
		'message_sentto int(10) unsigned DEFAULT 0',
		'message_receiver varchar(100) DEFAULT NULL',
		'message_sent datetime DEFAULT NULL',
		'message_updated datetime DEFAULT NULL',
		'message_updatedby int(10) DEFAULT NULL',
		'PRIMARY KEY (messageid)',
		);
	$add_query = $database->as_table_exists_create( 'as_message', $As_Table_Details ); 
		 
	$As_Table_Details = array(	
		'patientid int(11) NOT NULL AUTO_INCREMENT',
		'patient_code varchar(50) NOT NULL',
		'patient_name varchar(50) NOT NULL',
		'patient_sex varchar(10) NOT NULL',
		'patient_password varchar(50) NOT NULL',
		'patient_email varchar(100) NOT NULL',
		'patient_address varchar(200) NOT NULL',
		'patient_mobile varchar(50) NOT NULL',
		'patient_joined datetime DEFAULT NULL',
		'PRIMARY KEY (patientid)',
		);
	$add_query = $database->as_table_exists_create( 'as_patient', $As_Table_Details ); 
	
	$As_Table_Details = array(	
		'doctorid int(11) NOT NULL AUTO_INCREMENT',
		'doctor_code varchar(50) NOT NULL',
		'doctor_name varchar(50) NOT NULL',
		'doctor_sex varchar(10) NOT NULL',
		'doctor_password text NOT NULL',
		'doctor_email varchar(200) NOT NULL',
		'doctor_group varchar(50) NOT NULL DEFAULT "user"',
		'doctor_joined datetime DEFAULT NULL',
		'doctor_mobile varchar(50) NOT NULL',
		'doctor_web varchar(100) NOT NULL',
		'doctor_avatar varchar(50) NOT NULL DEFAULT "doctor_default.jpg"',
		'PRIMARY KEY (doctorid)',
		);
	$add_query = $database->as_table_exists_create( 'as_doctor', $As_Table_Details ); 
	
	
?>