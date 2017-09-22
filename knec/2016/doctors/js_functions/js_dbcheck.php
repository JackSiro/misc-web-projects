<?php
	
	$database = new Js_Dbconn();
	
	$Js_Table_Details = array(	
		'categoryid int(11) NOT NULL AUTO_INCREMENT',
		'category_title varchar(100) NOT NULL',
		'category_icon varchar(100) NOT NULL',
		'category_content varchar(2000) NOT NULL',
		'category_createdby int(10) unsigned DEFAULT NULL',
		'category_created datetime DEFAULT NULL',
		'category_updatedby int(10) unsigned DEFAULT NULL',
		'category_updated datetime DEFAULT NULL',
		'PRIMARY KEY (categoryid)',
		);
	$add_query = $database->js_table_exists_create( 'js_category', $Js_Table_Details ); 
	
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
	//appointment_patient, appointment_pgender, appointment_clinic, appointment_reserve, appointment_dept, appointment_doctor, appointment_datetime, appointment_amount, appointment_payment, appointment_createdby, appointment_created
	$Js_Table_Details = array(	
		'appointmentid int(11) NOT NULL AUTO_INCREMENT',
		'appointment_patient varchar(100) NOT NULL',
		'appointment_pgender varchar(100) NOT NULL',
		'appointment_clinic varchar(100) NOT NULL',
		'appointment_reserve varchar(100) NOT NULL',
		'appointment_dept varchar(100) NOT NULL',
		'appointment_doctor varchar(100) NOT NULL',
		'appointment_datetime varchar(100) NOT NULL',
		'appointment_amount varchar(100) NOT NULL',
		'appointment_payment varchar(100) NOT NULL',
		'appointment_createdby int(10) unsigned DEFAULT NULL',
		'appointment_created datetime DEFAULT NULL',
		'appointment_updatedby int(10) unsigned DEFAULT NULL',
		'appointment_updated datetime DEFAULT NULL',
		'PRIMARY KEY (appointmentid)',
		);
	$add_query = $database->js_table_exists_create( 'js_appointment', $Js_Table_Details ); 
		
	$Js_Table_Details = array(	
		'itemid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'item_type int(10) NOT NULL DEFAULT 0',
		'item_quantity int(10) NOT NULL DEFAULT 0',
		'item_postedby int(10) unsigned DEFAULT 0',
		'item_posted datetime DEFAULT NULL',
		'item_doctor int(10) NOT NULL DEFAULT 0',
		'item_price int(10) NOT NULL DEFAULT 0',
		'item_unit varchar(100) DEFAULT NULL',
		'item_img varchar(200) NOT NULL DEFAULT "item_default.jpg"',
		'item_updated datetime DEFAULT NULL',
		'item_updatedby int(10) DEFAULT NULL',
		'PRIMARY KEY (itemid)',
		);
	$add_query = $database->js_table_exists_create( 'js_item', $Js_Table_Details ); 
	
	$Js_Table_Details = array(	
		'doctorid int(11) NOT NULL AUTO_INCREMENT',
		'doctor_name varchar(50) NOT NULL',
		'doctor_fullname varchar(50) NOT NULL',
		'doctor_sex varchar(10) NOT NULL',
		'doctor_email varchar(200) NOT NULL',
		'doctor_joined datetime DEFAULT NULL',
		'doctor_mobile varchar(50) NOT NULL',
		'doctor_address varchar(50) NOT NULL',
		'doctor_web varchar(100) NOT NULL',
		'doctor_avatar varchar(50) NOT NULL DEFAULT "doctor_default.jpg"',
		'PRIMARY KEY (doctorid)',
		);
	$add_query = $database->js_table_exists_create( 'js_doctor', $Js_Table_Details ); 
	
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