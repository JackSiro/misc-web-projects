<?php

function rents() {
	$results = array();
	$results['pageTitle'] = "Online Property";
	$results['pageAction'] = "Houses";  
	require( JS_INC . "js_rents.php" );
}

function newrent() {
	$results = array();
	$results['pageTitle'] = "Online Property";
	$results['pageAction'] = "Newrent"; 
	
	if ( isset( $_POST['AddRent'] ) ) {
		js_add_new_rent();
		header( "Location: index.php?action=newrent");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		js_add_new_rent();
		header( "Location: index.php?action=rents");						
	}  else {
		require( JS_INC . "js_newrent.php" );
	}	
	
}


function houses() {
	$results = array();
	$results['pageTitle'] = "Online Property";
	$results['pageAction'] = "Houses";  
	require( JS_INC . "js_houses.php" );
}

function newhouse() {
	$results = array();
	$results['pageTitle'] = "Online Property";
	$results['pageAction'] = "Newhouse"; 
	
	if ( isset( $_POST['AddHouse'] ) ) {
		js_add_new_house();
		header( "Location: index.php?action=newhouse");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		js_add_new_house();
		header( "Location: index.php?action=houses");						
	}  else {
		require( JS_INC . "js_newhouse.php" );
	}	
	
}

function viewhouse() {
	$results = array();
	$results['pageTitle'] = "Online Property";
	$results['pageAction'] = "Viewhouse"; 
	$js_houseid = isset( $_GET['js_houseid'] ) ? $_GET['js_houseid'] : "";
	
	$js_db_query = "SELECT * FROM js_house WHERE houseid = '$js_houseid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $houseid, $house_number) = $database->get_row( $js_db_query );
		$results['house'] = $houseid;
	} else  {
		return false;
		header( "Location: index.php?action=houses");	
	}
	
	if ( isset( $_POST['SaveCart'] ) ) {
		js_edit_house($js_houseid);
		header( "Location: index.php?action=viewhouse&&js_houseid=".$js_houseid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		js_edit_house($js_houseid);
		header( "Location: index.php?action=houses");						
	}  else {
		require( JS_INC . "js_viewhouse.php" );
	}	
	
}
	  
function tenants() {
	$results = array();
	$results['pageTitle'] = "Online Property";
	$results['pageAction'] = "ELibrary"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$js_search = $_POST['js_search'];
		$js_houseid = $_POST['js_houseid'];
		
		header( "Location: index.php?action=search&&js_search=".$js_search."&&js_houseid=".$js_houseid);
								
	}  else {	
		require( JS_INC . "js_tenant.php" );
	}
}

function search() {
	$results = array();
	$results['pageTitle'] = "Online Property";
	$results['pageAction'] = "Search"; 
	$results['search'] = isset( $_GET['js_tenantid'] ) ? $_GET['js_tenantid'] : "";
	$results['searchhouse'] = isset( $_GET['js_houseid'] ) ? $_GET['js_houseid'] : "";
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$js_search = $_POST['js_search'];
		$js_houseid = $_POST['js_houseid'];
		
		header( "Location: index.php?action=search&&js_search=".$js_search."&&js_houseid=".$js_houseid);
														
	}  else {	
		require( JS_INC . "js_tenants.php" );
	}
}
function newtenant() {
	$results = array();
	$results['pageTitle'] = "Online Property";
	$results['pageAction'] = "Newtenant"; 
	
	if ( isset( $_POST['AddHouse'] ) ) {
		js_add_new_tenant();
		header( "Location: index.php?action=newtenant");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		js_add_new_tenant();
		header( "Location: index.php?action=tenants");						
	}  else {
		require( JS_INC . "js_newtenant.php" );
	}	
	
}

function viewtenant() {
	$results = array();
	$results['pageTitle'] = "Online Property";
	$results['pageAction'] = "Viewtenant"; 
	$js_tenantid = isset( $_GET['js_tenantid'] ) ? $_GET['js_tenantid'] : "";
	
	$js_db_query = "SELECT * FROM js_tenant WHERE tenantid = '$js_tenantid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $tenantid, $user_name) = $database->get_row( $js_db_query );
		$results['tenant'] = $tenantid;
	} else  {
		return false;
		header( "Location: index.php?action=tenants");	
	}
	
	require( JS_INC . "js_viewtenant.php" );
	
}

function edittenant() {
	$results = array();
	$results['pageTitle'] = "Online Property";
	$results['pageAction'] = "Edittenant"; 
	$js_tenantid = isset( $_GET['js_tenantid'] ) ? $_GET['js_tenantid'] : "";
	
	$js_db_query = "SELECT * FROM js_tenant WHERE tenantid = '$js_tenantid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $tenantid) = $database->get_row( $js_db_query );
		$results['tenant'] = $tenantid;
	} else  {
		return false;
		header( "Location: index.php?action=tenants");	
	}
	
	if ( isset( $_POST['SaveHouse'] ) ) {
		js_edit_tenant($js_tenantid);
		header( "Location: index.php?action=edittenant&&js_tenantid=".$js_tenantid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		js_edit_tenant($js_tenantid);
		header( "Location: index.php?action=viewtenant&&js_tenantid=".$js_tenantid);					
	}  else {
		require( JS_INC . "js_edittenant.php" );
	}	
	
}

function user_delete() {
	$js_userid = isset( $_GET['js_userid'] ) ? $_GET['js_userid'] : "";
	
	$database = new Js_Dbconn();
	$js_db_query = "DELETE * FROM js_user WHERE userid = '$js_userid'";
	$delete = array(
		'userid' => $js_userid,
	);
	$deleted = $database->delete( 'js_user', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=user_all");	
	}
}

function users() {
	$results = array();
	$results['pageTitle'] = "Online Property";
	$results['pageAction'] = "Users";  
	require( JS_INC . "js_users.php" );
}

function newuser() {
	$results = array();
	$results['pageTitle'] = "Online Property";
	$results['pageAction'] = "Newuser"; 
	
	if ( isset( $_POST['AddUser'] ) ) {
		js_add_new_user();
		header( "Location: index.php?action=newuser");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		js_add_new_user();
		header( "Location: index.php?action=users");						
	}  else {
		require( JS_INC . "js_newuser.php" );
	}	
	
}
function viewuser() {
	$results = array();
	$results['pageTitle'] = "Online Property";
	$results['pageAction'] = "Viewuser"; 
	$js_userid = isset( $_GET['js_userid'] ) ? $_GET['js_userid'] : "";
	
	$js_db_query = "SELECT * FROM js_user WHERE userid = '$js_userid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $userid, $user_name) = $database->get_row( $js_db_query );
		$results['user'] = $userid;
	} else  {
		return false;
		header( "Location: index.php?action=users");	
	}
	
	require( JS_INC . "js_viewuser.php" );
		
}

function profile() {
	$results = array();
	$results['pageTitle'] = "Online Property";
	$results['pageAction'] = "Profile"; 
	$js_username = $_SESSION['property_loggedin'];
	
	$js_db_query = "SELECT * FROM js_user WHERE user_name = '$js_username'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $userid, $user_name) = $database->get_row( $js_db_query );
		$results['user'] = $userid;
	} else  {
		return false;
		header( "Location: index.php?action=users");	
	}
	
	require( JS_INC . "js_viewuser.php" );
		
}

function options() {
	$results = array();
	$results['pageTitle'] = "Online Property";
	$results['pageAction'] = "Options"; 
	$js_loginid = isset( $_SESSION['property_loggedin'] ) ? $_SESSION['property_loggedin'] : "";
	
	if ( isset( $_POST['SaveSite'] ) ) {
			
		js_set_option('sitename', $_POST['sitename'], $js_loginid);	
		js_set_option('keywords', $_POST['keywords'], $js_loginid);
		js_set_option('description', $_POST['description'], $js_loginid);
		js_set_option('siteurl', $_POST['siteurl'], $js_loginid);
		
		header( "Location: index.php?action=options");						
	}  else if ( isset( $_POST['CancelSave'] ) ) {
		header( "Location: index.php?action=options");						
	}  else {
		require( JS_INC . "js_options.php" );
	}
	
}

?>