<?php

	  
function sales_all() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "All  Drugs"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$as_search = $_POST['as_search'];
		$as_drugid = $_POST['as_drugid'];
		
		header( "Location: index.php?action=as_search&&as_search=".$as_search."&&as_drugid=".$as_drugid);
								
	}  else {	
		require( AS_INC . "as_sales_all.php" );
	}
}

function sales_search() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Search"; 
	$results['search'] = isset( $_GET['as_salesid'] ) ? $_GET['as_salesid'] : "";
	$results['searchcategory'] = isset( $_GET['as_drugid'] ) ? $_GET['as_drugid'] : "";
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$as_search = $_POST['as_search'];
		$as_drugid = $_POST['as_drugid'];
		
		header( "Location: index.php?action=as_search&&as_search=".$as_search."&&as_drugid=".$as_drugid);
														
	}  else {	
		require( AS_INC . "as_search.php" );
	}
}
function sales_new() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Newsales"; 
	
	if ( isset( $_POST['SubmitSales'] ) ) {
		as_add_new_sales();
		header( "Location: index.php?action=sales_new");						
	}  else {
		require( AS_INC . "as_sales_new.php" );
	}	
	
}

function sales_view() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Viewsales"; 
	$as_salesid = isset( $_GET['as_salesid'] ) ? $_GET['as_salesid'] : "";
	
	$as_db_query = "SELECT * FROM as_sales WHERE salesid = '$as_salesid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $salesid, $user_name) = $database->get_row( $as_db_query );
		$results['sales'] = $salesid;
	} else  {
		return false;
		header( "Location: index.php?action=sales_all");	
	}
	
	if ( isset( $_POST['PrescriptionNow'] ) ) {
		as_add_new_sales();
		header( "Location: index.php?action=sales_all");				
	}  else {
		require( AS_INC . "as_sales_view.php" );
	}	
	
}

function sales_edit() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Editsales"; 
	$as_salesid = isset( $_GET['as_salesid'] ) ? $_GET['as_salesid'] : "";
	
	$as_db_query = "SELECT * FROM as_sales WHERE salesid = '$as_salesid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $salesid) = $database->get_row( $as_db_query );
		$results['sales'] = $salesid;
	} else  {
		return false;
		header( "Location: index.php?action=stock_all");	
	}
	
	if ( isset( $_POST['SaveDrug'] ) ) {
		as_edit_sales($as_salesid);
		header( "Location: index.php?action=sales_edit&&as_salesid=".$as_salesid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		as_edit_sales($as_salesid);
		header( "Location: index.php?action=sales_view&&as_salesid=".$as_salesid);					
	}  else {
		require( AS_INC . "as_sales_edit.php" );
	}	
	
}

function sales_delete() {
	$as_salesid = isset( $_GET['as_salesid'] ) ? $_GET['as_salesid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_sales WHERE salesid = '$as_salesid'";
	$delete = array(
		'salesid' => $as_salesid,
	);
	$deleted = $database->delete( 'as_sales', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=sales_all");	
	}
}

?>