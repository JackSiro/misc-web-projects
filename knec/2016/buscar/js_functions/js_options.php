<?php
	
	// OPTIONS FUNCTIONS
	// Begin Options Functions
	
	function js_total_cat_story(){
		$js_db_query = "SELECT * FROM my_story";
		$database = new Js_Dbconn();
		return $database->js_num_rows( $js_db_query );
	}
	
	function js_bus_item($busid){
		$js_db_query = "SELECT * FROM js_bus WHERE busid = '$busid'";
		$database = new Js_Dbconn();
		if( $database->js_num_rows( $js_db_query ) > 0 ) {
			list( $busid, $bus_slug, $bus_title) = $database->get_row( $js_db_query );
			return $bus_title;
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
	