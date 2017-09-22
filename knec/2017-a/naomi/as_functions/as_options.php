<?php
	
	// OPTIONS FUNCTIONS
	// Begin Options Functions
	
	function as_total_topic_story(){
		$as_db_query = "SELECT * FROM my_story";
		$database = new As_Dbconn();
		return $database->as_num_rows( $as_db_query );
	}
	
	function as_topic_group($topicid){
		$as_db_query = "SELECT * FROM as_topic WHERE topicid = '$topicid'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
			list( $topicid, $topic_title, $topic_participants) = $database->get_row( $as_db_query );
			return $topic_participants;
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
	