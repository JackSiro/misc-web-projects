<?php
function drug_all() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = " Drugs";  
	require( AS_INC . "as_drug_all.php" );
}

function drug_new() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "Add a New  Drug"; 
	
	if ( isset( $_POST['AddItem'] ) ) {
		as_add_new_drug();
		header( "Location: index.php?action=drug_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_add_new_drug();
		 
		header( "Location: index.php?action=drug_all");						
	}  else {
		require( AS_INC . "as_drug_new.php" );
	}	
	
}

function drug_view() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "Viewcategory"; 
	$as_drugid = isset( $_GET['as_drugid'] ) ? $_GET['as_drugid'] : "";
	
	$as_db_query = "SELECT * FROM as_drug WHERE drugid = '$as_drugid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $drugid, $drug_slug) = $database->get_row( $as_db_query );
		$results['drugitem'] = $drugid;
	} else  {
		return false;
		header( "Location: index.php?action=drug_all");	
	}
	
	if ( isset( $_POST['SaveItem'] ) ) {
		as_edit_drug($as_drugid);
		header( "Location: index.php?action=drug_view&&as_drugid=".$as_drugid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		as_edit_drug($as_drugid);
		header( "Location: index.php?action=drug_all");						
	}  else {
		require( AS_INC . "as_drug_view.php" );
	}	
	
}


function drug_delete() {
	$as_drugid = isset( $_GET['as_drugid'] ) ? $_GET['as_drugid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_drug WHERE drugid = '$as_drugid'";
	$delete = array(
		'drugid' => $as_drugid,
	);
	$deleted = $database->delete( 'as_drug', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=drug_all");	
	}
}

?>