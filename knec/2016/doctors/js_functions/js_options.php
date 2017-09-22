<?php
	
	// OPTIONS FUNCTIONS
	// Begin Options Functions
	
	function js_total_cat_story(){
		$js_db_query = "SELECT * FROM my_story";
		$database = new Js_Dbconn();
		return $database->js_num_rows( $js_db_query );
	}
	
	function js_category_item($categoryid){
		$js_db_query = "SELECT * FROM js_category WHERE categoryid = '$categoryid'";
		$database = new Js_Dbconn();
		if( $database->js_num_rows( $js_db_query ) > 0 ) {
			list( $categoryid, $category_slug, $category_title) = $database->get_row( $js_db_query );
			return $category_title;
		} else  {
			return false;
		}
	}
	
	function js_doctor_item($doctorid){
		$js_db_query = "SELECT * FROM js_doctor WHERE doctorid = '$doctorid'";
		$database = new Js_Dbconn();
		if( $database->js_num_rows( $js_db_query ) > 0 ) {
			list( $doctorid, $doctor_name, $doctor_fullname) = $database->get_row( $js_db_query );
			return $doctor_fullname;
		} else  {
			return false;
		}
	}
	