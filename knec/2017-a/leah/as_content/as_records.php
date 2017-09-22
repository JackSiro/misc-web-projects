<?php

	  
function record_all() {
	$results = array();
	$results['pageTitle'] = "Nafaka Stationery records";
	$results['pageAction'] = "All Stationery Items"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$as_search = $_POST['as_search'];
		$as_catid = $_POST['as_catid'];
		
		header( "Location: index.php?action=as_search&&as_search=".$as_search."&&as_catid=".$as_catid);
								
	}  else {	
		require( AS_INC . "as_record_all.php" );
	}
}

function record_search() {
	$results = array();
	$results['pageTitle'] = "Nafaka Stationery records";
	$results['pageAction'] = "Search"; 
	$results['search'] = isset( $_GET['as_recordid'] ) ? $_GET['as_recordid'] : "";
	$results['searchcat'] = isset( $_GET['as_catid'] ) ? $_GET['as_catid'] : "";
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$as_search = $_POST['as_search'];
		$as_catid = $_POST['as_catid'];
		
		header( "Location: index.php?action=as_search&&as_search=".$as_search."&&as_catid=".$as_catid);
														
	}  else {	
		require( AS_INC . "as_search.php" );
	}
}
function record_new() {
	$results = array();
	$results['pageTitle'] = "Nafaka Stationery records";
	$results['pageAction'] = "Newrecord"; 
	
	if ( isset( $_POST['Addrecord'] ) ) {
		as_add_new_record();
		header( "Location: index.php?action=record_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_add_new_record();
		header( "Location: index.php?action=record_all");						
	}  else {
		require( AS_INC . "as_record_new.php" );
	}	
	
}

function record_view() {
	$results = array();
	$results['pageTitle'] = "Nafaka Stationery records";
	$results['pageAction'] = "Viewrecord"; 
	$as_recordid = isset( $_GET['as_recordid'] ) ? $_GET['as_recordid'] : "";
	
	$as_db_query = "SELECT * FROM as_record WHERE recordid = '$as_recordid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $recordid, $user_name) = $database->get_row( $as_db_query );
		$results['record'] = $recordid;
	} else  {
		return false;
		header( "Location: index.php?action=record_all");	
	}
	
	if ( isset( $_POST['UpdateItem'] ) ) {
		as_update_record($as_recordid);
		header( "Location: index.php?action=record_all");				
	} else if ( isset( $_POST['DeleteItem'] ) ) {
		as_delete_record($as_recordid);
		header( "Location: index.php?action=record_all");				
	}  else {
		require( AS_INC . "as_record_view.php" );
	}		
}

function record_edit() {
	$results = array();
	$results['pageTitle'] = "Nafaka Stationery records";
	$results['pageAction'] = "Editrecord"; 
	$as_recordid = isset( $_GET['as_recordid'] ) ? $_GET['as_recordid'] : "";
	
	$as_db_query = "SELECT * FROM as_record WHERE recordid = '$as_recordid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $recordid) = $database->get_row( $as_db_query );
		$results['record'] = $recordid;
	} else  {
		return false;
		header( "Location: index.php?action=elibrary");	
	}
	
	if ( isset( $_POST['SaveItem'] ) ) {
		as_edit_record($as_recordid);
		header( "Location: index.php?action=record_edit&&as_recordid=".$as_recordid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		as_edit_record($as_recordid);
		header( "Location: index.php?action=record_view&&as_recordid=".$as_recordid);					
	}  else {
		require( AS_INC . "as_record_edit.php" );
	}	
	
}

function record_delete() {
	$as_recordid = isset( $_GET['as_recordid'] ) ? $_GET['as_recordid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_record WHERE recordid = '$as_recordid'";
	$delete = array(
		'recordid' => $as_recordid,
	);
	$deleted = $database->delete( 'as_record', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=record_all");	
	}
}

?>