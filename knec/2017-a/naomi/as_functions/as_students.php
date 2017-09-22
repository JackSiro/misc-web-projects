<?php
	
	function as_let_me_student($loginname, $loginkey) {
		$as_db_query = "SELECT * FROM as_student WHERE student_name = '$loginname' AND student_password = '$loginkey'
			OR student_email ='$loginname' AND student_password = '$loginkey'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $studentid, $student_name) = $database->get_row( $as_db_query );
		    return $studentid;
		} else  {
		    return false;
		}
		
	}
	
	function as_logged_account($loginname) {
		$as_db_query = "SELECT * FROM as_student 
				WHERE student_name = '$loginname' 
					OR student_email ='$loginname'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $studentid, $student_name, $student_fname, $student_surname, $student_sex, $student_password, $student_email, $student_role) = $database->get_row( $as_db_query );
		    return $student_role;
		} else  {
		    return false;
		}
		
	}
	
	function as_recover_username($email, $password) {
		$as_db_query = "SELECT * FROM as_student WHERE student_email = '$email' AND student_password = '$password'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $studentid, $student_name) = $database->get_row( $as_db_query );			
			$_SESSION['recover_username'] = $student_name;
		    return true;
		} else  {
		    return false;
		}
		
	}
	
	function as_recover_password($username, $email) {
		$as_db_query = "SELECT * FROM as_student WHERE student_email = '$email' AND student_name = '$username'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $studentid, $student_name) = $database->get_row( $as_db_query );
			$_SESSION['recover_password'] = $student_name;
		    return true;
		} else  {
		    return false;
		}		
	}
	
	function as_change_password($username) {		
		$database = new As_Dbconn();	
		$Update_Teacher_Details = array(
			'student_password' => md5($_POST['passwordcon']),
		);
		$where_clause = array('student_name' => $username);
		$updated = $database->as_update( 'as_student', $Update_Teacher_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
	function as_is_logged(){
		$myloginid = isset( $_SESSION['school_user'] ) ? $_SESSION['school_user'] : "";
		
		if (!$myloginid) return true;
		else return false;
	}
	
	function as_signin_modal() {
	  if ( isset( $_POST['LetMeIn'] ) ) {
		$loginname = $_POST['loginname'];
		$loginkey = md5($_POST['loginkey']);
		
		$as_db_query = "SELECT * FROM as_student 
			WHERE student_name = '$loginname' AND student_password = '$loginkey'
			OR student_email ='$loginname' AND student_password = '$loginkey'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $studentid) = $database->get_row( $as_db_query );
		    $_SESSION['school_user'] = $studentid;			
			header( "Location: ".as_siteUrl());		
		} else header( "Location: ".as_siteLynk()."signin" );	
	  }
	} 
	
	function logout() {
	  unset( $_SESSION['school_user'] );
	  unset( $_SESSION['school_account'] );
	  header( "Location: index.php" );
	}
	
	function as_add_new_student(){
 		$database = new As_Dbconn();			
		$New_Teacher_Details = array(			
			'student_name' => trim($_POST['username']),
			'student_fname' => trim($_POST['fname']),
			'student_surname' => trim($_POST['surname']),
			'student_password' => md5(trim($_POST['passwordcon'])),
			'student_email' => trim($_POST['email']),
			'student_mobile' => trim($_POST['mobile']),
			'student_role' => trim($_POST['group']),
			'student_joined' => date('Y-m-d H:i:s'),
		);			
		$add_query = $database->as_insert( 'as_student', $New_Teacher_Details ); 
	}
	
	function as_register_me(){
 		$database = new As_Dbconn();			
		$New_Teacher_Details = array(			
			'student_name' => trim($_POST['username']),
			'student_fname' => trim($_POST['fname']),
			'student_surname' => trim($_POST['surname']),
			'student_password' => md5(trim($_POST['passwordcon'])),
			'student_email' => trim($_POST['email']),
			'student_mobile' => trim($_POST['mobile']),
			'student_joined' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->as_insert( 'as_student', $New_Teacher_Details ); 
	}
	
	
?>
	