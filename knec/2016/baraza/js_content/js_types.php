<?php
function type_all() {
	$results = array();
	$results['pageTitle'] = "Nafaka Cereals Suppliers";
	$results['pageAction'] = "Cereal Types";  
	require( JS_INC . "js_type_all.php" );
}

function type_new() {
	$results = array();
	$results['pageTitle'] = "Nafaka Cereals Suppliers";
	$results['pageAction'] = "Add a New Cereal Type"; 
	
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
	$results['pageTitle'] = "Nafaka Cereals Suppliers";
	$results['pageAction'] = "Viewcat"; 
	$js_catid = isset( $_GET['js_catid'] ) ? $_GET['js_catid'] : "";
	
	$js_db_query = "SELECT * FROM js_type WHERE catid = '$js_catid'";
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

?>