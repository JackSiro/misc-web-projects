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
	//worker_name, worker_sex, worker_dept, worker_role
	$As_Table_Details = array(	
		'workerid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'worker_name varchar(100) DEFAULT NULL',
		'worker_sex int(10) NOT NULL DEFAULT 0',
		'worker_dept varchar(100) DEFAULT NULL',
		'worker_role varchar(100) DEFAULT NULL',
		'worker_rates varchar(200) DEFAULT NULL',
		'worker_comment varchar(2000) DEFAULT NULL',
		'worker_postedby int(10) unsigned DEFAULT 0',
		'worker_posted datetime DEFAULT NULL',
		'worker_updated datetime DEFAULT NULL',
		'worker_updatedby int(10) DEFAULT NULL',
		'PRIMARY KEY (workerid)',
		);
	$add_query = $database->as_table_exists_create( 'as_worker', $As_Table_Details ); 
	
	$As_Table_Details = array(	
		'rateid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'rate_worker int(10) NOT NULL DEFAULT 0',
		'rate_rating int(10) NOT NULL DEFAULT 0',
		'rate_comment varchar(2000) DEFAULT NULL',
		'rate_postedby int(10) unsigned DEFAULT 0',
		'rate_posted datetime DEFAULT NULL',
		'rate_updated datetime DEFAULT NULL',
		'rate_updatedby int(10) DEFAULT NULL',
		'PRIMARY KEY (rateid)',
		);
	$add_query = $database->as_table_exists_create( 'as_rating', $As_Table_Details ); 
	
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