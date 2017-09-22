<?php

	  
function payment_all() {
	$results = array();
	$results['pageTitle'] = "Nafaka Stationery payments";
	$results['pageAction'] = "All Stationery Items"; 
	
	require( AS_INC . "as_payment_all.php" );
}

function payment_new() {
	$results = array();
	$results['pageTitle'] = "Nafaka Stationery payments";
	$results['pageAction'] = "Newpayment"; 
	
	if ( isset( $_POST['PlaceOrder'] ) ) {
		as_add_new_payment();
		header( "Location: index.php?action=payment_all");						
	}  else {
		require( AS_INC . "as_payment_new.php" );
	}
	
}

function payment_view() {
	$results = array();
	$results['pageTitle'] = "Nafaka Stationery payments";
	$results['pageAction'] = "Viewpayment"; 
	$as_paymentid = isset( $_GET['as_paymentid'] ) ? $_GET['as_paymentid'] : "";
	
	$as_db_query = "SELECT * FROM as_payment WHERE paymentid = '$as_paymentid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $paymentid, $user_name) = $database->get_row( $as_db_query );
		$results['payment'] = $paymentid;
	} else  {
		return false;
		header( "Location: index.php?action=payment_all");	
	}
	
	if ( isset( $_POST['UpdateItem'] ) ) {
		as_update_payment($as_paymentid);
		header( "Location: index.php?action=payment_all");				
	} else if ( isset( $_POST['DeleteItem'] ) ) {
		as_delete_payment($as_paymentid);
		header( "Location: index.php?action=payment_all");				
	}  else {
		require( AS_INC . "as_payment_view.php" );
	}		
}

function payment_edit() {
	$results = array();
	$results['pageTitle'] = "Nafaka Stationery payments";
	$results['pageAction'] = "Editpayment"; 
	$as_paymentid = isset( $_GET['as_paymentid'] ) ? $_GET['as_paymentid'] : "";
	
	$as_db_query = "SELECT * FROM as_payment WHERE paymentid = '$as_paymentid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $paymentid) = $database->get_row( $as_db_query );
		$results['payment'] = $paymentid;
	} else  {
		return false;
		header( "Location: index.php?action=elibrary");	
	}
	
	if ( isset( $_POST['SaveItem'] ) ) {
		as_edit_payment($as_paymentid);
		header( "Location: index.php?action=payment_edit&&as_paymentid=".$as_paymentid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		as_edit_payment($as_paymentid);
		header( "Location: index.php?action=payment_view&&as_paymentid=".$as_paymentid);					
	}  else {
		require( AS_INC . "as_payment_edit.php" );
	}	
	
}

function payment_delete() {
	$as_paymentid = isset( $_GET['as_paymentid'] ) ? $_GET['as_paymentid'] : "";
	
	$database = new As_Dbconn();
	$as_db_query = "DELETE * FROM as_payment WHERE paymentid = '$as_paymentid'";
	$delete = array(
		'paymentid' => $as_paymentid,
	);
	$deleted = $database->delete( 'as_payment', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=payment_all");	
	}
}

?>