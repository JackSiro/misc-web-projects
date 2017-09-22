<?php
function type_all() {
	$results = array();
	$results['pageTitle'] = "Nafaka Electronicss Suppliers";
	$results['pageAction'] = "Electronics Types";  
	require( JS_INC . "js_type_all.php" );
}

function type_new() {
	$results = array();
	$results['pageTitle'] = "Nafaka Electronicss Suppliers";
	$results['pageAction'] = "Add a New Electronics Type"; 
	
	if ( isset( $_POST['AddType'] ) ) {
		js_add_new_type();
		header( "Location: index.php?action=type_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		js_add_new_type();
		header( "Location: index.php?action=type_all");						
	}  else {
		require( JS_INC . "js_type_new.php" );
	}	
	
}

function type_view() {
	$results = array();
	$results['pageTitle'] = "Nafaka Electronicss Suppliers";
	$results['pageAction'] = "Viewcat"; 
	$js_typeid = isset( $_GET['js_typeid'] ) ? $_GET['js_typeid'] : "";
	
	$js_db_query = "SELECT * FROM js_type WHERE typeid = '$js_typeid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $catid, $cat_slug) = $database->get_row( $js_db_query );
		$results['type'] = $catid;
	} else  {
		return false;
		header( "Location: index.php?action=type_all");	
	}
	
	if ( isset( $_POST['SaveCart'] ) ) {
		js_edit_type($js_catid);
		header( "Location: index.php?action=viewcat&&js_catid=".$js_catid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		js_edit_type($js_catid);
		header( "Location: index.php?action=type_all");						
	}  else {
		require( JS_INC . "js_type_view.php" );
	}	
	
}


function type_delete() {
	$js_typeid = isset( $_GET['js_typeid'] ) ? $_GET['js_typeid'] : "";
	
	$database = new Js_Dbconn();
	$js_db_query = "DELETE * FROM js_type WHERE typeid = '$js_typeid'";
	$delete = array(
		'typeid' => $js_typeid,
	);
	$deleted = $database->delete( 'js_type', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=type_all");	
	}
}

?>