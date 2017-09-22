<?php


function class_all() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Class";  
	require( AS_INC . "as_class_all.php" );
}

function class_new() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "class_new"; 
	
	if ( isset( $_POST['SaveAdd'] ) ) {
		as_add_new_class();
		header( "Location: index.php?action=class_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_add_new_class();
		header( "Location: index.php?action=class_all");						
	}  else {
		require( AS_INC . "as_class_new.php" );
	}	
	
}

function class_view() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "class_view"; 
	$as_classid = isset( $_GET['as_classid'] ) ? $_GET['as_classid'] : "";
	
	$as_db_query = "SELECT * FROM as_class WHERE classid = '$as_classid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $classid, $class_term) = $database->get_row( $as_db_query );
		$results['class'] = $classid;
	} else  {
		return false;
		header( "Location: index.php?action=class");	
	}
	
	if ( isset( $_POST['SaveClass'] ) ) {
		as_edit_class($as_classid);
		header( "Location: index.php?action=class_all");
	}  else {
		require( AS_INC . "as_class_view.php" );
	}
}

function certificate_all() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "certificate";  
	require( AS_INC . "as_certificate_all.php" );
}

function certificate_new() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "certificate_new"; 
	
	if ( isset( $_POST['SaveAdd'] ) ) {
		as_add_new_certificate();
		header( "Location: index.php?action=certificate_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_add_new_certificate();
		header( "Location: index.php?action=certificate_all");						
	}  else {
		require( AS_INC . "as_certificate_new.php" );
	}
}

function certificate_view() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "certificate_view"; 
	$as_certificateid = isset( $_GET['as_certificateid'] ) ? $_GET['as_certificateid'] : "";
	
	$as_db_query = "SELECT * FROM as_certificate WHERE certificateid = '$as_certificateid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $certificateid, $certificate_term) = $database->get_row( $as_db_query );
		$results['certificate'] = $certificateid;
	} else  {
		return false;
		header( "Location: index.php?action=certificate");	
	}
	
	if ( isset( $_POST['SaveItem'] ) ) {
		as_edit_certificate($as_certificateid);
		header( "Location: index.php?action=certificate_all");				
	}  else {
		require( AS_INC . "as_certificate_view.php" );
	}	
	
}
	
function student_all() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Students"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$as_search = $_POST['as_search'];
		$as_classid = $_POST['as_classid'];
		
		header( "Location: index.php?action=search&&as_search=".$as_search."&&as_classid=".$as_classid);
								
	}  else {	
		require( AS_INC . "as_student_all.php" );
	}
}

function student_new() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "student_new"; 
	
	if ( isset( $_POST['SaveAdd'] ) ) {
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
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Viewstudent"; 
	$as_studentid = isset( $_GET['as_studentid'] ) ? $_GET['as_studentid'] : "";
	
	$as_db_query = "SELECT * FROM as_student WHERE studentid = '$as_studentid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $studentid, $admin_name) = $database->get_row( $as_db_query );
		$results['student'] = $studentid;
	} else  {
		return false;
		header( "Location: index.php?action=student_all");	
	}
	
	require( AS_INC . "as_student_view.php" );
	
}

function student_edit() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Editstudent"; 
	$as_studentid = isset( $_GET['as_studentid'] ) ? $_GET['as_studentid'] : "";
	
	$as_db_query = "SELECT * FROM as_student WHERE studentid = '$as_studentid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $studentid) = $database->get_row( $as_db_query );
		$results['student'] = $studentid;
	} else  {
		return false;
		header( "Location: index.php?action=student_all");	
	}
	
	if ( isset( $_POST['SaveStudent'] ) ) {
		as_edit_student($as_studentid);
		header( "Location: index.php?action=student_edit&&as_studentid=".$as_studentid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		as_edit_student($as_studentid);
		header( "Location: index.php?action=student_view&&as_studentid=".$as_studentid);					
	}  else {
		require( AS_INC . "as_student_edit.php" );
	}	
	
}

function admin_delete() {
	$as_adminid = isset( $_GET['as_adminid'] ) ? $_GET['as_adminid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_admin WHERE adminid = '$as_adminid'";
	$delete = array(
		'adminid' => $as_adminid,
	);
	$deleted = $database->delete( 'as_admin', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=admin_all");	
	}
}

function admin_all() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Teachers";  
	require( AS_INC . "as_admin_all.php" );
}

function admin_new() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Newadmin"; 
	
	if ( isset( $_POST['AddTeacher'] ) ) {
		as_add_new_admin();
		header( "Location: index.php?action=admin_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_add_new_admin();
		header( "Location: index.php?action=admin_all");						
	}  else {
		require( AS_INC . "as_admin_new.php" );
	}	
	
}
function admin_view() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Viewadmin"; 
	$as_adminid = isset( $_GET['as_adminid'] ) ? $_GET['as_adminid'] : "";
	
	$as_db_query = "SELECT * FROM as_admin WHERE adminid = '$as_adminid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $adminid, $admin_name) = $database->get_row( $as_db_query );
		$results['admin'] = $adminid;
	} else  {
		return false;
		header( "Location: index.php?action=admin_all");	
	}
	
	require( AS_INC . "as_viewadmin.php" );
		
}

?>