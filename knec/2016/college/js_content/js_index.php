<?php
	session_start();
	require( 'js_config.php' );
	include JS_FUNC.'js_dbconn.php';
	require JS_FUNC.'js_base.php';
	include JS_FUNC.'js_options.php';
	include JS_FUNC.'js_paging.php';
	include JS_FUNC.'js_posting.php';
	include JS_FUNC.'js_lecturers.php';
 	
 	$js_loginid = isset( $_SESSION['college_loggedin'] ) ? $_SESSION['college_loggedin'] : "";
	
	$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
	$myaccount = isset( $_SESSION['college_account'] ) ? $_SESSION['college_account'] : "";
	
	if ( $action != "login" && $action != "logout" && $action != "register" 
			&& $action != "forgot_password" && $action != "recover_password"
			&& $action != "forgot_username" && $action != "recover_username"
			&& $action != "logout" && !$js_loginid ) {
			
			js_signin();
	   exit;
	} 
      
switch ( $action ) {
	case 'login': js_signin();
		break;
	case 'register': register();
		break;
	case 'forgot_password': forgot_password();
		break;
	case 'recover_password': recover_password();
		break;
	case 'forgot_username': forgot_username();
		break;
	case 'recover_username': recover_username();
		break;
	case 'logout': logout();
		break;
	case 'departments':  departments();
		break;
	case 'newdepartment': 
		if ($myaccount != "student") newdepartment();
		else dashboard();
		break;
	case 'viewdepartment': 
		if ($myaccount != "student") viewdepartment();
		else dashboard();
		break;
	case 'students': students();
		break;
	case 'search': search();
		break;
	case 'newstudent':  
		if ($myaccount != "student") newstudent();
		else dashboard();
		break;
	case 'viewstudent': viewstudent();
		break;
	case 'editstudent':  
		if ($myaccount != "student") editstudent();
		else dashboard();
		break;
	case 'deletestudent':  
		if ($myaccount != "student") deletestudent();
		else dashboard();
		break;
	case 'lecturers': lecturers();
		break;
	case 'newlecturer':  
		if ($myaccount != "student") newlecturer();
		else dashboard();
		break;
	case 'viewlecturer': viewlecturer();
		break;
	case 'profile': 
		if ($myaccount) profile();
		else dashboard();
		break;
	case 'options':  
		if ($myaccount != "student") options();
		else dashboard();
		break;  
    default:
		dashboard();
}

function js_signin() {

		$results = array();
		$results['pageTitle'] = "Management Information System"; 
		$results['pageAction'] = "Sign In";
		
		if ( isset( $_POST['SignMeIn'] ) ) {
		$loginname = $_POST['username'];
		$loginkey = md5($_POST['password']);
		
            if (js_let_me_lecturer($loginname, $loginkey)){
			$_SESSION['college_loggedin'] = js_let_me_lecturer($loginname, $loginkey);
			$_SESSION['college_account'] = js_logged_account($loginname);
			header( "Location: index.php" );
			
		}   else {
			
            require( JS_INC."js_signin.php" );
	    }
	
	  } else {
	
	    require( JS_INC."js_signin.php" );
 	 }

	}
	
function register() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Register"; 
	
	if ( isset( $_POST['Register'] ) ) {
		js_register_me();
		header( "Location: index.php");		
	}  else {
		require( JS_INC . "js_register.php" );
	}	
	
}

  function forgot_username() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "ForgotUsername"; 
	
	if ( isset( $_POST['ForgotUsername'] ) ) {
		$email = $_POST['username'];
		$password = md5($_POST['password']);
		js_recover_username($email, $password);
		header( "Location: index.php?action=recovered_username");		
	}  else {
		require( JS_INC . "js_forgot_username.php" );
	}	
}

  function forgot_password() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "ForgotPassword"; 
	
	if ( isset( $_POST['ForgotPassword'] ) ) {
		$username = $_POST['username'];
		$email = $_POST['email'];
		js_recover_password($username, $email);
		header( "Location: index.php?action=recover_password");		
	}  else {
		require( JS_INC . "js_forgot_password.php" );
	}	
	
}

function recover_username() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "RecoveredUsername"; 
	require( JS_INC . "js_recover_username.php" );
	
}

function recover_password() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "RecoveredPassword"; 
	
	if ( isset( $_POST['RecoverPassword'] ) ) {
		$username = $_POST['username'];
		$password = md5($_POST['passwordcon']);
		js_change_password($username);
		header( "Location: index.php");		
	}  else {
		require( JS_INC . "js_recover_password.php" );
	}
}

function dashboard() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Dashboard";  
	require( JS_INC . "js_dashboard.php" );
}

function departments() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Departments";  
	require( JS_INC . "js_departments.php" );
}

function newdepartment() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Newdepartment"; 
	
	if ( isset( $_POST['AddDepartment'] ) ) {
		js_add_new_department();
		header( "Location: index.php?action=newdepartment");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		js_add_new_department();
		header( "Location: index.php?action=departments");						
	}  else {
		require( JS_INC . "js_newdepartment.php" );
	}	
	
}

function viewdepartment() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Viewdepartment"; 
	$js_departmentid = isset( $_GET['js_departmentid'] ) ? $_GET['js_departmentid'] : "";
	
	$js_db_query = "SELECT * FROM js_department WHERE departmentid = '$js_departmentid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $departmentid, $department_slug) = $database->get_row( $js_db_query );
		$results['department'] = $departmentid;
	} else  {
		return false;
		header( "Location: index.php?action=departments");	
	}
	
	if ( isset( $_POST['SaveClass'] ) ) {
		js_edit_department($js_departmentid);
		header( "Location: index.php?action=viewdepartment&&js_departmentid=".$js_departmentid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		js_edit_department($js_departmentid);
		header( "Location: index.php?action=departments");						
	}  else {
		require( JS_INC . "js_viewdepartment.php" );
	}	
	
}
	  
function students() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Students"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$js_search = $_POST['js_search'];
		$js_departmentid = $_POST['js_departmentid'];
		
		header( "Location: index.php?action=search&&js_search=".$js_search."&&js_departmentid=".$js_departmentid);
								
	}  else {	
		require( JS_INC . "js_students.php" );
	}
}

function search() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Search"; 
	$results['search'] = isset( $_GET['js_studentid'] ) ? $_GET['js_studentid'] : "";
	$results['searchdepartment'] = isset( $_GET['js_departmentid'] ) ? $_GET['js_departmentid'] : "";
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$js_search = $_POST['js_search'];
		$js_departmentid = $_POST['js_departmentid'];
		
		header( "Location: index.php?action=search&&js_search=".$js_search."&&js_departmentid=".$js_departmentid);
														
	}  else {	
		require( JS_INC . "js_students.php" );
	}
}
function newstudent() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Newstudent"; 
	
	if ( isset( $_POST['AddStudent'] ) ) {
		js_add_new_student();
		header( "Location: index.php?action=newstudent");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		js_add_new_student();
		header( "Location: index.php?action=students");						
	}  else {
		require( JS_INC . "js_newstudent.php" );
	}	
	
}

function viewstudent() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Viewstudent"; 
	$js_studentid = isset( $_GET['js_studentid'] ) ? $_GET['js_studentid'] : "";
	
	$js_db_query = "SELECT * FROM js_student WHERE studentid = '$js_studentid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $studentid, $lecturer_name) = $database->get_row( $js_db_query );
		$results['student'] = $studentid;
	} else  {
		return false;
		header( "Location: index.php?action=students");	
	}
	
	require( JS_INC . "js_viewstudent.php" );
	
}

function editstudent() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Editstudent"; 
	$js_studentid = isset( $_GET['js_studentid'] ) ? $_GET['js_studentid'] : "";
	
	$js_db_query = "SELECT * FROM js_student WHERE studentid = '$js_studentid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $studentid) = $database->get_row( $js_db_query );
		$results['student'] = $studentid;
	} else  {
		return false;
		header( "Location: index.php?action=students");	
	}
	
	if ( isset( $_POST['SaveStudent'] ) ) {
		js_edit_student($js_studentid);
		header( "Location: index.php?action=editstudent&&js_studentid=".$js_studentid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		js_edit_student($js_studentid);
		header( "Location: index.php?action=viewstudent&&js_studentid=".$js_studentid);					
	}  else {
		require( JS_INC . "js_editstudent.php" );
	}	
	
}

function lecturer_delete() {
	$js_lecturerid = isset( $_GET['js_lecturerid'] ) ? $_GET['js_lecturerid'] : "";
	
	$database = new Js_Dbconn();
	$js_db_query = "DELETE * FROM js_lecturer WHERE lecturerid = '$js_lecturerid'";
	$delete = array(
		'lecturerid' => $js_lecturerid,
	);
	$deleted = $database->delete( 'js_lecturer', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=lecturer_all");	
	}
}

function lecturers() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Lecturers";  
	require( JS_INC . "js_lecturers.php" );
}

function newlecturer() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Newlecturer"; 
	
	if ( isset( $_POST['AddLecturer'] ) ) {
		js_add_new_lecturer();
		header( "Location: index.php?action=newlecturer");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		js_add_new_lecturer();
		header( "Location: index.php?action=lecturers");						
	}  else {
		require( JS_INC . "js_newlecturer.php" );
	}	
	
}
function viewlecturer() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Viewlecturer"; 
	$js_lecturerid = isset( $_GET['js_lecturerid'] ) ? $_GET['js_lecturerid'] : "";
	
	$js_db_query = "SELECT * FROM js_lecturer WHERE lecturerid = '$js_lecturerid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $lecturerid, $lecturer_name) = $database->get_row( $js_db_query );
		$results['lecturer'] = $lecturerid;
	} else  {
		return false;
		header( "Location: index.php?action=lecturers");	
	}
	
	require( JS_INC . "js_viewlecturer.php" );
		
}

function profile() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Profile"; 
	$js_username = $_SESSION['college_loggedin'];
	
	$js_db_query = "SELECT * FROM js_lecturer WHERE lecturer_name = '$js_username'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $lecturerid, $lecturer_name) = $database->get_row( $js_db_query );
		$results['lecturer'] = $lecturerid;
	} else  {
		return false;
		header( "Location: index.php?action=lecturers");	
	}
	
	require( JS_INC . "js_viewlecturer.php" );
		
}

function options() {
	$results = array();
	$results['pageTitle'] = "Management Information System";
	$results['pageAction'] = "Options"; 
	$js_loginid = isset( $_SESSION['college_loggedin'] ) ? $_SESSION['college_loggedin'] : "";
	
	if ( isset( $_POST['SaveSite'] ) ) {
			
		js_set_option('sitename', $_POST['sitename'], $js_loginid);	
		js_set_option('slogan', $_POST['slogan'], $js_loginid);
		js_set_option('description', $_POST['description'], $js_loginid);
		js_set_option('siteurl', $_POST['siteurl'], $js_loginid);
		
		header( "Location: index.php?action=options");						
	}  else if ( isset( $_POST['CancelSave'] ) ) {
		header( "Location: index.php?action=options");						
	}  else {
		require( JS_INC . "js_options.php" );
	}
	
}

?>
