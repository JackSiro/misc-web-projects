<?php

function topic_all() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Topic";  
	require( AS_INC . "as_topic_all.php" );
}

function topic_new() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "topic_new"; 
	
	if ( isset( $_POST['SubmitTopic'] ) ) {
		as_add_new_topic();
		header( "Location: index.php?action=topic_all");						
	}  else {
		require( AS_INC . "as_topic_new.php" );
	}	
	
}

function topic_view() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "topic_view"; 
	$as_topicid = isset( $_GET['as_topicid'] ) ? $_GET['as_topicid'] : "";
	
	$as_db_query = "SELECT * FROM as_topic WHERE topicid = '$as_topicid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $topicid, $topic_title) = $database->get_row( $as_db_query );
		$results['topic'] = $topicid;
	} else  {
		return false;
		header( "Location: index.php?action=topic_all");	
	}
	
	if ( isset( $_POST['SubmitReply'] ) ) {
		as_add_new_discuss($as_topicid);
		header( "Location: index.php?action=topic_view&&as_topicid=".$as_topicid);
	}  else {
		require( AS_INC . "as_topic_view.php" );
	}
}
	  
function discuss_all() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Discuss";  
	require( AS_INC . "as_discuss_all.php" );
}

function discuss_new() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "discuss_new"; 
	
	if ( isset( $_POST['AddDiscuss'] ) ) {
		as_add_new_discuss();
		header( "Location: index.php?action=discuss_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_add_new_discuss();
		header( "Location: index.php?action=discuss_all");						
	}  else {
		require( AS_INC . "as_discuss_new.php" );
	}	
	
}

function discuss_view() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "discuss_view"; 
	$as_discussid = isset( $_GET['as_discussid'] ) ? $_GET['as_discussid'] : "";
	
	$as_db_query = "SELECT * FROM as_discuss WHERE discussid = '$as_discussid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $discussid, $discuss_term) = $database->get_row( $as_db_query );
		$results['discuss'] = $discussid;
	} else  {
		return false;
		header( "Location: index.php?action=discuss");	
	}
	
	if ( isset( $_POST['SaveDiscuss'] ) ) {
		as_edit_discuss($as_discussid);
		header( "Location: index.php?action=discuss_all");
	}  else {
		require( AS_INC . "as_discuss_view.php" );
	}
}

function group_all() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Groups"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$as_search = $_POST['as_search'];
		$as_topicid = $_POST['as_topicid'];
		
		header( "Location: index.php?action=search&&as_search=".$as_search."&&as_topicid=".$as_topicid);
								
	}  else {	
		require( AS_INC . "as_group_all.php" );
	}
}

function group_new() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "group_new"; 
	
	if ( isset( $_POST['AddGroup'] ) ) {
		as_add_new_group();
		header( "Location: index.php?action=group_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_add_new_group();
		header( "Location: index.php?action=group_all");						
	}  else {
		require( AS_INC . "as_group_new.php" );
	}	
	
}

function group_view() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Viewgroup"; 
	$as_groupid = isset( $_GET['as_groupid'] ) ? $_GET['as_groupid'] : "";
	
	$as_db_query = "SELECT * FROM as_group WHERE groupid = '$as_groupid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $groupid, $student_name) = $database->get_row( $as_db_query );
		$results['group'] = $groupid;
	} else  {
		return false;
		header( "Location: index.php?action=group_all");	
	}
	
	require( AS_INC . "as_group_view.php" );
	
}

function group_edit() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Editgroup"; 
	$as_groupid = isset( $_GET['as_groupid'] ) ? $_GET['as_groupid'] : "";
	
	$as_db_query = "SELECT * FROM as_group WHERE groupid = '$as_groupid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $groupid) = $database->get_row( $as_db_query );
		$results['group'] = $groupid;
	} else  {
		return false;
		header( "Location: index.php?action=group_all");	
	}
	
	if ( isset( $_POST['SaveGroup'] ) ) {
		as_edit_group($as_groupid);
		header( "Location: index.php?action=group_edit&&as_groupid=".$as_groupid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		as_edit_group($as_groupid);
		header( "Location: index.php?action=group_view&&as_groupid=".$as_groupid);					
	}  else {
		require( AS_INC . "as_group_edit.php" );
	}	
	
}

function student_delete() {
	$as_studentid = isset( $_GET['as_studentid'] ) ? $_GET['as_studentid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_student WHERE studentid = '$as_studentid'";
	$delete = array(
		'studentid' => $as_studentid,
	);
	$deleted = $database->delete( 'as_student', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=student_all");	
	}
}

function student_all() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Teachers";  
	require( AS_INC . "as_student_all.php" );
}

function student_new() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Newstudent"; 
	
	if ( isset( $_POST['AddTeacher'] ) ) {
		as_add_new_student();
		header( "Location: index.php?action=student_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_add_new_student();
		header( "Location: index.php?action=student_all");						
	}  else {
		require( AS_INC . "as_student_new.php" );
	}	
	
}
function student_view() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Viewstudent"; 
	$as_studentid = isset( $_GET['as_studentid'] ) ? $_GET['as_studentid'] : "";
	
	$as_db_query = "SELECT * FROM as_student WHERE studentid = '$as_studentid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $studentid, $student_name) = $database->get_row( $as_db_query );
		$results['student'] = $studentid;
	} else  {
		return false;
		header( "Location: index.php?action=student_all");	
	}
	
	require( AS_INC . "as_viewstudent.php" );
		
}

?>