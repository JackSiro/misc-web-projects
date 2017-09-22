<?php
	
	// OPTIONS FUNCTIONS
	// Begin Options Functions
	
	function js_total_cat_story(){
		$js_db_query = "SELECT * FROM my_story";
		$database = new Js_Dbconn();
		return $database->js_num_rows( $js_db_query );
	}
	
	function js_class_item($classid){
		$js_db_query = "SELECT * FROM js_class WHERE classid = '$classid'";
		$database = new Js_Dbconn();
		if( $database->js_num_rows( $js_db_query ) > 0 ) {
			list( $classid, $class_slug, $class_title) = $database->get_row( $js_db_query );
			return $class_title;
		} else  {
			return false;
		}
	}
	
	function js_topic_item($topicid){
		$js_db_query = "SELECT * FROM js_topic WHERE topicid = '$topicid'";
		$database = new Js_Dbconn();
		if( $database->js_num_rows( $js_db_query ) > 0 ) {
			list( $topicid, $topic_name, $topic_fullname) = $database->get_row( $js_db_query );
			return $topic_fullname;
		} else  {
			return false;
		}
	}
	