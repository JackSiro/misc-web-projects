<?php
	
	// OPTIONS FUNCTIONS
	// Begin Options Functions
	
	function as_total_plan_story(){
		$as_db_query = "SELECT * FROM my_story";
		$database = new As_Dbconn();
		return $database->as_num_rows( $as_db_query );
	}
	
	function as_show_sex($sex){
		if ($sex == 1) return 'Male';
		else if ($sex == 2) return 'Female';
	}
	
	function as_has_voted($voted){
		if ($voted == 1) return 'Yes';
		else return 'No';
	}
	
	function as_plan_client($planid){
		$as_db_query = "SELECT * FROM as_plan WHERE planid = '$planid'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
			list( $planid, $plan_price, $plan_irate) = $database->get_row( $as_db_query );
			return $plan_irate;
		} else  {
			return false;
		}
	}