<?php
  
function fee_all() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "All  Items"; 
	require( AS_INC . "as_fee_all.php" );
}

function fee_new() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "fee_new"; 
	
	if ( isset( $_POST['SaveItem'] ) ) {
		as_add_student_fee();
		header( "Location: index.php?action=fee_new");						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		as_add_student_fee();
		header( "Location: index.php?action=fee_all");						
	}  else {
		require( AS_INC . "as_fee_new.php" );
	}	
}

function fee_view() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "Viewfee"; 
	$as_feeid = isset( $_GET['as_feeid'] ) ? $_GET['as_feeid'] : "";
	
	$as_db_query = "SELECT * FROM as_fee WHERE feeid = '$as_feeid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $feeid, $user_name) = $database->get_row( $as_db_query );
		$results['fee'] = $feeid;
	} else  {
		return false;
		header( "Location: index.php?action=fee_all");	
	}
	
	if ( isset( $_POST['PrescriptionNow'] ) ) {
		as_add_new_exam();
		header( "Location: index.php?action=exam_all");				
	}  else {
		require( AS_INC . "as_fee_view.php" );
	}	
	
}

function fee_edit() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "Editfee"; 
	$as_feeid = isset( $_GET['as_feeid'] ) ? $_GET['as_feeid'] : "";
	
	$as_db_query = "SELECT * FROM as_fee WHERE feeid = '$as_feeid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $feeid) = $database->get_row( $as_db_query );
		$results['fee'] = $feeid;
	} else  {
		return false;
		header( "Location: index.php?action=fee_all");	
	}
	
	if ( isset( $_POST['SaveItem'] ) ) {
		as_edit_fee($as_feeid);
		header( "Location: index.php?action=fee_edit&&as_feeid=".$as_feeid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		as_edit_fee($as_feeid);
		header( "Location: index.php?action=fee_all");					
	}  else {
		require( AS_INC . "as_fee_edit.php" );
	}	
	
}

function fee_delete() {
	$as_feeid = isset( $_GET['as_feeid'] ) ? $_GET['as_feeid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_fee WHERE feeid = '$as_feeid'";
	$delete = array(
		'feeid' => $as_feeid,
	);
	$deleted = $database->delete( 'as_fee', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=fee_all");	
	}
}

?>