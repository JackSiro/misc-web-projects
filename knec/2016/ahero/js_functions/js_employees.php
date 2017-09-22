<?php
	
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
            list( $employeeid, $employee_name, $employee_fullname, $employee_number, $employee_sex, $employee_password, $employee_email, $employee_group) = $database->get_row( $js_db_query );
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
		$Update_Employee_Details = array(
			'employee_password' => md5($_POST['passwordcon']),
		);
		$where_clause = array('employee_name' => $username);
		$updated = $database->js_update( 'js_employee', $Update_Employee_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
	function js_is_logged(){
		$myloginid = isset( $_SESSION['js_aherouser'] ) ? $_SESSION['js_aherouser'] : "";
		
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
		    $_SESSION['js_aherouser'] = $employeeid;			
			header( "Location: ".js_siteUrl());		
		} else header( "Location: ".js_siteLynk()."signin" );	
	  }
	} 
	
	
function logout() {
  unset( $_SESSION['js_aherouser'] );
  unset( $_SESSION['js_aheroacc'] );
  header( "Location: index.php" );
}
	
	
	function js_add_new_employee(){
 		
		$database = new Js_Dbconn();			
		$New_Employee_Details = array(			
			'employee_name' => trim($_POST['username']),
			'employee_fullname' => trim($_POST['fullname']),
			'employee_number' => trim($_POST['number']),
			'employee_status' => trim($_POST['status']),
			'employee_account' => trim($_POST['account']),
			'employee_department' => trim($_POST['department']),
			'employee_idno' => trim($_POST['idno']),
			'employee_password' => md5(trim($_POST['passwordcon'])),
			'employee_email' => trim($_POST['email']),
			'employee_mobile' => trim($_POST['mobile']),
			'employee_group' => trim($_POST['group']),
			'employee_joined' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->js_insert( 'js_employee', $New_Employee_Details ); 
	}
	
	function js_register_me(){

		$database = new Js_Dbconn();			
		$New_Employee_Details = array(			
			'employee_name' => trim($_POST['username']),
			'employee_fullname' => trim($_POST['fullname']),
			'employee_number' => trim($_POST['number']),
			'employee_password' => md5(trim($_POST['passwordcon'])),
			'employee_email' => trim($_POST['email']),
			'employee_mobile' => trim($_POST['mobile']),
			'employee_joined' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->js_insert( 'js_employee', $New_Employee_Details ); 
	}
	
	
?>
	