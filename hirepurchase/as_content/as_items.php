<?php
function item_all() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = " Items";  
	require( AS_INC . "as_item_all.php" );
}

function item_new() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "Add a New  Item"; 
	
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
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "Viewcategory"; 
	$as_itemid = isset( $_GET['as_itemid'] ) ? $_GET['as_itemid'] : "";
	
	$as_db_query = "SELECT * FROM as_item WHERE itemid = '$as_itemid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $itemid, $item_slug) = $database->get_row( $as_db_query );
		$results['category'] = $itemid;
	} else  {
		return false;
		header( "Location: index.php?action=item_all");	
	}
	
	if ( isset( $_POST['SaveItem'] ) ) {
		as_edit_item($as_itemid);
		header( "Location: index.php?action=item_view&&as_itemid=".$as_itemid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		as_edit_item($as_itemid);
		header( "Location: index.php?action=item_all");						
	}  else {
		require( AS_INC . "as_item_view.php" );
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