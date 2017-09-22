<?php
	
	// OPTIONS FUNCTIONS
	// Begin Options Functions
	
	function as_total_cat_story(){
		$as_db_query = "SELECT * FROM my_story";
		$database = new As_Dbconn();
		return $database->as_num_rows( $as_db_query );
	}
	
	function as_hotel_item($hotelid){
		$as_db_query = "SELECT * FROM as_hotel WHERE hotelid = '$hotelid'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
			list( $hotelid, $hotel_slug, $hotel_title) = $database->get_row( $as_db_query );
			return $hotel_title;
		} else  {
			return false;
		}
	}
	
	function as_supplier_item($suppid){
		$as_db_query = "SELECT * FROM as_supplier WHERE suppid = '$suppid'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
			list( $suppid, $supp_name, $supp_fullname) = $database->get_row( $as_db_query );
			return $supp_fullname;
		} else  {
			return false;
		}
	}
	