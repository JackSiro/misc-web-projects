<?php
	
	$database = new Js_Dbconn();
	
	$Js_Table_Details = array(	
		'townid int(11) NOT NULL AUTO_INCREMENT',
		'town_title varchar(100) NOT NULL',
		'town_createdby int(10) unsigned DEFAULT NULL',
		'town_created datetime DEFAULT NULL',
		'town_updatedby int(10) unsigned DEFAULT NULL',
		'town_updated datetime DEFAULT NULL',
		'PRIMARY KEY (townid)',
		);
	$add_query = $database->js_table_exists_create( 'js_town', $Js_Table_Details ); 
	
	$Js_Table_Details = array(	
		'vehicleid int(11) NOT NULL AUTO_INCREMENT',
		'vehicle_vehicleno varchar(100) NOT NULL',
		'vehicle_regno varchar(100) NOT NULL',
		'vehicle_seats varchar(100) NOT NULL',
		'vehicle_driver varchar(100) NOT NULL',
		'vehicle_postedby int(10) unsigned DEFAULT NULL',
		'vehicle_posted datetime DEFAULT NULL',
		'vehicle_updatedby int(10) unsigned DEFAULT NULL',
		'vehicle_updated datetime DEFAULT NULL',
		'PRIMARY KEY (vehicleid)',
		);
	$add_query = $database->js_table_exists_create( 'js_vehicle', $Js_Table_Details ); 
	
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
		//ticket_vehicle, ticket_date, ticket_pagefrom, ticket_pageto, ticket_depature, ticket_pass, ticket_seat, ticket_customer, ticket_mobile, ticket_amount, ticket_payment
	$Js_Table_Details = array(
		'ticketid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'ticket_vehicle varchar(100) NOT NULL DEFAULT 0',
		'ticket_date varchar(100) NOT NULL DEFAULT 0',
		'ticket_type varchar(100) NOT NULL DEFAULT 0',
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
	
?>