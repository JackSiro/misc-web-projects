<?php
	
function member_all() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "members";  
	require( AS_INC . "as_member_all.php" );
}

function member_new() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Newmember"; 
	
	if ( isset( $_POST['Addmember'] ) ) {
		as_new_member();
		header( "Location: index.php?action=member_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_new_member();
		header( "Location: index.php?action=member_all");						
	}  else {
		require( AS_INC . "as_member_new.php" );
	}	
	
}
function member_view() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Viewmember"; 
	$as_memberid = isset( $_GET['as_memberid'] ) ? $_GET['as_memberid'] : "";
	
	$as_db_query = "SELECT * FROM as_member WHERE memberid = '$as_memberid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $memberid, $member_name) = $database->get_row( $as_db_query );
		$results['member'] = $memberid;
	} else  {
		return false;
		header( "Location: index.php?action=member_all");	
	}
		
	require( AS_INC . "as_member_view.php" );
}
function member_edit() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Viewmember"; 
	$as_memberid = isset( $_GET['as_memberid'] ) ? $_GET['as_memberid'] : "";
	
	$as_db_query = "SELECT * FROM as_member WHERE memberid = '$as_memberid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $memberid, $member_name) = $database->get_row( $as_db_query );
		$results['member'] = $memberid;
	} else  {
		return false;
		header( "Location: index.php?action=member_all");	
	}
		
	if ( isset( $_POST['UpdateMember'] ) ) {
		as_update_member($as_memberid);
		header( "Location: index.php?action=member_all");				
	} else if ( isset( $_POST['DeleteItem'] ) ) {
		as_delete_member($as_memberid);
		header( "Location: index.php?action=member_all");				
	}  else {
		require( AS_INC . "as_member_view.php" );
	}
}

function member_profile() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Profile"; 
	$as_membername = $_SESSION['membername_loggedin'];
	
	$as_db_query = "SELECT * FROM as_member WHERE member_name = '$as_membername'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $memberid, $member_name) = $database->get_row( $as_db_query );
		$results['member'] = $memberid;
	} else  {
		return false;
		header( "Location: index.php?action=members");	
	}
	
	require( AS_INC . "as_viewmember.php" );
		
}

function member_delete() {
	$as_memberid = isset( $_GET['as_memberid'] ) ? $_GET['as_memberid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_member WHERE memberid = '$as_memberid'";
	$delete = array(
		'memberid' => $as_memberid,
	);
	$deleted = $database->delete( 'as_member', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=member_all");	
	}
}

?>