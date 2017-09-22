<?php

	  
function item_all() {
	$results = array();
	$results['pageTitle'] = "Mazao Cereals Suppliers";
	$results['pageAction'] = "All Cereal Items"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$as_search = $_POST['as_search'];
		$as_catid = $_POST['as_catid'];
		
		header( "Location: index.php?action=as_search&&as_search=".$as_search."&&as_catid=".$as_catid);
								
	}  else {	
		require( AS_INC . "as_item_all.php" );
	}
}

function item_search() {
	$results = array();
	$results['pageTitle'] = "Mazao Cereals Suppliers";
	$results['pageAction'] = "Search"; 
	$results['search'] = isset( $_GET['as_itemid'] ) ? $_GET['as_itemid'] : "";
	$results['searchcat'] = isset( $_GET['as_catid'] ) ? $_GET['as_catid'] : "";
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$as_search = $_POST['as_search'];
		$as_catid = $_POST['as_catid'];
		
		header( "Location: index.php?action=as_search&&as_search=".$as_search."&&as_catid=".$as_catid);
														
	}  else {	
		require( AS_INC . "as_search.php" );
	}
}
function item_new() {
	$results = array();
	$results['pageTitle'] = "Mazao Cereals Suppliers";
	$results['pageAction'] = "Newitem"; 
	
	if ( isset( $_POST['AddItem'] ) ) {
		as_add_new_item();
		header( "Location: index.php?action=item_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_add_new_item();
		header( "Location: index.php?action=item_all");						
	}  else {
		require( AS_INC . "as_item_new.php" );
	}	
	
}

function item_view() {
	$results = array();
	$results['pageTitle'] = "Mazao Cereals Suppliers";
	$results['pageAction'] = "Viewitem"; 
	$as_itemid = isset( $_GET['as_itemid'] ) ? $_GET['as_itemid'] : "";
	
	$as_db_query = "SELECT * FROM as_item WHERE itemid = '$as_itemid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $itemid, $user_name) = $database->get_row( $as_db_query );
		$results['item'] = $itemid;
	} else  {
		return false;
		header( "Location: index.php?action=item_all");	
	}
	
	if ( isset( $_POST['OrderNow'] ) ) {
		as_add_new_order();
		header( "Location: index.php?action=order_all");				
	}  else {
		require( AS_INC . "as_item_view.php" );
	}	
	
}

function item_edit() {
	$results = array();
	$results['pageTitle'] = "Mazao Cereals Suppliers";
	$results['pageAction'] = "Edititem"; 
	$as_itemid = isset( $_GET['as_itemid'] ) ? $_GET['as_itemid'] : "";
	
	$as_db_query = "SELECT * FROM as_item WHERE itemid = '$as_itemid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $itemid) = $database->get_row( $as_db_query );
		$results['item'] = $itemid;
	} else  {
		return false;
		header( "Location: index.php?action=elibrary");	
	}
	
	if ( isset( $_POST['SaveItem'] ) ) {
		as_edit_item($as_itemid);
		header( "Location: index.php?action=item_edit&&as_itemid=".$as_itemid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		as_edit_item($as_itemid);
		header( "Location: index.php?action=item_view&&as_itemid=".$as_itemid);					
	}  else {
		require( AS_INC . "as_item_edit.php" );
	}	
	
}

function item_delete() {
	$as_itemid = isset( $_GET['as_itemid'] ) ? $_GET['as_itemid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_item WHERE itemid = '$as_itemid'";
	$delete = array(
		'itemid' => $as_itemid,
	);
	$deleted = $database->delete( 'as_item', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=item_all");	
	}
}

?>