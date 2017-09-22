<?php
	
function item_all() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "items";  
	require( AS_INC . "as_item_all.php" );
}

function item_new() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Newitem"; 
	
	if ( isset( $_POST['Additem'] ) ) {
		as_new_item();
		header( "Location: index.php?action=item_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_new_item();
		header( "Location: index.php?action=item_all");						
	}  else {
		require( AS_INC . "as_item_new.php" );
	}	
	
}
function item_view() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Viewitem"; 
	$as_itemid = isset( $_GET['as_itemid'] ) ? $_GET['as_itemid'] : "";
	
	$as_db_query = "SELECT * FROM as_item WHERE itemid = '$as_itemid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $itemid, $item_name) = $database->get_row( $as_db_query );
		$results['item'] = $itemid;
	} else  {
		return false;
		header( "Location: index.php?action=item_all");	
	}
		
	if ( isset( $_POST['UpdateItem'] ) ) {
		as_update_item($as_itemid);
		header( "Location: index.php?action=item_all");				
	} else if ( isset( $_POST['DeleteItem'] ) ) {
		as_delete_item($as_itemid);
		header( "Location: index.php?action=item_all");				
	}  else {
		require( AS_INC . "as_item_view.php" );
	}
}

function item_profile() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Profile"; 
	$as_itemname = $_SESSION['itemname_loggedin'];
	
	$as_db_query = "SELECT * FROM as_item WHERE item_name = '$as_itemname'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $itemid, $item_name) = $database->get_row( $as_db_query );
		$results['item'] = $itemid;
	} else  {
		return false;
		header( "Location: index.php?action=items");	
	}
	
	require( AS_INC . "as_viewitem.php" );
		
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