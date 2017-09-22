<?php
	function as_signin() {

		$results = array();
		$results['pageTitle'] = "Online Bus Ticketing"; 
		$results['pageAction'] = "Sign In";
		
		if ( isset( $_POST['SignMeIn'] ) ) {
		$loginname = $_POST['username'];
		$loginkey = md5($_POST['password']);
		
            if (as_let_me_user($loginname, $loginkey)){
			$_SESSION['buscar_user'] = as_let_me_user($loginname, $loginkey);
			$_SESSION['buscar_account'] = as_logged_account($loginname);
			header( "Location: index.php" );
			
		}   else {
			
            require( AS_INC."as_signin.php" );
	    }
	
	  } else {
	
	    require( AS_INC."as_signin.php" );
 	 }

	}
	

	function as_let_me_user($loginname, $loginkey) {
		$as_db_query = "SELECT * FROM as_employee WHERE employee_name = '$loginname' AND employee_password = '$loginkey'
			OR employee_email ='$loginname' AND employee_password = '$loginkey'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $employeeid, $employee_name, ) = $database->get_row( $as_db_query );
		    return $employee_name;
		} else  {
		    return false;
		}
		
	}
	
	function as_logged_account($loginname) {
		$as_db_query = "SELECT * FROM as_employee 
				WHERE employee_name = '$loginname' 
					OR employee_email ='$loginname'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $employeeid, $employee_name, $employee_fname, $employee_surname, $employee_sex, $employee_password, $employee_email, $employee_group) = $database->get_row( $as_db_query );
		    return $employee_group;
		} else  {
		    return false;
		}
		
	}
	
	function as_recover_username($email, $password) {
		$as_db_query = "SELECT * FROM as_employee WHERE employee_email = '$email' AND employee_password = '$password'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $employeeid, $employee_name) = $database->get_row( $as_db_query );			
			$_SESSION['recover_username'] = $employee_name;
		    return true;
		} else  {
		    return false;
		}
		
	}
	
	function as_recover_password($username, $email) {
		$as_db_query = "SELECT * FROM as_employee WHERE employee_email = '$email' AND employee_name = '$username'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $employeeid, $employee_name) = $database->get_row( $as_db_query );
			$_SESSION['recover_password'] = $employee_name;
		    return true;
		} else  {
		    return false;
		}		
	}
	
	function as_change_password($username) {		
		$database = new As_Dbconn();	
		$Update_User_Details = array(
			'employee_password' => md5($_POST['passwordcon']),
		);
		$where_clause = array('employee_name' => $username);
		$updated = $database->as_update( 'as_employee', $Update_User_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
	function as_is_logged(){
		$myloginid = isset( $_SESSION['buscar_user'] ) ? $_SESSION['buscar_user'] : "";
		
		if (!$myloginid) return true;
		else return false;
	}
	
	function as_signin_modal() {
	  if ( isset( $_POST['LetMeIn'] ) ) {
		$loginname = $_POST['loginname'];
		$loginkey = md5($_POST['loginkey']);
		
		$as_db_query = "SELECT * FROM as_employee 
			WHERE employee_name = '$loginname' AND employee_password = '$loginkey'
			OR employee_email ='$loginname' AND employee_password = '$loginkey'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $employeeid) = $database->get_row( $as_db_query );
		    $_SESSION['buscar_user'] = $employeeid;			
			header( "Location: ".as_siteUrl());		
		} else header( "Location: ".as_siteLynk()."signin" );	
	  }
	} 
	
	
function logout() {
  unset( $_SESSION['buscar_user'] );
  unset( $_SESSION['buscar_account'] );
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
		else $as_avatar = "employee_default.jpg";		
			 
		$database = new As_Dbconn();			
		$New_User_Details = array(			
			'employee_name' => trim($_POST['username']),
			'employee_fname' => trim($_POST['fname']),
			'employee_surname' => trim($_POST['surname']),
			'employee_password' => md5(trim($_POST['passwordcon'])),
			'employee_email' => trim($_POST['email']),
			'employee_mobile' => trim($_POST['mobile']),
			'employee_group' => trim($_POST['group']),
			'employee_avatar' => trim($as_avatar),
			'employee_joined' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->as_insert( 'as_employee', $New_User_Details ); 
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
		else $as_avatar = "employee_default.jpg";		
			 
		$database = new As_Dbconn();			
		$New_User_Details = array(			
			'employee_name' => trim($_POST['username']),
			'employee_fname' => trim($_POST['fname']),
			'employee_surname' => trim($_POST['surname']),
			'employee_password' => md5(trim($_POST['passwordcon'])),
			'employee_email' => trim($_POST['email']),
			'employee_mobile' => trim($_POST['mobile']),
			'employee_group' => 'student',
			'employee_avatar' => trim($as_avatar),
			'employee_joined' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->as_insert( 'as_employee', $New_User_Details ); 
	}
	
		
	function as_add_new_supp(){
 		$raw_file_name = basename($_FILES["avatar"]["name"]);
		$temp_file_name = $_FILES["avatar"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'supp'.time().'.'.$upload_file_ext[1];
		$target_file = AS_TARGET . $finalname;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $as_avatar = $finalname;
		else $as_avatar = "supp_default.jpg";		
			 
		$database = new As_Dbconn();			
		$New_User_Details = array(			
			'supp_name' => trim($_POST['suppname']),
			'supp_fullname' => trim($_POST['fullname']),
			'supp_email' => trim($_POST['email']),
			'supp_mobile' => trim($_POST['mobile']),
			'supp_address' => trim($_POST['address']),
			'supp_avatar' => trim($as_avatar),
			'supp_joined' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->as_insert( 'as_supplier', $New_User_Details ); 
	}
	
	
?>
	