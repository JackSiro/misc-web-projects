<?php
	
function attendant_all() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "attendants";  
	require( AS_INC . "as_attendant_all.php" );
}

function attendant_new() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Newattendant"; 
	
	if ( isset( $_POST['Addattendant'] ) ) {
		as_new_attendant();
		header( "Location: index.php?action=attendant_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_new_attendant();
		header( "Location: index.php?action=attendant_all");						
	}  else {
		require( AS_INC . "as_attendant_new.php" );
	}	
	
}
function attendant_view() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Viewattendant"; 
	$as_attendantid = isset( $_GET['as_attendantid'] ) ? $_GET['as_attendantid'] : "";
	
	$as_db_query = "SELECT * FROM as_attendant WHERE attendantid = '$as_attendantid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $attendantid, $attendant_name) = $database->get_row( $as_db_query );
		$results['attendant'] = $attendantid;
	} else  {
		return false;
		header( "Location: index.php?action=attendant_all");	
	}
		
	if ( isset( $_POST['UpdateItem'] ) ) {
		as_update_attendant($as_attendantid);
		header( "Location: index.php?action=attendant_all");				
	} else if ( isset( $_POST['DeleteItem'] ) ) {
		as_delete_attendant($as_attendantid);
		header( "Location: index.php?action=attendant_all");				
	}  else {
		require( AS_INC . "as_attendant_view.php" );
	}
}

function attendant_profile() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Profile"; 
	$as_attendantname = $_SESSION['attendantname_loggedin'];
	
	$as_db_query = "SELECT * FROM as_attendant WHERE attendant_name = '$as_attendantname'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $attendantid, $attendant_name) = $database->get_row( $as_db_query );
		$results['attendant'] = $attendantid;
	} else  {
		return false;
		header( "Location: index.php?action=attendants");	
	}
	
	require( AS_INC . "as_viewattendant.php" );
		
}

function attendant_delete() {
	$as_attendantid = isset( $_GET['as_attendantid'] ) ? $_GET['as_attendantid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_attendant WHERE attendantid = '$as_attendantid'";
	$delete = array(
		'attendantid' => $as_attendantid,
	);
	$deleted = $database->delete( 'as_attendant', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=attendant_all");	
	}
}

?>