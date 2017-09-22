<?php

	  
function group_all() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "All  Students"; 
	require( AS_INC . "as_group_all.php" );
}

function group_new() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Newgroup"; 
	
	if ( isset( $_POST['SaveItem'] ) ) {
		as_register_beneficiary();
		header( "Location: index.php?action=group_new");						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		as_register_beneficiary();
		header( "Location: index.php?action=group_all");						
	}  else {
		require( AS_INC . "as_group_new.php" );
	}
}

function group_view() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Viewgroup"; 
	$as_groupid = isset( $_GET['as_groupid'] ) ? $_GET['as_groupid'] : "";
	
	$as_db_query = "SELECT * FROM as_group WHERE groupid = '$as_groupid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $groupid, $user_name) = $database->get_row( $as_db_query );
		$results['group'] = $groupid;
	} else  {
		return false;
		header( "Location: index.php?action=group_all");	
	}
	
	if ( isset( $_POST['PrescriptionNow'] ) ) {
		as_add_new_group();
		header( "Location: index.php?action=group_all");				
	}  else {
		require( AS_INC . "as_group_view.php" );
	}	
	
}

?>