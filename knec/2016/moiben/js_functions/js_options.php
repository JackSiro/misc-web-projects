<?php
	
	// OPTIONS FUNCTIONS
	// Begin Options Functions
	
	function js_total_cat_story(){
		$js_db_query = "SELECT * FROM my_story";
		$database = new Js_Dbconn();
		return $database->js_num_rows( $js_db_query );
	}
	
	function js_cat_item($catid){
		$js_db_query = "SELECT * FROM js_category WHERE catid = '$catid'";
		$database = new Js_Dbconn();
		if( $database->js_num_rows( $js_db_query ) > 0 ) {
			list( $catid, $cat_slug, $cat_title) = $database->get_row( $js_db_query );
			return $cat_title;
		} else  {
			return false;
		}
	}