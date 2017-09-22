<?php
function beneficiary_all() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = " Students";  
	require( AS_INC . "as_beneficiary_all.php" );
}

function beneficiary_new() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "Add a New  Student"; 
	
	if ( isset( $_POST['AddItem'] ) ) {
		as_add_new_beneficiary();
		header( "Location: index.php?action=beneficiary_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_add_new_beneficiary();
		 
		header( "Location: index.php?action=beneficiary_all");						
	}  else {
		require( AS_INC . "as_beneficiary_new.php" );
	}	
	
}

function beneficiary_view() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "Viewcategory"; 
	$as_beneficiaryid = isset( $_GET['as_beneficiaryid'] ) ? $_GET['as_beneficiaryid'] : "";
	
	$as_db_query = "SELECT * FROM as_beneficiary WHERE beneficiaryid = '$as_beneficiaryid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $beneficiaryid, $beneficiary_code) = $database->get_row( $as_db_query );
		$results['category'] = $beneficiaryid;
	} else  {
		return false;
		header( "Location: index.php?action=beneficiary_all");	
	}
	
	if ( isset( $_POST['SaveItem'] ) ) {
		as_edit_beneficiary($as_beneficiaryid);
		header( "Location: index.php?action=beneficiary_view&&as_beneficiaryid=".$as_beneficiaryid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		as_edit_beneficiary($as_beneficiaryid);
		header( "Location: index.php?action=beneficiary_all");						
	}  else {
		require( AS_INC . "as_beneficiary_view.php" );
	}	
	
}


function beneficiary_delete() {
	$as_beneficiaryid = isset( $_GET['as_beneficiaryid'] ) ? $_GET['as_beneficiaryid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_beneficiary WHERE beneficiaryid = '$as_beneficiaryid'";
	$delete = array(
		'beneficiaryid' => $as_beneficiaryid,
	);
	$deleted = $database->delete( 'as_beneficiary', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=beneficiary_all");	
	}
}

?>