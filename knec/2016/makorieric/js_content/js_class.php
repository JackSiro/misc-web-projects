<?php
function class_all() {
	$results = array();
	$results['pageTitle'] = "Item";
	$results['pageAction'] = "Classes";  
	require( JS_INC . "js_class_all.php" );
}

function class_new() {
	$results = array();
	$results['pageTitle'] = "Item";
	$results['pageAction'] = "Add a New Class"; 
	
	if ( isset( $_POST['AddClass'] ) ) {
		js_add_new_class();
		header( "Location: index.php?action=class_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		js_add_new_class();
		header( "Location: index.php?action=class_all");						
	}  else {
		require( JS_INC . "js_class_new.php" );
	}	
	
}

function class_view() {
	$results = array();
	$results['pageTitle'] = "Item";
	$results['pageAction'] = "Viewcat"; 
	$js_catid = isset( $_GET['js_catid'] ) ? $_GET['js_catid'] : "";
	
	$js_db_query = "SELECT * FROM js_class WHERE catid = '$js_catid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $catid, $cat_slug) = $database->get_row( $js_db_query );
		$results['class'] = $catid;
	} else  {
		return false;
		header( "Location: index.php?action=class_all");	
	}
	
	if ( isset( $_POST['SaveCart'] ) ) {
		js_edit_class($js_catid);
		header( "Location: index.php?action=viewcat&&js_catid=".$js_catid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		js_edit_class($js_catid);
		header( "Location: index.php?action=class_all");						
	}  else {
		require( JS_INC . "js_class_view.php" );
	}	
	
}

?>