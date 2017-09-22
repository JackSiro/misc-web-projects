<?php

	  
function tenant_all() {
	$results = array();
	$results['pageTitle'] = "Nafaka Stationery tenants";
	$results['pageAction'] = "All Stationery Items"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$as_search = $_POST['as_search'];
		$as_catid = $_POST['as_catid'];
		
		header( "Location: index.php?action=as_search&&as_search=".$as_search."&&as_catid=".$as_catid);
								
	}  else {	
		require( AS_INC . "as_tenant_all.php" );
	}
}

function tenant_search() {
	$results = array();
	$results['pageTitle'] = "Nafaka Stationery tenants";
	$results['pageAction'] = "Search"; 
	$results['search'] = isset( $_GET['as_tenantid'] ) ? $_GET['as_tenantid'] : "";
	$results['searchcat'] = isset( $_GET['as_catid'] ) ? $_GET['as_catid'] : "";
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$as_search = $_POST['as_search'];
		$as_catid = $_POST['as_catid'];
		
		header( "Location: index.php?action=as_search&&as_search=".$as_search."&&as_catid=".$as_catid);
														
	}  else {	
		require( AS_INC . "as_search.php" );
	}
}
function tenant_new() {
	$results = array();
	$results['pageTitle'] = "Nafaka Stationery tenants";
	$results['pageAction'] = "Newtenant"; 
	
	if ( isset( $_POST['Addtenant'] ) ) {
		as_add_new_tenant();
		header( "Location: index.php?action=tenant_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_add_new_tenant();
		header( "Location: index.php?action=tenant_all");						
	}  else {
		require( AS_INC . "as_tenant_new.php" );
	}	
	
}

function tenant_view() {
	$results = array();
	$results['pageTitle'] = "Nafaka Stationery tenants";
	$results['pageAction'] = "Viewtenant"; 
	$as_tenantid = isset( $_GET['as_tenantid'] ) ? $_GET['as_tenantid'] : "";
	
	$as_db_query = "SELECT * FROM as_tenant WHERE tenantid = '$as_tenantid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $tenantid, $user_name) = $database->get_row( $as_db_query );
		$results['tenant'] = $tenantid;
	} else  {
		return false;
		header( "Location: index.php?action=tenant_all");	
	}
	
	if ( isset( $_POST['tenantNow'] ) ) {
		as_add_new_tenant();
		header( "Location: index.php?action=tenant_all");				
	}  else {
		require( AS_INC . "as_tenant_view.php" );
	}	
	
}

function tenant_edit() {
	$results = array();
	$results['pageTitle'] = "Nafaka Stationery tenants";
	$results['pageAction'] = "Edittenant"; 
	$as_tenantid = isset( $_GET['as_tenantid'] ) ? $_GET['as_tenantid'] : "";
	
	$as_db_query = "SELECT * FROM as_tenant WHERE tenantid = '$as_tenantid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $tenantid) = $database->get_row( $as_db_query );
		$results['tenant'] = $tenantid;
	} else  {
		return false;
		header( "Location: index.php?action=elibrary");	
	}
	
	if ( isset( $_POST['SaveItem'] ) ) {
		as_edit_tenant($as_tenantid);
		header( "Location: index.php?action=tenant_edit&&as_tenantid=".$as_tenantid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		as_edit_tenant($as_tenantid);
		header( "Location: index.php?action=tenant_view&&as_tenantid=".$as_tenantid);					
	}  else {
		require( AS_INC . "as_tenant_edit.php" );
	}	
	
}

function tenant_delete() {
	$as_tenantid = isset( $_GET['as_tenantid'] ) ? $_GET['as_tenantid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_tenant WHERE tenantid = '$as_tenantid'";
	$delete = array(
		'tenantid' => $as_tenantid,
	);
	$deleted = $database->delete( 'as_tenant', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=tenant_all");	
	}
}

?>