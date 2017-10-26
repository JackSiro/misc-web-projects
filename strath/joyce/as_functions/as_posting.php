<?php
	// POSTING FUNCTIONS
	// Begin Posting Functions 
	
	function as_slug_this($content) {
		return preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "-", strtolower($content)));
	}
	
	function as_slug_is(){
		if(empty($_POST['slug'])) {
		    $as_slug = trim($_POST['slug']);
		} else $as_slug = as_slug_this($_POST['title']);
		
	}
		
	function as_add_new_class(){
		$database = new As_Dbconn();			
		$New_Item_Details = array(			
			'class_title' => trim($_POST['title']),
			'class_code' => trim($_POST['code']),
			'class_term' => trim($_POST['term']),
			'class_year' => trim($_POST['year']),
			'class_created' => date('Y-m-d H:i:s'),
			'class_createdby' => "1",
		);
			
		$add_query = $database->as_insert( 'as_class', $New_Item_Details ); 
	}
			
	function as_edit_class($classid) {
		$database = new As_Dbconn();	
		$Update_Item_Details = array(
			'class_title' => trim($_POST['title']),
			'class_code' => trim($_POST['code']),
			'class_term' => trim($_POST['term']),
			'class_content' => trim($_POST['content']),
			'class_updated' => date('Y-m-d H:i:s'),
			'class_updatedby' => "1",
		);
		$where_clause = array('classid' => $classid);
		$updated = $database->as_update( 'as_class', $Update_Item_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
		
	function as_add_new_elecpost(){
		$database = new As_Dbconn();			
		$New_Item_Details = array(			
			'elecpost_title' => trim($_POST['title']),
			'elecpost_code' => trim($_POST['code']),
			'elecpost_created' => date('Y-m-d H:i:s'),
			'elecpost_createdby' => "1",
		);
			
		$add_query = $database->as_insert( 'as_elecpost', $New_Item_Details ); 
	}
			
	function as_edit_elecpost($elecpostid) {
		$database = new As_Dbconn();	
		$Update_Item_Details = array(
			'elecpost_title' => trim($_POST['title']),
			'elecpost_code' => trim($_POST['code']),
			'elecpost_updated' => date('Y-m-d H:i:s'),
			'elecpost_updatedby' => "1",
		);
		$where_clause = array('elecpostid' => $elecpostid);
		$updated = $database->as_update( 'as_elecpost', $Update_Item_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
 	
	function as_add_new_candidate(){
		$database = new As_Dbconn();			
		$New_Item_Details = array(
			'candidate_name' => trim($_POST['name']),
			'candidate_gender' => trim($_POST['gender']),
			'candidate_post' => trim($_POST['elecpost']),
			'candidate_posted' => date('Y-m-d H:i:s'),
			'candidate_postedby' => "1",
		);
			
		$add_query = $database->as_insert( 'as_candidate', $New_Item_Details ); 
	}
			
	function as_edit_candidate($candidateid) {
		$database = new As_Dbconn();	
		$Update_Item_Details = array(
			'candidate_name' => trim($_POST['name']),
			'candidate_gender' => trim($_POST['gender']),
			'candidate_post' => trim($_POST['elecpost']),
			'candidate_updated' => date('Y-m-d H:i:s'),
			'candidate_updatedby' => "1",
		);
		$where_clause = array('candidateid' => $candidateid);
		$updated = $database->as_update( 'as_candidate', $Update_Item_Details, $where_clause, 1 );
	}
		
	function as_add_admin($admin_username) {		
		$database = new As_Dbconn();	
		$Update_Admin_Details = array(
			'official_group' => trim($_POST['admin_role']),
		);
		$where_clause = array('official_name' => $admin_username);
		$updated = $database->as_update( 'as_official', $Update_Admin_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
 	
	function as_add_new_voter(){
		$database = new As_Dbconn();			
		$New_Voter_Details = array(
			'voter_name' => trim($_POST['name']),
			'voter_admission' => trim($_POST['admno']),
			'voter_class' => trim($_POST['class']),
			'voter_gender' => trim($_POST['gender']),
		    'voter_registered' => date('Y-m-d H:i:s'),
		    'voter_registeredby' => "1",
		);			
		$add_query = $database->as_insert( 'as_voter', $New_Voter_Details ); 
	}
			
	function as_edit_voter($voterid) {
		$database = new As_Dbconn();	
		$Update_Voter_Details = array(
			'voter_name' => trim($_POST['name']),
			'voter_admission' => trim($_POST['admno']),
			'voter_class' => trim($_POST['class']),
			'voter_course' => trim($_POST['course']),
			'voter_class' => trim($_POST['class']),
			'voter_gender' => trim($_POST['gender']),
			'voter_fee' => trim($_POST['fees']),
		    'voter_registered' => date('Y-m-d H:i:s'),
		    'voter_registeredby' => "1",
		);
		$where_clause = array('voterid' => $voterid);
		$updated = $database->as_update( 'as_voter', $Update_Voter_Details, $where_clause, 1 );
	}	