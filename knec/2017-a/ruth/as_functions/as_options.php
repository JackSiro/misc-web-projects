<?php
	
	// OPTIONS FUNCTIONS
	// Begin Options Functions
	function as_navigation() {	
		$as_nav_items = array();					
		$myaccount = isset( $_SESSION['appsmata_account'] ) ? $_SESSION['appsmata_account'] : null;
		if ($myaccount){ 
			/*$as_nav_items['client_all']=array(
				'label' => 'Clients',
				'url' => 'index.php?action=client_all',
			);*/
			$as_nav_items['payment_all']=array(
				'label' => 'Orders',
				'url' => 'index.php?action=payment_all',
			);
			$as_nav_items['user_all']=array(
				'label' => 'Waiters',
				'url' => 'index.php?action=user_all',
			);
		
		}  else {
			$as_nav_items['forgot_password']=array(
				'label' => 'Forgot Password',
				'url' => 'index.php?action=forgot_password',
			);
			$as_nav_items['forgot_username']=array(
				'label' => 'Forgot Username',
				'url' => 'index.php?action=forgot_username',
			);
		}
		return $as_nav_items;
	}
	
	function as_total_cat_story(){
		$as_db_query = "SELECT * FROM my_story";
		$database = new As_Dbconn();
		return $database->as_num_rows( $as_db_query );
	}
	
	function as_type_item($typeid){
		$as_db_query = "SELECT * FROM as_type WHERE typeid = '$typeid'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
			list( $typeid, $type_slug, $type_title) = $database->get_row( $as_db_query );
			return $type_title;
		} else  {
			return false;
		}
	}
	
	function as_client_item($clientid){
		$as_db_query = "SELECT * FROM as_client WHERE clientid = '$clientid'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
			list( $clientid, $client_name, $client_fullname) = $database->get_row( $as_db_query );
			return $client_fullname;
		} else  {
			return false;
		}
	}
	
	function as_payment_paidby($clientid){
		$as_db_query = "SELECT * FROM as_client WHERE clientid = '$clientid'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
			list( $paymentid, $payment_quantity, $payment_date, $payment_time, $payment_paidby, $payment_paid) = $database->get_row( $as_db_query );
			return $payment_paidby;
		} else  {
			return false;
		}
	}
	