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
		
	function as_add_new_topic(){
		$database = new As_Dbconn();			
		$New_Item_Details = array(			
			'topic_title' => trim($_POST['title']),
			'topic_content' => trim($_POST['content']),
			'topic_created' => date('Y-m-d H:i:s'),
			'topic_createdby' => trim($_POST['student']),
		);
			
		$add_query = $database->as_insert( 'as_topic', $New_Item_Details ); 
	}
			
	function as_edit_topic($topicid) {
		$database = new As_Dbconn();	
		$Update_Item_Details = array(
			'topic_participants' => trim($_POST['title']),
			'topic_title' => trim($_POST['term']),
			'topic_participants' => trim($_POST['content']),
			'topic_updated' => date('Y-m-d H:i:s'),
			'topic_updatedby' => "1",
		);
		$where_clause = array('topicid' => $topicid);
		$updated = $database->as_update( 'as_topic', $Update_Item_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
	function as_add_new_discuss($topicid){
		$database = new As_Dbconn();			
		$New_Item_Details = array(
			'discuss_topic' => $topicid,
			'discuss_content' => trim($_POST['content']),
			'discuss_posted' => date('Y-m-d H:i:s'),
			'discuss_postedby' => trim($_POST['student']),
		);
			
		$add_query = $database->as_insert( 'as_discuss', $New_Item_Details ); 
	}
			
	function as_edit_discuss($discussid) {
		$database = new As_Dbconn();	
		$Update_Item_Details = array(
			'discuss_topic' => trim($_POST['class']),
			'discuss_content' => trim($_POST['group']),
			'discuss_subject' => trim($_POST['subject']),
			'discuss_discuss' => trim($_POST['discuss']),
			'discuss_updated' => date('Y-m-d H:i:s'),
			'discuss_updatedby' => "1",
		);
		$where_clause = array('discussid' => $discussid);
		$updated = $database->as_update( 'as_discuss', $Update_Item_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
		
	function as_add_admin($admin_username) {		
		$database = new As_Dbconn();	
		$Update_Admin_Details = array(
			'student_role' => trim($_POST['admin_role']),
		);
		$where_clause = array('student_name' => $admin_username);
		$updated = $database->as_update( 'as_student', $Update_Admin_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
 	
	function as_add_new_group(){
		$database = new As_Dbconn();			
		$New_Group_Details = array(
			'group_name' => trim($_POST['name']),
			'group_title' => trim($_POST['admno']),
			'group_content' => trim($_POST['class']),
		    'group_created' => date('Y-m-d H:i:s'),
		    'group_createdby' => "1",
		);			
		$add_query = $database->as_insert( 'as_group', $New_Group_Details ); 
	}
			
	function as_edit_group($groupid) {
		$database = new As_Dbconn();	
		$Update_Group_Details = array(
			'group_name' => trim($_POST['name']),
			'group_title' => trim($_POST['admno']),
			'group_content' => trim($_POST['class']),
			'group_course' => trim($_POST['course']),
			'group_content' => trim($_POST['class']),
			'group_gender' => trim($_POST['gender']),
			'group_fee' => trim($_POST['fees']),
		    'group_created' => date('Y-m-d H:i:s'),
		    'group_createdby' => "1",
		);
		$where_clause = array('groupid' => $groupid);
		$updated = $database->as_update( 'as_group', $Update_Group_Details, $where_clause, 1 );
	}	