<?php
	  
 function product_all() {
	$results = array();
	$results['pageTitle'] = "Mkangara Agrovet Products";
	$results['pageAction'] = "All Products"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$js_search = $_POST['js_search'];
		$js_catid = $_POST['js_catid'];
		
		header( "Location: index.php?action=js_search&&js_search=".$js_search."&&js_catid=".$js_catid);
								
	}  else {	
		require( JS_INC . "js_product_all.php" );
	}
 }

  function product_new() {
	$results = array();
	$results['pageTitle'] = "Mkangara Agrovet Products";
	$results['pageAction'] = "Newproduct"; 
	
	if ( isset( $_POST['AddProduct'] ) ) {
		js_add_new_product();
		header( "Location: index.php?action=product_all");						
	}  else {
		require( JS_INC . "js_product_new.php" );
	}	
	
}

 function product_view() {
	$results = array();
	$results['pageTitle'] = "Mkangara Agrovet Products";
	$results['pageAction'] = "Viewproduct"; 
	$js_productid = isset( $_GET['js_productid'] ) ? $_GET['js_productid'] : "";
	
	$js_db_query = "SELECT * FROM js_product WHERE productid = '$js_productid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $productid) = $database->get_row( $js_db_query );
		$results['product'] = $productid;
	} else  {
		return false;
		header( "Location: index.php?action=product_all");	
	}
		
	if ( isset( $_POST['SaveChanges'] ) ) {
		js_edit_product($js_productid);
		header( "Location: index.php?action=product_edit&&js_productid=".$js_productid);						
	}   else {
		require( JS_INC . "js_product_view.php" );
	}
	
}

 function product_delete() {
	$js_productid = isset( $_GET['js_productid'] ) ? $_GET['js_productid'] : "";
	
	$database = new Js_Dbconn();
	$js_db_query = "DELETE * FROM js_product WHERE productid = '$js_productid'";
	$delete = array(
		'productid' => $js_productid,
	);
	$deleted = $database->delete( 'js_product', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=product_all");	
	}
 }

 	  
 function request_all() {
	$results = array();
	$results['pageTitle'] = "Mkangara Agrovet Requests";
	$results['pageAction'] = "All Requests"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$js_search = $_POST['js_search'];
		$js_catid = $_POST['js_catid'];
		
		header( "Location: index.php?action=js_search&&js_search=".$js_search."&&js_catid=".$js_catid);
								
	}  else {	
		require( JS_INC . "js_request_all.php" );
	}
 }

  function request_new() {
	$results = array();
	$results['pageTitle'] = "Mkangara Agrovet Requests";
	$results['pageAction'] = "Newrequest"; 
	
	if ( isset( $_POST['AddRequest'] ) ) {
		js_add_new_request();
		header( "Location: index.php?action=request_all");						
	}  else {
		require( JS_INC . "js_request_new.php" );
	}	
	
}

 function request_view() {
	$results = array();
	$results['pageTitle'] = "Mkangara Agrovet Requests";
	$results['pageAction'] = "Viewrequest"; 
	$js_requestid = isset( $_GET['js_requestid'] ) ? $_GET['js_requestid'] : "";
	
	$js_db_query = "SELECT * FROM js_request WHERE requestid = '$js_requestid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $requestid) = $database->get_row( $js_db_query );
		$results['request'] = $requestid;
	} else  {
		return false;
		header( "Location: index.php?action=request_all");	
	}
		
	if ( isset( $_POST['SaveChanges'] ) ) {
		js_edit_request($js_requestid);
		header( "Location: index.php?action=request_edit&&js_requestid=".$js_requestid);						
	}   else {
		require( JS_INC . "js_request_view.php" );
	}
	
}

 function request_delete() {
	$js_requestid = isset( $_GET['js_requestid'] ) ? $_GET['js_requestid'] : "";
	
	$database = new Js_Dbconn();
	$js_db_query = "DELETE * FROM js_request WHERE requestid = '$js_requestid'";
	$delete = array(
		'requestid' => $js_requestid,
	);
	$deleted = $database->delete( 'js_request', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=request_all");	
	}
 }

  	  
 function invoice_all() {
	$results = array();
	$results['pageTitle'] = "Mkangara Agrovet Invoices";
	$results['pageAction'] = "All Invoices"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$js_search = $_POST['js_search'];
		$js_catid = $_POST['js_catid'];
		
		header( "Location: index.php?action=js_search&&js_search=".$js_search."&&js_catid=".$js_catid);
								
	}  else {	
		require( JS_INC . "js_invoice_all.php" );
	}
 }

  function invoice_new() {
	$results = array();
	$results['pageTitle'] = "Mkangara Agrovet Invoices";
	$results['pageAction'] = "Newinvoice"; 
	
	if ( isset( $_POST['AddInvoice'] ) ) {
		js_add_new_invoice();
		header( "Location: index.php?action=invoice_all");						
	}  else {
		require( JS_INC . "js_invoice_new.php" );
	}	
	
}

 function invoice_view() {
	$results = array();
	$results['pageTitle'] = "Mkangara Agrovet Invoices";
	$results['pageAction'] = "Viewinvoice"; 
	$js_invoiceid = isset( $_GET['js_invoiceid'] ) ? $_GET['js_invoiceid'] : "";
	
	$js_db_query = "SELECT * FROM js_invoice WHERE invoiceid = '$js_invoiceid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $invoiceid) = $database->get_row( $js_db_query );
		$results['invoice'] = $invoiceid;
	} else  {
		return false;
		header( "Location: index.php?action=invoice_all");	
	}
		
	if ( isset( $_POST['SaveChanges'] ) ) {
		js_edit_invoice($js_invoiceid);
		header( "Location: index.php?action=invoice_edit&&js_invoiceid=".$js_invoiceid);						
	}   else {
		require( JS_INC . "js_invoice_view.php" );
	}
	
}

 function invoice_delete() {
	$js_invoiceid = isset( $_GET['js_invoiceid'] ) ? $_GET['js_invoiceid'] : "";
	
	$database = new Js_Dbconn();
	$js_db_query = "DELETE * FROM js_invoice WHERE invoiceid = '$js_invoiceid'";
	$delete = array(
		'invoiceid' => $js_invoiceid,
	);
	$deleted = $database->delete( 'js_invoice', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=invoice_all");	
	}
 }

	  
 function payment_all() {
	$results = array();
	$results['pageTitle'] = "Mkangara Agrovet Payments";
	$results['pageAction'] = "All Payments"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$js_search = $_POST['js_search'];
		$js_catid = $_POST['js_catid'];
		
		header( "Location: index.php?action=js_search&&js_search=".$js_search."&&js_catid=".$js_catid);
								
	}  else {	
		require( JS_INC . "js_payment_all.php" );
	}
 }

  function payment_new() {
	$results = array();
	$results['pageTitle'] = "Mkangara Agrovet Payments";
	$results['pageAction'] = "Newpayment"; 
	
	if ( isset( $_POST['AddPayment'] ) ) {
		js_add_new_payment();
		header( "Location: index.php?action=payment_all");						
	}  else {
		require( JS_INC . "js_payment_new.php" );
	}	
	
}

 function payment_view() {
	$results = array();
	$results['pageTitle'] = "Mkangara Agrovet Payments";
	$results['pageAction'] = "Viewpayment"; 
	$js_paymentid = isset( $_GET['js_paymentid'] ) ? $_GET['js_paymentid'] : "";
	
	$js_db_query = "SELECT * FROM js_payment WHERE paymentid = '$js_paymentid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $paymentid) = $database->get_row( $js_db_query );
		$results['payment'] = $paymentid;
	} else  {
		return false;
		header( "Location: index.php?action=payment_all");	
	}
		
	if ( isset( $_POST['SaveChanges'] ) ) {
		js_edit_payment($js_paymentid);
		header( "Location: index.php?action=payment_edit&&js_paymentid=".$js_paymentid);						
	}   else {
		require( JS_INC . "js_payment_view.php" );
	}
	
}

 function payment_delete() {
	$js_paymentid = isset( $_GET['js_paymentid'] ) ? $_GET['js_paymentid'] : "";
	
	$database = new Js_Dbconn();
	$js_db_query = "DELETE * FROM js_payment WHERE paymentid = '$js_paymentid'";
	$delete = array(
		'paymentid' => $js_paymentid,
	);
	$deleted = $database->delete( 'js_payment', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=payment_all");	
	}
 }

	  
 function schedule_all() {
	$results = array();
	$results['pageTitle'] = "Mkangara Agrovet Schedules";
	$results['pageAction'] = "All Schedules"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$js_search = $_POST['js_search'];
		$js_catid = $_POST['js_catid'];
		
		header( "Location: index.php?action=js_search&&js_search=".$js_search."&&js_catid=".$js_catid);
								
	}  else {	
		require( JS_INC . "js_schedule_all.php" );
	}
 }

  function schedule_new() {
	$results = array();
	$results['pageTitle'] = "Mkangara Agrovet Schedules";
	$results['pageAction'] = "Newschedule"; 
	
	if ( isset( $_POST['AddSchedule'] ) ) {
		js_add_new_schedule();
		header( "Location: index.php?action=schedule_all");						
	}  else {
		require( JS_INC . "js_schedule_new.php" );
	}	
	
}

 function schedule_view() {
	$results = array();
	$results['pageTitle'] = "Mkangara Agrovet Schedules";
	$results['pageAction'] = "Viewschedule"; 
	$js_scheduleid = isset( $_GET['js_scheduleid'] ) ? $_GET['js_scheduleid'] : "";
	
	$js_db_query = "SELECT * FROM js_schedule WHERE scheduleid = '$js_scheduleid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $scheduleid) = $database->get_row( $js_db_query );
		$results['schedule'] = $scheduleid;
	} else  {
		return false;
		header( "Location: index.php?action=schedule_all");	
	}
		
	if ( isset( $_POST['SaveChanges'] ) ) {
		js_edit_schedule($js_scheduleid);
		header( "Location: index.php?action=schedule_edit&&js_scheduleid=".$js_scheduleid);						
	}   else {
		require( JS_INC . "js_schedule_view.php" );
	}
	
}

 function schedule_delete() {
	$js_scheduleid = isset( $_GET['js_scheduleid'] ) ? $_GET['js_scheduleid'] : "";
	
	$database = new Js_Dbconn();
	$js_db_query = "DELETE * FROM js_schedule WHERE scheduleid = '$js_scheduleid'";
	$delete = array(
		'scheduleid' => $js_scheduleid,
	);
	$deleted = $database->delete( 'js_schedule', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=schedule_all");	
	}
 }


 
?>