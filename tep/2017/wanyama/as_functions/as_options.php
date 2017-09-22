<?php
	
	// OPTIONS FUNCTIONS
	// Begin Options Functions
	
	function as_total_class_story(){
		$as_db_query = "SELECT * FROM my_story";
		$database = new As_Dbconn();
		return $database->as_num_rows( $as_db_query );
	}
	
	function as_class_student($classid){
		$as_db_query = "SELECT * FROM as_class WHERE classid = '$classid'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
			list( $classid, $class_term, $class_title) = $database->get_row( $as_db_query );
			return $class_title;
		} else  {
			return false;
		}
	}