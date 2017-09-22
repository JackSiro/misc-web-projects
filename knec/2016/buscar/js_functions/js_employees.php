<?php
	function js_signin() {

		$results = array();
		$results['pageTitle'] = "KTTC ELibrary Catalogue Management System"; 
		$results['pageAction'] = "Sign In";
		
		if ( isset( $_POST['SignMeIn'] ) ) {
		$loginname = $_POST['username'];
		$loginkey = md5($_POST['password']);
		
            if (js_let_me_user($loginname, $loginkey)){
			$_SESSION['buscar_user'] = js_let_me_user($loginname, $loginkey);
			$_SESSION['buscar_account'] = js_logged_account($loginname);
			header( "Location: index.php" );
			
		}   else {
			
            require( JS_INC."js_signin.php" );
	    }
	
	  } else {
	
	    require( JS_INC."js_signin.php" );
 	 }

	}
	

	function js_let_me_user($loginname, $loginkey) {
		$js_db_query = "SELECT * FROM js_employee WHERE employee_name = '$loginname' AND employee_password = '$loginkey'
			OR employee_email ='$loginname' AND employee_password = '$loginkey'";
		$database = new Js_Dbconn();
		if( $database->js_num_rows( $js_db_query ) > 0 ) {
            list( $employeeid, $employee_name, ) = $database->get_row( $js_db_query );
		    return $employee_name;
		} else  {
		    return false;
		}
		
	}
	
	function js_logged_account($loginname) {
		$js_db_query = "SELECT * FROM js_employee 
				WHERE employee_name = '$loginname' 
					OR employee_email ='$loginname'";
		$database = new Js_Dbconn();
		if( $database->js_num_rows( $js_db_query ) > 0 ) {
            list( $employeeid, $employee_name, $employee_fname, $employee_surname, $employee_sex, $employee_password, $employee_email, $employee_group) = $database->get_row( $js_db_query );
		    return $employee_group;
		} else  {
		    return false;
		}
		
	}
	
	function js_recover_username($email, $password) {
		$js_db_query = "SELECT * FROM js_employee WHERE employee_email = '$email' AND employee_password = '$password'";
		$database = new Js_Dbconn();
		if( $database->js_num_rows( $js_db_query ) > 0 ) {
            list( $employeeid, $employee_name) = $database->get_row( $js_db_query );			
			$_SESSION['recover_username'] = $employee_name;
		    return true;
		} else  {
		    return false;
		}
		
	}
	
	function js_recover_password($username, $email) {
		$js_db_query = "SELECT * FROM js_employee WHERE employee_email = '$email' AND employee_name = '$username'";
		$database = new Js_Dbconn();
		if( $database->js_num_rows( $js_db_query ) > 0 ) {
            list( $employeeid, $employee_name) = $database->get_row( $js_db_query );
			$_SESSION['recover_password'] = $employee_name;
		    return true;
		} else  {
		    return false;
		}		
	}
	
	function js_change_password($username) {		
		$database = new Js_Dbconn();	
		$Update_User_Details = array(
			'employee_password' => md5($_POST['passwordcon']),
		);
		$where_clause = array('employee_name' => $username);
		$updated = $database->js_update( 'js_employee', $Update_User_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
	function js_is_logged(){
		$myloginid = isset( $_SESSION['buscar_user'] ) ? $_SESSION['buscar_user'] : "";
		
		if (!$myloginid) return true;
		else return false;
	}
	
	function js_signin_modal() {
	  if ( isset( $_POST['LetMeIn'] ) ) {
		$loginname = $_POST['loginname'];
		$loginkey = md5($_POST['loginkey']);
		
		$js_db_query = "SELECT * FROM js_employee 
			WHERE employee_name = '$loginname' AND employee_password = '$loginkey'
			OR employee_email ='$loginname' AND employee_password = '$loginkey'";
		$database = new Js_Dbconn();
		if( $database->js_num_rows( $js_db_query ) > 0 ) {
            list( $employeeid) = $database->get_row( $js_db_query );
		    $_SESSION['buscar_user'] = $employeeid;			
			header( "Location: ".js_siteUrl());		
		} else header( "Location: ".js_siteLynk()."signin" );	
	  }
	} 
	
	
function logout() {
  unset( $_SESSION['buscar_user'] );
  unset( $_SESSION['buscar_account'] );
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
		else $js_avatar = "employee_default.jpg";		
			 
		$database = new Js_Dbconn();			
		$New_User_Details = array(			
			'employee_name' => trim($_POST['username']),
			'employee_fname' => trim($_POST['fname']),
			'employee_surname' => trim($_POST['surname']),
			'employee_password' => md5(trim($_POST['passwordcon'])),
			'employee_email' => trim($_POST['email']),
			'employee_mobile' => trim($_POST['mobile']),
			'employee_group' => trim($_POST['group']),
			'employee_avatar' => trim($js_avatar),
			'employee_joined' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->js_insert( 'js_employee', $New_User_Details ); 
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
		else $js_avatar = "employee_default.jpg";		
			 
		$database = new Js_Dbconn();			
		$New_User_Details = array(			
			'employee_name' => trim($_POST['username']),
			'employee_fname' => trim($_POST['fname']),
			'employee_surname' => trim($_POST['surname']),
			'employee_password' => md5(trim($_POST['passwordcon'])),
			'employee_email' => trim($_POST['email']),
			'employee_mobile' => trim($_POST['mobile']),
			'employee_group' => 'student',
			'employee_avatar' => trim($js_avatar),
			'employee_joined' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->js_insert( 'js_employee', $New_User_Details ); 
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
	