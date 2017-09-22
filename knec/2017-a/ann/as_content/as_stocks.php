<?php

	  
function stock_in() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "Stocks In"; 
	require( AS_INC . "as_stock_in.php" );
}
	  
function stock_all() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "All  Items"; 
	require( AS_INC . "as_stock_all.php" );
}

function stock_search() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "Search"; 
	$results['search'] = isset( $_GET['as_stockid'] ) ? $_GET['as_stockid'] : "";
	$results['searchcategory'] = isset( $_GET['as_stockid'] ) ? $_GET['as_stockid'] : "";
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$as_search = $_POST['as_search'];
		$as_stockid = $_POST['as_stockid'];
		
		header( "Location: index.php?action=as_search&&as_search=".$as_search."&&as_stockid=".$as_stockid);
														
	}  else {	
		require( AS_INC . "as_search.php" );
	}
}
function stock_new() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "stock_new"; 
	
	if ( isset( $_POST['SaveAdd'] ) ) {
		as_add_new_stock();
		header( "Location: index.php?action=stock_new");						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		as_add_new_stock();
		header( "Location: index.php?action=stock_all");						
	}  else {
		require( AS_INC . "as_stock_new.php" );
	}	
	
}

function stock_view() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "Viewstock"; 
	$as_stockid = isset( $_GET['as_stockid'] ) ? $_GET['as_stockid'] : "";
	
	$as_db_query = "SELECT * FROM as_stock WHERE stockid = '$as_stockid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $stockid, $user_name) = $database->get_row( $as_db_query );
		$results['stock'] = $stockid;
	} else  {
		return false;
		header( "Location: index.php?action=stock_all");	
	}
	
	if ( isset( $_POST['PrescriptionNow'] ) ) {
		as_add_new_sales();
		header( "Location: index.php?action=sales_all");				
	}  else {
		require( AS_INC . "as_stock_view.php" );
	}	
	
}

function stock_edit() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "Editstock"; 
	$as_stockid = isset( $_GET['as_stockid'] ) ? $_GET['as_stockid'] : "";
	
	$as_db_query = "SELECT * FROM as_stock WHERE stockid = '$as_stockid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $stockid) = $database->get_row( $as_db_query );
		$results['stock'] = $stockid;
	} else  {
		return false;
		header( "Location: index.php?action=stock_all");	
	}
	
	if ( isset( $_POST['SaveItem'] ) ) {
		as_edit_stock($as_stockid);
		header( "Location: index.php?action=stock_edit&&as_stockid=".$as_stockid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		as_edit_stock($as_stockid);
		header( "Location: index.php?action=stock_all");					
	}  else {
		require( AS_INC . "as_stock_edit.php" );
	}	
	
}

function stock_delete() {
	$as_stockid = isset( $_GET['as_stockid'] ) ? $_GET['as_stockid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_stock WHERE stockid = '$as_stockid'";
	$delete = array(
		'stockid' => $as_stockid,
	);
	$deleted = $database->delete( 'as_stock', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=stock_all");	
	}
}

?>