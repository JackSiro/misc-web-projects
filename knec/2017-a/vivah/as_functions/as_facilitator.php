<?php
	function as_signin() {

		$results = array();
		$results['pageTitle'] = "JS System"; 
		$results['pageAction'] = "Sign In";
		
		if ( isset( $_POST['SignMeIn'] ) ) {
		$signinname = $_POST['username'];
		$signinkey = $_POST['password'];
		
        if (as_let_me_facilitator($signinname, $signinkey)){
			$_SESSION['sitefacilitator_facilitator'] = as_let_me_facilitator($signinname, $signinkey);
			$_SESSION['sitefacilitator_account'] = as_logged_account($signinname);
			$_SESSION['sitefacilitator_group'] = as_logged_group($signinname);
			$_SESSION['sitefacilitator_notloggedin'] = "Please Sign In to your account to continue";
			
			$as_succmsg_arr[] = 'Welcome back '.$signinname;
			$as_succflag = true;
			$_SESSION['AS_SUCCMSG_ARR'] = $as_succmsg_arr;
			if ($_SESSION['sitefacilitator_group']) header( "Location: index.php?action=dashboard" );
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
	

	function as_let_me_facilitator($signinname, $signinkey) {
		$database = new As_Dbconn();
		$as_db_query_i = "SELECT * FROM as_facilitator WHERE facilitator_name = '$signinname' AND facilitator_password = '".md5($signinkey)."'
			OR facilitator_email ='$signinname' AND facilitator_password = '".md5($signinkey)."'";
			
		$as_db_query_ii = "SELECT * FROM as_client WHERE client_idno = '$signinname' AND client_number = '$signinkey'";
		
		if( $database->as_num_rows( $as_db_query_i ) > 0 ) {
            list( $facilitatorid, $facilitator_name, ) = $database->get_row( $as_db_query_i );
		    return $facilitator_name;
		} else if( $database->as_num_rows( $as_db_query_ii ) > 0 ) {
            list( $clientid, $client_fullname, $client_sex, $client_joined, $client_center, 
			$client_idno, $client_number, $client_groupd ) = $database->get_row( $as_db_query_ii );
		    return $client_idno;
		} else  {
		    return false;
		}
		
	}
	
	function as_logged_group($signinname) {
		$as_db_query = "SELECT * FROM as_facilitator WHERE facilitator_name = '$signinname' OR facilitator_email ='$signinname'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $facilitatorid, $facilitator_name, $facilitator_fname, $facilitator_surname, $facilitator_sex, $facilitator_password, $facilitator_email, $facilitator_group) = $database->get_row( $as_db_query );
		    return $facilitator_group;
		} else  {
		    return false;
		}		
	}
	
	function as_logged_account($signinname) {
		$database = new As_Dbconn();
		$as_db_query_i = "SELECT * FROM as_facilitator WHERE facilitator_name = '$signinname' OR facilitator_email ='$signinname'";
		$as_db_query_ii = "SELECT * FROM as_client WHERE client_idno = '$signinname'";
		
		if( $database->as_num_rows( $as_db_query_i ) > 0 ) return 'facilitator';
		else if( $database->as_num_rows( $as_db_query_ii ) > 0 ) return 'client';
		else  return false;
		
	}
	
	function as_recover_username($email, $password) {
		$as_db_query = "SELECT * FROM as_facilitator WHERE facilitator_email = '$email' AND facilitator_password = '$password'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $facilitatorid, $facilitator_name) = $database->get_row( $as_db_query );			
			$_SESSION['recover_username'] = $facilitator_name;
		    return true;
		} else  {
		    return false;
		}
		
	}
	
	function as_recover_password($username, $email) {
		$as_db_query = "SELECT * FROM as_facilitator WHERE facilitator_email = '$email' AND facilitator_name = '$username'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $facilitatorid, $facilitator_name) = $database->get_row( $as_db_query );
			$_SESSION['recover_password'] = $facilitator_name;
		    return true;
		} else  {
		    return false;
		}		
	}
	
	function as_change_password($username) {		
		$database = new As_Dbconn();	
		$Update_User_Details = array(
			'facilitator_password' => md5($_POST['passwordcon']),
		);
		$where_clause = array('facilitator_name' => $username);
		$updated = $database->as_update( 'as_facilitator', $Update_User_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
	function as_is_logged(){
		$mysigninid = isset( $_SESSION['sitefacilitator_facilitator'] ) ? $_SESSION['sitefacilitator_facilitator'] : "";
		
		if (!$mysigninid) return true;
		else return false;
	}
	
	function as_signin_modal() {
	  if ( isset( $_POST['LetMeIn'] ) ) {
		$signinname = $_POST['signinname'];
		$signinkey = md5($_POST['signinkey']);
		
		$as_db_query = "SELECT * FROM as_facilitator 
			WHERE facilitator_name = '$signinname' AND facilitator_password = '$signinkey'
			OR facilitator_email ='$signinname' AND facilitator_password = '$signinkey'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $facilitatorid) = $database->get_row( $as_db_query );
		    $_SESSION['sitefacilitator_facilitator'] = $facilitatorid;			
			header( "Location: ".as_siteUrl());		
		} else header( "Location: ".as_siteLynk()."signin" );	
	  }
	} 
		
	function signout() {
	  unset( $_SESSION['sitefacilitator_facilitator'] );
	  unset( $_SESSION['sitefacilitator_account'] );
	  header( "Location: index.php" );
	}
	
	function as_signup() {
		$results = array();
		$results['pageTitle'] = "JS System";
		$results['pageAction'] = "SignUp"; 
		
		if ( isset( $_POST['SignMeUp'] ) ) {
			as_add_new_facilitator();
			$_SESSION['sitefacilitator_facilitator'] = $_POST['surname'];
			$_SESSION['sitefacilitator_account'] = as_logged_account($_POST['surname']);
			header( "Location: index.php" );					
		}  else if ( isset( $_POST['CancelThis'] ) ) {
			header( "Location: index.php");						
		}  else {
			require( AS_INC . "as_signup.php" );
		}	

	}
	

	
	function as_add_new_facilitator(){
 		$raw_file_name = basename($_FILES["avatar"]["name"]);
		$temp_file_name = $_FILES["avatar"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'facilitator'.time().'.'.$upload_file_ext[1];
		$target_file = AS_TARGET . $finalname;
		$imageFileStudent = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $as_avatar = $finalname;
		else $as_avatar = "facilitator_default.jpg";		
			 
		$database = new As_Dbconn();			
		$New_User_Details = array(			
			'facilitator_name' => trim($_POST['username']),
			'facilitator_fname' => trim($_POST['fname']),
			'facilitator_surname' => trim($_POST['surname']),
			'facilitator_password' => md5(trim($_POST['passwordcon'])),
			'facilitator_email' => trim($_POST['email']),
			'facilitator_mobile' => trim($_POST['mobile']),
			'facilitator_group' => trim($_POST['group']),
			'facilitator_organization' => trim($as_avatar),
			'facilitator_joined' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->as_insert( 'as_facilitator', $New_User_Details ); 
	}
	
	function as_signup_me(){
 		$raw_file_name = basename($_FILES["avatar"]["name"]);
		$temp_file_name = $_FILES["avatar"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'facilitator'.time().'.'.$upload_file_ext[1];
		$target_file = AS_TARGET . $finalname;
		$imageFileStudent = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $as_avatar = $finalname;
		else $as_avatar = "facilitator_default.jpg";		
			 
		$database = new As_Dbconn();			
		$New_User_Details = array(			
			'facilitator_name' => trim($_POST['username']),
			'facilitator_fname' => trim($_POST['fname']),
			'facilitator_surname' => trim($_POST['surname']),
			'facilitator_password' => md5(trim($_POST['passwordcon'])),
			'facilitator_email' => trim($_POST['email']),
			'facilitator_mobile' => trim($_POST['mobile']),
			'facilitator_group' => 'beneficiary',
			'facilitator_organization' => trim($as_avatar),
			'facilitator_joined' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->as_insert( 'as_facilitator', $New_User_Details ); 
	}
	
		
	function as_add_new_supp(){
 		$raw_file_name = basename($_FILES["avatar"]["name"]);
		$temp_file_name = $_FILES["avatar"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'supp'.time().'.'.$upload_file_ext[1];
		$target_file = AS_TARGET . $finalname;
		$imageFileStudent = pathinfo($target_file,PATHINFO_EXTENSION);		
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
	