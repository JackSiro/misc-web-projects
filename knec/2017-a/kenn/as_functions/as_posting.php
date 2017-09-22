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
 	
	function as_add_new_hotel(){		
		$database = new As_Dbconn();			
		$New_Bus_Details = array(	
			'hotel_title' => trim($_POST['title']),
			'hotel_price' => trim($_POST['price']),
			'hotel_details' => trim($_POST['details']),
			'hotel_created' => date('Y-m-d H:i:s'),
			'hotel_createdby' => "1",
		);			
		$add_query = $database->as_insert( 'as_hotel', $New_Bus_Details ); 
	}
	
		
	function as_add_new_place(){		
		$database = new As_Dbconn();			
		$New_Place_Details = array(	
			'place_title' => trim($_POST['title']),
			'place_price' => trim($_POST['price']),
			'place_details' => trim($_POST['details']),
			'place_created' => date('Y-m-d H:i:s'),
			'place_createdby' => "1",
		);
			
		$add_query = $database->as_insert( 'as_place', $New_Place_Details ); 
	}
	//type, hotel, pagefrom, pageto, depature, pass, seat, customer, mobile, amount,  payment
	
	function as_add_new_ticket(){
		$database = new As_Dbconn();			
		$New_Item_Details = array(
			'ticket_type' => trim($_POST['ticket']),
			'ticket_date' => trim($_POST['datetravel']),
			'ticket_type' => trim($_POST['hotel']),
			'ticket_startdate' => trim($_POST['pagefrom']),
			'ticket_stopdate' => trim($_POST['pageto']),
			'ticket_information' => trim($_POST['depature']),
			'ticket_pass' => trim($_POST['pass']),
			'ticket_seat' => trim($_POST['seat']),
			'ticket_tourist' => trim($_POST['customer']),
			'ticket_mobile' => trim($_POST['mobile']),
			'ticket_amount' => trim($_POST['amount']),
			'ticket_payment' => trim($_POST['payment']),
		    'ticket_posted' => date('Y-m-d H:i:s'),
		    'ticket_postedby' => "1",
		);
			
		$add_query = $database->as_insert( 'as_ticket', $New_Item_Details ); 
	}
	
	function as_book_hotel($hotelid){
		$database = new As_Dbconn();			
		$New_Item_Details = array(
			'ticket_type' => 'hotel',
			'ticket_date' => trim($_POST['ticket_startdate']),
			'ticket_startdate' => trim($_POST['ticket_startdate']),
			'ticket_stopdate' => trim($_POST['ticket_stopdate']),
			'ticket_information' => $hotelid,
			'ticket_tourist' => trim($_POST['ticket_tourist']),
			'ticket_mobile' => trim($_POST['ticket_mobile']),
			'ticket_amount' => trim($_POST['ticket_amount']),
			'ticket_payment' => trim($_POST['ticket_payment']),
		    'ticket_posted' => date('Y-m-d H:i:s'),
		    'ticket_postedby' => "1",
		);
			
		$add_query = $database->as_insert( 'as_ticket', $New_Item_Details ); 
	}	
	
	function as_book_place($placeid){
		$database = new As_Dbconn();			
		$New_Item_Details = array(
			'ticket_type' => 'place',
			'ticket_date' => trim($_POST['ticket_startdate']),
			'ticket_startdate' => trim($_POST['ticket_startdate']),
			'ticket_stopdate' => trim($_POST['ticket_stopdate']),
			'ticket_information' => $placeid,
			'ticket_tourist' => trim($_POST['ticket_tourist']),
			'ticket_mobile' => trim($_POST['ticket_mobile']),
			'ticket_amount' => trim($_POST['ticket_amount']),
			'ticket_payment' => trim($_POST['ticket_payment']),
		    'ticket_posted' => date('Y-m-d H:i:s'),
		    'ticket_postedby' => "1",
		);
			
		$add_query = $database->as_insert( 'as_ticket', $New_Item_Details ); 
	}	
	
?>