<?php
	
	// OPTIONS FUNCTIONS
	// Begin Options Functions
	
	function as_total_cat_story(){
		$as_db_query = "SELECT * FROM my_story";
		$database = new As_Dbconn();
		return $database->as_num_rows( $as_db_query );
	}
	
	function as_type_worker($typeid){
		$as_db_query = "SELECT * FROM as_type WHERE typeid = '$typeid'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
			list( $typeid, $type_slug, $type_title) = $database->get_row( $as_db_query );
			return $type_title;
		} else  {
			return false;
		}
	}
	
	function as_supplier_worker($suppid){
		$as_db_query = "SELECT * FROM as_supplier WHERE suppid = '$suppid'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
			list( $suppid, $supp_name, $supp_fullname) = $database->get_row( $as_db_query );
			return $supp_fullname;
		} else  {
			return false;
		}
	}
	
	function as_show_sex($sex){
		if ($sex == 1) return 'Male';
		else if ($sex == 2) return 'Female';
	}
	
	