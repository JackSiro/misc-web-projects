<?php
	
function employee_all() {
	$results = array();
	$results['pageTitle'] = "Gates Ticketing System";
	$results['pageAction'] = "Users";  
	require( JS_INC . "js_employee_all.php" );
}

function employee_new() {
	$results = array();
	$results['pageTitle'] = "Gates Ticketing System";
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
	$results['pageTitle'] = "Gates Ticketing System";
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
	$results['pageTitle'] = "Gates Ticketing System";
	$results['pageAction'] = "Profile"; 
	$js_employeename = $_SESSION['gates_user'];
	
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
	$results['pageTitle'] = "Gates Ticketing System";
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
	$results['pageTitle'] = "Gates Ticketing System";
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
	$results['pageTitle'] = "Gates Ticketing System";
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
	$results['pageTitle'] = "Gates Ticketing System";
	$results['pageAction'] = "RecoveredUsername"; 
	require( JS_INC . "js_recover_username.php" );
	
}

function recover_password() {
	$results = array();
	$results['pageTitle'] = "Gates Ticketing System";
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

function ticket_all() {
	$results = array();
	$results['pageTitle'] = "Gates Ticketing System";
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
	$results['pageTitle'] = "Gates Ticketing System";
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
function ticket_new() {
	$results = array();
	$results['pageTitle'] = "Gates Ticketing System";
	$results['pageAction'] = "Newticket"; 
	
	$placefrom = isset( $_GET['placefrom'] ) ? $_GET['placefrom'] : "";
	$placeto = isset( $_GET['placeto'] ) ? $_GET['placeto'] : "";
	
	$results['placefrom'] = $placefrom;
	$results['placeto'] = $placeto;
	
	if ( isset( $_POST['Finish'])) {
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
	$results['pageTitle'] = "Gates Ticketing System";
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
	$results['pageTitle'] = "Gates Ticketing System";
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
	
	if ( isset( $_POST['EditTicket'])) {
		js_edit_ticket($js_ticketid);
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

?>