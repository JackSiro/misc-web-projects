<?php

	  
function field_all() {
	$results = array();
	$results['pageTitle'] = "Field";
	$results['pageAction'] = "All Cereal Items"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$js_search = $_POST['js_search'];
		$js_catid = $_POST['js_catid'];
		
		header( "Location: index.php?action=js_search&&js_search=".$js_search."&&js_catid=".$js_catid);
								
	}  else {	
		require( JS_INC . "js_field_all.php" );
	}
}

function field_search() {
	$results = array();
	$results['pageTitle'] = "Field";
	$results['pageAction'] = "Search"; 
	$results['search'] = isset( $_GET['js_fieldid'] ) ? $_GET['js_fieldid'] : "";
	$results['searchcat'] = isset( $_GET['js_catid'] ) ? $_GET['js_catid'] : "";
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$js_search = $_POST['js_search'];
		$js_catid = $_POST['js_catid'];
		
		header( "Location: index.php?action=js_search&&js_search=".$js_search."&&js_catid=".$js_catid);
														
	}  else {	
		require( JS_INC . "js_search.php" );
	}
}
function field_new() {
	$results = array();
	$results['pageTitle'] = "Field";
	$results['pageAction'] = "Newfield"; 
	
	if ( isset( $_POST['AddItem'] ) ) {
		js_add_new_field();
		header( "Location: index.php?action=field_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		js_add_new_field();
		header( "Location: index.php?action=field_all");						
	}  else {
		require( JS_INC . "js_field_new.php" );
	}	
	
}

function field_view() {
	$results = array();
	$results['pageTitle'] = "Field";
	$results['pageAction'] = "Viewfield"; 
	$js_fieldid = isset( $_GET['js_fieldid'] ) ? $_GET['js_fieldid'] : "";
	
	$js_db_query = "SELECT * FROM js_field WHERE fieldid = '$js_fieldid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $fieldid, $user_name) = $database->get_row( $js_db_query );
		$results['field'] = $fieldid;
	} else  {
		return false;
		header( "Location: index.php?action=field_all");	
	}
	
	if ( isset( $_POST['OrderNow'] ) ) {
		js_add_new_field();
		header( "Location: index.php?action=field_all");				
	}  else {
		require( JS_INC . "js_field_view.php" );
	}	
	
}

function field_edit() {
	$results = array();
	$results['pageTitle'] = "Field";
	$results['pageAction'] = "Editfield"; 
	$js_fieldid = isset( $_GET['js_fieldid'] ) ? $_GET['js_fieldid'] : "";
	
	$js_db_query = "SELECT * FROM js_field WHERE fieldid = '$js_fieldid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $fieldid) = $database->get_row( $js_db_query );
		$results['field'] = $fieldid;
	} else  {
		return false;
		header( "Location: index.php?action=elibrary");	
	}
	
	if ( isset( $_POST['SaveItem'] ) ) {
		js_edit_field($js_fieldid);
		header( "Location: index.php?action=field_edit&&js_fieldid=".$js_fieldid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		js_edit_field($js_fieldid);
		header( "Location: index.php?action=field_view&&js_fieldid=".$js_fieldid);					
	}  else {
		require( JS_INC . "js_field_edit.php" );
	}	
	
}

function field_delete() {
	$js_fieldid = isset( $_GET['js_fieldid'] ) ? $_GET['js_fieldid'] : "";
	
	$database = new Js_Dbconn();
	$js_db_query = "DELETE * FROM js_field WHERE fieldid = '$js_fieldid'";
	$delete = array(
		'fieldid' => $js_fieldid,
	);
	$deleted = $database->delete( 'js_field', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=field_all");	
	}
}

?>