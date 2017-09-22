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
	
 	$as_loginid = isset( $_SESSION['buscar_user'] ) ? $_SESSION['buscar_user'] : "";
	
	$page = isset( $_GET['page'] ) ? $_GET['page'] : "";
	$myaccount = isset( $_SESSION['buscar_account'] ) ? $_SESSION['buscar_account'] : "";
	      
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
	case 'bus_all':  bus_all();
		break;
	case 'bus_new': bus_new();
		break;
	case 'bus_view': bus_view();
		break;
	case 'book_now':  book_now();
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
	case 'customer_all': customer_all();
		break;
	case 'profile': 
		if ($myaccount) as_profile();
		break;
	case 'options':  as_options();
		break; 
	case 'booking':  as_booking();
		break;	
    default:
		as_booking();
}

function as_booking() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "Dashboard"; 
	
	if ( isset( $_POST['StartBooking'] ) ) {		
		header( "Location: index.php?page=book_now&&placefrom=".$_POST['placefrom']."&&placeto=".$_POST['placeto']);						
	}  else {	
		require( AS_INC . "as_homepage.php" );
	}
}

function as_options() {
	$results = array();
	$results['pageTitle'] = "Online Bus Ticketing";
	$results['pageAction'] = "Options"; 
	$as_loginid = isset( $_SESSION['buscar_user'] ) ? $_SESSION['buscar_user'] : "";
	
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

?>
