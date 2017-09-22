<?php
	
function customer_all() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "Users";  
	require( AS_INC . "as_customer_all.php" );
}
	
function employee_all() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "Customers";  
	require( AS_INC . "as_employee_all.php" );
}

function employee_new() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "Newuser"; 
	
	if ( isset( $_POST['AddEmployee'])) {
		as_add_new_user();
		header( "Location: index.php?page=employee_new");						
	}  else if ( isset( $_POST['AddClose'])) {
		as_add_new_user();
		header( "Location: index.php?page=employee_all");						
	}  else {
		require( AS_INC . "as_employee_new.php" );
	}	
	
}
function employee_view() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
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
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "Profile"; 
	$as_employeename = $_SESSION['buscar_user'];
	
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

	
function register() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "Register"; 
	
	if ( isset( $_POST['Register'] ) ) {
		as_register_me();
		header( "Location: index.php");		
	}  else {
		require( AS_INC . "as_employee_register.php" );
	}	
	
}

  function forgot_username() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "ForgotUsername"; 
	
	if ( isset( $_POST['ForgotUsername'] ) ) {
		$email = $_POST['username'];
		$password = md5($_POST['password']);
		as_recover_username($email, $password);
		header( "Location: index.php?action=recovered_username");		
	}  else {
		require( AS_INC . "as_forgot_username.php" );
	}	
}

  function forgot_password() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "ForgotPassword"; 
	
	if ( isset( $_POST['ForgotPassword'] ) ) {
		$username = $_POST['username'];
		$email = $_POST['email'];
		as_recover_password($username, $email);
		header( "Location: index.php?action=recover_password");		
	}  else {
		require( AS_INC . "as_forgot_password.php" );
	}	
	
}

function recover_username() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "RecoveredUsername"; 
	require( AS_INC . "as_recover_username.php" );
	
}

function recover_password() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "RecoveredPassword"; 
	
	if ( isset( $_POST['RecoverPassword'] ) ) {
		$username = $_POST['username'];
		$password = md5($_POST['passwordcon']);
		as_change_password($username);
		header( "Location: index.php");		
	}  else {
		require( AS_INC . "as_recover_password.php" );
	}
}


function bus_all() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "Company Buss";  
	require( AS_INC . "as_bus_all.php" );
}

function bus_new() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "Add a New Company Bus"; 
	
	if ( isset( $_POST['CompanyBus'])) {
		as_add_new_bus();
		header( "Location: index.php?page=bus_all");						
	}  else {
		require( AS_INC . "as_bus_new.php" );
	}	
	
}

function bus_view() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "Viewcat"; 
	$as_catid = isset( $_GET['as_catid'] ) ? $_GET['as_catid'] : "";
	
	$as_db_query = "SELECT * FROM as_bus WHERE catid = '$as_catid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $catid, $cat_slug) = $database->get_row( $as_db_query );
		$results['bus'] = $catid;
	} else  {
		return false;
		header( "Location: index.php?page=bus_all");	
	}
	
	if ( isset( $_POST['SaveCart'])) {
		as_edit_bus($as_catid);
		header( "Location: index.php?page=viewcat&&as_catid=".$as_catid);						
	}  else if ( isset( $_POST['SaveClose'])) {
		as_edit_bus($as_catid);
		header( "Location: index.php?page=bus_all");						
	}  else {
		require( AS_INC . "as_bus_view.php" );
	}	
	
}
	  
function ticket_all() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
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
	$results['pageTitle'] = "Online Bus Ticketing";
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
function book_now() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "Newticket"; 
	
	if ( isset( $_POST['Finish'])) {
		as_add_new_customer();
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
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "Viewitem"; 
	$as_ticketid = isset( $_GET['as_ticketid'] ) ? $_GET['as_ticketid'] : "";
	
	$as_db_query = "SELECT * FROM as_ticket WHERE ticketid = '$as_ticketid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $ticketid, $employee_name) = $database->get_row( $as_db_query );
		$results['item'] = $ticketid;
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
	$results['pageTitle'] = "Online Bus Ticketing";
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
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "Company Place";  
	require( AS_INC . "as_place_all.php" );
}

function place_new() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "Add a New Company Bus"; 
	
	if ( isset( $_POST['CompanyPlace'])) {
		as_add_new_place();
		header( "Location: index.php?page=place_all");						
	}  else {
		require( AS_INC . "as_place_new.php" );
	}	
	
}

function place_view() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
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