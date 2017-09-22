<?php

	  
function item_all() {
	$results = array();
	$results['pageTitle'] = "Katito Polytechic";
	$results['pageAction'] = "All Stationery Items"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$js_search = $_POST['js_search'];
		$js_catid = $_POST['js_catid'];
		
		header( "Location: index.php?action=js_search&&js_search=".$js_search."&&js_catid=".$js_catid);
								
	}  else {	
		require( JS_INC . "js_item_all.php" );
	}
}

function item_search() {
	$results = array();
	$results['pageTitle'] = "Katito Polytechic";
	$results['pageAction'] = "Search"; 
	$results['search'] = isset( $_GET['js_itemid'] ) ? $_GET['js_itemid'] : "";
	$results['searchcat'] = isset( $_GET['js_catid'] ) ? $_GET['js_catid'] : "";
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$js_search = $_POST['js_search'];
		$js_catid = $_POST['js_catid'];
		
		header( "Location: index.php?action=js_search&&js_search=".$js_search."&&js_catid=".$js_catid);
														
	}  else {	
		require( JS_INC . "js_search.php" );
	}
}
function item_new() {
	$results = array();
	$results['pageTitle'] = "Katito Polytechic";
	$results['pageAction'] = "Newitem"; 
	
	if ( isset( $_POST['AddItem'] ) ) {
		js_add_new_item();
		header( "Location: index.php?action=item_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		js_add_new_item();
		header( "Location: index.php?action=item_all");						
	}  else {
		require( JS_INC . "js_item_new.php" );
	}	
	
}

function item_view() {
	$results = array();
	$results['pageTitle'] = "Katito Polytechic";
	$results['pageAction'] = "Viewitem"; 
	$js_itemid = isset( $_GET['js_itemid'] ) ? $_GET['js_itemid'] : "";
	
	$js_db_query = "SELECT * FROM js_item WHERE itemid = '$js_itemid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $itemid, $user_name) = $database->get_row( $js_db_query );
		$results['item'] = $itemid;
	} else  {
		return false;
		header( "Location: index.php?action=item_all");	
	}
	
	if ( isset( $_POST['OrderNow'] ) ) {
		js_add_new_order();
		header( "Location: index.php?action=order_all");				
	}  else {
		require( JS_INC . "js_item_view.php" );
	}	
	
}

function item_edit() {
	$results = array();
	$results['pageTitle'] = "Katito Polytechic";
	$results['pageAction'] = "Edititem"; 
	$js_itemid = isset( $_GET['js_itemid'] ) ? $_GET['js_itemid'] : "";
	
	$js_db_query = "SELECT * FROM js_item WHERE itemid = '$js_itemid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $itemid) = $database->get_row( $js_db_query );
		$results['item'] = $itemid;
	} else  {
		return false;
		header( "Location: index.php?action=elibrary");	
	}
	
	if ( isset( $_POST['SaveItem'] ) ) {
		js_edit_item($js_itemid);
		header( "Location: index.php?action=item_edit&&js_itemid=".$js_itemid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		js_edit_item($js_itemid);
		header( "Location: index.php?action=item_view&&js_itemid=".$js_itemid);					
	}  else {
		require( JS_INC . "js_item_edit.php" );
	}	
	
}

function item_delete() {
	$js_itemid = isset( $_GET['js_itemid'] ) ? $_GET['js_itemid'] : "";
	
	$database = new Js_Dbconn();
	$js_db_query = "DELETE * FROM js_item WHERE itemid = '$js_itemid'";
	$delete = array(
		'itemid' => $js_itemid,
	);
	$deleted = $database->delete( 'js_item', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=item_all");	
	}
}

?>