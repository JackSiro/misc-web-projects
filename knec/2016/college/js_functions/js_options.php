<?php
	
	// OPTIONS FUNCTIONS
	// Begin Options Functions
	
	function js_total_department_story(){
		$js_db_query = "SELECT * FROM my_story";
		$database = new Js_Dbconn();
		return $database->js_num_rows( $js_db_query );
	}
	
	function js_department_student($departmentid){
		$js_db_query = "SELECT * FROM js_department WHERE departmentid = '$departmentid'";
		$database = new Js_Dbconn();
		if( $database->js_num_rows( $js_db_query ) > 0 ) {
			list( $departmentid, $department_slug, $department_title) = $database->get_row( $js_db_query );
			return $department_title;
		} else  {
			return false;
		}
	}