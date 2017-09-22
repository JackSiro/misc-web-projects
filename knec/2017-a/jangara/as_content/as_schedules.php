<?php

	  
function schedule_all() {
	$results = array();
	$results['pageTitle'] = "Nafaka Stationery schedules";
	$results['pageAction'] = "All Stationery Items"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$as_search = $_POST['as_search'];
		$as_catid = $_POST['as_catid'];
		
		header( "Location: index.php?action=as_search&&as_search=".$as_search."&&as_catid=".$as_catid);
								
	}  else {	
		require( AS_INC . "as_schedule_all.php" );
	}
}

function schedule_search() {
	$results = array();
	$results['pageTitle'] = "Nafaka Stationery schedules";
	$results['pageAction'] = "Search"; 
	$results['search'] = isset( $_GET['as_scheduleid'] ) ? $_GET['as_scheduleid'] : "";
	$results['searchcat'] = isset( $_GET['as_catid'] ) ? $_GET['as_catid'] : "";
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$as_search = $_POST['as_search'];
		$as_catid = $_POST['as_catid'];
		
		header( "Location: index.php?action=as_search&&as_search=".$as_search."&&as_catid=".$as_catid);
														
	}  else {	
		require( AS_INC . "as_search.php" );
	}
}
function schedule_new() {
	$results = array();
	$results['pageTitle'] = "Nafaka Stationery schedules";
	$results['pageAction'] = "Newschedule"; 
	
	if ( isset( $_POST['Addschedule'] ) ) {
		as_add_new_schedule();
		header( "Location: index.php?action=schedule_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_add_new_schedule();
		header( "Location: index.php?action=schedule_all");						
	}  else {
		require( AS_INC . "as_schedule_new.php" );
	}	
	
}

function schedule_view() {
	$results = array();
	$results['pageTitle'] = "Nafaka Stationery schedules";
	$results['pageAction'] = "Viewschedule"; 
	$as_scheduleid = isset( $_GET['as_scheduleid'] ) ? $_GET['as_scheduleid'] : "";
	
	$as_db_query = "SELECT * FROM as_schedule WHERE scheduleid = '$as_scheduleid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $scheduleid, $user_name) = $database->get_row( $as_db_query );
		$results['schedule'] = $scheduleid;
	} else  {
		return false;
		header( "Location: index.php?action=schedule_all");	
	}
	
	if ( isset( $_POST['scheduleNow'] ) ) {
		as_add_new_schedule();
		header( "Location: index.php?action=schedule_all");				
	}  else {
		require( AS_INC . "as_schedule_view.php" );
	}	
	
}

function schedule_edit() {
	$results = array();
	$results['pageTitle'] = "Nafaka Stationery schedules";
	$results['pageAction'] = "Editschedule"; 
	$as_scheduleid = isset( $_GET['as_scheduleid'] ) ? $_GET['as_scheduleid'] : "";
	
	$as_db_query = "SELECT * FROM as_schedule WHERE scheduleid = '$as_scheduleid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $scheduleid) = $database->get_row( $as_db_query );
		$results['schedule'] = $scheduleid;
	} else  {
		return false;
		header( "Location: index.php?action=elibrary");	
	}
	
	if ( isset( $_POST['SaveItem'] ) ) {
		as_edit_schedule($as_scheduleid);
		header( "Location: index.php?action=schedule_edit&&as_scheduleid=".$as_scheduleid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		as_edit_schedule($as_scheduleid);
		header( "Location: index.php?action=schedule_view&&as_scheduleid=".$as_scheduleid);					
	}  else {
		require( AS_INC . "as_schedule_edit.php" );
	}	
	
}

function schedule_delete() {
	$as_scheduleid = isset( $_GET['as_scheduleid'] ) ? $_GET['as_scheduleid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_schedule WHERE scheduleid = '$as_scheduleid'";
	$delete = array(
		'scheduleid' => $as_scheduleid,
	);
	$deleted = $database->delete( 'as_schedule', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=schedule_all");	
	}
}

?>