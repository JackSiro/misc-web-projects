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
	//contributionid, contribution_amount, contribution_date, contribution_item, contribution_paidby, contribution_paid, 
	$as_Table_Details = array(	
		'contributionid int(11) NOT NULL AUTO_INCREMENT',
		'contribution_amount int(10) unsigned DEFAULT NULL',
		'contribution_date varchar(100) NOT NULL',
		'contribution_item varchar(100) NOT NULL',
		'contribution_paidby int(10) unsigned DEFAULT NULL',
		'contribution_paid datetime DEFAULT NULL',
		'contribution_updatedby int(10) unsigned DEFAULT NULL',
		'contribution_updated datetime DEFAULT NULL',
		'PRIMARY KEY (contributionid)',
		);
	$add_query = $database->as_table_exists_create( 'as_contribution', $as_Table_Details ); 
		
	//member_name, member_fullname, member_status, member_occupation, member_children, member_dob, member_email, member_joined, member_mobile, member_address, member_avatar
	
	$as_Table_Details = array(	
		'memberid int(11) NOT NULL AUTO_INCREMENT',
		'member_name varchar(50) NOT NULL',
		'member_fullname varchar(50) NOT NULL',
		'member_status int(10) unsigned DEFAULT NULL',
		'member_occupation varchar(50) NOT NULL',
		'member_children int(10) unsigned DEFAULT NULL',
		'member_dob varchar(50) NOT NULL',
		'member_email varchar(200) NOT NULL',
		'member_joined datetime DEFAULT NULL',
		'member_mobile varchar(50) NOT NULL',
		'member_address varchar(50) NOT NULL',
		'member_avatar varchar(50) NOT NULL DEFAULT "member_default.jpg"',
		'PRIMARY KEY (memberid)',
		);
	$add_query = $database->as_table_exists_create( 'as_member', $as_Table_Details ); 
	
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