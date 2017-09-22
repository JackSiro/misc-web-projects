<?php
function student_all() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = " Students";  
	require( AS_INC . "as_student_all.php" );
}

function student_new() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "Add a New  Student"; 
	
	if ( isset( $_POST['AddItem'] ) ) {
		as_add_new_student();
		header( "Location: index.php?action=student_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_add_new_student();
		 
		header( "Location: index.php?action=student_all");						
	}  else {
		require( AS_INC . "as_student_new.php" );
	}	
	
}

function student_view() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "Viewcategory"; 
	$as_studentid = isset( $_GET['as_studentid'] ) ? $_GET['as_studentid'] : "";
	
	$as_db_query = "SELECT * FROM as_student WHERE studentid = '$as_studentid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $studentid, $student_admno) = $database->get_row( $as_db_query );
		$results['category'] = $studentid;
	} else  {
		return false;
		header( "Location: index.php?action=student_all");	
	}
	
	if ( isset( $_POST['SaveItem'] ) ) {
		as_edit_student($as_studentid);
		header( "Location: index.php?action=student_view&&as_studentid=".$as_studentid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		as_edit_student($as_studentid);
		header( "Location: index.php?action=student_all");						
	}  else {
		require( AS_INC . "as_student_view.php" );
	}	
	
}


function student_delete() {
	$as_studentid = isset( $_GET['as_studentid'] ) ? $_GET['as_studentid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_student WHERE studentid = '$as_studentid'";
	$delete = array(
		'studentid' => $as_studentid,
	);
	$deleted = $database->delete( 'as_student', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=student_all");	
	}
}

?>