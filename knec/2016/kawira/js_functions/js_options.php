<?php
	
	// OPTIONS FUNCTIONS
	// Begin Options Functions
	
	function js_total_cat_story(){
		$js_db_query = "SELECT * FROM my_story";
		$database = new Js_Dbconn();
		return $database->js_num_rows( $js_db_query );
	}
	
	function js_parkingslot_item($Parkingslotid){
		$js_db_query = "SELECT * FROM js_parkingslot WHERE Parkingslotid = '$Parkingslotid'";
		$database = new Js_Dbconn();
		if( $database->js_num_rows( $js_db_query ) > 0 ) {
			list( $Parkingslotid, $parkingslot_slug, $parkingslot_title) = $database->get_row( $js_db_query );
			return $parkingslot_title;
		} else  {
			return false;
		}
	}
	
	function js_customer_item($customerid){
		$js_db_query = "SELECT * FROM js_customer WHERE customerid = '$customerid'";
		$database = new Js_Dbconn();
		if( $database->js_num_rows( $js_db_query ) > 0 ) {
			list( $customerid, $customer_name, $customer_fullname) = $database->get_row( $js_db_query );
			return $customer_fullname;
		} else  {
			return false;
		}
	}
	