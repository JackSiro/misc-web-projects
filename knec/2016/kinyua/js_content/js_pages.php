<?php
	
function employee_all() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "Users";  
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
	$js_employeename = $_SESSION['kinyua_user'];
	
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

function vehicle_all() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "Vehicles";  
	require( JS_INC . "js_vehicle_all.php" );
}

function vehicle_new() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "Add a New Vehicle"; 
	
	if ( isset( $_POST['AddVehicle'])) {
		js_add_new_vehicle();
		header( "Location: index.php?page=vehicle_all");						
	}  else {
		require( JS_INC . "js_vehicle_new.php" );
	}	
	
}

function vehicle_view() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "Viewcat"; 
	$js_catid = isset( $_GET['js_catid'] ) ? $_GET['js_catid'] : "";
	
	$js_db_query = "SELECT * FROM js_vehicle WHERE catid = '$js_catid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $catid, $cat_slug) = $database->get_row( $js_db_query );
		$results['vehicle'] = $catid;
	} else  {
		return false;
		header( "Location: index.php?page=vehicle_all");	
	}
	
	if ( isset( $_POST['SaveCart'])) {
		js_edit_vehicle($js_catid);
		header( "Location: index.php?page=viewcat&&js_catid=".$js_catid);						
	}  else if ( isset( $_POST['SaveClose'])) {
		js_edit_vehicle($js_catid);
		header( "Location: index.php?page=vehicle_all");						
	}  else {
		require( JS_INC . "js_vehicle_view.php" );
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
function ticket_new() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "Newticket"; 
	
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
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "Viewitem"; 
	$js_ticketid = isset( $_GET['js_ticketid'] ) ? $_GET['js_ticketid'] : "";
	
	$js_db_query = "SELECT * FROM js_ticket WHERE ticketid = '$js_ticketid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $ticketid, $employee_name) = $database->get_row( $js_db_query );
		$results['ticket'] = $ticketid;
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


function town_all() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "Company Town";  
	require( JS_INC . "js_town_all.php" );
}

function town_new() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "Add a New Vehicle"; 
	
	if ( isset( $_POST['CompanyTown'])) {
		js_add_new_town();
		header( "Location: index.php?page=town_all");						
	}  else {
		require( JS_INC . "js_town_new.php" );
	}	
	
}

function town_view() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "ViewTown"; 
	$js_townid = isset( $_GET['js_townid'] ) ? $_GET['js_townid'] : "";
	
	$js_db_query = "SELECT * FROM js_town WHERE townid = '$js_townid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $townid, $town_slug) = $database->get_row( $js_db_query );
		$results['town'] = $townid;
	} else  {
		return false;
		header( "Location: index.php?page=town_all");	
	}
	
	if ( isset( $_POST['SaveTown'])) {
		js_edit_town($js_catid);
		header( "Location: index.php?page=town_all");						
	}  else {
		require( JS_INC . "js_town_view.php" );
	}	
	
}


?>