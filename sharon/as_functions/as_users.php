<?php
	function as_signin() {

		$results = array();
		$results['pageTitle'] = "JS System"; 
		$results['pageAction'] = "Sign In";
		
		if ( isset( $_POST['SignMeIn'] ) ) {
		$signinname = $_POST['username'];
		$signinkey = $_POST['password'];
		
        if (as_let_me_user($signinname, $signinkey)){
			$_SESSION['siteuser_user'] = as_let_me_user($signinname, $signinkey);
			$_SESSION['siteuser_account'] = as_logged_account($signinname);
			$_SESSION['siteuser_group'] = as_logged_group($signinname);
			$_SESSION['siteuser_notloggedin'] = "Please Sign In to your account to continue";
			
			$as_succmsg_arr[] = 'Welcome back '.$signinname;
			$as_succflag = true;
			$_SESSION['AS_SUCCMSG_ARR'] = $as_succmsg_arr;
			if ($_SESSION['siteuser_group']) header( "Location: index.php?action=dashboard" );
			else header( "Location: index.php" );
			
		}   else {
			$as_errmsg_arr[] = "Either your username or password is wrong. Please scratch your head and try again.";
			$as_errflag = true;
			$_SESSION['AS_ERRMSG_ARR'] = $as_errmsg_arr;
			header( "Location: index.php" );
	    }
	
	  } else {
	
	    require( AS_INC."as_signin.php" );
 	 }

	}
	

	function as_let_me_user($signinname, $signinkey) {
		$database = new As_Dbconn();
		$as_db_query_i = "SELECT * FROM as_user WHERE user_name = '$signinname' AND user_password = '".md5($signinkey)."'
			OR user_email ='$signinname' AND user_password = '".md5($signinkey)."'";
			
		$as_db_query_ii = "SELECT * FROM as_client WHERE client_idno = '$signinname' AND client_number = '$signinkey'";
		
		if( $database->as_num_rows( $as_db_query_i ) > 0 ) {
            list( $userid, $user_name, ) = $database->get_row( $as_db_query_i );
		    return $user_name;
		} else if( $database->as_num_rows( $as_db_query_ii ) > 0 ) {
            list( $clientid, $client_fullname, $client_sex, $client_joined, $client_center, 
			$client_idno, $client_number, $client_salesd ) = $database->get_row( $as_db_query_ii );
		    return $client_idno;
		} else  {
		    return false;
		}
		
	}
	
	function as_logged_group($signinname) {
		$as_db_query = "SELECT * FROM as_user WHERE user_name = '$signinname' OR user_email ='$signinname'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $userid, $user_name, $user_fname, $user_surname, $user_sex, $user_password, $user_email, $user_group) = $database->get_row( $as_db_query );
		    return $user_group;
		} else  {
		    return false;
		}		
	}
	
	function as_logged_account($signinname) {
		$database = new As_Dbconn();
		$as_db_query_i = "SELECT * FROM as_user WHERE user_name = '$signinname' OR user_email ='$signinname'";
		$as_db_query_ii = "SELECT * FROM as_client WHERE client_idno = '$signinname'";
		
		if( $database->as_num_rows( $as_db_query_i ) > 0 ) return 'user';
		else if( $database->as_num_rows( $as_db_query_ii ) > 0 ) return 'client';
		else  return false;
		
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
		$Update_User_Details = array(
			'user_password' => md5($_POST['passwordcon']),
		);
		$where_clause = array('user_name' => $username);
		$updated = $database->as_update( 'as_user', $Update_User_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
	function as_is_logged(){
		$mysigninid = isset( $_SESSION['siteuser_user'] ) ? $_SESSION['siteuser_user'] : "";
		
		if (!$mysigninid) return true;
		else return false;
	}
	
	function as_signin_modal() {
	  if ( isset( $_POST['LetMeIn'] ) ) {
		$signinname = $_POST['signinname'];
		$signinkey = md5($_POST['signinkey']);
		
		$as_db_query = "SELECT * FROM as_user 
			WHERE user_name = '$signinname' AND user_password = '$signinkey'
			OR user_email ='$signinname' AND user_password = '$signinkey'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $userid) = $database->get_row( $as_db_query );
		    $_SESSION['siteuser_user'] = $userid;			
			header( "Location: ".as_siteUrl());		
		} else header( "Location: ".as_siteLynk()."signin" );	
	  }
	} 
		
	function signout() {
	  unset( $_SESSION['siteuser_user'] );
	  unset( $_SESSION['siteuser_account'] );
	  header( "Location: index.php" );
	}
	
	function as_signup() {
		$results = array();
		$results['pageTitle'] = "JS System";
		$results['pageAction'] = "SignUp"; 
		
		if ( isset( $_POST['SignMeUp'] ) ) {
			as_add_new_user();
			$_SESSION['siteuser_user'] = $_POST['surname'];
			$_SESSION['siteuser_account'] = as_logged_account($_POST['surname']);
			header( "Location: index.php" );					
		}  else if ( isset( $_POST['CancelThis'] ) ) {
			header( "Location: index.php");						
		}  else {
			require( AS_INC . "as_signup.php" );
		}	

	}
	

	
	function as_add_new_user(){
 		$database = new As_Dbconn();			
		$New_User_Details = array(			
			'user_name' => trim($_POST['username']),
			'user_fname' => trim($_POST['fname']),
			'user_surname' => trim($_POST['surname']),
			'user_password' => md5(trim($_POST['password'])),
			'user_email' => trim($_POST['email']),
			'user_mobile' => trim($_POST['mobile']),
			'user_group' => 'buyer',
			'user_joined' => date('Y-m-d H:i:s'),
		);
		$add_query = $database->as_insert( 'as_user', $New_User_Details );
		return $database->lastid();
	}
	
	function as_signup_me(){
 		$raw_file_name = basename($_FILES["avatar"]["name"]);
		$temp_file_name = $_FILES["avatar"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'user'.time().'.'.$upload_file_ext[1];
		$target_file = AS_TARGET . $finalname;
		$imageFileItem = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $as_avatar = $finalname;
		else $as_avatar = "user_default.jpg";		
			 
		$database = new As_Dbconn();			
		$New_User_Details = array(			
			'user_name' => trim($_POST['username']),
			'user_fname' => trim($_POST['fname']),
			'user_surname' => trim($_POST['surname']),
			'user_password' => md5(trim($_POST['passwordcon'])),
			'user_email' => trim($_POST['email']),
			'user_mobile' => trim($_POST['mobile']),
			'user_group' => 'student',
			'user_avatar' => trim($as_avatar),
			'user_joined' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->as_insert( 'as_user', $New_User_Details ); 
	}
	
		
	function as_add_new_supp(){
 		$raw_file_name = basename($_FILES["avatar"]["name"]);
		$temp_file_name = $_FILES["avatar"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'supp'.time().'.'.$upload_file_ext[1];
		$target_file = AS_TARGET . $finalname;
		$imageFileItem = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $as_avatar = $finalname;
		else $as_avatar = "client_default.jpg";		
			 
		$database = new As_Dbconn();			
		$New_User_Details = array(			
			'client_name' => trim($_POST['suppname']),
			'client_fullname' => trim($_POST['fullname']),
			'client_idno' => trim($_POST['email']),
			'client_center' => trim($_POST['mobile']),
			'client_address' => trim($_POST['address']),
			'client_avatar' => trim($as_avatar),
			'client_joined' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->as_insert( 'as_client', $New_User_Details ); 
	}
	
	
?>
	