<?php
	
	// OPTIONS FUNCTIONS
	// Begin Options Functions
	
	function as_client_item($clientid){
		$as_db_query = "SELECT * FROM as_client WHERE clientid = '$clientid'";
		$database = new As_DbConn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
			list( $clientid, $client_name, $client_fullname) = $database->get_row( $as_db_query );
			return $client_fullname;
		} else  {
			return false;
		}
	}
	
	function as_timeago($ptime) {
		if ($ptime) 
		{
			$estimate_time = time() - strtotime($ptime);
			if ($estimate_time < 1) {
				return 'just now';
			}
			$condition = array(
						12 * 30 * 24 * 60 * 60	 => 'year',
						30 * 24 * 60 * 60		 => 'month',
						24 * 60 * 60			 => 'day',
						60 * 60					 => 'hour',
						60						 => 'minute',
						1						 => 'second',
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
	
	function as_user_client($clientid){
		$database = new As_Dbconn();
		$as_db_query = "SELECT user_fname, user_surname FROM as_user WHERE userid = '$clientid'";
		$matchdata = $database->get_row( $as_db_query );
		return $matchdata[0].' '.$matchdata[1];
	}
	
	function as_complaint_client($clientname, $clientid){
		if (empty($clientname)) 
			return as_user_client($clientid);
		else 
			return $clientname;
	}
	