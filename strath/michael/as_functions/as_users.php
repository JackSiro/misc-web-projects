<?php
/*
	File: as_functions/as_users.php
	Description: declaration of functions associated with user variables and requests

*/
	
	function as_login_user($userid, $password) {
		$as_db_query = "SELECT * FROM as_user WHERE userid=$userid AND user_password='$password'";
		//new instance of database class
	$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 )
            return true;
		else  
			return false;		
	}
	
	function as_user_is_logged(){
		$myloginid = isset( $_SESSION['siteuser_userid'] ) ? $_SESSION['siteuser_userid'] : "";		
		if ($myloginid) return true;
		else return false;
	}
	
	function as_start_session()
	{
		if (as_to_override(__FUNCTION__)) { $args=func_get_args(); return as_call_override(__FUNCTION__, $args); }

		if (!isset($_SESSION))
			session_start();
	}
	
	function as_db_user_find_by_username($username)
	{
		$as_db_query = "SELECT * FROM as_user WHERE user_name='$username'";
		$database = new As_Dbconn();		
		$results = $database->get_results( $as_db_query );
		foreach( $results as $row )
		{
		    return $row['userid'];                  
		}	
	}
	
	function as_db_user_find_by_email($email)
	{
		$database = new As_Dbconn();		
		$as_db_query = "SELECT * FROM as_user WHERE user_email='$email'";
		$results = $database->get_results( $as_db_query );
		foreach( $results as $row )
		{
		    return $row['userid'];                  
		}			
	}
	
	function as_db_comp_find_by_email($comp_mail)
	{
		$database = new As_Dbconn();		
		$as_db_query = "SELECT * FROM as_salecrime_user WHERE client_email='$comp_mail'";
		$results = $database->get_results( $as_db_query );
		foreach( $results as $row )
		{
		    return $row['clientid'];                  
		}			
	}
	
	function as_user_is_admin($user_level)
	{
		if ($user_level >= 5) return true;
		else return false;
	}
	
	function as_is_user_admin(){
		$as_level = isset( $_SESSION['siteuser_userid'] ) ? $_SESSION['siteuser_userid'] : "";
		if ($as_level) return true;
		else return false;
	}

	function as_logout() {
		unset( $_SESSION['siteuser_userid'] );
		unset( $_SESSION['siteuser_level'] );
		header( "Location: ".as_siteUrl);
	}
	
	as_start_session();
	
	function as_add_new_user($firstname, $surname, $email, $username, $password, $group, $level){
		if (strpos($email, '@')!==false) {
			$matchusers=as_db_user_find_by_email($email);
		} else {
			$matchusers=as_db_user_find_by_username($username);
		}		
		
		if (count($matchusers)==0) {
			//new instance of database class
	$database = new As_Dbconn();
			$New_Item_Details = array(
				'user_name' => $username,
				'user_fname' => $firstname,
				'user_lname' => $surname,
				'user_password' => md5($password),
				'user_email' => $email,
				'user_group' => $group,
				'user_level' => $level,
				'user_joined' => date('Y-m-d H:i:s'),
			);			
			$add_query = $database->as_insert( 'as_user', $New_Item_Details );
			return $database->as_db_lastid();
		} else {
			return 0;
		}
	}	
	
	function as_get_logged_in_userid()
	/*
		Return the userid of the currently logged in user, or null if none
	*/
		{
			return as_get_logged_in_user_field('userid');
		}
		
	function as_get_logged_in_user_field($field)
	/*
		Return $field of the currently logged in user, or null if not available
	*/
		{
			$user=as_get_logged_in_user_cache();

			return @$user[$field];
		}
	
	function as_get_logged_in_user_cache()
		{
			global $as_cached_logged_in_user;

			if (!isset($as_cached_logged_in_user)) {
				$user=as_get_logged_in_user();
				$as_cached_logged_in_user=isset($user) ? $user : false; // to save trying again
			}

			return @$as_cached_logged_in_user;
		}
		
	
	function as_set_logged_in_user($userid, $handle='', $level, $remember=false, $source=null)
	{
		if (as_to_override(__FUNCTION__)) { $args=func_get_args(); return as_call_override(__FUNCTION__, $args); }
		
		as_start_session();
		if (isset($userid)) {
			$_SESSION['siteuser_userid'] = $userid;	
			$_SESSION['siteuser_level'] = $level;
		} else {
			
		}
	}

?>