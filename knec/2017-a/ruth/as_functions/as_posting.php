<?php
	// POSTING FUNCTIONS
	// Begin Posting Functions 
	
	function as_slug_this($content) {
		return preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "-", strtolower($content)));
	}
	
	function as_slug_is(){
		if(empty($_POST['slug'])) {
		    $as_slug = trim($_POST['slug']);
		} else $as_slug = as_slug_this($_POST['title']);
		
	}
	
	function as_add_admin($admin_username) {		
		$database = new As_Dbconn();	
		$Update_Admin_Details = array(
			'user_group' => trim($_POST['admin_role']),
		);
		$where_clause = array('user_name' => $admin_username);
		$updated = $database->as_update( 'as_user', $Update_Admin_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
 	
	//paymentid, payment_quantity, payment_amount, payment_date, payment_time, payment_itemi, payment_itemii, payment_paidby, payment_paid
	//customers=xcc&itemone=Ugali&itemtwo=Beans&date=dds&time=cxc&amount=sds&PlaceOrder=Place+Order
	function as_add_new_payment(){
		$database = new As_Dbconn();			
		$New_Item_Details = array(
			'payment_quantity' => trim($_POST['customers']),
			'payment_date' => trim($_POST['date']),
			'payment_time' => trim($_POST['time']),
			'payment_itemi' => trim($_POST['itemone']),
			'payment_itemii' => trim($_POST['itemtwo']),
			'payment_amount' => trim($_POST['amount']),
		    'payment_paid' => date('Y-m-d H:i:s'),
			'payment_paidby' => '1',
		);
			
		$add_query = $database->as_insert( 'as_payment', $New_Item_Details ); 
	}
			
	function as_update_payment($paymentid) {
		$database = new As_Dbconn();	
		$Update_Item_Details = array(
			'payment_quantity' => trim($_POST['amount']),
			'payment_time' => trim($_POST['session']),
		);
		$where_clause = array('paymentid' => $paymentid);
		$updated = $database->as_update( 'as_payment', $Update_Item_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
?>