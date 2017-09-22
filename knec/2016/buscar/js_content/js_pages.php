<?php
	
function customer_all() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "Users";  
	require( JS_INC . "js_customer_all.php" );
}
	
function employee_all() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "Customers";  
	require( JS_INC . "js_employee_all.php" );
}

function employee_new() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "Newuser"; 
	
	if ( isset( $_POST['AddEmployee'])) {
		js_add_new_user();
		header( "Location: index.php?page=employee_new");						
	}  else if ( isset( $_POST['AddClose'])) {
		js_add_new_user();
		header( "Location: index.php?page=employee_all");						
	}  else {
		require( JS_INC . "js_employee_new.php" );
	}	
	
}
function employee_view() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "Viewuser"; 
	$js_employeeid = isset( $_GET['js_employeeid'] ) ? $_GET['js_employeeid'] : "";
	
	$js_db_query = "SELECT * FROM js_employee WHERE employeeid = '$js_employeeid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $employeeid, $employee_name) = $database->get_row( $js_db_query );
		$results['user'] = $employeeid;
	} else  {
		return false;
		header( "Location: index.php?page=employee_all");	
	}
	
	require( JS_INC . "js_employee_view.php" );
		
}

function profile() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "Profile"; 
	$js_employeename = $_SESSION['buscar_user'];
	
	$js_db_query = "SELECT * FROM js_employee WHERE employee_name = '$js_employeename'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $employeeid, $employee_name) = $database->get_row( $js_db_query );
		$results['user'] = $employeeid;
	} else  {
		return false;
		header( "Location: index.php?page=users");	
	}
	
	require( JS_INC . "js_viewuser.php" );
		
}

	
function register() {
	$results = array();
	$results['pageTitle'] = "KTTC ELibrary Catalogue Management System";
	$results['pageAction'] = "Register"; 
	
	if ( isset( $_POST['Register'] ) ) {
		js_register_me();
		header( "Location: index.php");		
	}  else {
		require( JS_INC . "js_employee_register.php" );
	}	
	
}

  function forgot_username() {
	$results = array();
	$results['pageTitle'] = "KTTC ELibrary Catalogue Management System";
	$results['pageAction'] = "ForgotUsername"; 
	
	if ( isset( $_POST['ForgotUsername'] ) ) {
		$email = $_POST['username'];
		$password = md5($_POST['password']);
		js_recover_username($email, $password);
		header( "Location: index.php?action=recovered_username");		
	}  else {
		require( JS_INC . "js_forgot_username.php" );
	}	
}

  function forgot_password() {
	$results = array();
	$results['pageTitle'] = "KTTC ELibrary Catalogue Management System";
	$results['pageAction'] = "ForgotPassword"; 
	
	if ( isset( $_POST['ForgotPassword'] ) ) {
		$username = $_POST['username'];
		$email = $_POST['email'];
		js_recover_password($username, $email);
		header( "Location: index.php?action=recover_password");		
	}  else {
		require( JS_INC . "js_forgot_password.php" );
	}	
	
}

function recover_username() {
	$results = array();
	$results['pageTitle'] = "KTTC ELibrary Catalogue Management System";
	$results['pageAction'] = "RecoveredUsername"; 
	require( JS_INC . "js_recover_username.php" );
	
}

function recover_password() {
	$results = array();
	$results['pageTitle'] = "KTTC ELibrary Catalogue Management System";
	$results['pageAction'] = "RecoveredPassword"; 
	
	if ( isset( $_POST['RecoverPassword'] ) ) {
		$username = $_POST['username'];
		$password = md5($_POST['passwordcon']);
		js_change_password($username);
		header( "Location: index.php");		
	}  else {
		require( JS_INC . "js_recover_password.php" );
	}
}


function bus_all() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "Company Buss";  
	require( JS_INC . "js_bus_all.php" );
}

function bus_new() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "Add a New Company Bus"; 
	
	if ( isset( $_POST['CompanyBus'])) {
		js_add_new_bus();
		header( "Location: index.php?page=bus_all");						
	}  else {
		require( JS_INC . "js_bus_new.php" );
	}	
	
}

function bus_view() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "Viewcat"; 
	$js_catid = isset( $_GET['js_catid'] ) ? $_GET['js_catid'] : "";
	
	$js_db_query = "SELECT * FROM js_bus WHERE catid = '$js_catid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $catid, $cat_slug) = $database->get_row( $js_db_query );
		$results['bus'] = $catid;
	} else  {
		return false;
		header( "Location: index.php?page=bus_all");	
	}
	
	if ( isset( $_POST['SaveCart'])) {
		js_edit_bus($js_catid);
		header( "Location: index.php?page=viewcat&&js_catid=".$js_catid);						
	}  else if ( isset( $_POST['SaveClose'])) {
		js_edit_bus($js_catid);
		header( "Location: index.php?page=bus_all");						
	}  else {
		require( JS_INC . "js_bus_view.php" );
	}	
	
}
	  
function ticket_all() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "All Company Items"; 
	
	if ( isset( $_POST['SearchThis'])) {
		$js_search = $_POST['js_search'];
		$js_catid = $_POST['js_catid'];
		
		header( "Location: index.php?page=js_search&&js_search=".$js_search."&&js_catid=".$js_catid);
								
	}  else {	
		require( JS_INC . "js_ticket_all.php" );
	}
}

function ticket_search() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "Search"; 
	$results['search'] = isset( $_GET['js_ticketid'] ) ? $_GET['js_ticketid'] : "";
	$results['searchcat'] = isset( $_GET['js_catid'] ) ? $_GET['js_catid'] : "";
	
	if ( isset( $_POST['SearchThis'])) {
		$js_search = $_POST['js_search'];
		$js_catid = $_POST['js_catid'];
		
		header( "Location: index.php?page=js_search&&js_search=".$js_search."&&js_catid=".$js_catid);
														
	}  else {	
		require( JS_INC . "js_search.php" );
	}
}
function book_now() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "Newticket"; 
	
	if ( isset( $_POST['Finish'])) {
		js_add_new_customer();
		js_add_new_ticket();	
		
		header( "Location: index.php?page=ticket_all");						
	} else if ( isset( $_POST['Cancel'])) {
		header( "Location: index.php?page=ticket_all");						
	} else {
		require( JS_INC . "js_ticket_new.php" );
	}	
	
}

function ticket_view() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "Viewitem"; 
	$js_ticketid = isset( $_GET['js_ticketid'] ) ? $_GET['js_ticketid'] : "";
	
	$js_db_query = "SELECT * FROM js_ticket WHERE ticketid = '$js_ticketid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $ticketid, $employee_name) = $database->get_row( $js_db_query );
		$results['item'] = $ticketid;
	} else  {
		return false;
		header( "Location: index.php?page=ticket_all");	
	}
	
	if ( isset( $_POST['OrderNow'])) {
		js_add_new_order();
		header( "Location: index.php?page=order_all");				
	}  else {
		require( JS_INC . "js_ticket_view.php" );
	}	
	
}

function ticket_edit() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "Edititem"; 
	$js_ticketid = isset( $_GET['js_ticketid'] ) ? $_GET['js_ticketid'] : "";
	
	$js_db_query = "SELECT * FROM js_ticket WHERE ticketid = '$js_ticketid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $ticketid) = $database->get_row( $js_db_query );
		$results['item'] = $ticketid;
	} else  {
		return false;
		header( "Location: index.php?page=elibrary");	
	}
	
	if ( isset( $_POST['SaveItem'])) {
		js_edit_item($js_ticketid);
		header( "Location: index.php?page=ticket_edit&&js_ticketid=".$js_ticketid);						
	}  else if ( isset( $_POST['SaveClose'])) {
		js_edit_item($js_ticketid);
		header( "Location: index.php?page=ticket_view&&js_ticketid=".$js_ticketid);					
	}  else {
		require( JS_INC . "js_ticket_edit.php" );
	}	
	
}

function ticket_delete() {
	$js_ticketid = isset( $_GET['js_ticketid'] ) ? $_GET['js_ticketid'] : "";
	
	$database = new Js_Dbconn();
	$js_db_query = "DELETE * FROM js_ticket WHERE ticketid = '$js_ticketid'";
	$delete = array(
		'ticketid' => $js_ticketid,
	);
	$deleted = $database->delete( 'js_ticket', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?page=ticket_all");	
	}
}


function place_all() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "Company Place";  
	require( JS_INC . "js_place_all.php" );
}

function place_new() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "Add a New Company Bus"; 
	
	if ( isset( $_POST['CompanyPlace'])) {
		js_add_new_place();
		header( "Location: index.php?page=place_all");						
	}  else {
		require( JS_INC . "js_place_new.php" );
	}	
	
}

function place_view() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "ViewPlace"; 
	$js_placeid = isset( $_GET['js_placeid'] ) ? $_GET['js_placeid'] : "";
	
	$js_db_query = "SELECT * FROM js_place WHERE placeid = '$js_placeid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $placeid, $place_slug) = $database->get_row( $js_db_query );
		$results['place'] = $placeid;
	} else  {
		return false;
		header( "Location: index.php?page=place_all");	
	}
	
	if ( isset( $_POST['SavePlace'])) {
		js_edit_place($js_catid);
		header( "Location: index.php?page=place_all");						
	}  else {
		require( JS_INC . "js_place_view.php" );
	}	
	
}


?>