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
	
	if ( isset( $_POST['AddClass'] ) ) {
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
	  
function marks_all() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Mark";  
	require( AS_INC . "as_marks_all.php" );
}

function marks_new() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "marks_new"; 
	
	if ( isset( $_POST['AddMark'] ) ) {
		as_add_new_mark();
		header( "Location: index.php?action=marks_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_add_new_mark();
		header( "Location: index.php?action=marks_all");						
	}  else {
		require( AS_INC . "as_marks_new.php" );
	}	
	
}

function marks_view() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "marks_view"; 
	$as_marksid = isset( $_GET['as_marksid'] ) ? $_GET['as_marksid'] : "";
	
	$as_db_query = "SELECT * FROM as_mark WHERE marksid = '$as_marksid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $marksid, $marks_term) = $database->get_row( $as_db_query );
		$results['mark'] = $marksid;
	} else  {
		return false;
		header( "Location: index.php?action=mark");	
	}
	
	if ( isset( $_POST['SaveMark'] ) ) {
		as_edit_mark($as_marksid);
		header( "Location: index.php?action=marks_all");
	}  else {
		require( AS_INC . "as_marks_view.php" );
	}
}

function subject_all() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Subject";  
	require( AS_INC . "as_subject_all.php" );
}

function subject_new() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "subject_new"; 
	
	if ( isset( $_POST['AddSubject'] ) ) {
		as_add_new_subject();
		header( "Location: index.php?action=subject_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_add_new_subject();
		header( "Location: index.php?action=subject_all");						
	}  else {
		require( AS_INC . "as_subject_new.php" );
	}
}

function subject_view() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "subject_view"; 
	$as_subjectid = isset( $_GET['as_subjectid'] ) ? $_GET['as_subjectid'] : "";
	
	$as_db_query = "SELECT * FROM as_subject WHERE subjectid = '$as_subjectid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $subjectid, $subject_term) = $database->get_row( $as_db_query );
		$results['subject'] = $subjectid;
	} else  {
		return false;
		header( "Location: index.php?action=subject");	
	}
	
	if ( isset( $_POST['SaveSubject'] ) ) {
		as_edit_subject($as_subjectid);
		header( "Location: index.php?action=subject_all");				
	}  else {
		require( AS_INC . "as_subject_view.php" );
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
	
	if ( isset( $_POST['AddStudent'] ) ) {
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
		list( $studentid, $teacher_name) = $database->get_row( $as_db_query );
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

function teacher_delete() {
	$as_teacherid = isset( $_GET['as_teacherid'] ) ? $_GET['as_teacherid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_teacher WHERE teacherid = '$as_teacherid'";
	$delete = array(
		'teacherid' => $as_teacherid,
	);
	$deleted = $database->delete( 'as_teacher', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=teacher_all");	
	}
}

function teacher_all() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Teachers";  
	require( AS_INC . "as_teacher_all.php" );
}

function teacher_new() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Newteacher"; 
	
	if ( isset( $_POST['AddTeacher'] ) ) {
		as_add_new_teacher();
		header( "Location: index.php?action=teacher_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_add_new_teacher();
		header( "Location: index.php?action=teacher_all");						
	}  else {
		require( AS_INC . "as_teacher_new.php" );
	}	
	
}
function teacher_view() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Viewteacher"; 
	$as_teacherid = isset( $_GET['as_teacherid'] ) ? $_GET['as_teacherid'] : "";
	
	$as_db_query = "SELECT * FROM as_teacher WHERE teacherid = '$as_teacherid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $teacherid, $teacher_name) = $database->get_row( $as_db_query );
		$results['teacher'] = $teacherid;
	} else  {
		return false;
		header( "Location: index.php?action=teacher_all");	
	}
	
	require( AS_INC . "as_viewteacher.php" );
		
}

?>