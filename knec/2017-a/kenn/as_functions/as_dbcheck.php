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
		'salesid int(11) NOT NULL AUTO_INCREMENT',
		'sales_itemid int(10) unsigned DEFAULT NULL',
		'sales_quantity int(10) unsigned DEFAULT NULL',
		'sales_prices int(10) unsigned DEFAULT NULL',
		'sales_servedby int(10) unsigned DEFAULT NULL',
		'sales_served datetime DEFAULT NULL',
		'PRIMARY KEY (salesid)',
	);
	$add_query = $database->as_table_exists_create( 'as_sales', $As_Table_Details ); 
	
	//stock_itemid, stock_unit, stock_quantity, stock_posted, stock_postedby, 
	$As_Table_Details = array(	
		'stockid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'stock_itemid int(10) NOT NULL DEFAULT 0',
		'stock_quantity int(10) NOT NULL DEFAULT 0',
		'stock_posted datetime DEFAULT NULL',
		'stock_postedby int(10) unsigned DEFAULT 0',
		'stock_updated datetime DEFAULT NULL',
		'stock_updatedby int(10) DEFAULT NULL',
		'PRIMARY KEY (stockid)',
	);
	$add_query = $database->as_table_exists_create( 'as_stock', $As_Table_Details ); 
		
	//itemid, item_slug, item_title, item_icon, item_content, item_unit, item_container, item_items, item_price, item_stock, item_createdby, item_created
	$As_Table_Details = array(	
		'itemid int(11) NOT NULL AUTO_INCREMENT',
		'item_slug varchar(100) NOT NULL',
		'item_title varchar(100) NOT NULL',
		'item_icon varchar(50) NOT NULL DEFAULT "item_default.jpg"',
		'item_content varchar(2000) NOT NULL',
		'item_unit varchar(100) NOT NULL',
		'item_container varchar(100) NOT NULL',
		'item_items int(10) unsigned DEFAULT 0',
		'item_price int(10) unsigned DEFAULT 0',
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