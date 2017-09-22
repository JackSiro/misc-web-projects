 <?php

	  
function session_all() {
	$results = array();
	$results['pageTitle'] = "Customers Session";
	$results['pageAction'] = "All Cereal Items"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$js_search = $_POST['js_search'];
		$js_parkingslotid = $_POST['js_parkingslotid'];
		
		header( "Location: index.php?action=js_search&&js_search=".$js_search."&&js_parkingslotid=".$js_parkingslotid);
								
	}  else {	
		require( JS_INC . "js_session_all.php" );
	}
}

function session_search() {
	$results = array();
	$results['pageTitle'] = "Customers Session";
	$results['pageAction'] = "Search"; 
	$results['search'] = isset( $_GET['js_sessionid'] ) ? $_GET['js_sessionid'] : "";
	$results['searchcat'] = isset( $_GET['js_parkingslotid'] ) ? $_GET['js_parkingslotid'] : "";
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$js_search = $_POST['js_search'];
		$js_parkingslotid = $_POST['js_parkingslotid'];
		
		header( "Location: index.php?action=js_search&&js_search=".$js_search."&&js_parkingslotid=".$js_parkingslotid);
														
	}  else {	
		require( JS_INC . "js_search.php" );
	}
}
function session_new() {
	$results = array();
	$results['pageTitle'] = "Customers Session";
	$results['pageAction'] = "AddSession"; 
	
	if ( isset( $_POST['AddSession'] ) ) {
		js_add_new_session();
		header( "Location: index.php?action=session_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		js_add_new_session();
		header( "Location: index.php?action=session_all");						
	}  else {
		require( JS_INC . "js_session_new.php" );
	}	
	
}

function session_view() {
	$results = array();
	$results['pageTitle'] = "Customers Session";
	$results['pageAction'] = "Viewsession"; 
	$js_sessionid = isset( $_GET['js_sessionid'] ) ? $_GET['js_sessionid'] : "";
	
	$js_db_query = "SELECT * FROM js_session WHERE sessionid = '$js_sessionid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $sessionid, $user_name) = $database->get_row( $js_db_query );
		$results['session'] = $sessionid;
	} else  {
		return false;
		header( "Location: index.php?action=session_all");	
	}
	
	if ( isset( $_POST['SessionNow'] ) ) {
		js_add_new_session();
		header( "Location: index.php?action=session_all");				
	}  else {
		require( JS_INC . "js_session_view.php" );
	}	
	
}

function session_edit() {
	$results = array();
	$results['pageTitle'] = "Customers Session";
	$results['pageAction'] = "Editsession"; 
	$js_sessionid = isset( $_GET['js_sessionid'] ) ? $_GET['js_sessionid'] : "";
	
	$js_db_query = "SELECT * FROM js_session WHERE sessionid = '$js_sessionid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $sessionid) = $database->get_row( $js_db_query );
		$results['session'] = $sessionid;
	} else  {
		return false;
		header( "Location: index.php?action=elibrary");	
	}
	
	if ( isset( $_POST['SaveItem'] ) ) {
		js_edit_session($js_sessionid);
		header( "Location: index.php?action=session_edit&&js_sessionid=".$js_sessionid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		js_edit_session($js_sessionid);
		header( "Location: index.php?action=session_view&&js_sessionid=".$js_sessionid);					
	}  else {
		require( JS_INC . "js_session_edit.php" );
	}	
	
}

function session_delete() {
	$js_sessionid = isset( $_GET['js_sessionid'] ) ? $_GET['js_sessionid'] : "";
	
	$database = new Js_Dbconn();
	$js_db_query = "DELETE * FROM js_session WHERE sessionid = '$js_sessionid'";
	$delete = array(
		'sessionid' => $js_sessionid,
	);
	$deleted = $database->delete( 'js_session', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=session_all");	
	}
}

function parkingslot_all() {
	$results = array();
	$results['pageTitle'] = "Cereals Customers";
	$results['pageAction'] = "Packingslots";  
	require( JS_INC . "js_parkingslot_all.php" );
}

function parkingslot_new() {
	$results = array();
	$results['pageTitle'] = "Cereals Customers";
	$results['pageAction'] = "Add a New Packingslot"; 
	
	if ( isset( $_POST['AddParkingSlot'] ) ) {
		js_add_new_parkingslot();
		header( "Location: index.php?action=parkingslot_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		js_add_new_parkingslot();
		header( "Location: index.php?action=parkingslot_all");						
	}  else {
		require( JS_INC . "js_parkingslot_new.php" );
	}	
	
}

function parkingslot_view() {
	$results = array();
	$results['pageTitle'] = "Cereals Customers";
	$results['pageAction'] = "Viewcat"; 
	$js_parkingslotid = isset( $_GET['js_parkingslotid'] ) ? $_GET['js_parkingslotid'] : "";
	
	$js_db_query = "SELECT * FROM js_parkingslot WHERE parkingslotid = '$js_parkingslotid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $parkingslotid, $cat_slug) = $database->get_row( $js_db_query );
		$results['type'] = $parkingslotid;
	} else  {
		return false;
		header( "Location: index.php?action=parkingslot_all");	
	}
	
	if ( isset( $_POST['SaveCart'] ) ) {
		js_edit_type($js_parkingslotid);
		header( "Location: index.php?action=viewcat&&js_parkingslotid=".$js_parkingslotid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		js_edit_type($js_parkingslotid);
		header( "Location: index.php?action=parkingslot_all");						
	}  else {
		require( JS_INC . "js_parkingslot_view.php" );
	}	
	
}
	  
function item_all() {
	$results = array();
	$results['pageTitle'] = "Cereals Customers";
	$results['pageAction'] = "All Cereal Items"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$js_search = $_POST['js_search'];
		$js_parkingslotid = $_POST['js_parkingslotid'];
		
		header( "Location: index.php?action=js_search&&js_search=".$js_search."&&js_parkingslotid=".$js_parkingslotid);
								
	}  else {	
		require( JS_INC . "js_item_all.php" );
	}
}

function item_search() {
	$results = array();
	$results['pageTitle'] = "Cereals Customers";
	$results['pageAction'] = "Search"; 
	$results['search'] = isset( $_GET['js_itemid'] ) ? $_GET['js_itemid'] : "";
	$results['searchcat'] = isset( $_GET['js_parkingslotid'] ) ? $_GET['js_parkingslotid'] : "";
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$js_search = $_POST['js_search'];
		$js_parkingslotid = $_POST['js_parkingslotid'];
		
		header( "Location: index.php?action=js_search&&js_search=".$js_search."&&js_parkingslotid=".$js_parkingslotid);
														
	}  else {	
		require( JS_INC . "js_search.php" );
	}
}
function item_new() {
	$results = array();
	$results['pageTitle'] = "Cereals Customers";
	$results['pageAction'] = "Newitem"; 
	
	if ( isset( $_POST['AddItem'] ) ) {
		js_add_new_item();
		header( "Location: index.php?action=item_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		js_add_new_item();
		header( "Location: index.php?action=item_all");						
	}  else {
		require( JS_INC . "js_item_new.php" );
	}	
	
}

function item_view() {
	$results = array();
	$results['pageTitle'] = "Cereals Customers";
	$results['pageAction'] = "Viewitem"; 
	$js_itemid = isset( $_GET['js_itemid'] ) ? $_GET['js_itemid'] : "";
	
	$js_db_query = "SELECT * FROM js_item WHERE itemid = '$js_itemid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $itemid, $user_name) = $database->get_row( $js_db_query );
		$results['item'] = $itemid;
	} else  {
		return false;
		header( "Location: index.php?action=item_all");	
	}
	
	if ( isset( $_POST['SessionNow'] ) ) {
		js_add_new_session();
		header( "Location: index.php?action=session_all");				
	}  else {
		require( JS_INC . "js_item_view.php" );
	}	
	
}

function item_edit() {
	$results = array();
	$results['pageTitle'] = "Cereals Customers";
	$results['pageAction'] = "Edititem"; 
	$js_itemid = isset( $_GET['js_itemid'] ) ? $_GET['js_itemid'] : "";
	
	$js_db_query = "SELECT * FROM js_item WHERE itemid = '$js_itemid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $itemid) = $database->get_row( $js_db_query );
		$results['item'] = $itemid;
	} else  {
		return false;
		header( "Location: index.php?action=elibrary");	
	}
	
	if ( isset( $_POST['SaveItem'] ) ) {
		js_edit_item($js_itemid);
		header( "Location: index.php?action=item_edit&&js_itemid=".$js_itemid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		js_edit_item($js_itemid);
		header( "Location: index.php?action=item_view&&js_itemid=".$js_itemid);					
	}  else {
		require( JS_INC . "js_item_edit.php" );
	}	
	
}

function item_delete() {
	$js_itemid = isset( $_GET['js_itemid'] ) ? $_GET['js_itemid'] : "";
	
	$database = new Js_Dbconn();
	$js_db_query = "DELETE * FROM js_item WHERE itemid = '$js_itemid'";
	$delete = array(
		'itemid' => $js_itemid,
	);
	$deleted = $database->delete( 'js_item', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=item_all");	
	}
}

	
function customer_all() {
	$results = array();
	$results['pageTitle'] = "Cereals Customers";
	$results['pageAction'] = "customers";  
	require( JS_INC . "js_customer_all.php" );
}

function customer_new() {
	$results = array();
	$results['pageTitle'] = "Cereals Customers";
	$results['pageAction'] = "Newcustomer"; 
	
	if ( isset( $_POST['AddCustomer'] ) ) {
		js_add_new_customer();
		header( "Location: index.php?action=customer_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		js_add_new_customer();
		header( "Location: index.php?action=customer_all");						
	}  else {
		require( JS_INC . "js_customer_new.php" );
	}	
	
}
function customer_view() {
	$results = array();
	$results['pageTitle'] = "Cereals Customers";
	$results['pageAction'] = "Viewcustomer"; 
	$js_customerid = isset( $_GET['js_customerid'] ) ? $_GET['js_customerid'] : "";
	
	$js_db_query = "SELECT * FROM js_customer WHERE customerid = '$js_customerid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $customerid, $customer_name) = $database->get_row( $js_db_query );
		$results['customer'] = $customerid;
	} else  {
		return false;
		header( "Location: index.php?action=customer_all");	
	}
	
	require( JS_INC . "js_customer_view.php" );
		
}

function customer_profile() {
	$results = array();
	$results['pageTitle'] = "Cereals Customers";
	$results['pageAction'] = "Profile"; 
	$js_customername = $_SESSION['customername_loggedin'];
	
	$js_db_query = "SELECT * FROM js_customer WHERE customer_name = '$js_customername'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $customerid, $customer_name) = $database->get_row( $js_db_query );
		$results['customer'] = $customerid;
	} else  {
		return false;
		header( "Location: index.php?action=customers");	
	}
	
	require( JS_INC . "js_viewcustomer.php" );
		
}

	
function user_all() {
	$results = array();
	$results['pageTitle'] = "Customers Session";
	$results['pageAction'] = "Users";  
	require( JS_INC . "js_user_all.php" );
}

function user_new() {
	$results = array();
	$results['pageTitle'] = "Customers Session";
	$results['pageAction'] = "Newuser"; 
	
	if ( isset( $_POST['AddUser'] ) ) {
		js_add_new_user();
		header( "Location: index.php?action=user_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		js_add_new_user();
		header( "Location: index.php?action=user_all");						
	}  else {
		require( JS_INC . "js_user_new.php" );
	}	
	
}
function user_view() {
	$results = array();
	$results['pageTitle'] = "Customers Session";
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

	
function register() {
	$results = array();
	$results['pageTitle'] = "Customers Session";
	$results['pageAction'] = "Register"; 
	
	if ( isset( $_POST['Register'] ) ) {
		js_register_me();
		header( "Location: index.php");		
	}  else {
		require( JS_INC . "js_user_register.php" );
	}	
	
}

function forgot_username() {
	$results = array();
	$results['pageTitle'] = "Customers Session";
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
	$results['pageTitle'] = "Customers Session";
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
	$results['pageTitle'] = "Customers Session";
	$results['pageAction'] = "RecoveredUsername"; 
	require( JS_INC . "js_recover_username.php" );
	
}

function recover_password() {
	$results = array();
	$results['pageTitle'] = "Customers Session";
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


?>