<?php

	  
function exam_all() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "All  Students"; 
	require( AS_INC . "as_exam_all.php" );
}

function exam_new() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Newexam"; 
	
	if ( isset( $_POST['SaveItem'] ) ) {
		as_register_student();
		header( "Location: index.php?action=exam_new");						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		as_register_student();
		header( "Location: index.php?action=exam_all");						
	}  else {
		require( AS_INC . "as_exam_new.php" );
	}
}

function exam_view() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Viewexam"; 
	$as_examid = isset( $_GET['as_examid'] ) ? $_GET['as_examid'] : "";
	
	$as_db_query = "SELECT * FROM as_exam WHERE examid = '$as_examid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $examid, $user_name) = $database->get_row( $as_db_query );
		$results['exam'] = $examid;
	} else  {
		return false;
		header( "Location: index.php?action=exam_all");	
	}
	
	if ( isset( $_POST['PrescriptionNow'] ) ) {
		as_add_new_exam();
		header( "Location: index.php?action=exam_all");				
	}  else {
		require( AS_INC . "as_exam_view.php" );
	}	
	
}

?>