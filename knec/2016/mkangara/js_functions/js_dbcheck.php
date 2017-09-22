<?php
	$database = new Js_Dbconn();			
	
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
	
	$Js_Table_Details = array(	
		'productid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'product_title varchar(100) DEFAULT NULL',
		'product_quantity int(10) NOT NULL DEFAULT 0',
		'product_price int(10) NOT NULL DEFAULT 0',
		'product_unit varchar(100) DEFAULT NULL',
		'product_img varchar(200) NOT NULL DEFAULT "product_default.jpg"',
		'product_postedby int(10) unsigned DEFAULT 0',
		'product_posted datetime DEFAULT NULL',
		'product_updated datetime DEFAULT NULL',
		'product_updatedby int(10) DEFAULT NULL',
		'PRIMARY KEY (productid)',
		);
	$add_query = $database->js_table_exists_create( 'js_product', $Js_Table_Details ); 
	
		
	$Js_Table_Details = array(	
		'requestid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'request_type varchar(100) DEFAULT NULL',
		'request_item varchar(100) DEFAULT NULL',
		'request_payment varchar(100) DEFAULT NULL',
		'request_quantity varchar(100) DEFAULT NULL',
		'request_img varchar(200) NOT NULL DEFAULT "request_default.jpg"',
		'request_postedby int(10) unsigned DEFAULT 0',
		'request_posted datetime DEFAULT NULL',
		'request_updated datetime DEFAULT NULL',
		'request_updatedby int(10) DEFAULT NULL',
		'PRIMARY KEY (requestid)',
		);
		
	$add_query = $database->js_table_exists_create( 'js_request', $Js_Table_Details ); 
		
	$Js_Table_Details = array(	
		'invoiceid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'invoice_type varchar(100) DEFAULT NULL',
		'invoice_amount varchar(100) DEFAULT NULL',
		'invoice_item varchar(100) DEFAULT NULL',
		'invoice_quantity varchar(100) DEFAULT NULL',
		'invoice_img varchar(200) NOT NULL DEFAULT "invoice_default.jpg"',
		'invoice_postedby int(10) unsigned DEFAULT 0',
		'invoice_posted datetime DEFAULT NULL',
		'invoice_updated datetime DEFAULT NULL',
		'invoice_updatedby int(10) DEFAULT NULL',
		'PRIMARY KEY (invoiceid)',
		);
	$add_query = $database->js_table_exists_create( 'js_invoice', $Js_Table_Details ); 
	
		
	$Js_Table_Details = array(	
		'paymentid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'payment_amount varchar(100) DEFAULT NULL',
		'payment_payer int(10) NOT NULL DEFAULT 0',
		'payment_payee int(10) NOT NULL DEFAULT 0',
		'payment_unit varchar(100) DEFAULT NULL',
		'payment_img varchar(200) NOT NULL DEFAULT "payment_default.jpg"',
		'payment_postedby int(10) unsigned DEFAULT 0',
		'payment_posted datetime DEFAULT NULL',
		'payment_updated datetime DEFAULT NULL',
		'payment_updatedby int(10) DEFAULT NULL',
		'PRIMARY KEY (paymentid)',
		);
	$add_query = $database->js_table_exists_create( 'js_payment', $Js_Table_Details ); 
	
		
	$Js_Table_Details = array(	
		'scheduleid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'schedule_user varchar(100) DEFAULT NULL',
		'schedule_time varchar(100) DEFAULT NULL',
		'schedule_transport varchar(100) DEFAULT NULL',
		'schedule_place varchar(100) DEFAULT NULL',
		'schedule_img varchar(200) NOT NULL DEFAULT "schedule_default.jpg"',
		'schedule_postedby int(10) unsigned DEFAULT 0',
		'schedule_posted datetime DEFAULT NULL',
		'schedule_updated datetime DEFAULT NULL',
		'schedule_updatedby int(10) DEFAULT NULL',
		'PRIMARY KEY (scheduleid)',
		);
	$add_query = $database->js_table_exists_create( 'js_schedule', $Js_Table_Details ); 
	
	
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