<?php
	
function user_all() {
	$results = array();
	$results['pageTitle'] = "Farmers Registration Online";
	$results['pageAction'] = "Users";  
	require( JS_INC . "js_user_all.php" );
}

function user_new() {
	$results = array();
	$results['pageTitle'] = "Farmers Registration Online";
	$results['pageAction'] = "Newuser"; 
	
	if ( isset( $_POST['AddUser'] ) ) {
		js_add_new_user();
		header( "Location: index.php?action=user_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		js_add_new_user();
		header( "Location: index.php");						
	}  else {
		require( JS_INC . "js_user_new.php" );
	}	
	
}

function user_view() {
	$results = array();
	$results['pageTitle'] = "Farmers Registration Online";
	$results['pageAction'] = "Viewuser"; 
	$js_userid = isset( $_GET['js_userid'] ) ? $_GET['js_userid'] : "";
	
	$js_db_query = "SELECT * FROM js_user WHERE userid = '$js_userid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $userid, $user_name) = $database->get_row( $js_db_query );
		$results['user'] = $userid;
	} else  {
		return false;
		header( "Location: index.php?action=user_all");	
	}
	
	require( JS_INC . "js_user_view.php" );
		
}


function user_edit() {
	$results = array();
	$results['pageTitle'] = "Farmers Registration Online";
	$results['pageAction'] = "Edituser"; 
	$js_userid = isset( $_GET['js_userid'] ) ? $_GET['js_userid'] : "";
	
	$js_db_query = "SELECT * FROM js_user WHERE userid = '$js_userid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $userid, $user_name) = $database->get_row( $js_db_query );
		$results['user'] = $userid;
	} else  {
		return false;
		header( "Location: index.php?action=user_all");	
	}
	
	if ( isset( $_POST['EditUser'] ) ) {
		js_edit_user($js_userid);
		header( "Location: index.php?action=user_view&&js_userid=".$js_userid);						
	}  else if ( isset( $_POST['EditClose'] ) ) {
		js_edit_user($js_userid);
		header( "Location: index.php");						
	}  else {
		require( JS_INC . "js_user_edit.php" );
	}
		
}


function deleteuser() {
	$js_userid = isset( $_GET['js_userid'] ) ? $_GET['js_userid'] : "";
	
	$database = new Js_Dbconn();
	$js_db_query = "DELETE * FROM js_user WHERE userid = '$js_userid'";
	$delete = array(
		'userid' => $js_userid,
	);
	$deleted = $database->delete( 'js_user', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php");	
	}
}

function profile() {
	$results = array();
	$results['pageTitle'] = "Farmers Registration Online";
	$results['pageAction'] = "Profile"; 
	$js_username = $_SESSION['itemsz_user'];
	
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


	
function complaint_all() {
	$results = array();
	$results['pageTitle'] = "Farmers Registration Online";
	$results['pageAction'] = "Complaints";  
	require( JS_INC . "js_complaint_all.php" );
}

function complaint_new() {
	$results = array();
	$results['pageTitle'] = "Farmers Registration Online";
	$results['pageAction'] = "Newcomplaint"; 
	
	if ( isset( $_POST['AddComplaint'] ) ) {
		js_add_new_complaint();
		header( "Location: index.php?action=complaint_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		js_add_new_complaint();
		header( "Location: index.php?action=complaint_all");						
	}  else {
		require( JS_INC . "js_complaint_new.php" );
	}	
	
}

function complaint_view() {
	$results = array();
	$results['pageTitle'] = "Farmers Registration Online";
	$results['pageAction'] = "Viewcomplaint"; 
	$js_complaintid = isset( $_GET['js_complaintid'] ) ? $_GET['js_complaintid'] : "";
	
	$js_db_query = "SELECT * FROM js_complaint WHERE complaintid = '$js_complaintid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $complaintid, $complaint_name) = $database->get_row( $js_db_query );
		$results['complaint'] = $complaintid;
	} else  {
		return false;
		header( "Location: index.php?action=complaint_all");	
	}
	
	require( JS_INC . "js_complaint_view.php" );
		
}


function complaint_edit() {
	$results = array();
	$results['pageTitle'] = "Farmers Registration Online";
	$results['pageAction'] = "Editcomplaint"; 
	$js_complaintid = isset( $_GET['js_complaintid'] ) ? $_GET['js_complaintid'] : "";
	
	$js_db_query = "SELECT * FROM js_complaint WHERE complaintid = '$js_complaintid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $complaintid, $complaint_name) = $database->get_row( $js_db_query );
		$results['complaint'] = $complaintid;
	} else  {
		return false;
		header( "Location: index.php?action=complaint_all");	
	}
	
	if ( isset( $_POST['EditComplaint'] ) ) {
		js_edit_complaint($js_complaintid);
		header( "Location: index.php?action=complaint_view&&js_complaintid=".$js_complaintid);						
	}  else if ( isset( $_POST['EditClose'] ) ) {
		js_edit_complaint($js_complaintid);
		header( "Location: index.php");						
	}  else {
		require( JS_INC . "js_complaint_edit.php" );
	}
		
}


function deletecomplaint() {
	$js_complaintid = isset( $_GET['js_complaintid'] ) ? $_GET['js_complaintid'] : "";
	
	$database = new Js_Dbconn();
	$js_db_query = "DELETE * FROM js_complaint WHERE complaintid = '$js_complaintid'";
	$delete = array(
		'complaintid' => $js_complaintid,
	);
	$deleted = $database->delete( 'js_complaint', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php");	
	}
}

?>