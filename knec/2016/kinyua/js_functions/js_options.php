<?php
	
	// OPTIONS FUNCTIONS
	// Begin Options Functions
	
	function js_total_cat_story(){
		$js_db_query = "SELECT * FROM my_story";
		$database = new Js_Dbconn();
		return $database->js_num_rows( $js_db_query );
	}
	
	function js_vehicle_item($vehicleid){
		$js_db_query = "SELECT * FROM js_vehicle WHERE vehicleid = '$vehicleid'";
		$database = new Js_Dbconn();
		if( $database->js_num_rows( $js_db_query ) > 0 ) {
			list( $vehicleid, $vehicle_slug, $vehicle_title) = $database->get_row( $js_db_query );
			return $vehicle_title;
		} else  {
			return false;
		}
	}
	
	function js_supplier_item($suppid){
		$js_db_query = "SELECT * FROM js_supplier WHERE suppid = '$suppid'";
		$database = new Js_Dbconn();
		if( $database->js_num_rows( $js_db_query ) > 0 ) {
			list( $suppid, $supp_name, $supp_fullname) = $database->get_row( $js_db_query );
			return $supp_fullname;
		} else  {
			return false;
		}
	}
	