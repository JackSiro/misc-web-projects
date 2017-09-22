<?php
	session_start();
	require( 'js_config.php' );
	include JS_FUNC.'js_dbconn.php';
	require JS_FUNC.'js_base.php';
	include JS_FUNC.'js_options.php';
	include JS_FUNC.'js_paging.php';
	include JS_FUNC.'js_posting.php';
	include JS_FUNC.'js_students.php';
 	
 	$js_loginid = isset( $_SESSION['digilibraryid'] ) ? $_SESSION['digilibraryid'] : "";
	
	$js_page = isset( $_GET['js_page'] ) ? $_GET['js_page'] : "";
	$myaccount = isset( $_SESSION['digilibacc'] ) ? $_SESSION['digilibacc'] : "";
	
	if ( $js_page != "login" && $js_page != "logout" && $js_page != "signup" 
			&& $js_page != "manage_pass" && $js_page != "recover_password"
			&& $js_page != "manage_username" && $js_page != "recover_username"
			&& $js_page != "logout" && !$js_loginid ) {
			
			js_signin();
	   exit;
	} 
      
switch ( $js_page ) {
	case 'login': js_signin();
		break;
	case 'signup': signup();
		break;
	case 'manage_pass': manage_pass();
		break;
	case 'recover_password': recover_password();
		break;
	case 'manage_username': manage_username();
		break;
	case 'recover_username': recover_username();
		break;
	case 'logout': logout();
		break;
	case 'booksection':  booksection();
		break;
	case 'newsection': 
		if ($myaccount != "student") newsection();
		else dashboard();
		break;
	case 'viewsection': 
		if ($myaccount != "student") viewsection();
		else dashboard();
		break;
	case 'books': books();
		break;
	case 'search': search();
		break;
	case 'newbook':  
		if ($myaccount != "student") newbook();
		else dashboard();
		break;
	case 'viewbook': viewbook();
		break;
	case 'editbook':  
		if ($myaccount != "student") editbook();
		else dashboard();
		break;
	case 'deletebook':  
		if ($myaccount != "student") deletebook();
		else dashboard();
		break;
	case 'users': users();
		break;
	case 'newuser':  
		if ($myaccount != "student") newuser();
		else dashboard();
		break;
	case 'viewuser': viewuser();
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
		$results['pageTitle'] = "DNA Digital Library"; 
		$results['pageAction'] = "Sign In";
		
		if ( isset( $_POST['SignMeIn'] ) ) {
		$loginname = $_POST['username'];
		$loginkey = md5($_POST['password']);
		
            if (js_let_me_user($loginname, $loginkey)){
			$_SESSION['digilibraryid'] = js_let_me_user($loginname, $loginkey);
			$_SESSION['digilibacc'] = js_logged_account($loginname);
			header( "Location: index.php" );
			
		}   else {
			
            require( JS_INC."js_signin.php" );
	    }
	
	  } else {
	
	    require( JS_INC."js_signin.php" );
 	 }

	}
	
function signup() {
	$results = array();
	$results['pageTitle'] = "DNA Digital Library";
	$results['pageAction'] = "Sign Up"; 
	
	if ( isset( $_POST['Sign Up'] ) ) {
		js_register_me();
		header( "Location: index.php");		
	}  else {
		require( JS_INC . "js_register.php" );
	}	
	
}

function manage_username() {
	$results = array();
	$results['pageTitle'] = "DNA Digital Library";
	$results['pageAction'] = "ForgotUsername"; 
	
	if ( isset( $_POST['ForgotUsername'] ) ) {
		$email = $_POST['username'];
		$password = md5($_POST['password']);
		js_recover_username($email, $password);
		header( "Location: index.php?js_page=recovered_username");		
	}  else {
		require( JS_INC . "js_forgot_username.php" );
	}	
	
}

function manage_pass() {
	$results = array();
	$results['pageTitle'] = "DNA Digital Library";
	$results['pageAction'] = "ForgotPassword"; 
	
	if ( isset( $_POST['ForgotPassword'] ) ) {
		$username = $_POST['username'];
		$email = $_POST['email'];
		js_recover_password($username, $email);
		header( "Location: index.php?js_page=recover_password");		
	}  else {
		require( JS_INC . "js_forgot_password.php" );
	}	
	
}

function recover_username() {
	$results = array();
	$results['pageTitle'] = "DNA Digital Library";
	$results['pageAction'] = "RecoveredUsername"; 
	require( JS_INC . "js_recover_username.php" );
	
}

function recover_password() {
	$results = array();
	$results['pageTitle'] = "DNA Digital Library";
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
	$results['pageTitle'] = "DNA Digital Library";
	$results['pageAction'] = "Dashboard";  
	require( JS_INC . "js_dashboard.php" );
}

function booksection() {
	$results = array();
	$results['pageTitle'] = "DNA Digital Library";
	$results['pageAction'] = "Sections";  
	require( JS_INC . "js_sections.php" );
}

function newsection() {
	$results = array();
	$results['pageTitle'] = "DNA Digital Library";
	$results['pageAction'] = "Newsection"; 
	
	if ( isset( $_POST['AddSection'] ) ) {
		js_add_new_section();
		header( "Location: index.php?js_page=booksection");					
	}  else {
		require( JS_INC . "js_newsection.php" );
	}	
	
}

function viewsection() {
	$results = array();
	$results['pageTitle'] = "DNA Digital Library";
	$results['pageAction'] = "Viewsection"; 
	$js_sectionid = isset( $_GET['js_sectionid'] ) ? $_GET['js_sectionid'] : "";
	
	$js_db_query = "SELECT * FROM js_section WHERE sectionid = '$js_sectionid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $sectionid, $section_slug) = $database->get_row( $js_db_query );
		$results['section'] = $sectionid;
	} else  {
		return false;
		header( "Location: index.php?js_page=booksection");	
	}
	
	if ( isset( $_POST['SaveSection'] ) ) {
		js_edit_section($js_sectionid);
		header( "Location: index.php?js_page=viewsection&&js_sectionid=".$js_sectionid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		js_edit_section($js_sectionid);
		header( "Location: index.php?js_page=booksection");						
	}  else {
		require( JS_INC . "js_viewsection.php" );
	}	
	
}
	  
function books() {
	$results = array();
	$results['pageTitle'] = "DNA Digital Library";
	$results['pageAction'] = "ELibrary"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$js_search = $_POST['js_search'];
		$js_sectionid = $_POST['js_sectionid'];
		
		header( "Location: index.php?js_page=search&&js_search=".$js_search."&&js_sectionid=".$js_sectionid);
								
	}  else {	
		require( JS_INC . "js_book.php" );
	}
}

function search() {
	$results = array();
	$results['pageTitle'] = "DNA Digital Library";
	$results['pageAction'] = "Search"; 
	$results['search'] = isset( $_GET['js_bookid'] ) ? $_GET['js_bookid'] : "";
	$results['searchsection'] = isset( $_GET['js_sectionid'] ) ? $_GET['js_sectionid'] : "";
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$js_search = $_POST['js_search'];
		$js_sectionid = $_POST['js_sectionid'];
		
		header( "Location: index.php?js_page=search&&js_search=".$js_search."&&js_sectionid=".$js_sectionid);
														
	}  else {	
		require( JS_INC . "js_books.php" );
	}
}
function newbook() {
	$results = array();
	$results['pageTitle'] = "DNA Digital Library";
	$results['pageAction'] = "Newbook"; 
	
	if ( isset( $_POST['AddBook'] ) ) {
		js_add_new_book();
		header( "Location: index.php?js_page=books");						
	}  else {
		require( JS_INC . "js_newbook.php" );
	}	
	
}

function viewbook() {
	$results = array();
	$results['pageTitle'] = "DNA Digital Library";
	$results['pageAction'] = "Viewbook"; 
	$js_bookid = isset( $_GET['js_bookid'] ) ? $_GET['js_bookid'] : "";
	
	$js_db_query = "SELECT * FROM js_book WHERE bookid = '$js_bookid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $bookid, $student_name) = $database->get_row( $js_db_query );
		$results['book'] = $bookid;
	} else  {
		return false;
		header( "Location: index.php?js_page=books");	
	}
	
	require( JS_INC . "js_viewbook.php" );
	
}

function editbook() {
	$results = array();
	$results['pageTitle'] = "DNA Digital Library";
	$results['pageAction'] = "Editbook"; 
	$js_bookid = isset( $_GET['js_bookid'] ) ? $_GET['js_bookid'] : "";
	
	$js_db_query = "SELECT * FROM js_book WHERE bookid = '$js_bookid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $bookid) = $database->get_row( $js_db_query );
		$results['book'] = $bookid;
	} else  {
		return false;
		header( "Location: index.php?js_page=books");	
	}
	
	if ( isset( $_POST['SaveItem'] ) ) {
		js_edit_book($js_bookid);
		header( "Location: index.php?js_page=editbook&&js_bookid=".$js_bookid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		js_edit_book($js_bookid);
		header( "Location: index.php?js_page=viewbook&&js_bookid=".$js_bookid);					
	}  else {
		require( JS_INC . "js_editbook.php" );
	}	
	
}

function deletebook() {
	$js_bookid = isset( $_GET['js_bookid'] ) ? $_GET['js_bookid'] : "";
	
	$database = new Js_Dbconn();
	$js_db_query = "DELETE * FROM js_book WHERE bookid = '$js_bookid'";
	$delete = array(
		'bookid' => $js_bookid,
	);
	$deleted = $database->delete( 'js_book', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?js_page=books");	
	}
}
	
function users() {
	$results = array();
	$results['pageTitle'] = "DNA Digital Library";
	$results['pageAction'] = "Users";  
	require( JS_INC . "js_students.php" );
}

function newuser() {
	$results = array();
	$results['pageTitle'] = "DNA Digital Library";
	$results['pageAction'] = "Newuser"; 
	
	if ( isset( $_POST['AddUser'] ) ) {
		js_add_new_user();
		header( "Location: index.php?js_page=newuser");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		js_add_new_user();
		header( "Location: index.php?js_page=users");						
	}  else {
		require( JS_INC . "js_newuser.php" );
	}	
	
}
function viewuser() {
	$results = array();
	$results['pageTitle'] = "DNA Digital Library";
	$results['pageAction'] = "Viewuser"; 
	$js_studentid = isset( $_GET['js_studentid'] ) ? $_GET['js_studentid'] : "";
	
	$js_db_query = "SELECT * FROM js_student WHERE studentid = '$js_studentid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $studentid, $student_name) = $database->get_row( $js_db_query );
		$results['user'] = $studentid;
	} else  {
		return false;
		header( "Location: index.php?js_page=users");	
	}
	
	require( JS_INC . "js_viewuser.php" );
		
}

function profile() {
	$results = array();
	$results['pageTitle'] = "DNA Digital Library";
	$results['pageAction'] = "Profile"; 
	$js_studentname = $_SESSION['username_loggedin'];
	
	$js_db_query = "SELECT * FROM js_student WHERE student_name = '$js_studentname'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $studentid, $student_name) = $database->get_row( $js_db_query );
		$results['user'] = $studentid;
	} else  {
		return false;
		header( "Location: index.php?js_page=users");	
	}
	
	require( JS_INC . "js_viewuser.php" );
		
}

function options() {
	$results = array();
	$results['pageTitle'] = "DNA Digital Library";
	$results['pageAction'] = "Options"; 
	$js_loginid = isset( $_SESSION['digilibraryid'] ) ? $_SESSION['digilibraryid'] : "";
	
	if ( isset( $_POST['SaveSite'] ) ) {
			
		js_set_option('sitename', $_POST['sitename'], $js_loginid);	
		js_set_option('keywords', $_POST['keywords'], $js_loginid);
		js_set_option('description', $_POST['description'], $js_loginid);
		js_set_option('siteurl', $_POST['siteurl'], $js_loginid);
		
		header( "Location: index.php?js_page=options");						
	}  else if ( isset( $_POST['CancelSave'] ) ) {
		header( "Location: index.php?js_page=options");						
	}  else {
		require( JS_INC . "js_options.php" );
	}
	
}

?>
