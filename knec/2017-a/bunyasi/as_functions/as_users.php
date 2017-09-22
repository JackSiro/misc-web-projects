<?php
	function as_signin() {

		$results = array();
		$results['pageTitle'] = "Management System"; 
		$results['pageAction'] = "Sign In";
		
		if ( isset( $_POST['SignMeIn'] ) ) {
			$loginname = $_POST['username'];
			$loginkey = md5($_POST['password']);		
            if (as_let_me_user($loginname, $loginkey)){
				$_SESSION['appsmata_user'] = as_let_me_user($loginname, $loginkey);
				$_SESSION['appsmata_account'] = as_logged_account($loginname);
				header( "Location: index.php" );			
			}   else {			
				require( AS_INC."as_signin.php" );
	    }	
	  } else {	
	    require( AS_INC."as_signin.php" );
 	 }
	}
	
	function as_let_me_user($loginname, $loginkey) {
		$as_db_query = "SELECT * FROM as_user WHERE user_name = '$loginname' AND user_password = '$loginkey'
			OR user_email ='$loginname' AND user_password = '$loginkey'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $userid, $user_name, ) = $database->get_row( $as_db_query );
		    return $user_name;
		} else  {
		    return false;
		}
		
	}
	
	function as_logged_account($loginname) {
		$as_db_query = "SELECT * FROM as_user 
				WHERE user_name = '$loginname' 
					OR user_email ='$loginname'";
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
		$Update_User_Details = array(
			'user_password' => md5($_POST['passwordcon']),
		);
		$where_clause = array('user_name' => $username);
		$updated = $database->as_update( 'as_user', $Update_User_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
	function as_is_logged(){
		$myloginid = isset( $_SESSION['appsmata_user'] ) ? $_SESSION['appsmata_user'] : "";
		
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
		    $_SESSION['appsmata_user'] = $userid;			
			header( "Location: ".as_siteUrl());		
		} else header( "Location: ".as_siteLynk()."signin" );	
	  }
	} 
	
	
function logout() {
  unset( $_SESSION['appsmata_user'] );
  unset( $_SESSION['appsmata_account'] );
  header( "Location: index.php" );
}
	
	
	function as_add_new_user(){
 		$raw_file_name = basename($_FILES["avatar"]["name"]);
		$temp_file_name = $_FILES["avatar"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'user'.time().'.'.$upload_file_ext[1];
		$target_file = AS_TARGET . $finalname;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
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
			'user_group' => trim($_POST['group']),
			'user_avatar' => trim($as_avatar),
			'user_joined' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->as_insert( 'as_user', $New_User_Details ); 
	}
	
	function as_register_me(){
 		$raw_file_name = basename($_FILES["avatar"]["name"]);
		$temp_file_name = $_FILES["avatar"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'user'.time().'.'.$upload_file_ext[1];
		$target_file = AS_TARGET . $finalname;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
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
	
		
	function as_add_new_attendant(){
 		$raw_file_name = basename($_FILES["avatar"]["name"]);
		$temp_file_name = $_FILES["avatar"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'attendant'.time().'.'.$upload_file_ext[1];
		$target_file = AS_TARGET . $finalname;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $as_avatar = $finalname;
		else $as_avatar = "attendant_default.jpg";		
			 
		$database = new As_Dbconn();			
		$New_User_Details = array(			
			'attendant_name' => trim($_POST['attendantname']),
			'attendant_fullname' => trim($_POST['fullname']),
			'attendant_email' => trim($_POST['email']),
			'attendant_mobile' => trim($_POST['mobile']),
			'attendant_address' => trim($_POST['address']),
			'attendant_avatar' => trim($as_avatar),
			'attendant_joined' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->as_insert( 'as_attendant', $New_User_Details ); 
	}
	
	
?>
	