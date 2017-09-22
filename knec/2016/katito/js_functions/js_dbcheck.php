<?php
	
	$database = new Js_Dbconn();
	
	$Js_Table_Details = array(	
		'typeid int(11) NOT NULL AUTO_INCREMENT',
		'type_slug varchar(100) NOT NULL',
		'type_title varchar(100) NOT NULL',
		'type_icon varchar(100) NOT NULL',
		'type_content varchar(2000) NOT NULL',
		'type_locked int(10) unsigned DEFAULT 0',
		'type_createdby int(10) unsigned DEFAULT NULL',
		'type_created datetime DEFAULT NULL',
		'type_parentid int(10) unsigned DEFAULT NULL',
		'type_updatedby int(10) unsigned DEFAULT NULL',
		'type_updated datetime DEFAULT NULL',
		'type_position varchar(100) NOT NULL',
		'PRIMARY KEY (typeid)',
		);
	$add_query = $database->js_table_exists_create( 'js_type', $Js_Table_Details ); 
	
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
		'orderid int(11) NOT NULL AUTO_INCREMENT',
		'order_itemid int(10) unsigned DEFAULT NULL',
		'order_qty varchar(100) NOT NULL',
		'order_price varchar(100) NOT NULL',
		'order_title varchar(100) NOT NULL',
		'order_fullname varchar(100) NOT NULL',
		'order_mobile varchar(100) NOT NULL',
		'order_email varchar(100) NOT NULL',
		'order_address varchar(100) NOT NULL',
		'order_content varchar(2000) NOT NULL',
		'order_createdby int(10) unsigned DEFAULT NULL',
		'order_created datetime DEFAULT NULL',
		'order_updatedby int(10) unsigned DEFAULT NULL',
		'order_updated datetime DEFAULT NULL',
		'PRIMARY KEY (orderid)',
		);
	$add_query = $database->js_table_exists_create( 'js_order', $Js_Table_Details ); 
		
	$Js_Table_Details = array(	
		'itemid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'item_type int(10) NOT NULL DEFAULT 0',
		'item_quantity int(10) NOT NULL DEFAULT 0',
		'item_postedby int(10) unsigned DEFAULT 0',
		'item_posted datetime DEFAULT NULL',
		'item_supplier int(10) NOT NULL DEFAULT 0',
		'item_price int(10) NOT NULL DEFAULT 0',
		'item_img varchar(200) NOT NULL DEFAULT "item_default.jpg"',
		'item_updated datetime DEFAULT NULL',
		'item_updatedby int(10) DEFAULT NULL',
		'PRIMARY KEY (itemid)',
		);
	$add_query = $database->js_table_exists_create( 'js_item', $Js_Table_Details ); 
	//supp_name, supp_fullname, supp_sex, supp_email, supp_joined, supp_mobile, supp_address, supp_web, supp_avatar
	
	$Js_Table_Details = array(	
		'suppid int(11) NOT NULL AUTO_INCREMENT',
		'supp_name varchar(50) NOT NULL',
		'supp_fullname varchar(50) NOT NULL',
		'supp_sex varchar(10) NOT NULL',
		'supp_email varchar(200) NOT NULL',
		'supp_joined datetime DEFAULT NULL',
		'supp_mobile varchar(50) NOT NULL',
		'supp_address varchar(50) NOT NULL',
		'supp_web varchar(100) NOT NULL',
		'supp_avatar varchar(50) NOT NULL DEFAULT "supp_default.jpg"',
		'PRIMARY KEY (suppid)',
		);
	$add_query = $database->js_table_exists_create( 'js_supplier', $Js_Table_Details ); 
	
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