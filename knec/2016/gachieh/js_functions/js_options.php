<?php
	
	// OPTIONS FUNCTIONS
	// Begin Options Functions
	
	function js_total_farmer_story(){
		$js_db_query = "SELECT * FROM my_story";
		$database = new Js_Dbconn();
		return $database->js_num_rows( $js_db_query );
	}
	
	function js_farmer_session($farmerid){
		$js_db_query = "SELECT * FROM js_farmer WHERE farmerid = '$farmerid'";
		$database = new Js_Dbconn();
		if( $database->js_num_rows( $js_db_query ) > 0 ) {
			list( $farmerid, $farmer_slug, $farmer_fullname) = $database->get_row( $js_db_query );
			return $farmer_fullname;
		} else  {
			return false;
		}
	}