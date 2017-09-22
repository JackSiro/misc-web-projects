<?php

	  
function complaint_all() {
	$results = array();
	$results['pageTitle'] = "clients complaint";
	$results['pageAction'] = "All Cereal Items"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$as_search = $_POST['as_search'];
		$as_catid = $_POST['as_catid'];
		
		header( "Location: index.php?action=as_search&&as_search=".$as_search."&&as_catid=".$as_catid);
								
	}  else {	
		require( AS_INC . "as_complaint_all.php" );
	}
}

function complaint_search() {
	$results = array();
	$results['pageTitle'] = "clients complaint";
	$results['pageAction'] = "Search"; 
	$results['search'] = isset( $_GET['as_complaintid'] ) ? $_GET['as_complaintid'] : "";
	$results['searchcat'] = isset( $_GET['as_catid'] ) ? $_GET['as_catid'] : "";
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$as_search = $_POST['as_search'];
		$as_catid = $_POST['as_catid'];
		
		header( "Location: index.php?action=as_search&&as_search=".$as_search."&&as_catid=".$as_catid);
														
	}  else {	
		require( AS_INC . "as_search.php" );
	}
}
function complaint_new() {
	$results = array();
	$results['pageTitle'] = "clients complaint";
	$results['pageAction'] = "Addcomplaint"; 
	
	if ( isset( $_POST['SubmitComplaint'] ) ) {
		as_new_complaint($_POST['clientid']);
		header( "Location: index.php");						
	}  else {
		require( AS_INC . "as_complaint_new.php" );
	}	
	
}

function complaint_view() {
	$results = array();
	$results['pageTitle'] = "clients complaint";
	$results['pageAction'] = "Viewcomplaint";
	
	if ( isset( $_POST['SubmitReply'] ) ) {
		$postid = $_POST['postid'];
		as_new_reply($postid);
		header( "Location: index.php?action=complaint_view&&as_complaintid=".$postid);						
	} else if ( isset( $_POST['DeleteComplaint'] ) ) {
		$postid = $_POST['postid'];
		as_delete_complaint($postid);
		header( "Location: index.php?action=complaint_all");						
	}   else {
		require( AS_INC . "as_complaint_view.php" );
	}
}

function complaint_edit() {
	$results = array();
	$results['pageTitle'] = "clients complaint";
	$results['pageAction'] = "Editcomplaint"; 
	$as_complaintid = isset( $_GET['as_complaintid'] ) ? $_GET['as_complaintid'] : "";
	
	$as_db_query = "SELECT * FROM as_complaint WHERE complaintid = '$as_complaintid'";
	$database = new As_DbConn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $complaintid) = $database->get_row( $as_db_query );
		$results['complaint'] = $complaintid;
	} else  {
		return false;
		header( "Location: index.php?action=complaint_all");	
	}
	
	if ( isset( $_POST['SaveItem'] ) ) {
		as_edit_complaint($as_complaintid);
		header( "Location: index.php?action=complaint_edit&&as_complaintid=".$as_complaintid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		as_edit_complaint($as_complaintid);
		header( "Location: index.php?action=complaint_view&&as_complaintid=".$as_complaintid);					
	}  else {
		require( AS_INC . "as_complaint_edit.php" );
	}	
	
}

function as_delete_complaint($as_complaintid) {
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_complaint WHERE complaintid = '$as_complaintid'";
	$delete = array(
		'complaintid' => $as_complaintid,
	);
	$deleted = $database->delete( 'as_complaint', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=complaint_all");	
	}
}

function complaint_delete() {
	$as_complaintid = isset( $_GET['as_complaintid'] ) ? $_GET['as_complaintid'] : "";
	
	$database = new As_DbConn();
	$as_db_query = "DELETE * FROM as_complaint WHERE complaintid = '$as_complaintid'";
	$delete = array(
		'complaintid' => $as_complaintid,
	);
	$deleted = $database->delete( 'as_complaint', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=complaint_all");	
	}
}

function category_all() {
	$results = array();
	$results['pageTitle'] = "MIS";
	$results['pageAction'] = "Categorys";  
	require( AS_INC . "as_category_all.php" );
}

function category_new() {
	$results = array();
	$results['pageTitle'] = "MIS";
	$results['pageAction'] = "Add a New Category"; 
	
	if ( isset( $_POST['AddComplaint'] ) ) {
		as_add_new_category();
		header( "Location: index.php?action=category_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_add_new_category();
		header( "Location: index.php?action=category_all");						
	}  else {
		require( AS_INC . "as_category_new.php" );
	}	
	
}

function category_view() {
	$results = array();
	$results['pageTitle'] = "MIS";
	$results['pageAction'] = "Viewcat"; 
	$as_catid = isset( $_GET['as_catid'] ) ? $_GET['as_catid'] : "";
	
	$as_db_query = "SELECT * FROM as_category WHERE catid = '$as_catid'";
	$database = new As_DbConn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $catid, $cat_slug) = $database->get_row( $as_db_query );
		$results['type'] = $catid;
	} else  {
		return false;
		header( "Location: index.php?action=category_all");	
	}
	
	if ( isset( $_POST['SaveCart'] ) ) {
		as_edit_type($as_catid);
		header( "Location: index.php?action=viewcat&&as_catid=".$as_catid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		as_edit_type($as_catid);
		header( "Location: index.php?action=category_all");						
	}  else {
		require( AS_INC . "as_category_view.php" );
	}	
	
}
	  
function item_all() {
	$results = array();
	$results['pageTitle'] = "MIS";
	$results['pageAction'] = "All Cereal Items"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$as_search = $_POST['as_search'];
		$as_catid = $_POST['as_catid'];
		
		header( "Location: index.php?action=as_search&&as_search=".$as_search."&&as_catid=".$as_catid);
								
	}  else {	
		require( AS_INC . "as_item_all.php" );
	}
}

function item_search() {
	$results = array();
	$results['pageTitle'] = "MIS";
	$results['pageAction'] = "Search"; 
	$results['search'] = isset( $_GET['as_itemid'] ) ? $_GET['as_itemid'] : "";
	$results['searchcat'] = isset( $_GET['as_catid'] ) ? $_GET['as_catid'] : "";
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$as_search = $_POST['as_search'];
		$as_catid = $_POST['as_catid'];
		
		header( "Location: index.php?action=as_search&&as_search=".$as_search."&&as_catid=".$as_catid);
														
	}  else {	
		require( AS_INC . "as_search.php" );
	}
}
function item_new() {
	$results = array();
	$results['pageTitle'] = "MIS";
	$results['pageAction'] = "Newitem"; 
	
	if ( isset( $_POST['AddItem'] ) ) {
		as_add_new_item();
		header( "Location: index.php?action=item_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_add_new_item();
		header( "Location: index.php?action=item_all");						
	}  else {
		require( AS_INC . "as_item_new.php" );
	}	
	
}

function item_view() {
	$results = array();
	$results['pageTitle'] = "MIS";
	$results['pageAction'] = "Viewitem"; 
	$as_itemid = isset( $_GET['as_itemid'] ) ? $_GET['as_itemid'] : "";
	
	$as_db_query = "SELECT * FROM as_item WHERE itemid = '$as_itemid'";
	$database = new As_DbConn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $itemid, $user_name) = $database->get_row( $as_db_query );
		$results['item'] = $itemid;
	} else  {
		return false;
		header( "Location: index.php?action=item_all");	
	}
	
	if ( isset( $_POST['complaintNow'] ) ) {
		as_add_new_complaint();
		header( "Location: index.php?action=complaint_all");				
	}  else {
		require( AS_INC . "as_item_view.php" );
	}	
	
}

function item_edit() {
	$results = array();
	$results['pageTitle'] = "MIS";
	$results['pageAction'] = "Edititem"; 
	$as_itemid = isset( $_GET['as_itemid'] ) ? $_GET['as_itemid'] : "";
	
	$as_db_query = "SELECT * FROM as_item WHERE itemid = '$as_itemid'";
	$database = new As_DbConn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $itemid) = $database->get_row( $as_db_query );
		$results['item'] = $itemid;
	} else  {
		return false;
		header( "Location: index.php?action=elibrary");	
	}
	
	if ( isset( $_POST['SaveItem'] ) ) {
		as_edit_item($as_itemid);
		header( "Location: index.php?action=item_edit&&as_itemid=".$as_itemid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		as_edit_item($as_itemid);
		header( "Location: index.php?action=item_view&&as_itemid=".$as_itemid);					
	}  else {
		require( AS_INC . "as_item_edit.php" );
	}	
	
}

function item_delete() {
	$as_itemid = isset( $_GET['as_itemid'] ) ? $_GET['as_itemid'] : "";
	
	$database = new As_DbConn();
	$as_db_query = "DELETE * FROM as_item WHERE itemid = '$as_itemid'";
	$delete = array(
		'itemid' => $as_itemid,
	);
	$deleted = $database->delete( 'as_item', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=item_all");	
	}
}

	
function client_all() {
	$results = array();
	$results['pageTitle'] = "MIS";
	$results['pageAction'] = "Supps";  
	require( AS_INC . "as_client_all.php" );
}

function client_new() {
	$results = array();
	$results['pageTitle'] = "MIS";
	$results['pageAction'] = "Newsupp"; 
	
	if ( isset( $_POST['Addclient'] ) ) {
		as_add_new_supp();
		header( "Location: index.php?action=client_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		as_add_new_supp();
		header( "Location: index.php?action=client_all");						
	}  else {
		require( AS_INC . "as_client_new.php" );
	}	
	
}
function client_view() {
	$results = array();
	$results['pageTitle'] = "MIS";
	$results['pageAction'] = "Viewsupp"; 
	$as_clientid = isset( $_GET['as_clientid'] ) ? $_GET['as_clientid'] : "";
	
	$as_db_query = "SELECT * FROM as_supp WHERE clientid = '$as_clientid'";
	$database = new As_DbConn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $clientid, $client_name) = $database->get_row( $as_db_query );
		$results['supp'] = $clientid;
	} else  {
		return false;
		header( "Location: index.php?action=client_all");	
	}
	
	require( AS_INC . "as_client_view.php" );
		
}

function client_profile() {
	$results = array();
	$results['pageTitle'] = "MIS";
	$results['pageAction'] = "Profile"; 
	$as_suppname = $_SESSION['suppname_loggedin'];
	
	$as_db_query = "SELECT * FROM as_supp WHERE client_name = '$as_suppname'";
	$database = new As_DbConn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $clientid, $client_name) = $database->get_row( $as_db_query );
		$results['supp'] = $clientid;
	} else  {
		return false;
		header( "Location: index.php?action=supps");	
	}
	
	require( AS_INC . "as_viewsupp.php" );
		
}

	
function user_all() {
	$results = array();
	$results['pageTitle'] = "clients complaint";
	$results['pageAction'] = "Users";  
	require( AS_INC . "as_user_all.php" );
}

function user_new() {
	$results = array();
	$results['pageTitle'] = "clients complaint";
	$results['pageAction'] = "Newuser"; 
	
	if ( isset( $_POST['AddUser'] ) ) {
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
	$results['pageTitle'] = "clients complaint";
	$results['pageAction'] = "Viewuser"; 
	$AS_USERid = isset( $_GET['AS_USERid'] ) ? $_GET['AS_USERid'] : "";
	
	$as_db_query = "SELECT * FROM AS_USER WHERE userid = '$AS_USERid'";
	$database = new As_DbConn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $userid, $user_name) = $database->get_row( $as_db_query );
		$results['user'] = $userid;
	} else  {
		return false;
		header( "Location: index.php?action=user_all");	
	}
	
	require( AS_INC . "as_user_view.php" );
		
}
	
function register() {
	$results = array();
	$results['pageTitle'] = "clients complaint";
	$results['pageAction'] = "Register"; 
	
	if ( isset( $_POST['Register'] ) ) {
		as_register_me();
		header( "Location: index.php");		
	}  else {
		require( AS_INC . "as_user_register.php" );
	}	
	
}

function forgot_username() {
	$results = array();
	$results['pageTitle'] = "clients complaint";
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
	$results['pageTitle'] = "clients complaint";
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
	$results['pageTitle'] = "clients complaint";
	$results['pageAction'] = "RecoveredUsername"; 
	require( AS_INC . "as_recover_username.php" );
	
}

function recover_password() {
	$results = array();
	$results['pageTitle'] = "clients complaint";
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


?>