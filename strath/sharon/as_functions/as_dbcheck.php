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
	
	$As_Table_Details = array(	
		'salesid int(11) NOT NULL AUTO_INCREMENT',
		'sales_itemid int(10) unsigned DEFAULT NULL',
		'sales_buyerid int(10) unsigned DEFAULT NULL',
		'sales_paymode varchar(50) NOT NULL',
		'sales_servedby int(10) unsigned DEFAULT NULL',
		'sales_served datetime DEFAULT NULL',
		'PRIMARY KEY (salesid)',
	);
	$add_query = $database->as_table_exists_create( 'as_sales', $As_Table_Details ); 
		
	//itemid, item_name, item_image, item_content, item_price, item_deposit, item_instal, item_months, item_stock, item_createdby, item_created
	$As_Table_Details = array(	
		'itemid int(11) NOT NULL AUTO_INCREMENT',
		'item_name varchar(100) NOT NULL',
		'item_image varchar(50) NOT NULL',
		'item_content varchar(2000) NOT NULL DEFAULT "item_default.jpg"',
		'item_price int(10) unsigned DEFAULT 0',
		'item_deposit int(10) unsigned DEFAULT 0',
		'item_instal int(10) unsigned DEFAULT 0',
		'item_months int(10) unsigned DEFAULT 0',
		'item_stock int(10) NOT NULL DEFAULT 0',
		'item_createdby int(10) unsigned DEFAULT NULL',
		'item_created datetime DEFAULT NULL',
		'item_updatedby int(10) unsigned DEFAULT NULL',
		'item_updated datetime DEFAULT NULL',
		'PRIMARY KEY (itemid)',
	);
	$add_query = $database->as_table_exists_create( 'as_item', $As_Table_Details ); 
	
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