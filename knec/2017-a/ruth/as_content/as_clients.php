<?php
	
function client_all() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "clients";  
	require( AS_INC . "as_client_all.php" );
}

function client_new() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Newclient"; 
	
	if ( isset( $_POST['Addclient'] ) ) {
		as_new_client();
		header( "Location: index.php?action=client_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_new_client();
		header( "Location: index.php?action=client_all");						
	}  else {
		require( AS_INC . "as_client_new.php" );
	}	
	
}
function client_view() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Viewclient"; 
	$as_clientid = isset( $_GET['as_clientid'] ) ? $_GET['as_clientid'] : "";
	
	$as_db_query = "SELECT * FROM as_client WHERE clientid = '$as_clientid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $clientid, $client_name) = $database->get_row( $as_db_query );
		$results['client'] = $clientid;
	} else  {
		return false;
		header( "Location: index.php?action=client_all");	
	}
		
	if ( isset( $_POST['UpdateItem'] ) ) {
		as_update_client($as_clientid);
		header( "Location: index.php?action=client_all");				
	} else if ( isset( $_POST['DeleteItem'] ) ) {
		as_delete_client($as_clientid);
		header( "Location: index.php?action=client_all");				
	}  else {
		require( AS_INC . "as_client_view.php" );
	}
}

function client_profile() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Profile"; 
	$as_clientname = $_SESSION['clientname_loggedin'];
	
	$as_db_query = "SELECT * FROM as_client WHERE client_name = '$as_clientname'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $clientid, $client_name) = $database->get_row( $as_db_query );
		$results['client'] = $clientid;
	} else  {
		return false;
		header( "Location: index.php?action=clients");	
	}
	
	require( AS_INC . "as_viewclient.php" );
		
}

function client_delete() {
	$as_clientid = isset( $_GET['as_clientid'] ) ? $_GET['as_clientid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_client WHERE clientid = '$as_clientid'";
	$delete = array(
		'clientid' => $as_clientid,
	);
	$deleted = $database->delete( 'as_client', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=client_all");	
	}
}

?>