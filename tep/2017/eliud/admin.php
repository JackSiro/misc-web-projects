<?php
	session_start();
	require( 'as_config.php' );
	include AS_FUNC.'as_dbconn.php';
	require AS_FUNC.'as_base.php';
	include AS_FUNC.'as_options.php';
	include AS_FUNC.'as_paging.php';
	include AS_FUNC.'as_posting.php';
	include AS_FUNC.'as_users.php';
 	
 	$as_loginid = isset( $_SESSION['loggedin'] ) ? $_SESSION['loggedin'] : "";
	
	$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
	$myaccount = isset( $_SESSION['account'] ) ? $_SESSION['account'] : "";
	
	if ( $action != "login" && $action != "logout" && $action != "register" 
			&& $action != "forgot_password" && $action != "recover_password"
			&& $action != "forgot_username" && $action != "recover_username"
			&& $action != "logout" && !$as_loginid ) {
			
			as_signin();
	   exit;
	} 
      
switch ( $action ) {
	case 'login': as_signin();
		break;	
	case 'logout': logout();
		break;
	case 'doctors':  doctors();
		break;
	case 'newdoc': newdoc();
		break;
	case 'viewdoc': viewdoc();
		break;
	case 'patients':  patients();
		break;
	case 'newpat': newpat();
		break;
	case 'viewpat': viewpat();
		break;
	case 'sessions':  sessions();
		break;
	case 'newsess': newsess();
		break;
	case 'viewsess': viewsess();
		break;
	case 'staffs':  staffs();
		break;
	case 'newstaff': newstaff();
		break;
	case 'viewstaff': viewstaff();
		break;
	
    default:
		adminstrator();
}

function doctors() {
	$results = array();
	$results['pageTitle'] = "Meet Your Doctor";
	$results['pageAction'] = "All Doctors";  
	require( AS_INC . "as_adm_doctors.php" );
}

function newdoc() {
	$results = array();
	$results['pageTitle'] = "Meet Your Doctor";
	$results['pageAction'] = "Newdoc"; 
	
	if ( isset( $_POST['AddDoctor'] ) ) {
		as_add_new_doctor();
		header( "Location: admin.php?action=doctors");						
	}   else {
		require( AS_INC . "as_adm_newdoc.php" );
	}	
	
}

function viewdoc() {
	$results = array();
	$results['pageTitle'] = "Meet Your Doctor";
	$results['pageAction'] = "Viewdoc"; 
	$as_doctorid = isset( $_GET['as_doctorid'] ) ? $_GET['as_doctorid'] : "";
	
	$as_db_query = "SELECT * FROM as_doctor WHERE doctorid = '$as_doctorid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $doctorid, $doctor_code) = $database->get_row( $as_db_query );
		$results['doctor'] = $doctorid;
	} else  {
		return false;
		header( "Location: admin.php?action=doctors");	
	}
	
	if ( isset( $_POST['SaveDoc'] ) ) {
		as_edit_doctor($as_doctorid);
		header( "Location: admin.php?action=viewdoc&&as_doctorid=".$as_doctorid);						
	}  else if ( isset( $_POST['Delete'] ) ) {
		as_edit_doctor($as_doctorid);
		header( "Location: admin.php?action=doctors");						
	}  else {
		require( AS_INC . "as_adm_viewdoc.php" );
	}		
}

function patients() {
	$results = array();
	$results['pageTitle'] = "Meet Your Doctor";
	$results['pageAction'] = "All Patients";  
	require( AS_INC . "as_adm_patients.php" );
}

function newpat() {
	$results = array();
	$results['pageTitle'] = "Meet Your Doctor";
	$results['pageAction'] = "AddPatient"; 
	
	if ( isset( $_POST['AddPatient'] ) ) {
		as_add_new_patient();
		header( "Location: admin.php?action=patients");						
	}   else {
		require( AS_INC . "as_adm_newpat.php" );
	}	
	
}

function viewpat() {
	$results = array();
	$results['pageTitle'] = "Meet Your Doctor";
	$results['pageAction'] = "Viewpat"; 
	$as_patientid = isset( $_GET['as_patientid'] ) ? $_GET['as_patientid'] : "";
	
	$as_db_query = "SELECT * FROM as_patient WHERE patientid = '$as_patientid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $patientid) = $database->get_row( $as_db_query );
		$results['pattor'] = $patientid;
	} else  {
		return false;
		header( "Location: admin.php?action=patients");	
	}
	
	if ( isset( $_POST['SavePat'] ) ) {
		as_edit_pattor($as_patientid);
		header( "Location: admin.php?action=viewpat&&as_patientid=".$as_patientid);						
	}  else if ( isset( $_POST['Delete'] ) ) {
		as_edit_pattor($as_patientid);
		header( "Location: admin.php?action=patients");						
	}  else {
		require( AS_INC . "as_adm_viewpat.php" );
	}		
}
function sessions() {
	$results = array();
	$results['pageTitle'] = "Meet Your Doctor";
	$results['pageAction'] = "All Sessions";  
	require( AS_INC . "as_adm_sessions.php" );
}

function newsess() {
	$results = array();
	$results['pageTitle'] = "Meet Your Doctor";
	$results['pageAction'] = "AddSession"; 
	
	if ( isset( $_POST['AddSession'] ) ) {
		as_add_new_session();
		header( "Location: admin.php?action=sessions");						
	}   else {
		require( AS_INC . "as_adm_newsess.php" );
	}	
	
}

function viewsess() {
	$results = array();
	$results['pageTitle'] = "Meet Your Doctor";
	$results['pageAction'] = "Viewsess"; 
	$as_sessionid = isset( $_GET['as_sessionid'] ) ? $_GET['as_sessionid'] : "";
	
	$as_db_query = "SELECT * FROM as_session WHERE sessid = '$as_sessionid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $sessid) = $database->get_row( $as_db_query );
		$results['sesstor'] = $sessid;
	} else  {
		return false;
		header( "Location: admin.php?action=sessions");	
	}
	
	if ( isset( $_POST['SaveSess'] ) ) {
		as_edit_sesstor($as_sessionid);
		header( "Location: admin.php?action=viewsess&&as_sessionid=".$as_sessionid);						
	}  else if ( isset( $_POST['Delete'] ) ) {
		as_edit_sesstor($as_sessionid);
		header( "Location: admin.php?action=sessions");						
	}  else {
		require( AS_INC . "as_adm_viewsess.php" );
	}		
}
function adminstrator() {
	$results = array();
	$results['pageTitle'] = "Meet Your Doctor";
	$results['pageAction'] = "Options"; 
	$as_loginid = isset( $_SESSION['loggedin'] ) ? $_SESSION['loggedin'] : "";
	
	if ( isset( $_POST['SaveSite'] ) ) {
			
		as_set_option('sitename', $_POST['sitename'], $as_loginid);	
		as_set_option('keywords', $_POST['keywords'], $as_loginid);
		as_set_option('description', $_POST['description'], $as_loginid);
		as_set_option('siteurl', $_POST['siteurl'], $as_loginid);
		
		header( "Location: admin.php");						
	}  else if ( isset( $_POST['CancelSave'] ) ) {
		header( "Location: admin.php");						
	}  else {
		require( AS_INC . "as_adm_general.php" );
	}
	
}
function staffs() {
	$results = array();
	$results['pageTitle'] = "Meet Your Doctor";
	$results['pageAction'] = "All Staffs";  
	require( AS_INC . "as_adm_staffs.php" );
}

function newstaff() {
	$results = array();
	$results['pageTitle'] = "Meet Your Doctor";
	$results['pageAction'] = "Newstaf"; 
	
	if ( isset( $_POST['AddStaff'] ) ) {
		as_add_new_staff();
		header( "Location: admin.php?action=staffs");						
	}   else {
		require( AS_INC . "as_adm_newstaff.php" );
	}	
	
}

function viewstaf() {
	$results = array();
	$results['pageTitle'] = "Meet Your Doctor";
	$results['pageAction'] = "Viewstaf"; 
	$as_staffid = isset( $_GET['as_staffid'] ) ? $_GET['as_staffid'] : "";
	
	$as_db_query = "SELECT * FROM as_staff WHERE stafid = '$as_staffid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $stafid) = $database->get_row( $as_db_query );
		$results['staftor'] = $stafid;
	} else  {
		return false;
		header( "Location: admin.php?action=staffs");	
	}
	
	if ( isset( $_POST['SaveStaf'] ) ) {
		as_edit_staftor($as_staffid);
		header( "Location: admin.php?action=viewstaf&&as_staffid=".$as_staffid);						
	}  else if ( isset( $_POST['Delete'] ) ) {
		as_edit_staftor($as_staffid);
		header( "Location: admin.php?action=staffs");						
	}  else {
		require( AS_INC . "as_adm_viewstaf.php" );
	}		
}
?>
