<?php

	  
function order_all() {
	$results = array();
	$results['pageTitle'] = "Nafaka Stationery Orders";
	$results['pageAction'] = "All Stationery Items"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$js_search = $_POST['js_search'];
		$js_catid = $_POST['js_catid'];
		
		header( "Location: index.php?action=js_search&&js_search=".$js_search."&&js_catid=".$js_catid);
								
	}  else {	
		require( JS_INC . "js_order_all.php" );
	}
}

function order_search() {
	$results = array();
	$results['pageTitle'] = "Nafaka Stationery Orders";
	$results['pageAction'] = "Search"; 
	$results['search'] = isset( $_GET['js_orderid'] ) ? $_GET['js_orderid'] : "";
	$results['searchcat'] = isset( $_GET['js_catid'] ) ? $_GET['js_catid'] : "";
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$js_search = $_POST['js_search'];
		$js_catid = $_POST['js_catid'];
		
		header( "Location: index.php?action=js_search&&js_search=".$js_search."&&js_catid=".$js_catid);
														
	}  else {	
		require( JS_INC . "js_search.php" );
	}
}
function order_new() {
	$results = array();
	$results['pageTitle'] = "Nafaka Stationery Orders";
	$results['pageAction'] = "Neworder"; 
	
	if ( isset( $_POST['AddItem'] ) ) {
		js_add_new_order();
		header( "Location: index.php?action=order_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		js_add_new_order();
		header( "Location: index.php?action=order_all");						
	}  else {
		require( JS_INC . "js_order_new.php" );
	}	
	
}

function order_view() {
	$results = array();
	$results['pageTitle'] = "Nafaka Stationery Orders";
	$results['pageAction'] = "Vieworder"; 
	$js_orderid = isset( $_GET['js_orderid'] ) ? $_GET['js_orderid'] : "";
	
	$js_db_query = "SELECT * FROM js_order WHERE orderid = '$js_orderid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $orderid, $user_name) = $database->get_row( $js_db_query );
		$results['order'] = $orderid;
	} else  {
		return false;
		header( "Location: index.php?action=order_all");	
	}
	
	if ( isset( $_POST['OrderNow'] ) ) {
		js_add_new_order();
		header( "Location: index.php?action=order_all");				
	}  else {
		require( JS_INC . "js_order_view.php" );
	}	
	
}

function order_edit() {
	$results = array();
	$results['pageTitle'] = "Nafaka Stationery Orders";
	$results['pageAction'] = "Editorder"; 
	$js_orderid = isset( $_GET['js_orderid'] ) ? $_GET['js_orderid'] : "";
	
	$js_db_query = "SELECT * FROM js_order WHERE orderid = '$js_orderid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $orderid) = $database->get_row( $js_db_query );
		$results['order'] = $orderid;
	} else  {
		return false;
		header( "Location: index.php?action=elibrary");	
	}
	
	if ( isset( $_POST['SaveItem'] ) ) {
		js_edit_order($js_orderid);
		header( "Location: index.php?action=order_edit&&js_orderid=".$js_orderid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		js_edit_order($js_orderid);
		header( "Location: index.php?action=order_view&&js_orderid=".$js_orderid);					
	}  else {
		require( JS_INC . "js_order_edit.php" );
	}	
	
}

function order_delete() {
	$js_orderid = isset( $_GET['js_orderid'] ) ? $_GET['js_orderid'] : "";
	
	$database = new Js_Dbconn();
	$js_db_query = "DELETE * FROM js_order WHERE orderid = '$js_orderid'";
	$delete = array(
		'orderid' => $js_orderid,
	);
	$deleted = $database->delete( 'js_order', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=order_all");	
	}
}

?>