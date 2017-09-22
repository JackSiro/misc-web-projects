<?php
	
	// OPTIONS FUNCTIONS
	// Begin Options Functions
	
	function as_total_salesitem_story(){
		$as_db_query = "SELECT * FROM my_story";
		$database = new As_Dbconn();
		return $database->as_num_rows( $as_db_query );
	}
	
	function as_salesitem_customer($salesitemid){
		$as_db_query = "SELECT * FROM as_salesitem WHERE salesitemid = '$salesitemid'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
			list( $salesitemid, $salesitem_title, $salesitem_content) = $database->get_row( $as_db_query );
			return $salesitem_content;
		} else  {
			return false;
		}
	}