<?php
function type_all() {
	$results = array();
	$results['pageTitle'] = "Mazao Cereals Suppliers";
	$results['pageAction'] = "Cereal Types";  
	require( AS_INC . "as_type_all.php" );
}

function type_new() {
	$results = array();
	$results['pageTitle'] = "Mazao Cereals Suppliers";
	$results['pageAction'] = "Add a New Cereal Type"; 
	
	if ( isset( $_POST['AddType'] ) ) {
		as_add_new_type();
		header( "Location: index.php?action=type_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_add_new_type();
		header( "Location: index.php?action=type_all");						
	}  else {
		require( AS_INC . "as_type_new.php" );
	}	
	
}

function type_view() {
	$results = array();
	$results['pageTitle'] = "Mazao Cereals Suppliers";
	$results['pageAction'] = "Viewcat"; 
	$as_typeid = isset( $_GET['as_typeid'] ) ? $_GET['as_typeid'] : "";
	
	$as_db_query = "SELECT * FROM as_type WHERE typeid = '$as_typeid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $catid, $cat_slug) = $database->get_row( $as_db_query );
		$results['type'] = $catid;
	} else  {
		return false;
		header( "Location: index.php?action=type_all");	
	}
	
	if ( isset( $_POST['SaveCart'] ) ) {
		as_edit_type($as_catid);
		header( "Location: index.php?action=viewcat&&as_catid=".$as_catid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		as_edit_type($as_catid);
		header( "Location: index.php?action=type_all");						
	}  else {
		require( AS_INC . "as_type_view.php" );
	}	
	
}


function type_delete() {
	$as_typeid = isset( $_GET['as_typeid'] ) ? $_GET['as_typeid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_type WHERE typeid = '$as_typeid'";
	$delete = array(
		'typeid' => $as_typeid,
	);
	$deleted = $database->delete( 'as_type', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=type_all");	
	}
}

?>