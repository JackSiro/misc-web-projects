<?php
	
	// OPTIONS FUNCTIONS
	// Begin Options Functions
	function as_db_get_results($as_db_query){
		$database = new As_Dbconn();
		$results = $database->get_results( $as_db_query );
		return $database->as_num_rows($as_db_query);
	}
	
	function as_db_num_rows($as_db_query){
		return $database->as_num_rows($as_db_query);
	}
	
	function as_drug_item($drugid){
		$database = new As_Dbconn();
		$as_db_query = "SELECT drug_title FROM as_drug WHERE drugid = '$drugid'";
		$matchitem = $database->get_row( $as_db_query );
		return isset($matchitem[0]) ? $matchitem[0] : null;
	}
	
	function as_drug_unit($drugid){
		$as_db_query = "SELECT * FROM as_drug WHERE drugid = '$drugid'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
			list( $drugid, $drug_slug, $drug_title, $drug_icon, $drug_content, $drug_unit) = $database->get_row( $as_db_query );
			return $drug_unit;
		} else  {
			return false;
		}
	}
	
	function as_drug_container($drugid){
		$as_db_query = "SELECT * FROM as_drug WHERE drugid = '$drugid'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
			list( $drugid, $drug_slug, $drug_title, $drug_icon, $drug_content, $drug_unit, $drug_container, $drug_items) = $database->get_row( $as_db_query );
			return $drug_container;
		} else  {
			return false;
		}
	}
	
	function as_drug_items($drugid){
		$database = new As_Dbconn();
		$as_db_query = "SELECT drug_items FROM as_drug WHERE drugid = '$drugid'";
		$matchitem = $database->get_row( $as_db_query );
		return isset($matchitem[0]) ? $matchitem[0] : null;
	}
	
	function as_drug_stocks($drugid){
		$database = new As_Dbconn();
		$as_db_query = "SELECT drug_stock FROM as_drug WHERE drugid = '$drugid'";
		$matchitem = $database->get_row( $as_db_query );
		return isset($matchitem[0]) ? $matchitem[0] : null;
	}
	
	function as_client_drug($clientid){
		$as_db_query = "SELECT * FROM as_client WHERE clientid = '$clientid'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
			list( $clientid, $client_name, $client_fullname) = $database->get_row( $as_db_query );
			return $client_fullname;
		} else  {
			return false;
		}
	}
	