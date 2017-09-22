<?php
	
	function js_let_me_user($loginname, $loginkey) {
		$js_db_query = "SELECT * FROM js_student WHERE student_name = '$loginname' AND student_password = '$loginkey'
			OR student_email ='$loginname' AND student_password = '$loginkey'";
		$database = new Js_Dbconn();
		if( $database->js_num_rows( $js_db_query ) > 0 ) {
            list( $studentid, $student_name, ) = $database->get_row( $js_db_query );
		    return $student_name;
		} else  {
		    return false;
		}
		
	}
	
	function js_logged_account($loginname) {
		$js_db_query = "SELECT * FROM js_student 
				WHERE student_name = '$loginname' 
					OR student_email ='$loginname'";
		$database = new Js_Dbconn();
		if( $database->js_num_rows( $js_db_query ) > 0 ) {
            list( $studentid, $student_name, $student_fname, $student_surname, $student_sex, $student_password, $student_email, $student_group) = $database->get_row( $js_db_query );
		    return $student_group;
		} else  {
		    return false;
		}
		
	}
	
	function js_recover_username($email, $password) {
		$js_db_query = "SELECT * FROM js_student WHERE student_email = '$email' AND student_password = '$password'";
		$database = new Js_Dbconn();
		if( $database->js_num_rows( $js_db_query ) > 0 ) {
            list( $studentid, $student_name) = $database->get_row( $js_db_query );			
			$_SESSION['recover_username'] = $student_name;
		    return true;
		} else  {
		    return false;
		}
		
	}
	
	function js_recover_password($username, $email) {
		$js_db_query = "SELECT * FROM js_student WHERE student_email = '$email' AND student_name = '$username'";
		$database = new Js_Dbconn();
		if( $database->js_num_rows( $js_db_query ) > 0 ) {
            list( $studentid, $student_name) = $database->get_row( $js_db_query );
			$_SESSION['recover_password'] = $student_name;
		    return true;
		} else  {
		    return false;
		}		
	}
	
	function js_change_password($username) {		
		$database = new Js_Dbconn();	
		$Update_User_Details = array(
			'student_password' => md5($_POST['passwordcon']),
		);
		$where_clause = array('student_name' => $username);
		$updated = $database->js_update( 'js_student', $Update_User_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
	function js_is_logged(){
		$myloginid = isset( $_SESSION['digilibraryid'] ) ? $_SESSION['digilibraryid'] : "";
		
		if (!$myloginid) return true;
		else return false;
	}
	
	function js_signin_modal() {
	  if ( isset( $_POST['LetMeIn'] ) ) {
		$loginname = $_POST['loginname'];
		$loginkey = md5($_POST['loginkey']);
		
		$js_db_query = "SELECT * FROM js_student 
			WHERE student_name = '$loginname' AND student_password = '$loginkey'
			OR student_email ='$loginname' AND student_password = '$loginkey'";
		$database = new Js_Dbconn();
		if( $database->js_num_rows( $js_db_query ) > 0 ) {
            list( $studentid) = $database->get_row( $js_db_query );
		    $_SESSION['digilibraryid'] = $studentid;			
			header( "Location: ".js_siteUrl());		
		} else header( "Location: ".js_siteLynk()."signin" );	
	  }
	} 
	
	
function logout() {
  unset( $_SESSION['digilibraryid'] );
  unset( $_SESSION['digilibacc'] );
  header( "Location: index.php" );
}
	
	
	function js_add_new_user(){
 		$target_dir = "file:///D:/Web/htdocs/library/js_media/";
		$raw_file_name = basename($_FILES["avatar"]["name"]);
		$temp_file_name = $_FILES["avatar"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'user'.time().'.'.$upload_file_ext[1];
		$target_file = $target_dir . $finalname;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $js_avatar = $finalname;
		else $js_avatar = "student_default.jpg";		
			 
		$database = new Js_Dbconn();			
		$New_User_Details = array(			
			'student_name' => trim($_POST['username']),
			'student_fname' => trim($_POST['fname']),
			'student_surname' => trim($_POST['surname']),
			'student_password' => md5(trim($_POST['passwordcon'])),
			'student_email' => trim($_POST['email']),
			'student_mobile' => trim($_POST['mobile']),
			'student_group' => trim($_POST['group']),
			'student_avatar' => trim($js_avatar),
			'student_joined' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->js_insert( 'js_student', $New_User_Details ); 
	}
	
	function js_register_me(){
 		$target_dir = "file:///D:/Web/htdocs/library/js_media/";
		$raw_file_name = basename($_FILES["avatar"]["name"]);
		$temp_file_name = $_FILES["avatar"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'user'.time().'.'.$upload_file_ext[1];
		$target_file = $target_dir . $finalname;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $js_avatar = $finalname;
		else $js_avatar = "student_default.jpg";		
			 
		$database = new Js_Dbconn();			
		$New_User_Details = array(			
			'student_name' => trim($_POST['username']),
			'student_fname' => trim($_POST['fname']),
			'student_surname' => trim($_POST['surname']),
			'student_password' => md5(trim($_POST['passwordcon'])),
			'student_email' => trim($_POST['email']),
			'student_mobile' => trim($_POST['mobile']),
			'student_group' => 'student',
			'student_avatar' => trim($js_avatar),
			'student_joined' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->js_insert( 'js_student', $New_User_Details ); 
	}
	
	
?>
	