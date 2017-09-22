<?php
	
	function as_let_me_admin($loginname, $loginkey) {
		$as_db_query = "SELECT * FROM as_admin WHERE admin_name = '$loginname' AND admin_password = '$loginkey'
			OR admin_email ='$loginname' AND admin_password = '$loginkey'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $adminid, $admin_name, ) = $database->get_row( $as_db_query );
		    return $admin_name;
		} else  {
		    return false;
		}
		
	}
	
	function as_logged_account($loginname) {
		$as_db_query = "SELECT * FROM as_admin 
				WHERE admin_name = '$loginname' 
					OR admin_email ='$loginname'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $adminid, $admin_name, $admin_fname, $admin_surname, $admin_sex, $admin_password, $admin_email, $admin_group) = $database->get_row( $as_db_query );
		    return $admin_group;
		} else  {
		    return false;
		}
		
	}
	
	function as_recover_username($email, $password) {
		$as_db_query = "SELECT * FROM as_admin WHERE admin_email = '$email' AND admin_password = '$password'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $adminid, $admin_name) = $database->get_row( $as_db_query );			
			$_SESSION['recover_username'] = $admin_name;
		    return true;
		} else  {
		    return false;
		}
		
	}
	
	function as_recover_password($username, $email) {
		$as_db_query = "SELECT * FROM as_admin WHERE admin_email = '$email' AND admin_name = '$username'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $adminid, $admin_name) = $database->get_row( $as_db_query );
			$_SESSION['recover_password'] = $admin_name;
		    return true;
		} else  {
		    return false;
		}		
	}
	
	function as_change_password($username) {		
		$database = new As_Dbconn();	
		$Update_Teacher_Details = array(
			'admin_password' => md5($_POST['passwordcon']),
		);
		$where_clause = array('admin_name' => $username);
		$updated = $database->as_update( 'as_admin', $Update_Teacher_Details, $where_clause, 1 );
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
		
		$as_db_query = "SELECT * FROM as_admin 
			WHERE admin_name = '$loginname' AND admin_password = '$loginkey'
			OR admin_email ='$loginname' AND admin_password = '$loginkey'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $adminid) = $database->get_row( $as_db_query );
		    $_SESSION['school_loggedin'] = $adminid;			
			header( "Location: ".as_siteUrl());		
		} else header( "Location: ".as_siteLynk()."signin" );	
	  }
	} 
	
	function logout() {
	  unset( $_SESSION['school_loggedin'] );
	  unset( $_SESSION['school_account'] );
	  header( "Location: index.php" );
	}
	
	function as_add_new_admin(){
 		$database = new As_Dbconn();			
		$New_Teacher_Details = array(			
			'admin_name' => trim($_POST['username']),
			'admin_fname' => trim($_POST['fname']),
			'admin_surname' => trim($_POST['surname']),
			'admin_password' => md5(trim($_POST['passwordcon'])),
			'admin_email' => trim($_POST['email']),
			'admin_mobile' => trim($_POST['mobile']),
			'admin_group' => trim($_POST['group']),
			'admin_joined' => date('Y-m-d H:i:s'),
		);			
		$add_query = $database->as_insert( 'as_admin', $New_Teacher_Details ); 
	}
	
	function as_register_me(){
 		$database = new As_Dbconn();			
		$New_Teacher_Details = array(			
			'admin_name' => trim($_POST['username']),
			'admin_fname' => trim($_POST['fname']),
			'admin_surname' => trim($_POST['surname']),
			'admin_password' => md5(trim($_POST['passwordcon'])),
			'admin_email' => trim($_POST['email']),
			'admin_mobile' => trim($_POST['mobile']),
			'admin_joined' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->as_insert( 'as_admin', $New_Teacher_Details ); 
	}
	
	
?>
	