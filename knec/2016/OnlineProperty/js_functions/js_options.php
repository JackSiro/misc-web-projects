<?php
	
	// OPTIONS FUNCTIONS
	// Begin Options Functions
	
	function js_total_house_story(){
		$js_db_query = "SELECT * FROM my_story";
		$database = new Js_Dbconn();
		return $database->js_num_rows( $js_db_query );
	}
	
	function js_house_tenant($houseid){
		$js_db_query = "SELECT * FROM js_house WHERE houseid = '$houseid'";
		$database = new Js_Dbconn();
		if( $database->js_num_rows( $js_db_query ) > 0 ) {
			list( $houseid, $house_number, $house_size) = $database->get_row( $js_db_query );
			return $house_size;
		} else  {
			return false;
		}
	}