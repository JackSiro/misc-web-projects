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
			'employee_group' => trim($_POST['admin_role']),
		);
		$where_clause = array('employee_name' => $admin_username);
		$updated = $database->as_update( 'as_employee', $Update_Admin_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
 		
	function as_add_new_bus(){		
		$database = new As_Dbconn();			
		$New_Bus_Details = array(	
			'bus_busno' => trim($_POST['busno']),
			'bus_regno' => trim($_POST['regno']),
			'bus_seats' => trim($_POST['seats']),
			'bus_driver' => trim($_POST['driver']),
			'bus_created' => date('Y-m-d H:i:s'),
			'bus_createdby' => "1",
		);
			
		$add_query = $database->as_insert( 'as_bus', $New_Bus_Details ); 
	}
	
		
	function as_add_new_place(){		
		$database = new As_Dbconn();			
		$New_Place_Details = array(	
			'place_title' => trim($_POST['title']),
			'place_created' => date('Y-m-d H:i:s'),
			'place_createdby' => "1",
		);
			
		$add_query = $database->as_insert( 'as_place', $New_Place_Details ); 
	}
	//bus, pagefrom, pageto, depature, pass, seat, customer, mobile, amount, payment	
	function as_add_new_ticket(){
		
		$database = new As_Dbconn();			
		$New_Item_Details = array(
			'ticket_bus' => trim($_POST['bus']),
			'ticket_pagefrom' => trim($_POST['pagefrom']),
			'ticket_pageto' => trim($_POST['pageto']),
			'ticket_depature' => trim($_POST['depature']),
			'ticket_pass' => trim($_POST['pass']),
			'ticket_seat' => trim($_POST['seat']),
			'ticket_customer' => trim($_POST['customer']),
			'ticket_mobile' => trim($_POST['mobile']),
			'ticket_amount' => trim($_POST['amount']),
			'ticket_payment' => trim($_POST['payment']),
		    'ticket_created' => date('Y-m-d H:i:s'),
		    'ticket_createdby' => "1",
		);
			
		$add_query = $database->as_insert( 'as_ticket', $New_Item_Details ); 
	}
		
	function as_add_new_customer(){		
		$database = new As_Dbconn();			
		$New_Place_Details = array(	
			'customer_fullname' => trim($_POST['customer']),
			'customer_mobile' => trim($_POST['mobile']),
			'customer_joined' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->as_insert( 'as_customer', $New_Place_Details ); 
	}
	
?>