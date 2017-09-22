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
	
	function as_beneficiary_item($beneficiaryid){
		$database = new As_Dbconn();
		$as_db_query = "SELECT beneficiary_name FROM as_beneficiary WHERE beneficiaryid = '$beneficiaryid'";
		$matchitem = $database->get_row( $as_db_query );
		return isset($matchitem[0]) ? $matchitem[0] : null;
	}
	
	function as_beneficiary_password($beneficiaryid){
		$as_db_query = "SELECT * FROM as_beneficiary WHERE beneficiaryid = '$beneficiaryid'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
			list( $beneficiaryid, $beneficiary_code, $beneficiary_name, $beneficiary_institution, $beneficiary_email, $beneficiary_password) = $database->get_row( $as_db_query );
			return $beneficiary_password;
		} else  {
			return false;
		}
	}
	
	function as_beneficiary_address($beneficiaryid){
		$database = new As_Dbconn();
		$as_db_query = "SELECT beneficiary_address FROM as_beneficiary WHERE beneficiaryid = '$beneficiaryid'";
		$matchitem = $database->get_row( $as_db_query );
		return isset($matchitem[0]) ? $matchitem[0] : null;
	}
	
	function as_beneficiary_dateofbirths($beneficiaryid){
		$database = new As_Dbconn();
		$as_db_query = "SELECT beneficiary_dateofbirth FROM as_beneficiary WHERE beneficiaryid = '$beneficiaryid'";
		$matchitem = $database->get_row( $as_db_query );
		return isset($matchitem[0]) ? $matchitem[0] : null;
	}
	
	function as_client_beneficiary($clientid){
		$as_db_query = "SELECT * FROM as_client WHERE clientid = '$clientid'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
			list( $clientid, $client_name, $client_fullname) = $database->get_row( $as_db_query );
			return $client_fullname;
		} else  {
			return false;
		}
	}
	