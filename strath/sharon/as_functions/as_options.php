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
	
	function as_item_item($itemid){
		$database = new As_Dbconn();
		$as_db_query = "SELECT item_image FROM as_item WHERE itemid = '$itemid'";
		$matchitem = $database->get_row( $as_db_query );
		return isset($matchitem[0]) ? $matchitem[0] : null;
	}
	
	function as_item_terms($itemid){
		$as_db_query = "SELECT * FROM as_item WHERE itemid = '$itemid'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
			list( $itemid, $item_name, $item_image, $item_content, $item_terms) = $database->get_row( $as_db_query );
			return $item_terms;
		} else  {
			return false;
		}
	}
	
	function as_item_container($itemid){
		$as_db_query = "SELECT * FROM as_item WHERE itemid = '$itemid'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
			list( $itemid, $item_name, $item_image, $item_content, $item_terms) = $database->get_row( $as_db_query );
			return $item_container;
		} else  {
			return false;
		}
	}
	
	function as_item_items($itemid){
		$database = new As_Dbconn();
		$as_db_query = "SELECT item_field FROM as_item WHERE itemid = '$itemid'";
		$matchitem = $database->get_row( $as_db_query );
		return isset($matchitem[0]) ? $matchitem[0] : null;
	}
	
	function as_client_item($clientid){
		$as_db_query = "SELECT * FROM as_client WHERE clientid = '$clientid'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
			list( $clientid, $client_name, $client_fullname) = $database->get_row( $as_db_query );
			return $client_fullname;
		} else  {
			return false;
		}
	}
	