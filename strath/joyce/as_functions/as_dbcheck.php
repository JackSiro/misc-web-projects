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
		'elecpostid int(11) NOT NULL AUTO_INCREMENT',
		'elecpost_title varchar(100) NOT NULL',
		'elecpost_code varchar(100) NOT NULL',
		'elecpost_createdby int(10) unsigned DEFAULT NULL',
		'elecpost_created datetime DEFAULT NULL',
		'elecpost_updatedby int(10) unsigned DEFAULT NULL',
		'elecpost_updated datetime DEFAULT NULL',
		'PRIMARY KEY (elecpostid)',
		);
	$add_query = $database->as_table_exists_create( 'as_elecpost', $As_Table_Details ); 
	
	//candidate_post,candidate_name,candidate_gender,candidate_votes,candidate_postedby,candidate_posted
	$As_Table_Details = array(	
		'candidateid int(11) NOT NULL AUTO_INCREMENT',
		'candidate_post int(10) unsigned DEFAULT NULL',
		'candidate_name varchar(100) NOT NULL',
		'candidate_gender int(10) unsigned DEFAULT NULL',
		'candidate_votes int(10) unsigned DEFAULT NULL',
		'candidate_postedby int(10) unsigned DEFAULT NULL',
		'candidate_posted datetime DEFAULT NULL',
		'candidate_updatedby int(10) unsigned DEFAULT NULL',
		'candidate_updated datetime DEFAULT NULL',
		'PRIMARY KEY (candidateid)',
		);
	$add_query = $database->as_table_exists_create( 'as_candidate', $As_Table_Details ); 
	
	//classid, class_term, class_year, class_title
	$As_Table_Details = array(	
		'classid int(11) NOT NULL AUTO_INCREMENT',
		'class_term int(10) unsigned DEFAULT NULL',
		'class_year varchar(100) NOT NULL',
		'class_title varchar(100) NOT NULL',
		'class_code varchar(100) NOT NULL',
		'class_createdby int(10) unsigned DEFAULT NULL',
		'class_created datetime DEFAULT NULL',
		'class_updatedby int(10) unsigned DEFAULT NULL',
		'class_updated datetime DEFAULT NULL',
		'PRIMARY KEY (classid)',
		);
	$add_query = $database->as_table_exists_create( 'as_class', $As_Table_Details ); 
	
	//voter_admission, voter_class, voter_name, voter_gender, voter_voted
	$As_Table_Details = array(	
		'voterid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'voter_admission varchar(100) DEFAULT NULL',
		'voter_class int(10) NOT NULL DEFAULT 0',
		'voter_name varchar(100) DEFAULT NULL',
		'voter_gender varchar(1000) DEFAULT NULL',
		'voter_voted int(10) unsigned DEFAULT 0',
		'voter_registeredby int(10) unsigned DEFAULT 0',
		'voter_registered datetime DEFAULT NULL',
		'voter_updated datetime DEFAULT NULL',
		'voter_updatedby int(10) DEFAULT NULL',
		'PRIMARY KEY (voterid)',
		);
	$add_query = $database->as_table_exists_create( 'as_voter', $As_Table_Details ); 
	
	$As_Table_Details = array(	
		'voteid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'vote_voter int(10) NOT NULL DEFAULT 0',
		'vote_post int(10) NOT NULL DEFAULT 0',
		'vote_candidate int(10) NOT NULL DEFAULT 0',
		'vote_voted datetime DEFAULT NULL',
		'PRIMARY KEY (voteid)',
		);
	$add_query = $database->as_table_exists_create( 'as_vote', $As_Table_Details ); 
	
	//official_name, official_fname, official_surname, official_sex, official_password, official_email, official_group, official_joined
	$As_Table_Details = array(	
		'officialid int(11) NOT NULL AUTO_INCREMENT',
		'official_name varchar(50) NOT NULL',
		'official_fname varchar(50) NOT NULL',
		'official_surname varchar(50) NOT NULL',
		'official_sex varchar(10) NOT NULL',
		'official_password text NOT NULL',
		'official_email varchar(200) NOT NULL',
		'official_group varchar(50) NOT NULL DEFAULT "voter"',
		'official_joined datetime DEFAULT NULL',
		'official_mobile varchar(50) NOT NULL',
		'PRIMARY KEY (officialid)',
		);
	$add_query = $database->as_table_exists_create( 'as_official', $As_Table_Details ); 
	
?>