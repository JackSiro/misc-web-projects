<?php
	session_start();
	require( 'as_config.php' );
	include AS_FUNC.'as_dbconn.php';
	require AS_FUNC.'as_base.php';
	include AS_FUNC.'as_options.php';
	include AS_FUNC.'as_paging.php';
	include AS_FUNC.'as_posting.php';
	include AS_FUNC.'as_employees.php';
 	
	include 'as_pages.php';
	
 	$as_loginid = isset( $_SESSION['mysite_user'] ) ? $_SESSION['mysite_user'] : "";
	
	$page = isset( $_GET['page'] ) ? $_GET['page'] : "";
	$myaccount = isset( $_SESSION['mysite_account'] ) ? $_SESSION['mysite_account'] : "";
	      
  switch ( $page ) {
	case 'login': as_signin();
		break;
	case 'register': register();
		break;
	case 'forgot_password': forgot_password();
		break;
	case 'recover_password': recover_password();
		break;
	case 'forgot_username': forgot_username();
		break;
	case 'recover_username': recover_username();
		break;
	case 'logout': logout();
		break;
	case 'hotel_all':  hotel_all();
		break;
	case 'hotel_new': hotel_new();
		break;
	case 'hotel_view': hotel_view();
		break;
	case 'tourist_all': tourist_all();
		break;
	case 'book_hotel' : book_hotel();
		break;
	case 'book_now':  ticket_new();
		break;
	case 'ticket_all': ticket_all();
		break;
	case 'ticket_view': ticket_view();
		break;
	case 'ticket_edit':  ticket_edit();
		break;
	case 'ticket_delete':  ticket_delete();
		break;
	case 'employee_all': employee_all();
		break;
	case 'employee_new':  employee_new();
		break;
	case 'employee_view': employee_view();
		break;
	case 'place_all': place_all();
		break;
	case 'place_new':  place_new();
		break;
	case 'place_view': place_view();
		break;
	case 'profile': 
		if ($myaccount) as_profile();
		break; 
	case 'booking':  as_booking();
		break;	
	case 'options':  as_options();
		break;
	case 'slide':  as_slide();
		break;
    default:
		as_homepage();
}

function as_homepage() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Dashboard"; 
	
	require( AS_INC . "as_homepage.php" );
}

function as_booking() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Dashboard"; 
	
	if ( isset( $_POST['StartBooking'] ) ) {		
		header( "Location: index.php?page=book_now&&date=".$_POST['datetravel']."&&type=".$_POST['type']."&&placefrom=".$_POST['placefrom']."&&placeto=".$_POST['placeto']);						
	}  else {	
		require( AS_INC . "as_booking.php" );
	}
}
	
function register() {
	$results = array();
	$results['pageTitle'] = "KTTC ELibrary Catalogue Management System";
	$results['pageAction'] = "Register"; 
	
	if ( isset( $_POST['Register'] ) ) {
		as_register_me();
		header( "Location: index.php");		
	}  else {
		require( AS_INC . "as_register.php" );
	}	
	
}

  function forgot_username() {
	$results = array();
	$results['pageTitle'] = "KTTC ELibrary Catalogue Management System";
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
	$results['pageTitle'] = "KTTC ELibrary Catalogue Management System";
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
	$results['pageTitle'] = "KTTC ELibrary Catalogue Management System";
	$results['pageAction'] = "RecoveredUsername"; 
	require( AS_INC . "as_recover_username.php" );
	
}

function recover_password() {
	$results = array();
	$results['pageTitle'] = "KTTC ELibrary Catalogue Management System";
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

function as_options() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Options"; 
	$as_loginid = isset( $_SESSION['mysite_user'] ) ? $_SESSION['mysite_user'] : "";
	
	if ( isset( $_POST['SaveSite'] ) ) {
			
		as_set_option('sitename', $_POST['sitename'], $as_loginid);	
		as_set_option('keywords', $_POST['keywords'], $as_loginid);
		as_set_option('description', $_POST['description'], $as_loginid);
		as_set_option('siteurl', $_POST['siteurl'], $as_loginid);
		
		header( "Location: index.php?page=options");						
	}  else if ( isset( $_POST['CancelSave'] ) ) {
		header( "Location: index.php?page=options");						
	}  else {
		require( AS_INC . "as_options.php" );
	}
	
}


function as_slide() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Slide"; 
	$as_loginid = isset( $_SESSION['mysite_user'] ) ? $_SESSION['mysite_user'] : "";
	
	if ( isset( $_POST['SaveSlide'] ) ) {
			
		as_set_option('slide1_title', $_POST['slide1_title'], $as_loginid);	
		as_set_option('slide1_price', $_POST['slide1_price'], $as_loginid);
		as_set_option('slide1_url', $_POST['slide1_url'], $as_loginid);
		as_set_option('slide1_description', $_POST['slide1_description'], $as_loginid);
			
		as_set_option('slide2_title', $_POST['slide2_title'], $as_loginid);	
		as_set_option('slide2_price', $_POST['slide2_price'], $as_loginid);
		as_set_option('slide2_url', $_POST['slide2_url'], $as_loginid);
		as_set_option('slide2_description', $_POST['slide2_description'], $as_loginid);
			
		as_set_option('slide3_title', $_POST['slide3_title'], $as_loginid);	
		as_set_option('slide3_price', $_POST['slide3_price'], $as_loginid);
		as_set_option('slide3_url', $_POST['slide3_url'], $as_loginid);
		as_set_option('slide3_description', $_POST['slide3_description'], $as_loginid);
		
		header( "Location: index.php?page=slide");						
	}  else if ( isset( $_POST['CancelSave'] ) ) {
		header( "Location: index.php?page=slide");						
	}  else {
		require( AS_INC . "as_slides.php" );
	}
	
}

function book_hotel() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Viewhotel"; 
	$as_hotelid = isset( $_GET['as_hotelid'] ) ? $_GET['as_hotelid'] : "";
	
	$as_db_query = "SELECT * FROM as_hotel WHERE hotelid = '$as_hotelid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $hotelid) = $database->get_row( $as_db_query );
		$results['hotel'] = $hotelid;
	} else  {
		return false;
		header( "Location: index.php?page=hotel_all");	
	}
	
	if ( isset( $_POST['SubmitTicket'])) {
		as_book_hotel($as_hotelid);
		header( "Location: index.php?page=ticket_all");					
	}  else {
		require( AS_INC . "as_book_hotel.php" );
	}		
}
function book_place() {
	$results = array();
	$results['pageTitle'] = "Management System";
	$results['pageAction'] = "Viewplace"; 
	$as_placeid = isset( $_GET['as_placeid'] ) ? $_GET['as_placeid'] : "";
	
	$as_db_query = "SELECT * FROM as_place WHERE placeid = '$as_placeid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $placeid) = $database->get_row( $as_db_query );
		$results['place'] = $placeid;
	} else  {
		return false;
		header( "Location: index.php?page=place_all");	
	}
	
	if ( isset( $_POST['SubmitTicket'])) {
		as_book_place($as_placeid);
		header( "Location: index.php?page=ticket_all");					
	}  else {
		require( AS_INC . "as_book_place.php" );
	}		
}

?>
