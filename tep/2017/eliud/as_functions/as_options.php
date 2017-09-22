<?php
	
	// OPTIONS FUNCTIONS
	// Begin Options Functions
	
	function as_timeago_now($ptime) {
		if ($ptime) 
		{
			$estimate_time = time() - strtotime($ptime);
			if ($estimate_time < 1) {
				return 'just now';
			}
			$condition = array(
						12 * 30 * 24 * 60 * 60	 => 'yr',
						30 * 24 * 60 * 60		 => 'mon',
						24 * 60 * 60			 => 'day',
						60 * 60					 => 'hr',
						60						 => 'min',
						1						 => 'sec',
			);
			foreach($condition as $secs => $str) {
				$d = $estimate_time / $secs;
				if ($d >= 1) {
					$r = round($d);
					return $r.' '.$str.($r > 1 ? 's' : '').' ago';
				}
			}
		} else return "";
	}
	
	function as_total_cat_story(){
		$as_db_query = "SELECT * FROM my_story";
		$database = new As_Dbconn();
		return $database->as_num_rows( $as_db_query );
	}
	
	function as_cat_item($catid){
		$as_db_query = "SELECT * FROM as_category WHERE catid = '$catid'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
			list( $catid, $cat_slug, $cat_title) = $database->get_row( $as_db_query );
			return $cat_title;
		} else  {
			return false;
		}
	}
	
	function as_user_name($usertype, $userid){
		$database = new As_Dbconn();
			if ($usertype == 'Doctor') {
			$as_db_query = "SELECT * FROM as_doctor WHERE doctorid =$userid";
			list( $doctorid, $doctor_code, $doctor_name) = $database->get_row( $as_db_query );
			return $doctor_name;
		} else {
			$as_db_query = "SELECT * FROM as_patient WHERE patientid =$userid";
			list( $patientid, $patient_code, $patient_name) = $database->get_row( $as_db_query );
			return $patient_name;
		}
	}
	
	function as_user_code($usertype, $userid){
		$database = new As_Dbconn();
			if ($usertype == 'Doctor') {
			$as_db_query = "SELECT * FROM as_doctor WHERE doctorid =$userid";
			list( $doctorid, $doctor_code, $doctor_name) = $database->get_row( $as_db_query );
			return $doctor_code;
		} else {
			$as_db_query = "SELECT * FROM as_patient WHERE patientid =$userid";
			list( $patientid, $patient_code, $patient_name) = $database->get_row( $as_db_query );
			return $patient_code;
		}
	}
	