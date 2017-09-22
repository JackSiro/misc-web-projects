<?php
	
	function as_let_me_doctor($loginname, $loginkey) {
		$as_db_query = "SELECT * FROM as_doctor WHERE doctor_code = '$loginname' AND doctor_password = '$loginkey'
			OR doctor_email ='$loginname' AND doctor_password = '$loginkey'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $doctorid, $doctor_code, ) = $database->get_row( $as_db_query );
		    return $doctorid;
		} else  {
		    return false;
		}
		
	}
	
	function as_let_me_patient($loginname, $loginkey) {
		$as_db_query = "SELECT * FROM as_patient WHERE patient_code = '$loginname' AND patient_password = '$loginkey'
			OR patient_email ='$loginname' AND patient_password = '$loginkey'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $patientid, $patient_code, ) = $database->get_row( $as_db_query );
		    return $patientid;
		} else  {
		    return false;
		}
		
	}
	
	function as_logged_account($type, $loginname) {
		$database = new As_Dbconn();
		if ($type == 1) {
			$as_db_query = "SELECT * FROM as_doctor WHERE doctor_code = '$loginname' OR doctor_email ='$loginname'";
			list( $doctorid, $doctor_code) = $database->get_row( $as_db_query );
			return $doctor_code;
		} else {
			$as_db_query = "SELECT * FROM as_patient WHERE patient_code = '$loginname' OR patient_email ='$loginname'";
			list( $patientid, $patient_code) = $database->get_row( $as_db_query );
			return $patient_code;
		}
	}
	
	function as_full_name() {
		$doctorid = $_SESSION['loggedin'];
		$as_db_query = "SELECT * FROM as_doctor WHERE doctorid = '$doctorid'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $doctorid, $doctor_code, $doctor_name) = $database->get_row( $as_db_query );
		    return $doctor_name;
		} else  {
		    return false;
		}
		
	}
	
	function as_recover_username($email, $password) {
		$as_db_query = "SELECT * FROM as_doctor WHERE doctor_email = '$email' AND doctor_password = '$password'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $doctorid, $doctor_code) = $database->get_row( $as_db_query );			
			$_SESSION['recover_username'] = $doctor_code;
		    return true;
		} else  {
		    return false;
		}
		
	}
	
	function as_recover_password($username, $email) {
		$as_db_query = "SELECT * FROM as_doctor WHERE doctor_email = '$email' AND doctor_code = '$username'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $doctorid, $doctor_code) = $database->get_row( $as_db_query );
			$_SESSION['recover_password'] = $doctor_code;
		    return true;
		} else  {
		    return false;
		}		
	}
	
	function as_change_password($username) {		
		$database = new As_Dbconn();	
		$Update_User_Details = array(
			'doctor_password' => md5($_POST['passwordcon']),
		);
		$where_clause = array('doctor_code' => $username);
		$updated = $database->as_update( 'as_doctor', $Update_User_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
	function as_is_logged(){
		$myloginid = isset( $_SESSION['loggedin'] ) ? $_SESSION['loggedin'] : "";
		
		if (!$myloginid) return true;
		else return false;
	}
	
	function as_signin_modal() {
	  if ( isset( $_POST['LetMeIn'] ) ) {
		$loginname = $_POST['loginname'];
		$loginkey = md5($_POST['loginkey']);
		
		$as_db_query = "SELECT * FROM as_doctor 
			WHERE doctor_code = '$loginname' AND doctor_password = '$loginkey'
			OR doctor_email ='$loginname' AND doctor_password = '$loginkey'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $doctorid) = $database->get_row( $as_db_query );
		    $_SESSION['loggedin'] = $doctorid;			
			header( "Location: ".as_siteUrl());		
		} else header( "Location: ".as_siteLynk()."signin" );	
	  }
	} 
			
	function as_logout() {
		unset($_SESSION['loggedin']);
		unset($_SESSION['account']);
		unset($_SESSION['type']);
		header( "Location: index.php" );
	}

	function as_add_new_doctor(){
		$database = new As_Dbconn();			
		$New_User_Details = array(			
			'doctor_code' => trim($_POST['username']),
			'doctor_name' => trim($_POST['fullname']),
			'doctor_password' => md5(trim($_POST['passwordcon'])),
			'doctor_email' => trim($_POST['email']),
			'doctor_mobile' => trim($_POST['mobile']),
			'doctor_group' => "Doctor",
			'doctor_joined' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->as_insert( 'as_doctor', $New_User_Details ); 
	}
	
	function as_add_new_patient(){
		$database = new As_Dbconn();		
		$New_User_Details = array(		 
			'patient_name' => trim($_POST['fullname']),
			'patient_sex' => trim($_POST['sex']),
			'patient_code' => trim($_POST['username']),
			'patient_email' => trim($_POST['email']),
			'patient_address' => trim($_POST['address']),
			'patient_mobile' => trim($_POST['mobile']),
			'patient_password' => md5(trim($_POST['password'])),
			'patient_joined' => date('Y-m-d H:i:s'),
		);
		$add_query = $database->as_insert( 'as_patient', $New_User_Details ); 
	}
	
	function as_register_doctor(){
 		$target_dir = "file:///D:/Web/htdocs/library/as_media/";
		$raw_file_name = basename($_FILES["avatar"]["name"]);
		$temp_file_name = $_FILES["avatar"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'user'.time().'.'.$upload_file_ext[1];
		$target_file = $target_dir . $finalname;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $as_avatar = $finalname;
		else $as_avatar = "doctor_default.jpg";		
			 
		$database = new As_Dbconn();			
		$New_User_Details = array(			
			'doctor_code' => trim($_POST['username']),
			'doctor_fname' => trim($_POST['fname']),
			'doctor_surname' => trim($_POST['surname']),
			'doctor_password' => md5(trim($_POST['password'])),
			'doctor_email' => trim($_POST['email']),
			'doctor_mobile' => trim($_POST['mobile']),
			'doctor_group' => 'student',
			'doctor_avatar' => trim($as_avatar),
			'doctor_joined' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->as_insert( 'as_doctor', $New_User_Details ); 
	}
	
	function as_register_patient(){
 		$database = new As_Dbconn();			
		$New_User_Details = array(			
			'doctor_code' => trim($_POST['username']),
			'doctor_fname' => trim($_POST['fname']),
			'doctor_surname' => trim($_POST['surname']),
			'doctor_password' => md5(trim($_POST['password'])),
			'doctor_email' => trim($_POST['email']),
			'doctor_mobile' => trim($_POST['mobile']),
			'doctor_group' => 'student',
			'doctor_avatar' => trim($as_avatar),
			'doctor_joined' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->as_insert( 'as_doctor', $New_User_Details ); 
	}
	
	function as_login() {		
		if ( isset( $_POST['SignMeIn'] ) ) {
		$loginname = $_POST['username'];
		$loginkey = md5($_POST['password']);
		
          if (as_let_me_user($loginname, $loginkey)){
			$_SESSION['loggedin'] = as_let_me_user($loginname, $loginkey);
			$_SESSION['account'] = as_logged_account($loginname);
			header( "Location: index.php" );			
		  }   
	  }
}

	function as_signin() {
		$results = array();
		$results['pageTitle'] = "Meet Your Doctor"; 
		$results['pageAction'] = "Sign In";
		
		if (isset($_POST['DoctorSignin'])) {
			$loginname = $_POST['username'];
			$loginkey = md5($_POST['password']);
		
			if (as_let_me_doctor($loginname, $loginkey)){
				$_SESSION['loggedin'] = as_let_me_doctor($loginname, $loginkey);
				$_SESSION['account'] = as_logged_account(1, $loginname);
				$_SESSION['type'] = 'Doctor';
				header( "Location: index.php" );
				
			}   
		}  else if (isset($_POST['PatientSignin'])) {
			$loginname = $_POST['username'];
			$loginkey = md5($_POST['password']);
		
			if (as_let_me_patient($loginname, $loginkey)){
				$_SESSION['loggedin'] = as_let_me_patient($loginname, $loginkey);
				$_SESSION['account'] = as_logged_account(2, $loginname);
				$_SESSION['type'] = 'Patient';
				header( "Location: index.php" );
				
			}  
		} else require( AS_INC."as_signin.php" );
	}

	function forgot_username() {
		$results = array();
		$results['pageTitle'] = "Meet Your Doctor";
		$results['pageAction'] = "ForgotUsername"; 
		
		if ( isset( $_POST['ForgotUsername'] ) ) {
			$email = $_POST['username'];
			$password = md5($_POST['password']);
			as_recover_username($email, $password);
			header( "Location: index.php?action=recovered_username");		
		}  else {
			require( AS_INC . "as_forgot_username.php" );
		}	
		
	}

	function forgot_password() {
		$results = array();
		$results['pageTitle'] = "Meet Your Doctor";
		$results['pageAction'] = "ForgotPassword"; 
		
		if ( isset( $_POST['ForgotPassword'] ) ) {
			$username = $_POST['username'];
			$email = $_POST['email'];
			as_recover_password($username, $email);
			header( "Location: index.php?action=recover_password");		
		}  else {
			require( AS_INC . "as_forgot_password.php" );
		}	
		
	}

	function recover_username() {
		$results = array();
		$results['pageTitle'] = "Meet Your Doctor";
		$results['pageAction'] = "RecoveredUsername"; 
		require( AS_INC . "as_recover_username.php" );
		
	}

	function recover_password() {
		$results = array();
		$results['pageTitle'] = "Meet Your Doctor";
		$results['pageAction'] = "RecoveredPassword"; 
		
		if ( isset( $_POST['RecoverPassword'] ) ) {
			$username = $_POST['username'];
			$password = md5($_POST['passwordcon']);
			as_change_password($username);
			header( "Location: index.php");		
		}  else {
			require( AS_INC . "as_recover_password.php" );
		}
	}


?>
	