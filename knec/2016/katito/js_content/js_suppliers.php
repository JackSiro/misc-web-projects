<?php
	
function supp_all() {
	$results = array();
	$results['pageTitle'] = "Katito Polytechic";
	$results['pageAction'] = "Supps";  
	require( JS_INC . "js_supp_all.php" );
}

function supp_new() {
	$results = array();
	$results['pageTitle'] = "Katito Polytechic";
	$results['pageAction'] = "Newsupp"; 
	
	if ( isset( $_POST['AddSupp'] ) ) {
		js_add_new_supp();
		header( "Location: index.php?action=supp_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		js_add_new_supp();
		header( "Location: index.php?action=supp_all");						
	}  else {
		require( JS_INC . "js_supp_new.php" );
	}	
	
}
function supp_view() {
	$results = array();
	$results['pageTitle'] = "Katito Polytechic";
	$results['pageAction'] = "Viewsupp"; 
	$js_suppid = isset( $_GET['js_suppid'] ) ? $_GET['js_suppid'] : "";
	
	$js_db_query = "SELECT * FROM js_supplier WHERE suppid = '$js_suppid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $suppid, $supp_name) = $database->get_row( $js_db_query );
		$results['supp'] = $suppid;
	} else  {
		return false;
		header( "Location: index.php?action=supp_all");	
	}
	
	require( JS_INC . "js_supp_view.php" );
		
}

function supp_profile() {
	$results = array();
	$results['pageTitle'] = "Katito Polytechic";
	$results['pageAction'] = "Profile"; 
	$js_suppname = $_SESSION['suppname_loggedin'];
	
	$js_db_query = "SELECT * FROM js_supp WHERE supp_name = '$js_suppname'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $suppid, $supp_name) = $database->get_row( $js_db_query );
		$results['supp'] = $suppid;
	} else  {
		return false;
		header( "Location: index.php?action=supps");	
	}
	
	require( JS_INC . "js_viewsupp.php" );
		
}

function supp_delete() {
	$js_suppid = isset( $_GET['js_suppid'] ) ? $_GET['js_suppid'] : "";
	
	$database = new Js_Dbconn();
	$js_db_query = "DELETE * FROM js_supplier WHERE suppid = '$js_suppid'";
	$delete = array(
		'suppid' => $js_suppid,
	);
	$deleted = $database->delete( 'js_supplier', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=supp_all");	
	}
}

?>