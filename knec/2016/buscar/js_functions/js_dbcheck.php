<?php
	
	$database = new Js_Dbconn();
	
	$Js_Table_Details = array(	
		'placeid int(11) NOT NULL AUTO_INCREMENT',
		'place_title varchar(100) NOT NULL',
		'place_createdby int(10) unsigned DEFAULT NULL',
		'place_created datetime DEFAULT NULL',
		'place_updatedby int(10) unsigned DEFAULT NULL',
		'place_updated datetime DEFAULT NULL',
		'PRIMARY KEY (placeid)',
		);
	$add_query = $database->js_table_exists_create( 'js_place', $Js_Table_Details ); 
	
	$Js_Table_Details = array(	
		'busid int(11) NOT NULL AUTO_INCREMENT',
		'bus_busno varchar(100) NOT NULL',
		'bus_regno varchar(100) NOT NULL',
		'bus_seats varchar(100) NOT NULL',
		'bus_driver varchar(100) NOT NULL',
		'bus_postedby int(10) unsigned DEFAULT NULL',
		'bus_posted datetime DEFAULT NULL',
		'bus_updatedby int(10) unsigned DEFAULT NULL',
		'bus_updated datetime DEFAULT NULL',
		'PRIMARY KEY (busid)',
		);
	$add_query = $database->js_table_exists_create( 'js_bus', $Js_Table_Details ); 
	
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
		'ticketid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'ticket_bus int(10) NOT NULL DEFAULT 0',
		'ticket_pagefrom varchar(100) DEFAULT NULL',
		'ticket_pageto varchar(100) DEFAULT NULL',
		'ticket_depature varchar(100) DEFAULT NULL',
		'ticket_pass varchar(100) DEFAULT NULL',
		'ticket_seat varchar(100) DEFAULT NULL',
		'ticket_customer varchar(100) DEFAULT NULL',
		'ticket_mobile varchar(100) DEFAULT NULL',
		'ticket_amount varchar(100) DEFAULT NULL',
		'ticket_payment varchar(100) DEFAULT NULL',
		'ticket_postedby int(10) unsigned DEFAULT 0',
		'ticket_posted datetime DEFAULT NULL',
		'ticket_updated datetime DEFAULT NULL',
		'ticket_updatedby int(10) DEFAULT NULL',
		'PRIMARY KEY (ticketid)',
		);
	$add_query = $database->js_table_exists_create( 'js_ticket', $Js_Table_Details ); 
	
	$Js_Table_Details = array(	
		'employeeid int(11) NOT NULL AUTO_INCREMENT',
		'employee_name varchar(50) NOT NULL',
		'employee_fname varchar(50) NOT NULL',
		'employee_surname varchar(50) NOT NULL',
		'employee_sex varchar(10) NOT NULL',
		'employee_password text NOT NULL',
		'employee_email varchar(200) NOT NULL',
		'employee_group varchar(50) NOT NULL DEFAULT "buyer"',
		'employee_joined datetime DEFAULT NULL',
		'employee_mobile varchar(50) NOT NULL',
		'employee_web varchar(100) NOT NULL',
		'employee_avatar varchar(50) NOT NULL DEFAULT "employee_default.jpg"',
		'PRIMARY KEY (employeeid)',
		);
	$add_query = $database->js_table_exists_create( 'js_employee', $Js_Table_Details ); 
	
	$Js_Table_Details = array(	
		'customerid int(11) NOT NULL AUTO_INCREMENT',
		'customer_fullname varchar(50) NOT NULL',
		'customer_mobile varchar(50) NOT NULL',
		'customer_address varchar(50) NOT NULL',
		'customer_joined datetime DEFAULT NULL',
		'PRIMARY KEY (customerid)',
		);
	$add_query = $database->js_table_exists_create( 'js_customer', $Js_Table_Details ); 
	
?>