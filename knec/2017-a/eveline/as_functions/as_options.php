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
	
	function as_student_item($studentid){
		$database = new As_Dbconn();
		$as_db_query = "SELECT student_name FROM as_student WHERE studentid = '$studentid'";
		$matchitem = $database->get_row( $as_db_query );
		return isset($matchitem[0]) ? $matchitem[0] : null;
	}
	
	function as_student_password($studentid){
		$as_db_query = "SELECT * FROM as_student WHERE studentid = '$studentid'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
			list( $studentid, $student_admno, $student_name, $student_class, $student_sex, $student_password) = $database->get_row( $as_db_query );
			return $student_password;
		} else  {
			return false;
		}
	}
	
	function as_student_comment($studentid){
		$database = new As_Dbconn();
		$as_db_query = "SELECT student_comment FROM as_student WHERE studentid = '$studentid'";
		$matchitem = $database->get_row( $as_db_query );
		return isset($matchitem[0]) ? $matchitem[0] : null;
	}
	
	function as_student_fees($studentid){
		$database = new As_Dbconn();
		$as_db_query = "SELECT student_fee FROM as_student WHERE studentid = '$studentid'";
		$matchitem = $database->get_row( $as_db_query );
		return isset($matchitem[0]) ? $matchitem[0] : null;
	}
	
	function as_client_student($clientid){
		$as_db_query = "SELECT * FROM as_client WHERE clientid = '$clientid'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
			list( $clientid, $client_name, $client_fullname) = $database->get_row( $as_db_query );
			return $client_fullname;
		} else  {
			return false;
		}
	}
	