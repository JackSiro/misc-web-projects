<?php


function salesitem_all() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Class";  
	require( AS_INC . "as_salesitem_all.php" );
}

function salesitem_new() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "salesitem_new"; 
	
	if ( isset( $_POST['AddClass'] ) ) {
		as_add_new_class();
		header( "Location: index.php?action=salesitem_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_add_new_class();
		header( "Location: index.php?action=salesitem_all");						
	}  else {
		require( AS_INC . "as_salesitem_new.php" );
	}	
	
}

function salesitem_view() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "salesitem_view"; 
	$as_salesitemid = isset( $_GET['as_salesitemid'] ) ? $_GET['as_salesitemid'] : "";
	
	$as_db_query = "SELECT * FROM as_salesitem WHERE salesitemid = '$as_salesitemid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $salesitemid, $salesitem_title) = $database->get_row( $as_db_query );
		$results['class'] = $salesitemid;
	} else  {
		return false;
		header( "Location: index.php?action=class");	
	}
	
	if ( isset( $_POST['SaveClass'] ) ) {
		as_edit_class($as_salesitemid);
		header( "Location: index.php?action=salesitem_all");
	}  else {
		require( AS_INC . "as_salesitem_view.php" );
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
	
function customer_all() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Customers"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$as_search = $_POST['as_search'];
		$as_salesitemid = $_POST['as_salesitemid'];
		
		header( "Location: index.php?action=search&&as_search=".$as_search."&&as_salesitemid=".$as_salesitemid);
								
	}  else {	
		require( AS_INC . "as_customer_all.php" );
	}
}

function customer_new() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "customer_new"; 
	
	if ( isset( $_POST['AddCustomer'] ) ) {
		as_add_new_customer();
		header( "Location: index.php?action=customer_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_add_new_customer();
		header( "Location: index.php?action=customer_all");						
	}  else {
		require( AS_INC . "as_customer_new.php" );
	}	
	
}

function customer_view() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Viewcustomer"; 
	$as_customerid = isset( $_GET['as_customerid'] ) ? $_GET['as_customerid'] : "";
	
	$as_db_query = "SELECT * FROM as_customer WHERE customerid = '$as_customerid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $customerid, $user_name) = $database->get_row( $as_db_query );
		$results['customer'] = $customerid;
	} else  {
		return false;
		header( "Location: index.php?action=customer_all");	
	}
	
	require( AS_INC . "as_customer_view.php" );
	
}

function customer_edit() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Editcustomer"; 
	$as_customerid = isset( $_GET['as_customerid'] ) ? $_GET['as_customerid'] : "";
	
	$as_db_query = "SELECT * FROM as_customer WHERE customerid = '$as_customerid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $customerid) = $database->get_row( $as_db_query );
		$results['customer'] = $customerid;
	} else  {
		return false;
		header( "Location: index.php?action=customer_all");	
	}
	
	if ( isset( $_POST['SaveCustomer'] ) ) {
		as_edit_customer($as_customerid);
		header( "Location: index.php?action=customer_edit&&as_customerid=".$as_customerid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		as_edit_customer($as_customerid);
		header( "Location: index.php?action=customer_view&&as_customerid=".$as_customerid);					
	}  else {
		require( AS_INC . "as_customer_edit.php" );
	}	
	
}

function user_delete() {
	$as_userid = isset( $_GET['as_userid'] ) ? $_GET['as_userid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_user WHERE userid = '$as_userid'";
	$delete = array(
		'userid' => $as_userid,
	);
	$deleted = $database->delete( 'as_user', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=user_all");	
	}
}

function user_all() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Users";  
	require( AS_INC . "as_user_all.php" );
}

function user_new() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Newuser"; 
	
	if ( isset( $_POST['AddUser'] ) ) {
		as_add_new_user();
		header( "Location: index.php?action=user_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_add_new_user();
		header( "Location: index.php?action=user_all");						
	}  else {
		require( AS_INC . "as_user_new.php" );
	}	
	
}
function user_view() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Viewuser"; 
	$as_userid = isset( $_GET['as_userid'] ) ? $_GET['as_userid'] : "";
	
	$as_db_query = "SELECT * FROM as_user WHERE userid = '$as_userid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $userid, $user_name) = $database->get_row( $as_db_query );
		$results['user'] = $userid;
	} else  {
		return false;
		header( "Location: index.php?action=user_all");	
	}
	
	require( AS_INC . "as_viewuser.php" );
		
}

?>