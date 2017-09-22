<?php
	
function visitor_all() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "visitors";  
	require( AS_INC . "as_visitor_all.php" );
}

function visitor_new() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Newvisitor"; 
	
	if ( isset( $_POST['Addvisitor'] ) ) {
		as_new_visitor();
		header( "Location: index.php?action=visitor_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_new_visitor();
		header( "Location: index.php?action=visitor_all");						
	}  else {
		require( AS_INC . "as_visitor_new.php" );
	}	
	
}
function visitor_view() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Viewvisitor"; 
	$as_visitorid = isset( $_GET['as_visitorid'] ) ? $_GET['as_visitorid'] : "";
	
	$as_db_query = "SELECT * FROM as_visitor WHERE visitorid = '$as_visitorid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $visitorid, $visitor_name) = $database->get_row( $as_db_query );
		$results['visitor'] = $visitorid;
	} else  {
		return false;
		header( "Location: index.php?action=visitor_all");	
	}
		
	if ( isset( $_POST['UpdateItem'] ) ) {
		as_update_visitor($as_visitorid);
		header( "Location: index.php?action=visitor_all");				
	} else if ( isset( $_POST['DeleteItem'] ) ) {
		as_delete_visitor($as_visitorid);
		header( "Location: index.php?action=visitor_all");				
	}  else {
		require( AS_INC . "as_visitor_view.php" );
	}
}

function visitor_profile() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Profile"; 
	$as_visitorname = $_SESSION['visitorname_loggedin'];
	
	$as_db_query = "SELECT * FROM as_visitor WHERE visitor_name = '$as_visitorname'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $visitorid, $visitor_name) = $database->get_row( $as_db_query );
		$results['visitor'] = $visitorid;
	} else  {
		return false;
		header( "Location: index.php?action=visitors");	
	}
	
	require( AS_INC . "as_viewvisitor.php" );
		
}

function visitor_delete() {
	$as_visitorid = isset( $_GET['as_visitorid'] ) ? $_GET['as_visitorid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_visitor WHERE visitorid = '$as_visitorid'";
	$delete = array(
		'visitorid' => $as_visitorid,
	);
	$deleted = $database->delete( 'as_visitor', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=visitor_all");	
	}
}

?>