<?php
	
	function as_let_me_teacher($loginname, $loginkey) {
		$as_db_query = "SELECT * FROM as_teacher WHERE teacher_name = '$loginname' AND teacher_password = '$loginkey'
			OR teacher_email ='$loginname' AND teacher_password = '$loginkey'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $teacherid, $teacher_name, ) = $database->get_row( $as_db_query );
		    return $teacher_name;
		} else  {
		    return false;
		}
		
	}
	
	function as_logged_account($loginname) {
		$as_db_query = "SELECT * FROM as_teacher 
				WHERE teacher_name = '$loginname' 
					OR teacher_email ='$loginname'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $teacherid, $teacher_name, $teacher_fname, $teacher_surname, $teacher_sex, $teacher_password, $teacher_email, $teacher_group) = $database->get_row( $as_db_query );
		    return $teacher_group;
		} else  {
		    return false;
		}
		
	}
	
	function as_recover_username($email, $password) {
		$as_db_query = "SELECT * FROM as_teacher WHERE teacher_email = '$email' AND teacher_password = '$password'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $teacherid, $teacher_name) = $database->get_row( $as_db_query );			
			$_SESSION['recover_username'] = $teacher_name;
		    return true;
		} else  {
		    return false;
		}
		
	}
	
	function as_recover_password($username, $email) {
		$as_db_query = "SELECT * FROM as_teacher WHERE teacher_email = '$email' AND teacher_name = '$username'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $teacherid, $teacher_name) = $database->get_row( $as_db_query );
			$_SESSION['recover_password'] = $teacher_name;
		    return true;
		} else  {
		    return false;
		}		
	}
	
	function as_change_password($username) {		
		$database = new As_Dbconn();	
		$Update_Teacher_Details = array(
			'teacher_password' => md5($_POST['passwordcon']),
		);
		$where_clause = array('teacher_name' => $username);
		$updated = $database->as_update( 'as_teacher', $Update_Teacher_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
	function as_is_logged(){
		$myloginid = isset( $_SESSION['school_loggedin'] ) ? $_SESSION['school_loggedin'] : "";
		
		if (!$myloginid) return true;
		else return false;
	}
	
	function as_signin_modal() {
	  if ( isset( $_POST['LetMeIn'] ) ) {
		$loginname = $_POST['loginname'];
		$loginkey = md5($_POST['loginkey']);
		
		$as_db_query = "SELECT * FROM as_teacher 
			WHERE teacher_name = '$loginname' AND teacher_password = '$loginkey'
			OR teacher_email ='$loginname' AND teacher_password = '$loginkey'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $teacherid) = $database->get_row( $as_db_query );
		    $_SESSION['school_loggedin'] = $teacherid;			
			header( "Location: ".as_siteUrl());		
		} else header( "Location: ".as_siteLynk()."signin" );	
	  }
	} 
	
	function logout() {
	  unset( $_SESSION['school_loggedin'] );
	  unset( $_SESSION['school_account'] );
	  header( "Location: index.php" );
	}
	
	function as_add_new_teacher(){
 		$database = new As_Dbconn();			
		$New_Teacher_Details = array(			
			'teacher_name' => trim($_POST['username']),
			'teacher_fname' => trim($_POST['fname']),
			'teacher_surname' => trim($_POST['surname']),
			'teacher_password' => md5(trim($_POST['passwordcon'])),
			'teacher_email' => trim($_POST['email']),
			'teacher_mobile' => trim($_POST['mobile']),
			'teacher_group' => trim($_POST['group']),
			'teacher_joined' => date('Y-m-d H:i:s'),
		);			
		$add_query = $database->as_insert( 'as_teacher', $New_Teacher_Details ); 
	}
	
	function as_register_me(){
 		$database = new As_Dbconn();			
		$New_Teacher_Details = array(			
			'teacher_name' => trim($_POST['username']),
			'teacher_fname' => trim($_POST['fname']),
			'teacher_surname' => trim($_POST['surname']),
			'teacher_password' => md5(trim($_POST['passwordcon'])),
			'teacher_email' => trim($_POST['email']),
			'teacher_mobile' => trim($_POST['mobile']),
			'teacher_joined' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->as_insert( 'as_teacher', $New_Teacher_Details ); 
	}
	
	
?>
	