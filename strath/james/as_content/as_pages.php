<?php


function plan_all() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Class";  
	require( AS_INC . "as_plan_all.php" );
}

function plan_set() {
	$database = new As_Dbconn();
	$clientid 	= $_GET['as_clientid'];
	$planid 	= $_GET['as_planid'];
	
	$Update_Voter_Details = array(
		'client_plan' => $planid,
	);
	$where_clause = array('clientid' => $clientid);
	$updated = $database->as_update( 'as_client', $Update_Voter_Details, $where_clause, 1 );
	
	header( "Location: index.php?action=client_all");
}

function plan_new() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "plan_new"; 
	
	if ( isset( $_POST['AddClass'] ) ) {
		as_add_new_plan();
		header( "Location: index.php?action=plan_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_add_new_plan();
		header( "Location: index.php?action=plan_all");						
	}  else {
		require( AS_INC . "as_plan_new.php" );
	}	
	
}

function plan_view() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "plan_view"; 
	$as_planid = isset( $_GET['as_planid'] ) ? $_GET['as_planid'] : "";
	
	$as_db_query = "SELECT * FROM as_plan WHERE planid = '$as_planid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $planid, $plan_price) = $database->get_row( $as_db_query );
		$results['class'] = $planid;
	} else  {
		return false;
		header( "Location: index.php?action=class");	
	}
	
	if ( isset( $_POST['SaveClass'] ) ) {
		as_edit_plan($as_planid);
		header( "Location: index.php?action=plan_all");
	}  else {
		require( AS_INC . "as_plan_view.php" );
	}
}
	
function client_all() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Voters"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$as_search = $_POST['as_search'];
		$as_planid = $_POST['as_planid'];
		
		header( "Location: index.php?action=search&&as_search=".$as_search."&&as_planid=".$as_planid);
								
	}  else {	
		require( AS_INC . "as_client_all.php" );
	}
}

function client_new() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "client_new"; 
	
	if ( isset( $_POST['Proceed'] ) ) {
		$clientid = as_add_new_client();
		header( "Location: index.php?action=plan_select&&as_clientid=".$clientid);						
	}  else {
		require( AS_INC . "as_client_new.php" );
	}	
	
}

function client_view() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Viewclient"; 
	$as_clientid = isset( $_GET['as_clientid'] ) ? $_GET['as_clientid'] : "";
	
	$as_db_query = "SELECT * FROM as_client WHERE clientid = '$as_clientid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $clientid, $user_name) = $database->get_row( $as_db_query );
		$results['client'] = $clientid;
	} else  {
		return false;
		header( "Location: index.php?action=client_all");	
	}
	
	require( AS_INC . "as_client_view.php" );
	
}

function client_edit() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Editclient"; 
	$as_clientid = isset( $_GET['as_clientid'] ) ? $_GET['as_clientid'] : "";
	
	$as_db_query = "SELECT * FROM as_client WHERE clientid = '$as_clientid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $clientid) = $database->get_row( $as_db_query );
		$results['client'] = $clientid;
	} else  {
		return false;
		header( "Location: index.php?action=client_all");	
	}
	
	if ( isset( $_POST['SaveItem'] ) ) {
		as_edit_client($as_clientid);
		header( "Location: index.php?action=client_edit&&as_clientid=".$as_clientid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		as_edit_client($as_clientid);
		header( "Location: index.php?action=client_view&&as_clientid=".$as_clientid);					
	}  else {
		require( AS_INC . "as_client_edit.php" );
	}	
	
}

function client_delete() {
	$as_clientid = isset( $_GET['as_clientid'] ) ? $_GET['as_clientid'] : "";
	
	$database = new As_Dbconn();
	$delete = array(
		'clientid' => $as_clientid,
	);
	$deleted = $database->delete( 'as_client', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=client_all");	
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
	$results['pageAction'] = "Officials";  
	require( AS_INC . "as_user_all.php" );
}

function user_new() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Newuser"; 
	
	if ( isset( $_POST['AddOfficial'] ) ) {
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