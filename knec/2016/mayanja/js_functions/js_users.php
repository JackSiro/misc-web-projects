<?php
	function js_signin() {

		$results = array();
		$results['pageTitle'] = "KTTC ELibrary Catalogue Management System"; 
		$results['pageAction'] = "Sign In";
		
		if ( isset( $_POST['SignMeIn'] ) ) {
		$loginname = $_POST['username'];
		$loginkey = md5($_POST['password']);
		
            if (js_let_me_user($loginname, $loginkey)){
			$_SESSION['nafaka_user'] = js_let_me_user($loginname, $loginkey);
			$_SESSION['nafaka_account'] = js_logged_account($loginname);
			header( "Location: index.php" );
			
		}   else {
			
            require( JS_INC."js_signin.php" );
	    }
	
	  } else {
	
	    require( JS_INC."js_signin.php" );
 	 }

	}
	

	function js_let_me_user($loginname, $loginkey) {
		$js_db_query = "SELECT * FROM js_user WHERE user_name = '$loginname' AND user_password = '$loginkey'
			OR user_email ='$loginname' AND user_password = '$loginkey'";
		$database = new Js_Dbconn();
		if( $database->js_num_rows( $js_db_query ) > 0 ) {
            list( $userid, $user_name, ) = $database->get_row( $js_db_query );
		    return $user_name;
		} else  {
		    return false;
		}
		
	}
	
	function js_logged_account($loginname) {
		$js_db_query = "SELECT * FROM js_user 
				WHERE user_name = '$loginname' 
					OR user_email ='$loginname'";
		$database = new Js_Dbconn();
		if( $database->js_num_rows( $js_db_query ) > 0 ) {
            list( $userid, $user_name, $user_fname, $user_surname, $user_sex, $user_password, $user_email, $user_group) = $database->get_row( $js_db_query );
		    return $user_group;
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
		$myloginid = isset( $_SESSION['nafaka_user'] ) ? $_SESSION['nafaka_user'] : "";
		
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
		    $_SESSION['nafaka_user'] = $userid;			
			header( "Location: ".js_siteUrl());		
		} else header( "Location: ".js_siteLynk()."signin" );	
	  }
	} 
	
	
function logout() {
  unset( $_SESSION['nafaka_user'] );
  unset( $_SESSION['nafaka_account'] );
  header( "Location: index.php" );
}
	
	
	function js_add_new_user(){
 		$raw_file_name = basename($_FILES["avatar"]["name"]);
		$temp_file_name = $_FILES["avatar"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'user'.time().'.'.$upload_file_ext[1];
		$target_file = JS_TARGET . $finalname;
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
			'user_group' => trim($_POST['group']),
			'user_avatar' => trim($js_avatar),
			'user_joined' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->js_insert( 'js_user', $New_User_Details ); 
	}
	
	function js_register_me(){
 		$raw_file_name = basename($_FILES["avatar"]["name"]);
		$temp_file_name = $_FILES["avatar"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'user'.time().'.'.$upload_file_ext[1];
		$target_file = JS_TARGET . $finalname;
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
	
		
	function js_add_new_supp(){
 		$raw_file_name = basename($_FILES["avatar"]["name"]);
		$temp_file_name = $_FILES["avatar"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'supp'.time().'.'.$upload_file_ext[1];
		$target_file = JS_TARGET . $finalname;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $js_avatar = $finalname;
		else $js_avatar = "supp_default.jpg";		
			 
		$database = new Js_Dbconn();			
		$New_User_Details = array(			
			'supp_name' => trim($_POST['suppname']),
			'supp_fullname' => trim($_POST['fullname']),
			'supp_email' => trim($_POST['email']),
			'supp_mobile' => trim($_POST['mobile']),
			'supp_address' => trim($_POST['address']),
			'supp_avatar' => trim($js_avatar),
			'supp_joined' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->js_insert( 'js_supplier', $New_User_Details ); 
	}
	
	
?>
	