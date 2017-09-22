<?php

	  
function found_all() {
	$results = array();
	$results['pageTitle'] = "Item founds";
	$results['pageAction'] = "All Stationery Items"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$as_search = $_POST['as_search'];
		$as_catid = $_POST['as_catid'];
		
		header( "Location: index.php?action=as_search&&as_search=".$as_search."&&as_catid=".$as_catid);
								
	}  else {	
		require( AS_INC . "as_found_all.php" );
	}
}

function found_search() {
	$results = array();
	$results['pageTitle'] = "Item founds";
	$results['pageAction'] = "Search"; 
	$results['search'] = isset( $_GET['as_foundid'] ) ? $_GET['as_foundid'] : "";
	$results['searchcat'] = isset( $_GET['as_catid'] ) ? $_GET['as_catid'] : "";
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$as_search = $_POST['as_search'];
		$as_catid = $_POST['as_catid'];
		
		header( "Location: index.php?action=as_search&&as_search=".$as_search."&&as_catid=".$as_catid);
														
	}  else {	
		require( AS_INC . "as_search.php" );
	}
}
function found_new() {
	$results = array();
	$results['pageTitle'] = "Item founds";
	$results['pageAction'] = "Newfound"; 
	
	if ( isset( $_POST['SaveItem'] ) ) {
		as_new_found();
		header( "Location: index.php?action=found_new");						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		as_new_found();
		header( "Location: index.php?action=found_all");						
	}  else {
		require( AS_INC . "as_found_new.php" );
	}	
	
}

function found_view() {
	$results = array();
	$results['pageTitle'] = "Item founds";
	$results['pageAction'] = "Viewfound"; 
	$as_foundid = isset( $_GET['as_foundid'] ) ? $_GET['as_foundid'] : "";
	
	$as_db_query = "SELECT * FROM as_found WHERE foundid = '$as_foundid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $foundid, $user_name) = $database->get_row( $as_db_query );
		$results['found'] = $foundid;
	} else  {
		return false;
		header( "Location: index.php?action=found_all");	
	}
	
	if ( isset( $_POST['UpdateItem'] ) ) {
		as_update_found($as_foundid);
		header( "Location: index.php?action=found_all");				
	} else if ( isset( $_POST['DeleteItem'] ) ) {
		as_delete_found($as_foundid);
		header( "Location: index.php?action=found_all");				
	}  else {
		require( AS_INC . "as_found_view.php" );
	}		
}

function found_edit() {
	$results = array();
	$results['pageTitle'] = "Item founds";
	$results['pageAction'] = "Editfound"; 
	$as_foundid = isset( $_GET['as_foundid'] ) ? $_GET['as_foundid'] : "";
	
	$as_db_query = "SELECT * FROM as_found WHERE foundid = '$as_foundid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $foundid) = $database->get_row( $as_db_query );
		$results['found'] = $foundid;
	} else  {
		return false;
		header( "Location: index.php?action=elibrary");	
	}
	
	if ( isset( $_POST['SaveItem'] ) ) {
		as_edit_found($as_foundid);
		header( "Location: index.php?action=found_edit&&as_foundid=".$as_foundid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		as_edit_found($as_foundid);
		header( "Location: index.php?action=found_view&&as_foundid=".$as_foundid);					
	}  else {
		require( AS_INC . "as_found_edit.php" );
	}	
	
}

function found_delete() {
	$as_foundid = isset( $_GET['as_foundid'] ) ? $_GET['as_foundid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_found WHERE foundid = '$as_foundid'";
	$delete = array(
		'foundid' => $as_foundid,
	);
	$deleted = $database->delete( 'as_found', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=found_all");	
	}
}

?>