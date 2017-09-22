<?php

	  
function order_all() {
	$results = array();
	$results['pageTitle'] = "Mazao Cereals Orders";
	$results['pageAction'] = "All Cereal Items"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$as_search = $_POST['as_search'];
		$as_catid = $_POST['as_catid'];
		
		header( "Location: index.php?action=as_search&&as_search=".$as_search."&&as_catid=".$as_catid);
								
	}  else {	
		require( AS_INC . "as_order_all.php" );
	}
}

function order_search() {
	$results = array();
	$results['pageTitle'] = "Mazao Cereals Orders";
	$results['pageAction'] = "Search"; 
	$results['search'] = isset( $_GET['as_orderid'] ) ? $_GET['as_orderid'] : "";
	$results['searchcat'] = isset( $_GET['as_catid'] ) ? $_GET['as_catid'] : "";
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$as_search = $_POST['as_search'];
		$as_catid = $_POST['as_catid'];
		
		header( "Location: index.php?action=as_search&&as_search=".$as_search."&&as_catid=".$as_catid);
														
	}  else {	
		require( AS_INC . "as_search.php" );
	}
}
function order_new() {
	$results = array();
	$results['pageTitle'] = "Mazao Cereals Orders";
	$results['pageAction'] = "Neworder"; 
	
	if ( isset( $_POST['AddItem'] ) ) {
		as_add_new_order();
		header( "Location: index.php?action=order_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_add_new_order();
		header( "Location: index.php?action=order_all");						
	}  else {
		require( AS_INC . "as_order_new.php" );
	}	
	
}

function order_view() {
	$results = array();
	$results['pageTitle'] = "Mazao Cereals Orders";
	$results['pageAction'] = "Vieworder"; 
	$as_orderid = isset( $_GET['as_orderid'] ) ? $_GET['as_orderid'] : "";
	
	$as_db_query = "SELECT * FROM as_order WHERE orderid = '$as_orderid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $orderid, $user_name) = $database->get_row( $as_db_query );
		$results['order'] = $orderid;
	} else  {
		return false;
		header( "Location: index.php?action=order_all");	
	}
	
	if ( isset( $_POST['OrderNow'] ) ) {
		as_add_new_order();
		header( "Location: index.php?action=order_all");				
	}  else {
		require( AS_INC . "as_order_view.php" );
	}	
	
}

function order_edit() {
	$results = array();
	$results['pageTitle'] = "Mazao Cereals Orders";
	$results['pageAction'] = "Editorder"; 
	$as_orderid = isset( $_GET['as_orderid'] ) ? $_GET['as_orderid'] : "";
	
	$as_db_query = "SELECT * FROM as_order WHERE orderid = '$as_orderid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $orderid) = $database->get_row( $as_db_query );
		$results['order'] = $orderid;
	} else  {
		return false;
		header( "Location: index.php?action=elibrary");	
	}
	
	if ( isset( $_POST['SaveItem'] ) ) {
		as_edit_order($as_orderid);
		header( "Location: index.php?action=order_edit&&as_orderid=".$as_orderid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		as_edit_order($as_orderid);
		header( "Location: index.php?action=order_view&&as_orderid=".$as_orderid);					
	}  else {
		require( AS_INC . "as_order_edit.php" );
	}	
	
}

function order_delete() {
	$as_orderid = isset( $_GET['as_orderid'] ) ? $_GET['as_orderid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_order WHERE orderid = '$as_orderid'";
	$delete = array(
		'orderid' => $as_orderid,
	);
	$deleted = $database->delete( 'as_order', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=order_all");	
	}
}

?>