<?php
	
	function as_login_user($loginname, $loginkey) {
		$database = new As_Dbconn();
		$as_db_query1 = "SELECT * FROM as_official WHERE official_name='$loginname' AND official_password='$loginkey'";
		$as_db_query2 = "SELECT * FROM as_voter WHERE voter_admission='$loginname'";
		if( $database->as_num_rows( $as_db_query1 ) > 0 ) {
            list( $userid, $official_name, ) = $database->get_row( $as_db_query1 );
		    $_SESSION['voting_userid'] = $userid;
			$_SESSION['voting_account'] = 5;
		} else {
			if( $database->as_num_rows( $as_db_query2 ) > 0 ) {
				list( $voterid, $voter_admission, ) = $database->get_row( $as_db_query2 );
				$_SESSION['voting_userid'] = $voterid;
				$_SESSION['voting_account'] = 3;
			} return false;
		} 
	}
	
	function as_logged_account($loginname) {
		$as_db_query = "SELECT * FROM as_official WHERE official_name=$loginname";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $userid, $official_name, $official_fname, $official_surname, $official_sex, $official_password, $official_email, $official_group) = $database->get_row( $as_db_query );
		    return $official_group;
		} else  {
		    return false;
		}
		
	}
	
	function as_recover_username($email, $password) {
		$as_db_query = "SELECT * FROM as_official WHERE official_email = '$email' AND official_password = '$password'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $userid, $official_name) = $database->get_row( $as_db_query );			
			$_SESSION['recover_username'] = $official_name;
		    return true;
		} else  {
		    return false;
		}
		
	}
	
	function as_recover_password($username, $email) {
		$as_db_query = "SELECT * FROM as_official WHERE official_email = '$email' AND official_name = '$username'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $userid, $official_name) = $database->get_row( $as_db_query );
			$_SESSION['recover_password'] = $official_name;
		    return true;
		} else  {
		    return false;
		}		
	}
	
	function as_change_password($username) {		
		$database = new As_Dbconn();	
		$Update_Official_Details = array(
			'official_password' => md5($_POST['passwordcon']),
		);
		$where_clause = array('official_name' => $username);
		$updated = $database->as_update( 'as_official', $Update_Official_Details, $where_clause, 1 );
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
		
		$as_db_query = "SELECT * FROM as_official 
			WHERE official_name = '$loginname' AND official_password = '$loginkey'
			OR official_email ='$loginname' AND official_password = '$loginkey'";
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
			'official_name' => trim($_POST['username']),
			'official_fname' => trim($_POST['fname']),
			'official_surname' => trim($_POST['surname']),
			'official_password' => md5(trim($_POST['passwordcon'])),
			'official_email' => trim($_POST['email']),
			'official_mobile' => trim($_POST['mobile']),
			'official_group' => trim($_POST['group']),
			'official_joined' => date('Y-m-d H:i:s'),
		);			
		$add_query = $database->as_insert( 'as_official', $New_Official_Details ); 
	}
	
	function as_register_me(){
 		$database = new As_Dbconn();			
		$New_Official_Details = array(			
			'official_name' => trim($_POST['username']),
			'official_fname' => trim($_POST['fname']),
			'official_surname' => trim($_POST['surname']),
			'official_password' => md5(trim($_POST['passwordcon'])),
			'official_email' => trim($_POST['email']),
			'official_mobile' => trim($_POST['mobile']),
			'official_joined' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->as_insert( 'as_official', $New_Official_Details ); 
	}
	
	
?>
	