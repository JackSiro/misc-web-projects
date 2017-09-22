<?php
	
	$database = new As_Dbconn();
	//placeid, place_title, place_price, place_details, place_createdby, place_created, place_updatedby, place_updated
	$As_Table_Details = array(	
		'placeid int(11) NOT NULL AUTO_INCREMENT',
		'place_title varchar(100) NOT NULL',
		'place_price varchar(100) NOT NULL',
		'place_details varchar(1000) NOT NULL',
		'place_createdby int(10) unsigned DEFAULT NULL',
		'place_created datetime DEFAULT NULL',
		'place_updatedby int(10) unsigned DEFAULT NULL',
		'place_updated datetime DEFAULT NULL',
		'PRIMARY KEY (placeid)',
		);
	$add_query = $database->as_table_exists_create( 'as_place', $As_Table_Details ); 
	//hotelid, hotel_title, hotel_price, hotel_details, hotel_createdby, hotel_created, hotel_updatedby, hotel_updated
	$As_Table_Details = array(	
		'hotelid int(11) NOT NULL AUTO_INCREMENT',
		'hotel_title varchar(100) NOT NULL',
		'hotel_price varchar(100) NOT NULL',
		'hotel_details varchar(1000) NOT NULL',
		'hotel_createdby int(10) unsigned DEFAULT NULL',
		'hotel_created datetime DEFAULT NULL',
		'hotel_updatedby int(10) unsigned DEFAULT NULL',
		'hotel_updated datetime DEFAULT NULL',
		'PRIMARY KEY (hotelid)',
		);
	$add_query = $database->as_table_exists_create( 'as_hotel', $As_Table_Details ); 
	
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
	//ticketid, ticket_type, ticket_date, ticket_startdate, ticket_stopdate, ticket_information, ticket_tourist, ticket_mobile, ticket_amount, ticket_payment, 
	$As_Table_Details = array(
		'ticketid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'ticket_type varchar(100) NOT NULL DEFAULT 0',
		'ticket_date varchar(100) NOT NULL DEFAULT 0',
		'ticket_startdate varchar(100) DEFAULT NULL',
		'ticket_stopdate varchar(100) DEFAULT NULL',
		'ticket_information varchar(100) DEFAULT NULL',
		'ticket_tourist varchar(100) DEFAULT NULL',
		'ticket_mobile varchar(100) DEFAULT NULL',
		'ticket_amount varchar(100) DEFAULT NULL',
		'ticket_payment varchar(100) DEFAULT NULL',
		'ticket_postedby int(10) unsigned DEFAULT 0',
		'ticket_posted datetime DEFAULT NULL',
		'ticket_updated datetime DEFAULT NULL',
		'ticket_updatedby int(10) DEFAULT NULL',
		'PRIMARY KEY (ticketid)',
		);
	$add_query = $database->as_table_exists_create( 'as_ticket', $As_Table_Details ); 
	
	$As_Table_Details = array(	
		'employeeid int(11) NOT NULL AUTO_INCREMENT',
		'employee_name varchar(50) NOT NULL',
		'employee_fname varchar(50) NOT NULL',
		'employee_surname varchar(50) NOT NULL',
		'employee_sex varchar(10) NOT NULL',
		'employee_password text NOT NULL',
		'employee_email varchar(200) NOT NULL',
		'employee_group varchar(50) NOT NULL DEFAULT "tourist"',
		'employee_joined datetime DEFAULT NULL',
		'employee_mobile varchar(50) NOT NULL',
		'employee_web varchar(100) NOT NULL',
		'employee_avatar varchar(50) NOT NULL DEFAULT "employee_default.jpg"',
		'PRIMARY KEY (employeeid)',
		);
	$add_query = $database->as_table_exists_create( 'as_employee', $As_Table_Details ); 
	
?>