<?php
  
function resource_all() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "All  Items"; 
	require( AS_INC . "as_resource_all.php" );
}

function resource_new() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "resource_new"; 
	
	if ( isset( $_POST['SaveItem'] ) ) {
		as_resource_allocate();
		header( "Location: index.php?action=resource_new");						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		as_resource_allocate();
		header( "Location: index.php?action=resource_all");						
	}  else {
		require( AS_INC . "as_resource_new.php" );
	}	
}

function resource_view() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "Viewfee"; 
	$as_resourceid = isset( $_GET['as_resourceid'] ) ? $_GET['as_resourceid'] : "";
	
	$as_db_query = "SELECT * FROM as_resource WHERE resourceid = '$as_resourceid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $resourceid, $facilitator_name) = $database->get_row( $as_db_query );
		$results['fee'] = $resourceid;
	} else  {
		return false;
		header( "Location: index.php?action=resource_all");	
	}
	
	if ( isset( $_POST['PrescriptionNow'] ) ) {
		as_add_new_group();
		header( "Location: index.php?action=group_all");				
	}  else {
		require( AS_INC . "as_resource_view.php" );
	}	
	
}

function resource_edit() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "Editfee"; 
	$as_resourceid = isset( $_GET['as_resourceid'] ) ? $_GET['as_resourceid'] : "";
	
	$as_db_query = "SELECT * FROM as_resource WHERE resourceid = '$as_resourceid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $resourceid) = $database->get_row( $as_db_query );
		$results['fee'] = $resourceid;
	} else  {
		return false;
		header( "Location: index.php?action=resource_all");	
	}
	
	if ( isset( $_POST['SaveItem'] ) ) {
		as_edit_fee($as_resourceid);
		header( "Location: index.php?action=resource_edit&&as_resourceid=".$as_resourceid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		as_edit_fee($as_resourceid);
		header( "Location: index.php?action=resource_all");					
	}  else {
		require( AS_INC . "as_resource_edit.php" );
	}	
	
}

function resource_delete() {
	$as_resourceid = isset( $_GET['as_resourceid'] ) ? $_GET['as_resourceid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_resource WHERE resourceid = '$as_resourceid'";
	$delete = array(
		'resourceid' => $as_resourceid,
	);
	$deleted = $database->delete( 'as_resource', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=resource_all");	
	}
}

?>