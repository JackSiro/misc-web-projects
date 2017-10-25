<?php
function item_all() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = " Items";  
	require( AS_INC . "as_item_all.php" );
}

function item_new() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "Add a New  Item"; 
	
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

function item_sell() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "ViewItem"; 
	$as_itemid = isset( $_GET['as_itemid'] ) ? $_GET['as_itemid'] : "";
	
	$as_db_query = "SELECT * FROM as_item WHERE itemid = '$as_itemid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $itemid, $item_name) = $database->get_row( $as_db_query );
		$results['item'] = $itemid;
	} else  {
		return false;
		header( "Location: index.php?action=item_all");	
	}
	
	if ( isset( $_POST['SellItem'] ) ) {
		as_sell_item($as_itemid, as_add_new_user());
		header( "Location: index.php?action=sales_all");						
	}  else {
		require( AS_INC . "as_item_sell.php" );
	}	
	
}


function item_edit() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "Viewcategory"; 
	$as_itemid = isset( $_GET['as_itemid'] ) ? $_GET['as_itemid'] : "";
	
	$as_db_query = "SELECT * FROM as_item WHERE itemid = '$as_itemid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $itemid, $item_name) = $database->get_row( $as_db_query );
		$results['category'] = $itemid;
	} else  {
		return false;
		header( "Location: index.php?action=item_all");	
	}
	
	if ( isset( $_POST['SaveItem'] ) ) {
		as_edit_item($as_itemid);
		header( "Location: index.php?action=item_view&&as_itemid=".$as_itemid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		as_edit_item($as_itemid);
		header( "Location: index.php?action=item_all");						
	}  else {
		require( AS_INC . "as_item_edit.php" );
	}	
	
}



function item_delete() {
	$as_itemid = isset( $_GET['as_itemid'] ) ? $_GET['as_itemid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_item WHERE itemid = '$as_itemid'";
	$delete = array(
		'itemid' => $as_itemid,
	);
	$deleted = $database->delete( 'as_item', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=item_all");	
	}
}

	  
function sales_all() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "All  Items"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$as_search = $_POST['as_search'];
		$as_itemid = $_POST['as_itemid'];
		
		header( "Location: index.php?action=as_search&&as_search=".$as_search."&&as_itemid=".$as_itemid);
								
	}  else {	
		require( AS_INC . "as_sales_all.php" );
	}
}

function user_all() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "Users";  
	require( AS_INC . "as_user_all.php" );
}

function user_new() {
	$results = array();
	$results['pageTitle'] = "JS System";
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
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "Viewuser"; 
	$as_userid = isset( $_GET['as_userid'] ) ? $_GET['as_userid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "SELECT * FROM as_user WHERE userid = '$as_userid'";
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $userid, $user_name) = $database->get_row( $as_db_query );
		$results['user'] = $userid;
	} else  {
		return false;
		header( "Location: index.php?action=user_all");	
	}
	
	require( AS_INC . "as_user_view.php" );
		
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
	
function profile() {
	$results = array();
	$results['pageTitle'] = "JS System";
	$results['pageAction'] = "Profile"; 
	$as_username = $_SESSION['siteuser_user'];
	
	$as_db_query = "SELECT * FROM as_user WHERE user_name = '$as_username'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $userid, $user_name) = $database->get_row( $as_db_query );
		$results['user'] = $userid;
	} else  {
		return false;
		header( "Location: index.php?action=users");	
	}
	
	require( AS_INC . "as_viewuser.php" );
		
}


function forgot_username() {
	$results = array();
	$results['pageTitle'] = "Doctors Appointment";
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
	$results['pageTitle'] = "Doctors Appointment";
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
	$results['pageTitle'] = "Doctors Appointment";
	$results['pageAction'] = "RecoveredUsername"; 
	require( AS_INC . "as_recover_username.php" );
	
}

function recover_password() {
	$results = array();
	$results['pageTitle'] = "Doctors Appointment";
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