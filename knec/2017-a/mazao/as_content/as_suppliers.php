<?php
	
function supp_all() {
	$results = array();
	$results['pageTitle'] = "Mazao Cereals Suppliers";
	$results['pageAction'] = "Supps";  
	require( AS_INC . "as_supp_all.php" );
}

function supp_new() {
	$results = array();
	$results['pageTitle'] = "Mazao Cereals Suppliers";
	$results['pageAction'] = "Newsupp"; 
	
	if ( isset( $_POST['AddSupp'] ) ) {
		as_add_new_supp();
		header( "Location: index.php?action=supp_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_add_new_supp();
		header( "Location: index.php?action=supp_all");						
	}  else {
		require( AS_INC . "as_supp_new.php" );
	}	
	
}
function supp_view() {
	$results = array();
	$results['pageTitle'] = "Mazao Cereals Suppliers";
	$results['pageAction'] = "Viewsupp"; 
	$as_suppid = isset( $_GET['as_suppid'] ) ? $_GET['as_suppid'] : "";
	
	$as_db_query = "SELECT * FROM as_supp WHERE suppid = '$as_suppid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $suppid, $supp_name) = $database->get_row( $as_db_query );
		$results['supp'] = $suppid;
	} else  {
		return false;
		header( "Location: index.php?action=supp_all");	
	}
	
	require( AS_INC . "as_supp_view.php" );
		
}

function supp_profile() {
	$results = array();
	$results['pageTitle'] = "Mazao Cereals Suppliers";
	$results['pageAction'] = "Profile"; 
	$as_suppname = $_SESSION['suppname_loggedin'];
	
	$as_db_query = "SELECT * FROM as_supp WHERE supp_name = '$as_suppname'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $suppid, $supp_name) = $database->get_row( $as_db_query );
		$results['supp'] = $suppid;
	} else  {
		return false;
		header( "Location: index.php?action=supps");	
	}
	
	require( AS_INC . "as_viewsupp.php" );
		
}


function supp_delete() {
	$as_suppid = isset( $_GET['as_suppid'] ) ? $_GET['as_suppid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_supplier WHERE suppid = '$as_suppid'";
	$delete = array(
		'suppid' => $as_suppid,
	);
	$deleted = $database->delete( 'as_supplier', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=supp_all");	
	}
}

?>