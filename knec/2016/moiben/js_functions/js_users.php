<?php
	
	function js_let_me_user($loginname, $loginkey) {
		$js_db_query = "SELECT * FROM js_user WHERE user_name = '$loginname' AND user_password = '$loginkey'
			OR user_email ='$loginname' AND user_password = '$loginkey'";
		$database = new Js_Dbconn();
		if( $database->js_num_rows( $js_db_query ) > 0 ) {
            list( $userid, $user_name, ) = $database->get_row( $js_db_query );
		    return $userid;
		} else  {
		    return false;
		}
		
	}
	
	function js_logged_account($loginname) {
		$js_db_query = "SELECT * FROM js_user WHERE user_name = '$loginname'";
		$database = new Js_Dbconn();
		if( $database->js_num_rows( $js_db_query ) > 0 ) {
            list( $userid, $user_name, $user_fullname, $user_sex, $user_password, $user_email, $user_group, $user_joined, $user_mobile, $user_mobile, $user_web, $user_avatar) = $database->get_row( $js_db_query );
		    return $user_group;
		} else  {
		    return false;
		}
		
	}
	
	function js_full_name() {
		$userid = $_SESSION['username_loggedin'];
		$js_db_query = "SELECT * FROM js_user WHERE userid = '$userid'";
		$database = new Js_Dbconn();
		if( $database->js_num_rows( $js_db_query ) > 0 ) {
            list( $userid, $user_name, $user_fullname) = $database->get_row( $js_db_query );
		    return $user_fullname;
		} else  {
		    return false;
		}
		
	}
	
	function js_recover_username($email, $password) {
		$js_db_query = "SELECT * FROM js_user WHERE user_email = '$email' AND user_password = '$password'";
		$database = new Js_Dbconn();
		if( $database->js_num_rows( $js_db_query ) > 0 ) {
            list( $userid, $user_name) = $database->get_row( $js_db_query );			
			$_SESSION['recover_username'] = $user_name;
		    return true;
		} else  {
		    return false;
		}
		
	}
	
	function js_recover_password($username, $email) {
		$js_db_query = "SELECT * FROM js_user WHERE user_email = '$email' AND user_name = '$username'";
		$database = new Js_Dbconn();
		if( $database->js_num_rows( $js_db_query ) > 0 ) {
            list( $userid, $user_name) = $database->get_row( $js_db_query );
			$_SESSION['recover_password'] = $user_name;
		    return true;
		} else  {
		    return false;
		}		
	}
	
	function js_change_password($username) {		
		$database = new Js_Dbconn();	
		$Update_User_Details = array(
			'user_password' => md5($_POST['passwordcon']),
		);
		$where_clause = array('user_name' => $username);
		$updated = $database->js_update( 'js_user', $Update_User_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
	function js_is_logged(){
		$myloginid = isset( $_SESSION['username_loggedin'] ) ? $_SESSION['username_loggedin'] : "";
		
		if (!$myloginid) return true;
		else return false;
	}
	
	function js_signin_modal() {
	  if ( isset( $_POST['LetMeIn'] ) ) {
		$loginname = $_POST['loginname'];
		$loginkey = md5($_POST['loginkey']);
		
		$js_db_query = "SELECT * FROM js_user 
			WHERE user_name = '$loginname' AND user_password = '$loginkey'
			OR user_email ='$loginname' AND user_password = '$loginkey'";
		$database = new Js_Dbconn();
		if( $database->js_num_rows( $js_db_query ) > 0 ) {
            list( $userid) = $database->get_row( $js_db_query );
		    $_SESSION['username_loggedin'] = $userid;			
			header( "Location: ".js_siteUrl());		
		} else header( "Location: ".js_siteLynk()."signin" );	
	  }
	} 
	
	
function js_logout() {
  unset( $_SESSION['username_loggedin'] );
  unset( $_SESSION['account'] );
  header( "Location: index.php" );
}
	
	
	function  js_add_new_doctor(){
		$database = new Js_Dbconn();			
		$New_User_Details = array(			
			'user_name' => trim($_POST['username']),
			'user_fullname' => trim($_POST['fullname']),
			'user_password' => md5(trim($_POST['passwordcon'])),
			'user_email' => trim($_POST['email']),
			'user_mobile' => trim($_POST['mobile']),
			'user_group' => "Doctor",
			'user_joined' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->js_insert( 'js_user', $New_User_Details ); 
	}
	
	function  js_add_new_patient(){
		$database = new Js_Dbconn();		
		$New_User_Details = array(		 
			'pat_fullname' => trim($_POST['fullname']),
			'pat_sex' => trim($_POST['sex']),
			'pat_email' => trim($_POST['email']),
			'pat_address' => trim($_POST['address']),
			'pat_mobile' => trim($_POST['mobile']),
			'pat_joined' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->js_insert( 'js_patient', $New_User_Details ); 
	}
	
	function js_register_me(){
 		$target_dir = "file:///D:/Web/htdocs/library/js_media/";
		$raw_file_name = basename($_FILES["avatar"]["name"]);
		$temp_file_name = $_FILES["avatar"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'user'.time().'.'.$upload_file_ext[1];
		$target_file = $target_dir . $finalname;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $js_avatar = $finalname;
		else $js_avatar = "user_default.jpg";		
			 
		$database = new Js_Dbconn();			
		$New_User_Details = array(			
			'user_name' => trim($_POST['username']),
			'user_fname' => trim($_POST['fname']),
			'user_surname' => trim($_POST['surname']),
			'user_password' => md5(trim($_POST['passwordcon'])),
			'user_email' => trim($_POST['email']),
			'user_mobile' => trim($_POST['mobile']),
			'user_group' => 'student',
			'user_avatar' => trim($js_avatar),
			'user_joined' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->js_insert( 'js_user', $New_User_Details ); 
	}
	
	
	function js_login() {		
		if ( isset( $_POST['SignMeIn'] ) ) {
		$loginname = $_POST['username'];
		$loginkey = md5($_POST['password']);
		
          if (js_let_me_user($loginname, $loginkey)){
			$_SESSION['username_loggedin'] = js_let_me_user($loginname, $loginkey);
			$_SESSION['account'] = js_logged_account($loginname);
			header( "Location: index.php" );			
		  }   
	  }
}

	function js_signin() {

		$results = array();
		$results['pageTitle'] = "Moiben Outpatient Hospital"; 
		$results['pageAction'] = "Sign In";
		
		if ( isset( $_POST['SignMeIn'] ) ) {
		$loginname = $_POST['username'];
		$loginkey = md5($_POST['password']);
		
            if (js_let_me_user($loginname, $loginkey)){
			$_SESSION['username_loggedin'] = js_let_me_user($loginname, $loginkey);
			$_SESSION['account'] = js_logged_account($loginname);
			header( "Location: index.php" );
			
		}   else {
			
            require( JS_INC."js_signin.php" );
	    }
	
	  } else {
	
	    require( JS_INC."js_signin.php" );
 	 }

	}
	
function register() {
	$results = array();
	$results['pageTitle'] = "Moiben Outpatient Hospital";
	$results['pageAction'] = "Register"; 
	
	if ( isset( $_POST['Register'] ) ) {
		js_register_me();
		header( "Location: index.php");		
	}  else {
		require( JS_INC . "js_register.php" );
	}	
	
}

function forgot_username() {
	$results = array();
	$results['pageTitle'] = "Moiben Outpatient Hospital";
	$results['pageAction'] = "ForgotUsername"; 
	
	if ( isset( $_POST['ForgotUsername'] ) ) {
		$email = $_POST['username'];
		$password = md5($_POST['password']);
		js_recover_username($email, $password);
		header( "Location: index.php?action=recovered_username");		
	}  else {
		require( JS_INC . "js_forgot_username.php" );
	}	
	
}

function forgot_password() {
	$results = array();
	$results['pageTitle'] = "Moiben Outpatient Hospital";
	$results['pageAction'] = "ForgotPassword"; 
	
	if ( isset( $_POST['ForgotPassword'] ) ) {
		$username = $_POST['username'];
		$email = $_POST['email'];
		js_recover_password($username, $email);
		header( "Location: index.php?action=recover_password");		
	}  else {
		require( JS_INC . "js_forgot_password.php" );
	}	
	
}

function recover_username() {
	$results = array();
	$results['pageTitle'] = "Moiben Outpatient Hospital";
	$results['pageAction'] = "RecoveredUsername"; 
	require( JS_INC . "js_recover_username.php" );
	
}

function recover_password() {
	$results = array();
	$results['pageTitle'] = "Moiben Outpatient Hospital";
	$results['pageAction'] = "RecoveredPassword"; 
	
	if ( isset( $_POST['RecoverPassword'] ) ) {
		$username = $_POST['username'];
		$password = md5($_POST['passwordcon']);
		js_change_password($username);
		header( "Location: index.php");		
	}  else {
		require( JS_INC . "js_recover_password.php" );
	}
}


?>
	