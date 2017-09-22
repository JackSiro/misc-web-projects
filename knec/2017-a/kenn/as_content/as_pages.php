<?php
	
function employee_all() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Users";  
	require( AS_INC . "as_employee_all.php" );
}

function employee_new() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Newuser"; 
	
	if ( isset( $_POST['AddSave'])) {
		as_add_new_user();
		header( "Location: index.php?page=employee_new");					
	}  else {
		require( AS_INC . "as_employee_new.php" );
	}	
	
}
function employee_view() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Viewuser"; 
	$as_employeeid = isset( $_GET['as_employeeid'] ) ? $_GET['as_employeeid'] : "";
	
	$as_db_query = "SELECT * FROM as_employee WHERE employeeid = '$as_employeeid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $employeeid, $employee_name) = $database->get_row( $as_db_query );
		$results['user'] = $employeeid;
	} else  {
		return false;
		header( "Location: index.php?page=employee_all");	
	}
	
	require( AS_INC . "as_employee_view.php" );
		
}

function profile() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Profile"; 
	$as_employeename = $_SESSION['mysite_user'];
	
	$as_db_query = "SELECT * FROM as_employee WHERE employee_name = '$as_employeename'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $employeeid, $employee_name) = $database->get_row( $as_db_query );
		$results['user'] = $employeeid;
	} else  {
		return false;
		header( "Location: index.php?page=users");	
	}
	
	require( AS_INC . "as_viewuser.php" );
		
}

function hotel_all() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Hotels";  
	require( AS_INC . "as_hotel_all.php" );
}

function hotel_new() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Add a New Hotel"; 
	
	if ( isset( $_POST['AddSave'])) {
		as_add_new_hotel();
		header( "Location: index.php?page=hotel_all");						
	}  else {
		require( AS_INC . "as_hotel_new.php" );
	}	
	
}

function hotel_view() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Viewcat"; 
	$as_catid = isset( $_GET['as_catid'] ) ? $_GET['as_catid'] : "";
	
	$as_db_query = "SELECT * FROM as_hotel WHERE catid = '$as_catid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $catid, $cat_slug) = $database->get_row( $as_db_query );
		$results['hotel'] = $catid;
	} else  {
		return false;
		header( "Location: index.php?page=hotel_all");	
	}
	
	if ( isset( $_POST['SaveCart'])) {
		as_edit_hotel($as_catid);
		header( "Location: index.php?page=viewcat&&as_catid=".$as_catid);						
	}  else if ( isset( $_POST['SaveClose'])) {
		as_edit_hotel($as_catid);
		header( "Location: index.php?page=hotel_all");						
	}  else {
		require( AS_INC . "as_hotel_view.php" );
	}	
	
}
	  
function ticket_all() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "All Company Items"; 
	
	if ( isset( $_POST['SearchThis'])) {
		$as_search = $_POST['as_search'];
		$as_catid = $_POST['as_catid'];
		
		header( "Location: index.php?page=as_search&&as_search=".$as_search."&&as_catid=".$as_catid);
								
	}  else {	
		require( AS_INC . "as_ticket_all.php" );
	}
}

function ticket_search() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Search"; 
	$results['search'] = isset( $_GET['as_ticketid'] ) ? $_GET['as_ticketid'] : "";
	$results['searchcat'] = isset( $_GET['as_catid'] ) ? $_GET['as_catid'] : "";
	
	if ( isset( $_POST['SearchThis'])) {
		$as_search = $_POST['as_search'];
		$as_catid = $_POST['as_catid'];
		
		header( "Location: index.php?page=as_search&&as_search=".$as_search."&&as_catid=".$as_catid);
														
	}  else {	
		require( AS_INC . "as_search.php" );
	}
}
function ticket_new() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Newticket"; 
	
	if ( isset( $_POST['Finish'])) {
		as_add_new_ticket();	
		header( "Location: index.php?page=ticket_all");						
	} else if ( isset( $_POST['Cancel'])) {
		header( "Location: index.php?page=ticket_all");						
	} else {
		require( AS_INC . "as_ticket_new.php" );
	}	
	
}

function ticket_view() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Viewitem"; 
	$as_ticketid = isset( $_GET['as_ticketid'] ) ? $_GET['as_ticketid'] : "";
	
	$as_db_query = "SELECT * FROM as_ticket WHERE ticketid = '$as_ticketid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $ticketid, $employee_name) = $database->get_row( $as_db_query );
		$results['ticket'] = $ticketid;
	} else  {
		return false;
		header( "Location: index.php?page=ticket_all");	
	}
	
	if ( isset( $_POST['OrderNow'])) {
		as_add_new_order();
		header( "Location: index.php?page=order_all");				
	}  else {
		require( AS_INC . "as_ticket_view.php" );
	}	
	
}

function ticket_edit() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Edititem"; 
	$as_ticketid = isset( $_GET['as_ticketid'] ) ? $_GET['as_ticketid'] : "";
	
	$as_db_query = "SELECT * FROM as_ticket WHERE ticketid = '$as_ticketid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $ticketid) = $database->get_row( $as_db_query );
		$results['item'] = $ticketid;
	} else  {
		return false;
		header( "Location: index.php?page=elibrary");	
	}
	
	if ( isset( $_POST['SaveItem'])) {
		as_edit_item($as_ticketid);
		header( "Location: index.php?page=ticket_edit&&as_ticketid=".$as_ticketid);						
	}  else if ( isset( $_POST['SaveClose'])) {
		as_edit_item($as_ticketid);
		header( "Location: index.php?page=ticket_view&&as_ticketid=".$as_ticketid);					
	}  else {
		require( AS_INC . "as_ticket_edit.php" );
	}	
	
}

function ticket_delete() {
	$as_ticketid = isset( $_GET['as_ticketid'] ) ? $_GET['as_ticketid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_ticket WHERE ticketid = '$as_ticketid'";
	$delete = array(
		'ticketid' => $as_ticketid,
	);
	$deleted = $database->delete( 'as_ticket', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?page=ticket_all");	
	}
}


function place_all() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Company Place";  
	require( AS_INC . "as_place_all.php" );
}

function place_new() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Add a New Hotel"; 
	
	if ( isset( $_POST['AddItem'])) {
		as_add_new_place();
		header( "Location: index.php?page=place_all");						
	}  else {
		require( AS_INC . "as_place_new.php" );
	}	
	
}

function place_view() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "ViewPlace"; 
	$as_placeid = isset( $_GET['as_placeid'] ) ? $_GET['as_placeid'] : "";
	
	$as_db_query = "SELECT * FROM as_place WHERE placeid = '$as_placeid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $placeid, $place_slug) = $database->get_row( $as_db_query );
		$results['place'] = $placeid;
	} else  {
		return false;
		header( "Location: index.php?page=place_all");	
	}
	
	if ( isset( $_POST['SavePlace'])) {
		as_edit_place($as_catid);
		header( "Location: index.php?page=place_all");						
	}  else {
		require( AS_INC . "as_place_view.php" );
	}	
	
}


?>