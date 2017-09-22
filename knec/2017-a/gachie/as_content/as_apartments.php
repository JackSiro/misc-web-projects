<?php
	
function apartment_all() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "apartments";  
	require( AS_INC . "as_apartment_all.php" );
}

function apartment_new() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Newapartment"; 
	
	if ( isset( $_POST['Addapartment'] ) ) {
		as_new_apartment();
		header( "Location: index.php?action=apartment_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_new_apartment();
		header( "Location: index.php?action=apartment_all");						
	}  else {
		require( AS_INC . "as_apartment_new.php" );
	}	
	
}
function apartment_view() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Viewapartment"; 
	$as_apartmentid = isset( $_GET['as_apartmentid'] ) ? $_GET['as_apartmentid'] : "";
	
	$as_db_query = "SELECT * FROM as_apartment WHERE apartmentid = '$as_apartmentid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $apartmentid, $apartment_name) = $database->get_row( $as_db_query );
		$results['apartment'] = $apartmentid;
	} else  {
		return false;
		header( "Location: index.php?action=apartment_all");	
	}
	
	require( AS_INC . "as_apartment_view.php" );
		
}

function apartment_profile() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Profile"; 
	$as_apartmentname = $_SESSION['apartmentname_loggedin'];
	
	$as_db_query = "SELECT * FROM as_apartment WHERE apartment_name = '$as_apartmentname'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $apartmentid, $apartment_name) = $database->get_row( $as_db_query );
		$results['apartment'] = $apartmentid;
	} else  {
		return false;
		header( "Location: index.php?action=apartments");	
	}
	
	require( AS_INC . "as_viewapartment.php" );
		
}

function apartment_delete() {
	$as_apartmentid = isset( $_GET['as_apartmentid'] ) ? $_GET['as_apartmentid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_apartment WHERE apartmentid = '$as_apartmentid'";
	$delete = array(
		'apartmentid' => $as_apartmentid,
	);
	$deleted = $database->delete( 'as_apartment', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=apartment_all");	
	}
}

?>