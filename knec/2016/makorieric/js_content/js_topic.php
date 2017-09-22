<?php
	
function topic_all() {
	$results = array();
	$results['pageTitle'] = "Item";
	$results['pageAction'] = "Supps";  
	require( JS_INC . "js_topic_all.php" );
}

function topic_new() {
	$results = array();
	$results['pageTitle'] = "Item";
	$results['pageAction'] = "Newtopic"; 
	
	if ( isset( $_POST['AddSupp'] ) ) {
		js_add_new_topic();
		header( "Location: index.php?action=topic_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		js_add_new_topic();
		header( "Location: index.php?action=topic_all");						
	}  else {
		require( JS_INC . "js_topic_new.php" );
	}	
	
}
function topic_view() {
	$results = array();
	$results['pageTitle'] = "Item";
	$results['pageAction'] = "Viewtopic"; 
	$js_topicid = isset( $_GET['js_topicid'] ) ? $_GET['js_topicid'] : "";
	
	$js_db_query = "SELECT * FROM js_topic WHERE topicid = '$js_topicid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $topicid, $topic_name) = $database->get_row( $js_db_query );
		$results['topic'] = $topicid;
	} else  {
		return false;
		header( "Location: index.php?action=topic_all");	
	}
	
	require( JS_INC . "js_topic_view.php" );
		
}

function topic_profile() {
	$results = array();
	$results['pageTitle'] = "Item";
	$results['pageAction'] = "Profile"; 
	$js_topicname = $_SESSION['topicname_loggedin'];
	
	$js_db_query = "SELECT * FROM js_topic WHERE topic_name = '$js_topicname'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $topicid, $topic_name) = $database->get_row( $js_db_query );
		$results['topic'] = $topicid;
	} else  {
		return false;
		header( "Location: index.php?action=topics");	
	}
	
	require( JS_INC . "js_viewtopic.php" );
		
}

?>