<?php
	
	function as_login_user($loginname, $loginkey) {
		$database = new As_Dbconn();
		$as_db_query1 = "SELECT * FROM as_user WHERE user_name='$loginname' AND user_password='$loginkey'";
		$as_db_query2 = "SELECT * FROM as_client WHERE client_name='$loginname'";
		if( $database->as_num_rows( $as_db_query1 ) > 0 ) {
            list( $userid, $user_name, ) = $database->get_row( $as_db_query1 );
		    $_SESSION['voting_userid'] = $userid;
			$_SESSION['voting_account'] = 5;
		} else {
			if( $database->as_num_rows( $as_db_query2 ) > 0 ) {
				list( $clientid, $client_name, ) = $database->get_row( $as_db_query2 );
				$_SESSION['voting_userid'] = $clientid;
				$_SESSION['voting_account'] = 3;
			} return false;
		} 
	}
	
	function as_logged_account($loginname) {
		$as_db_query = "SELECT * FROM as_user WHERE user_name=$loginname";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $userid, $user_name, $user_fname, $user_surname, $user_sex, $user_password, $user_email, $user_group) = $database->get_row( $as_db_query );
		    return $user_group;
		} else  {
		    return false;
		}
		
	}
	
	function as_recover_username($email, $password) {
		$as_db_query = "SELECT * FROM as_user WHERE user_email = '$email' AND user_password = '$password'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $userid, $user_name) = $database->get_row( $as_db_query );			
			$_SESSION['recover_username'] = $user_name;
		    return true;
		} else  {
		    return false;
		}
		
	}
	
	function as_recover_password($username, $email) {
		$as_db_query = "SELECT * FROM as_user WHERE user_email = '$email' AND user_name = '$username'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $userid, $user_name) = $database->get_row( $as_db_query );
			$_SESSION['recover_password'] = $user_name;
		    return true;
		} else  {
		    return false;
		}		
	}
	
	function as_change_password($username) {		
		$database = new As_Dbconn();	
		$Update_Official_Details = array(
			'user_password' => md5($_POST['passwordcon']),
		);
		$where_clause = array('user_name' => $username);
		$updated = $database->as_update( 'as_user', $Update_Official_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
	function as_is_logged(){
		$myloginid = isset( $_SESSION['voting_userid'] ) ? $_SESSION['voting_userid'] : "";
		
		if (!$myloginid) return true;
		else return false;
	}
	
	function as_signin_modal() {
	  if ( isset( $_POST['LetMeIn'] ) ) {
		$loginname = $_POST['loginname'];
		$loginkey = md5($_POST['loginkey']);
		
		$as_db_query = "SELECT * FROM as_user 
			WHERE user_name = '$loginname' AND user_password = '$loginkey'
			OR user_email ='$loginname' AND user_password = '$loginkey'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $userid) = $database->get_row( $as_db_query );
		    $_SESSION['voting_userid'] = $userid;			
			header( "Location: ".as_siteUrl());		
		} else header( "Location: ".as_siteLynk()."signin" );	
	  }
	} 
	
	function logout() {
	  unset( $_SESSION['voting_userid'] );
	  unset( $_SESSION['voting_account'] );
	  header( "Location: index.php" );
	}
	
	function as_add_new_user(){
 		$database = new As_Dbconn();			
		$New_Official_Details = array(			
			'user_name' => trim($_POST['username']),
			'user_fname' => trim($_POST['fname']),
			'user_surname' => trim($_POST['surname']),
			'user_password' => md5(trim($_POST['passwordcon'])),
			'user_email' => trim($_POST['email']),
			'user_mobile' => trim($_POST['mobile']),
			'user_group' => trim($_POST['group']),
			'user_joined' => date('Y-m-d H:i:s'),
		);			
		$add_query = $database->as_insert( 'as_user', $New_Official_Details ); 
	}
	
	function as_register_me(){
 		$database = new As_Dbconn();			
		$New_Official_Details = array(			
			'user_name' => trim($_POST['username']),
			'user_fname' => trim($_POST['fname']),
			'user_surname' => trim($_POST['surname']),
			'user_password' => md5(trim($_POST['passwordcon'])),
			'user_email' => trim($_POST['email']),
			'user_mobile' => trim($_POST['mobile']),
			'user_joined' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->as_insert( 'as_user', $New_Official_Details ); 
	}
	
	
?>
	