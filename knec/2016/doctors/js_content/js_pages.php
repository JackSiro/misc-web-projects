<?php

	  
function appointment_all() {
	$results = array();
	$results['pageTitle'] = "Doctors Appointment";
	$results['pageAction'] = "All Cereal Items"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$js_search = $_POST['js_search'];
		$js_catid = $_POST['js_catid'];
		
		header( "Location: index.php?action=js_search&&js_search=".$js_search."&&js_catid=".$js_catid);
								
	}  else {	
		require( JS_INC . "js_appointment_all.php" );
	}
}

function appointment_search() {
	$results = array();
	$results['pageTitle'] = "Doctors Appointment";
	$results['pageAction'] = "Search"; 
	$results['search'] = isset( $_GET['js_appointmentid'] ) ? $_GET['js_appointmentid'] : "";
	$results['searchcat'] = isset( $_GET['js_catid'] ) ? $_GET['js_catid'] : "";
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$js_search = $_POST['js_search'];
		$js_catid = $_POST['js_catid'];
		
		header( "Location: index.php?action=js_search&&js_search=".$js_search."&&js_catid=".$js_catid);
														
	}  else {	
		require( JS_INC . "js_search.php" );
	}
}
function appointment_new() {
	$results = array();
	$results['pageTitle'] = "Doctors Appointment";
	$results['pageAction'] = "AddAppointment"; 
	
	if ( isset( $_POST['AddAppointment'] ) ) {
		js_add_new_appointment();
		header( "Location: index.php?action=appointment_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		js_add_new_appointment();
		header( "Location: index.php?action=appointment_all");						
	}  else {
		require( JS_INC . "js_appointment_new.php" );
	}	
	
}

function appointment_view() {
	$results = array();
	$results['pageTitle'] = "Doctors Appointment";
	$results['pageAction'] = "Viewappointment"; 
	$js_appointmentid = isset( $_GET['js_appointmentid'] ) ? $_GET['js_appointmentid'] : "";
	
	$js_db_query = "SELECT * FROM js_appointment WHERE appointmentid = '$js_appointmentid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $appointmentid, $user_name) = $database->get_row( $js_db_query );
		$results['appointment'] = $appointmentid;
	} else  {
		return false;
		header( "Location: index.php?action=appointment_all");	
	}
	
	if ( isset( $_POST['AppointmentNow'] ) ) {
		js_add_new_appointment();
		header( "Location: index.php?action=appointment_all");				
	}  else {
		require( JS_INC . "js_appointment_view.php" );
	}	
	
}

function appointment_edit() {
	$results = array();
	$results['pageTitle'] = "Doctors Appointment";
	$results['pageAction'] = "Editappointment"; 
	$js_appointmentid = isset( $_GET['js_appointmentid'] ) ? $_GET['js_appointmentid'] : "";
	
	$js_db_query = "SELECT * FROM js_appointment WHERE appointmentid = '$js_appointmentid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $appointmentid) = $database->get_row( $js_db_query );
		$results['appointment'] = $appointmentid;
	} else  {
		return false;
		header( "Location: index.php?action=elibrary");	
	}
	
	if ( isset( $_POST['SaveItem'] ) ) {
		js_edit_appointment($js_appointmentid);
		header( "Location: index.php?action=appointment_edit&&js_appointmentid=".$js_appointmentid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		js_edit_appointment($js_appointmentid);
		header( "Location: index.php?action=appointment_view&&js_appointmentid=".$js_appointmentid);					
	}  else {
		require( JS_INC . "js_appointment_edit.php" );
	}	
	
}

function appointment_delete() {
	$js_appointmentid = isset( $_GET['js_appointmentid'] ) ? $_GET['js_appointmentid'] : "";
	
	$database = new Js_Dbconn();
	$js_db_query = "DELETE * FROM js_appointment WHERE appointmentid = '$js_appointmentid'";
	$delete = array(
		'appointmentid' => $js_appointmentid,
	);
	$deleted = $database->delete( 'js_appointment', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=appointment_all");	
	}
}

function category_all() {
	$results = array();
	$results['pageTitle'] = "Cereals Doctors";
	$results['pageAction'] = "Categorys";  
	require( JS_INC . "js_category_all.php" );
}

function category_new() {
	$results = array();
	$results['pageTitle'] = "Cereals Doctors";
	$results['pageAction'] = "Add a New Category"; 
	
	if ( isset( $_POST['AddDepartment'] ) ) {
		js_add_new_category();
		header( "Location: index.php?action=category_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		js_add_new_category();
		header( "Location: index.php?action=category_all");						
	}  else {
		require( JS_INC . "js_category_new.php" );
	}	
	
}

function category_view() {
	$results = array();
	$results['pageTitle'] = "Cereals Doctors";
	$results['pageAction'] = "Viewcat"; 
	$js_catid = isset( $_GET['js_catid'] ) ? $_GET['js_catid'] : "";
	
	$js_db_query = "SELECT * FROM js_category WHERE catid = '$js_catid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $catid, $cat_slug) = $database->get_row( $js_db_query );
		$results['type'] = $catid;
	} else  {
		return false;
		header( "Location: index.php?action=category_all");	
	}
	
	if ( isset( $_POST['SaveCart'] ) ) {
		js_edit_type($js_catid);
		header( "Location: index.php?action=viewcat&&js_catid=".$js_catid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		js_edit_type($js_catid);
		header( "Location: index.php?action=category_all");						
	}  else {
		require( JS_INC . "js_category_view.php" );
	}	
	
}
	  
function item_all() {
	$results = array();
	$results['pageTitle'] = "Cereals Doctors";
	$results['pageAction'] = "All Cereal Items"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$js_search = $_POST['js_search'];
		$js_catid = $_POST['js_catid'];
		
		header( "Location: index.php?action=js_search&&js_search=".$js_search."&&js_catid=".$js_catid);
								
	}  else {	
		require( JS_INC . "js_item_all.php" );
	}
}

function item_search() {
	$results = array();
	$results['pageTitle'] = "Cereals Doctors";
	$results['pageAction'] = "Search"; 
	$results['search'] = isset( $_GET['js_itemid'] ) ? $_GET['js_itemid'] : "";
	$results['searchcat'] = isset( $_GET['js_catid'] ) ? $_GET['js_catid'] : "";
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$js_search = $_POST['js_search'];
		$js_catid = $_POST['js_catid'];
		
		header( "Location: index.php?action=js_search&&js_search=".$js_search."&&js_catid=".$js_catid);
														
	}  else {	
		require( JS_INC . "js_search.php" );
	}
}
function item_new() {
	$results = array();
	$results['pageTitle'] = "Cereals Doctors";
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
	$results['pageTitle'] = "Cereals Doctors";
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
	
	if ( isset( $_POST['AppointmentNow'] ) ) {
		js_add_new_appointment();
		header( "Location: index.php?action=appointment_all");				
	}  else {
		require( JS_INC . "js_item_view.php" );
	}	
	
}

function item_edit() {
	$results = array();
	$results['pageTitle'] = "Cereals Doctors";
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

	
function doctor_all() {
	$results = array();
	$results['pageTitle'] = "Cereals Doctors";
	$results['pageAction'] = "Supps";  
	require( JS_INC . "js_doctor_all.php" );
}

function doctor_new() {
	$results = array();
	$results['pageTitle'] = "Cereals Doctors";
	$results['pageAction'] = "Newsupp"; 
	
	if ( isset( $_POST['AddDoctor'] ) ) {
		js_add_new_supp();
		header( "Location: index.php?action=doctor_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		js_add_new_supp();
		header( "Location: index.php?action=doctor_all");						
	}  else {
		require( JS_INC . "js_doctor_new.php" );
	}	
	
}
function doctor_view() {
	$results = array();
	$results['pageTitle'] = "Cereals Doctors";
	$results['pageAction'] = "Viewsupp"; 
	$js_doctorid = isset( $_GET['js_doctorid'] ) ? $_GET['js_doctorid'] : "";
	
	$js_db_query = "SELECT * FROM js_supp WHERE doctorid = '$js_doctorid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $doctorid, $doctor_name) = $database->get_row( $js_db_query );
		$results['supp'] = $doctorid;
	} else  {
		return false;
		header( "Location: index.php?action=doctor_all");	
	}
	
	require( JS_INC . "js_doctor_view.php" );
		
}

function doctor_profile() {
	$results = array();
	$results['pageTitle'] = "Cereals Doctors";
	$results['pageAction'] = "Profile"; 
	$js_suppname = $_SESSION['suppname_loggedin'];
	
	$js_db_query = "SELECT * FROM js_supp WHERE doctor_name = '$js_suppname'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $doctorid, $doctor_name) = $database->get_row( $js_db_query );
		$results['supp'] = $doctorid;
	} else  {
		return false;
		header( "Location: index.php?action=supps");	
	}
	
	require( JS_INC . "js_viewsupp.php" );
		
}

	
function user_all() {
	$results = array();
	$results['pageTitle'] = "Doctors Appointment";
	$results['pageAction'] = "Users";  
	require( JS_INC . "js_user_all.php" );
}

function user_new() {
	$results = array();
	$results['pageTitle'] = "Doctors Appointment";
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
	$results['pageTitle'] = "Doctors Appointment";
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
	$results['pageTitle'] = "Doctors Appointment";
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
	$results['pageTitle'] = "Doctors Appointment";
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
	$results['pageTitle'] = "Doctors Appointment";
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
	$results['pageTitle'] = "Doctors Appointment";
	$results['pageAction'] = "RecoveredUsername"; 
	require( JS_INC . "js_recover_username.php" );
	
}

function recover_password() {
	$results = array();
	$results['pageTitle'] = "Doctors Appointment";
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