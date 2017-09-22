<?php
	
	$database = new As_Dbconn();
	
	$as_Table_Details = array(	
		'optid int(11) NOT NULL AUTO_INCREMENT',
		'title varchar(100) NOT NULL',
		'content varchar(2000) NOT NULL',
		'createdby int(10) unsigned DEFAULT NULL',
		'created datetime DEFAULT NULL',
		'updatedby int(10) unsigned DEFAULT NULL',
		'updated datetime DEFAULT NULL',
		'PRIMARY KEY (optid)',
		);
	$add_query = $database->as_table_exists_create( 'as_options', $as_Table_Details ); 
	//scheduleid, schedule_worker, schedule_type, schedule_day, schedule_starttime, schedule_stoptime, schedule_place, schedule_createdby, schedule_created, 
	$as_Table_Details = array(	
		'scheduleid int(11) NOT NULL AUTO_INCREMENT',
		'schedule_worker int(10) unsigned DEFAULT NULL',
		'schedule_type varchar(100) NOT NULL',
		'schedule_day varchar(100) NOT NULL',
		'schedule_starttime varchar(100) NOT NULL',
		'schedule_stoptime varchar(100) NOT NULL',
		'schedule_place varchar(100) NOT NULL',
		'schedule_createdby int(10) unsigned DEFAULT NULL',
		'schedule_created datetime DEFAULT NULL',
		'schedule_updatedby int(10) unsigned DEFAULT NULL',
		'schedule_updated datetime DEFAULT NULL',
		'PRIMARY KEY (scheduleid)',
		);
	$add_query = $database->as_table_exists_create( 'as_schedule', $as_Table_Details ); 
		
	//worker_name, worker_fullname, worker_sex, worker_email, worker_joined, worker_mobile, worker_address, worker_web, worker_avatar
	
	$as_Table_Details = array(	
		'workerid int(11) NOT NULL AUTO_INCREMENT',
		'worker_name varchar(50) NOT NULL',
		'worker_fullname varchar(50) NOT NULL',
		'worker_sex varchar(10) NOT NULL',
		'worker_email varchar(200) NOT NULL',
		'worker_joined datetime DEFAULT NULL',
		'worker_mobile varchar(50) NOT NULL',
		'worker_address varchar(50) NOT NULL',
		'worker_web varchar(100) NOT NULL',
		'worker_avatar varchar(50) NOT NULL DEFAULT "worker_default.jpg"',
		'PRIMARY KEY (workerid)',
		);
	$add_query = $database->as_table_exists_create( 'as_worker', $as_Table_Details ); 
	
	$as_Table_Details = array(	
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
	$add_query = $database->as_table_exists_create( 'as_user', $as_Table_Details ); 
	
?>