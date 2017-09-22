<?php
	
	// OPTIONS FUNCTIONS
	// Begin Options Functions
	
	function js_total_section_story(){
		$js_db_query = "SELECT * FROM my_story";
		$database = new Js_Dbconn();
		return $database->js_num_rows( $js_db_query );
	}
	
	function js_section_book($sectionid){
		$js_db_query = "SELECT * FROM js_section WHERE sectionid = '$sectionid'";
		$database = new Js_Dbconn();
		if( $database->js_num_rows( $js_db_query ) > 0 ) {
			list( $sectionid, $section_slug, $section_title) = $database->get_row( $js_db_query );
			return $section_title;
		} else  {
			return false;
		}
	}