<?php
	
function worker_all() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "workers";  
	require( AS_INC . "as_worker_all.php" );
}

function worker_new() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Newworker"; 
	
	if ( isset( $_POST['Addworker'] ) ) {
		as_new_worker();
		header( "Location: index.php?action=worker_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_new_worker();
		header( "Location: index.php?action=worker_all");						
	}  else {
		require( AS_INC . "as_worker_new.php" );
	}	
	
}
function worker_view() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Viewworker"; 
	$as_workerid = isset( $_GET['as_workerid'] ) ? $_GET['as_workerid'] : "";
	
	$as_db_query = "SELECT * FROM as_worker WHERE workerid = '$as_workerid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $workerid, $worker_name) = $database->get_row( $as_db_query );
		$results['worker'] = $workerid;
	} else  {
		return false;
		header( "Location: index.php?action=worker_all");	
	}
	
	require( AS_INC . "as_worker_view.php" );
		
}

function worker_profile() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Profile"; 
	$as_workername = $_SESSION['workername_loggedin'];
	
	$as_db_query = "SELECT * FROM as_worker WHERE worker_name = '$as_workername'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $workerid, $worker_name) = $database->get_row( $as_db_query );
		$results['worker'] = $workerid;
	} else  {
		return false;
		header( "Location: index.php?action=workers");	
	}
	
	require( AS_INC . "as_viewworker.php" );
		
}

function worker_delete() {
	$as_workerid = isset( $_GET['as_workerid'] ) ? $_GET['as_workerid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_worker WHERE workerid = '$as_workerid'";
	$delete = array(
		'workerid' => $as_workerid,
	);
	$deleted = $database->delete( 'as_worker', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=worker_all");	
	}
}

?>