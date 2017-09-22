<?php

function farmers() {
	$results = array();
	$results['pageTitle'] = "Gachie Farmers";
	$results['pageAction'] = "Farmers";  
	require( JS_INC . "js_farmers.php" );
}

function newfarmer() {
	$results = array();
	$results['pageTitle'] = "Gachie Farmers";
	$results['pageAction'] = "Newfarmer"; 
	
	if ( isset( $_POST['AddFarmer'] ) ) {
		js_add_new_farmer();
		header( "Location: index.php?js_pageaction=farmers");					
	}  else {
		require( JS_INC . "js_newfarmer.php" );
	}	
	
}

function viewfarmer() {
	$results = array();
	$results['pageTitle'] = "Gachie Farmers";
	$results['pageAction'] = "Viewfarmer"; 
	$js_farmerid = isset( $_GET['js_farmerid'] ) ? $_GET['js_farmerid'] : "";
	
	$js_db_query = "SELECT * FROM js_farmer WHERE farmerid = '$js_farmerid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $farmerid, $farmer_slug) = $database->get_row( $js_db_query );
		$results['farmer'] = $farmerid;
	} else  {
		return false;
		header( "Location: index.php?js_pageaction=farmer");	
	}
	
	if ( isset( $_POST['SaveChanges'] ) ) {
		js_edit_farmer($js_farmerid);
		header( "Location: index.php?js_pageaction=viewfarmer&&js_farmerid=".$js_farmerid);
	}  else {
		require( JS_INC . "js_viewfarmer.php" );
	}	
	
}


function deletefarmer() {
	$js_farmerid = isset( $_GET['js_farmerid'] ) ? $_GET['js_farmerid'] : "";
	
	$database = new Js_Dbconn();
	$js_db_query = "DELETE * FROM js_farmer WHERE farmerid = '$js_farmerid'";
	$delete = array(
		'farmerid' => $js_farmerid,
	);
	$deleted = $database->delete( 'js_farmer', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?js_pageaction=farmers");	
	}
}
  
function sessions() {
	$results = array();
	$results['pageTitle'] = "Gachie Farmers";
	$results['pageAction'] = "ELibrary"; 
	require( JS_INC . "js_sessions.php" );
}

function newsession() {
	$results = array();
	$results['pageTitle'] = "Gachie Farmers";
	$results['pageAction'] = "Newsession"; 
	
	if ( isset( $_POST['AddSession'] ) ) {
		js_add_new_session();
		header( "Location: index.php?js_pageaction=sessions");						
	}  else {
		require( JS_INC . "js_newsession.php" );
	}		
}

function viewsession() {
	$results = array();
	$results['pageTitle'] = "Gachie Farmers";
	$results['pageAction'] = "Viewsession"; 
	$js_sessionid = isset( $_GET['js_sessionid'] ) ? $_GET['js_sessionid'] : "";
	
	$js_db_query = "SELECT * FROM js_session WHERE sessionid = '$js_sessionid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $sessionid, $employee_name) = $database->get_row( $js_db_query );
		$results['session'] = $sessionid;
	} else  {
		return false;
		header( "Location: index.php?js_pageaction=sessions");	
	}
	
	if ( isset( $_POST['SaveItem'] ) ) {
		js_edit_session($js_sessionid);
		header( "Location: index.php?js_pageaction=viewsession&&js_sessionid=".$js_sessionid);					
	}  else {
		require( JS_INC . "js_viewsession.php" );
	}	
	
}

function editsession() {
	$results = array();
	$results['pageTitle'] = "Gachie Farmers";
	$results['pageAction'] = "Editsession"; 
	$js_sessionid = isset( $_GET['js_sessionid'] ) ? $_GET['js_sessionid'] : "";
	
	$js_db_query = "SELECT * FROM js_session WHERE sessionid = '$js_sessionid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $sessionid) = $database->get_row( $js_db_query );
		$results['session'] = $sessionid;
	} else  {
		return false;
		header( "Location: index.php?js_pageaction=sessions");	
	}
	
	if ( isset( $_POST['SaveChanges'] ) ) {
		js_edit_session($js_sessionid);
		header( "Location: index.php?js_pageaction=viewsession&&js_sessionid=".$js_sessionid);					
	}  else {
		require( JS_INC . "js_editsession.php" );
	}	
	
}

function deletesession() {
	$js_sessionid = isset( $_GET['js_sessionid'] ) ? $_GET['js_sessionid'] : "";
	
	$database = new Js_Dbconn();
	$js_db_query = "DELETE * FROM js_session WHERE sessionid = '$js_sessionid'";
	$delete = array(
		'sessionid' => $js_sessionid,
	);
	$deleted = $database->delete( 'js_session', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?js_pageaction=sessions");	
	}
}
	
function employees() {
	$results = array();
	$results['pageTitle'] = "Gachie Farmers";
	$results['pageAction'] = "Employees";  
	require( JS_INC . "js_employees.php" );
}

function newemployee() {
	$results = array();
	$results['pageTitle'] = "Gachie Farmers";
	$results['pageAction'] = "Newemployee"; 
	
	if ( isset( $_POST['AddEmployee'] ) ) {
		js_add_new_employee();
		header( "Location: index.php?js_pageaction=newemployee");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		js_add_new_employee();
		header( "Location: index.php?js_pageaction=employees");						
	}  else {
		require( JS_INC . "js_newemployee.php" );
	}	
	
}
function viewemployee() {
	$results = array();
	$results['pageTitle'] = "Gachie Farmers";
	$results['pageAction'] = "Viewemployee"; 
	$js_employeeid = isset( $_GET['js_employeeid'] ) ? $_GET['js_employeeid'] : "";
	
	$js_db_query = "SELECT * FROM js_employee WHERE employeeid = '$js_employeeid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $employeeid, $employee_name) = $database->get_row( $js_db_query );
		$results['employee'] = $employeeid;
	} else  {
		return false;
		header( "Location: index.php?js_pageaction=employees");	
	}
	
	require( JS_INC . "js_viewemployee.php" );
		
}


function deleteemployee() {
	$js_employeeid = isset( $_GET['js_employeeid'] ) ? $_GET['js_employeeid'] : "";
	
	$database = new Js_Dbconn();
	$js_db_query = "DELETE * FROM js_employee WHERE employeeid = '$js_employeeid'";
	$delete = array(
		'employeeid' => $js_employeeid,
	);
	$deleted = $database->delete( 'js_employee', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?js_pageaction=employees");	
	}
}


function profile() {
	$results = array();
	$results['pageTitle'] = "Gachie Farmers";
	$results['pageAction'] = "Profile"; 
	$js_employeename = $_SESSION['employeename_loggedin'];
	
	$js_db_query = "SELECT * FROM js_employee WHERE employee_name = '$js_employeename'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $employeeid, $employee_name) = $database->get_row( $js_db_query );
		$results['employee'] = $employeeid;
	} else  {
		return false;
		header( "Location: index.php?js_pageaction=employees");	
	}
	
	require( JS_INC . "js_viewemployee.php" );
		
}

function options() {
	$results = array();
	$results['pageTitle'] = "Gachie Farmers";
	$results['pageAction'] = "Options"; 
	$js_loggedin = isset( $_SESSION['js_gachieemployee'] ) ? $_SESSION['js_gachieemployee'] : "";
	
	if ( isset( $_POST['SaveSite'] ) ) {
			
		js_set_option('sitename', $_POST['sitename'], $js_loggedin);	
		js_set_option('slogan', $_POST['slogan'], $js_loggedin);
		js_set_option('description', $_POST['description'], $js_loggedin);
		js_set_option('siteurl', $_POST['siteurl'], $js_loggedin);
		
		header( "Location: index.php?js_pageaction=options");						
	}  else if ( isset( $_POST['CancelSave'] ) ) {
		header( "Location: index.php?js_pageaction=options");						
	}  else {
		require( JS_INC . "js_options.php" );
	}
	
}

?>