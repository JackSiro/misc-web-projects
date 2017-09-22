<?php

	  
function visit_all() {
	$results = array();
	$results['pageTitle'] = "Nafaka Stationery visits";
	$results['pageAction'] = "All Stationery Items"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$as_search = $_POST['as_search'];
		$as_catid = $_POST['as_catid'];
		
		header( "Location: index.php?action=as_search&&as_search=".$as_search."&&as_catid=".$as_catid);
								
	}  else {	
		require( AS_INC . "as_visit_all.php" );
	}
}

function visit_search() {
	$results = array();
	$results['pageTitle'] = "Nafaka Stationery visits";
	$results['pageAction'] = "Search"; 
	$results['search'] = isset( $_GET['as_visitid'] ) ? $_GET['as_visitid'] : "";
	$results['searchcat'] = isset( $_GET['as_catid'] ) ? $_GET['as_catid'] : "";
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$as_search = $_POST['as_search'];
		$as_catid = $_POST['as_catid'];
		
		header( "Location: index.php?action=as_search&&as_search=".$as_search."&&as_catid=".$as_catid);
														
	}  else {	
		require( AS_INC . "as_search.php" );
	}
}
function visit_new() {
	$results = array();
	$results['pageTitle'] = "Nafaka Stationery visits";
	$results['pageAction'] = "Newvisit"; 
	
	if ( isset( $_POST['Addvisit'] ) ) {
		as_add_new_visit();
		header( "Location: index.php?action=visit_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_add_new_visit();
		header( "Location: index.php?action=visit_all");						
	}  else {
		require( AS_INC . "as_visit_new.php" );
	}	
	
}

function visit_view() {
	$results = array();
	$results['pageTitle'] = "Nafaka Stationery visits";
	$results['pageAction'] = "Viewvisit"; 
	$as_visitid = isset( $_GET['as_visitid'] ) ? $_GET['as_visitid'] : "";
	
	$as_db_query = "SELECT * FROM as_visit WHERE visitid = '$as_visitid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $visitid, $user_name) = $database->get_row( $as_db_query );
		$results['visit'] = $visitid;
	} else  {
		return false;
		header( "Location: index.php?action=visit_all");	
	}
	
	if ( isset( $_POST['UpdateItem'] ) ) {
		as_update_visit($as_visitid);
		header( "Location: index.php?action=visit_all");				
	} else if ( isset( $_POST['DeleteItem'] ) ) {
		as_delete_visit($as_visitid);
		header( "Location: index.php?action=visit_all");				
	}  else {
		require( AS_INC . "as_visit_view.php" );
	}		
}

function visit_edit() {
	$results = array();
	$results['pageTitle'] = "Nafaka Stationery visits";
	$results['pageAction'] = "Editvisit"; 
	$as_visitid = isset( $_GET['as_visitid'] ) ? $_GET['as_visitid'] : "";
	
	$as_db_query = "SELECT * FROM as_visit WHERE visitid = '$as_visitid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $visitid) = $database->get_row( $as_db_query );
		$results['visit'] = $visitid;
	} else  {
		return false;
		header( "Location: index.php?action=elibrary");	
	}
	
	if ( isset( $_POST['SaveItem'] ) ) {
		as_edit_visit($as_visitid);
		header( "Location: index.php?action=visit_edit&&as_visitid=".$as_visitid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		as_edit_visit($as_visitid);
		header( "Location: index.php?action=visit_view&&as_visitid=".$as_visitid);					
	}  else {
		require( AS_INC . "as_visit_edit.php" );
	}	
	
}

function visit_delete() {
	$as_visitid = isset( $_GET['as_visitid'] ) ? $_GET['as_visitid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_visit WHERE visitid = '$as_visitid'";
	$delete = array(
		'visitid' => $as_visitid,
	);
	$deleted = $database->delete( 'as_visit', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=visit_all");	
	}
}

?>