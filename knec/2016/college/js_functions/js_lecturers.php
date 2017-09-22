<?php
	
	function js_let_me_lecturer($loginname, $loginkey) {
		$js_db_query = "SELECT * FROM js_lecturer WHERE lecturer_name = '$loginname' AND lecturer_password = '$loginkey'
			OR lecturer_email ='$loginname' AND lecturer_password = '$loginkey'";
		$database = new Js_Dbconn();
		if( $database->js_num_rows( $js_db_query ) > 0 ) {
            list( $lecturerid, $lecturer_name, ) = $database->get_row( $js_db_query );
		    return $lecturer_name;
		} else  {
		    return false;
		}
		
	}
	
	function js_logged_account($loginname) {
		$js_db_query = "SELECT * FROM js_lecturer 
				WHERE lecturer_name = '$loginname' 
					OR lecturer_email ='$loginname'";
		$database = new Js_Dbconn();
		if( $database->js_num_rows( $js_db_query ) > 0 ) {
            list( $lecturerid, $lecturer_name, $lecturer_fname, $lecturer_surname, $lecturer_sex, $lecturer_password, $lecturer_email, $lecturer_group) = $database->get_row( $js_db_query );
		    return $lecturer_group;
		} else  {
		    return false;
		}
		
	}
	
	function js_recover_username($email, $password) {
		$js_db_query = "SELECT * FROM js_lecturer WHERE lecturer_email = '$email' AND lecturer_password = '$password'";
		$database = new Js_Dbconn();
		if( $database->js_num_rows( $js_db_query ) > 0 ) {
            list( $lecturerid, $lecturer_name) = $database->get_row( $js_db_query );			
			$_SESSION['recover_username'] = $lecturer_name;
		    return true;
		} else  {
		    return false;
		}
		
	}
	
	function js_recover_password($username, $email) {
		$js_db_query = "SELECT * FROM js_lecturer WHERE lecturer_email = '$email' AND lecturer_name = '$username'";
		$database = new Js_Dbconn();
		if( $database->js_num_rows( $js_db_query ) > 0 ) {
            list( $lecturerid, $lecturer_name) = $database->get_row( $js_db_query );
			$_SESSION['recover_password'] = $lecturer_name;
		    return true;
		} else  {
		    return false;
		}		
	}
	
	function js_change_password($username) {		
		$database = new Js_Dbconn();	
		$Update_Lecturer_Details = array(
			'lecturer_password' => md5($_POST['passwordcon']),
		);
		$where_clause = array('lecturer_name' => $username);
		$updated = $database->js_update( 'js_lecturer', $Update_Lecturer_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
	function js_is_logged(){
		$myloginid = isset( $_SESSION['college_loggedin'] ) ? $_SESSION['college_loggedin'] : "";
		
		if (!$myloginid) return true;
		else return false;
	}
	
	function js_signin_modal() {
	  if ( isset( $_POST['LetMeIn'] ) ) {
		$loginname = $_POST['loginname'];
		$loginkey = md5($_POST['loginkey']);
		
		$js_db_query = "SELECT * FROM js_lecturer 
			WHERE lecturer_name = '$loginname' AND lecturer_password = '$loginkey'
			OR lecturer_email ='$loginname' AND lecturer_password = '$loginkey'";
		$database = new Js_Dbconn();
		if( $database->js_num_rows( $js_db_query ) > 0 ) {
            list( $lecturerid) = $database->get_row( $js_db_query );
		    $_SESSION['college_loggedin'] = $lecturerid;			
			header( "Location: ".js_siteUrl());		
		} else header( "Location: ".js_siteLynk()."signin" );	
	  }
	} 
	
	
function logout() {
  unset( $_SESSION['college_loggedin'] );
  unset( $_SESSION['college_account'] );
  header( "Location: index.php" );
}
	
	
	function js_add_new_lecturer(){
 		$target_dir = "file:///D:/Web/htdocs/college/js_media/";
		$raw_file_name = basename($_FILES["avatar"]["name"]);
		$temp_file_name = $_FILES["avatar"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'lecturer'.time().'.'.$upload_file_ext[1];
		$target_file = $target_dir . $finalname;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $js_avatar = $finalname;
		else $js_avatar = "lecturer_default.jpg";		
			 
		$database = new Js_Dbconn();			
		$New_Lecturer_Details = array(			
			'lecturer_name' => trim($_POST['username']),
			'lecturer_fname' => trim($_POST['fname']),
			'lecturer_surname' => trim($_POST['surname']),
			'lecturer_password' => md5(trim($_POST['passwordcon'])),
			'lecturer_email' => trim($_POST['email']),
			'lecturer_mobile' => trim($_POST['mobile']),
			'lecturer_group' => trim($_POST['group']),
			'lecturer_avatar' => trim($js_avatar),
			'lecturer_joined' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->js_insert( 'js_lecturer', $New_Lecturer_Details ); 
	}
	
	function js_register_me(){
 		$target_dir = "file:///D:/Web/htdocs/college/js_media/";
		$raw_file_name = basename($_FILES["avatar"]["name"]);
		$temp_file_name = $_FILES["avatar"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'lecturer'.time().'.'.$upload_file_ext[1];
		$target_file = $target_dir . $finalname;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $js_avatar = $finalname;
		else $js_avatar = "lecturer_default.jpg";		
			 
		$database = new Js_Dbconn();			
		$New_Lecturer_Details = array(			
			'lecturer_name' => trim($_POST['username']),
			'lecturer_fname' => trim($_POST['fname']),
			'lecturer_surname' => trim($_POST['surname']),
			'lecturer_password' => md5(trim($_POST['passwordcon'])),
			'lecturer_email' => trim($_POST['email']),
			'lecturer_mobile' => trim($_POST['mobile']),
			'lecturer_group' => 'student',
			'lecturer_avatar' => trim($js_avatar),
			'lecturer_joined' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->js_insert( 'js_lecturer', $New_Lecturer_Details ); 
	}
	
	
?>
	