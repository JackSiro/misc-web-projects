<?php
	
function lost_all() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "losts";  
	require( AS_INC . "as_lost_all.php" );
}

function lost_new() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Newlost"; 
	
	if ( isset( $_POST['SaveItem'] ) ) {
		as_new_lost();
		header( "Location: index.php?action=lost_new");						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		as_new_lost();
		header( "Location: index.php?action=lost_all");						
	}  else {
		require( AS_INC . "as_lost_new.php" );
	}	
	
}
function lost_view() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Viewlost"; 
	$as_lostid = isset( $_GET['as_lostid'] ) ? $_GET['as_lostid'] : "";
	
	$as_db_query = "SELECT * FROM as_lost WHERE lostid = '$as_lostid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $lostid, $lost_title) = $database->get_row( $as_db_query );
		$results['lost'] = $lostid;
	} else  {
		return false;
		header( "Location: index.php?action=lost_all");	
	}
		
	if ( isset( $_POST['UpdateItem'] ) ) {
		as_update_lost($as_lostid);
		header( "Location: index.php?action=lost_all");				
	} else if ( isset( $_POST['DeleteItem'] ) ) {
		as_delete_lost($as_lostid);
		header( "Location: index.php?action=lost_all");				
	}  else {
		require( AS_INC . "as_lost_view.php" );
	}
}

function lost_profile() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Profile"; 
	$as_lostname = $_SESSION['lostname_loggedin'];
	
	$as_db_query = "SELECT * FROM as_lost WHERE lost_title = '$as_lostname'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $lostid, $lost_title) = $database->get_row( $as_db_query );
		$results['lost'] = $lostid;
	} else  {
		return false;
		header( "Location: index.php?action=losts");	
	}
	
	require( AS_INC . "as_viewlost.php" );
		
}

function lost_delete() {
	$as_lostid = isset( $_GET['as_lostid'] ) ? $_GET['as_lostid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_lost WHERE lostid = '$as_lostid'";
	$delete = array(
		'lostid' => $as_lostid,
	);
	$deleted = $database->delete( 'as_lost', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=lost_all");	
	}
}

?>