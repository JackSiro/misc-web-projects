<?php

	  
function contribution_all() {
	$results = array();
	$results['pageTitle'] = "Nafaka Stationery contributions";
	$results['pageAction'] = "All Stationery Items"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$as_search = $_POST['as_search'];
		$as_catid = $_POST['as_catid'];
		
		header( "Location: index.php?action=as_search&&as_search=".$as_search."&&as_catid=".$as_catid);
								
	}  else {	
		require( AS_INC . "as_contribution_all.php" );
	}
}

function contribution_search() {
	$results = array();
	$results['pageTitle'] = "Nafaka Stationery contributions";
	$results['pageAction'] = "Search"; 
	$results['search'] = isset( $_GET['as_contributionid'] ) ? $_GET['as_contributionid'] : "";
	$results['searchcat'] = isset( $_GET['as_catid'] ) ? $_GET['as_catid'] : "";
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$as_search = $_POST['as_search'];
		$as_catid = $_POST['as_catid'];
		
		header( "Location: index.php?action=as_search&&as_search=".$as_search."&&as_catid=".$as_catid);
														
	}  else {	
		require( AS_INC . "as_search.php" );
	}
}
function contribution_new() {
	$results = array();
	$results['pageTitle'] = "Nafaka Stationery contributions";
	$results['pageAction'] = "Newcontribution"; 
	
	if ( isset( $_POST['Addcontribution'] ) ) {
		as_add_new_contribution();
		header( "Location: index.php?action=contribution_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_add_new_contribution();
		header( "Location: index.php?action=contribution_all");						
	}  else {
		require( AS_INC . "as_contribution_new.php" );
	}	
	
}

function contribution_view() {
	$results = array();
	$results['pageTitle'] = "Nafaka Stationery contributions";
	$results['pageAction'] = "Viewcontribution"; 
	$as_contributionid = isset( $_GET['as_contributionid'] ) ? $_GET['as_contributionid'] : "";
	
	$as_db_query = "SELECT * FROM as_contribution WHERE contributionid = '$as_contributionid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $contributionid, $user_name) = $database->get_row( $as_db_query );
		$results['contribution'] = $contributionid;
	} else  {
		return false;
		header( "Location: index.php?action=contribution_all");	
	}
	
	if ( isset( $_POST['UpdateItem'] ) ) {
		as_update_contribution($as_contributionid);
		header( "Location: index.php?action=contribution_all");				
	} else if ( isset( $_POST['DeleteItem'] ) ) {
		as_delete_contribution($as_contributionid);
		header( "Location: index.php?action=contribution_all");				
	}  else {
		require( AS_INC . "as_contribution_view.php" );
	}		
}

function contribution_edit() {
	$results = array();
	$results['pageTitle'] = "Nafaka Stationery contributions";
	$results['pageAction'] = "Editcontribution"; 
	$as_contributionid = isset( $_GET['as_contributionid'] ) ? $_GET['as_contributionid'] : "";
	
	$as_db_query = "SELECT * FROM as_contribution WHERE contributionid = '$as_contributionid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $contributionid) = $database->get_row( $as_db_query );
		$results['contribution'] = $contributionid;
	} else  {
		return false;
		header( "Location: index.php?action=elibrary");	
	}
	
	if ( isset( $_POST['SaveItem'] ) ) {
		as_edit_contribution($as_contributionid);
		header( "Location: index.php?action=contribution_edit&&as_contributionid=".$as_contributionid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		as_edit_contribution($as_contributionid);
		header( "Location: index.php?action=contribution_view&&as_contributionid=".$as_contributionid);					
	}  else {
		require( AS_INC . "as_contribution_edit.php" );
	}	
	
}

function contribution_delete() {
	$as_contributionid = isset( $_GET['as_contributionid'] ) ? $_GET['as_contributionid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_contribution WHERE contributionid = '$as_contributionid'";
	$delete = array(
		'contributionid' => $as_contributionid,
	);
	$deleted = $database->delete( 'as_contribution', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=contribution_all");	
	}
}

?>