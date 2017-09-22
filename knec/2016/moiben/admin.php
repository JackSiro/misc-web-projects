<?php
	session_start();
	require( 'js_config.php' );
	include JS_FUNC.'js_dbconn.php';
	require JS_FUNC.'js_base.php';
	include JS_FUNC.'js_options.php';
	include JS_FUNC.'js_paging.php';
	include JS_FUNC.'js_posting.php';
	include JS_FUNC.'js_users.php';
 	
 	$js_loginid = isset( $_SESSION['username_loggedin'] ) ? $_SESSION['username_loggedin'] : "";
	
	$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
	$myaccount = isset( $_SESSION['account'] ) ? $_SESSION['account'] : "";
	
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
	$results['pageTitle'] = "Moiben OutPatient Hospital";
	$results['pageAction'] = "All Doctors";  
	require( JS_INC . "js_adm_doctors.php" );
}

function newdoc() {
	$results = array();
	$results['pageTitle'] = "Moiben OutPatient Hospital";
	$results['pageAction'] = "Newdoc"; 
	
	if ( isset( $_POST['AddDoctor'] ) ) {
		js_add_new_doctor();
		header( "Location: admin.php?action=doctors");						
	}   else {
		require( JS_INC . "js_adm_newdoc.php" );
	}	
	
}

function viewdoc() {
	$results = array();
	$results['pageTitle'] = "Moiben OutPatient Hospital";
	$results['pageAction'] = "Viewdoc"; 
	$js_userid = isset( $_GET['js_userid'] ) ? $_GET['js_userid'] : "";
	
	$js_db_query = "SELECT * FROM js_user WHERE userid = '$js_userid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $userid, $user_name) = $database->get_row( $js_db_query );
		$results['doctor'] = $userid;
	} else  {
		return false;
		header( "Location: admin.php?action=doctors");	
	}
	
	if ( isset( $_POST['SaveDoc'] ) ) {
		js_edit_doctor($js_userid);
		header( "Location: admin.php?action=viewdoc&&js_userid=".$js_userid);						
	}  else if ( isset( $_POST['Delete'] ) ) {
		js_edit_doctor($js_userid);
		header( "Location: admin.php?action=doctors");						
	}  else {
		require( JS_INC . "js_adm_viewdoc.php" );
	}		
}

function patients() {
	$results = array();
	$results['pageTitle'] = "Moiben OutPatient Hospital";
	$results['pageAction'] = "All Patients";  
	require( JS_INC . "js_adm_patients.php" );
}

function newpat() {
	$results = array();
	$results['pageTitle'] = "Moiben OutPatient Hospital";
	$results['pageAction'] = "AddPatient"; 
	
	if ( isset( $_POST['AddPatient'] ) ) {
		js_add_new_patient();
		header( "Location: admin.php?action=patients");						
	}   else {
		require( JS_INC . "js_adm_newpat.php" );
	}	
	
}

function viewpat() {
	$results = array();
	$results['pageTitle'] = "Moiben OutPatient Hospital";
	$results['pageAction'] = "Viewpat"; 
	$js_patientid = isset( $_GET['js_patientid'] ) ? $_GET['js_patientid'] : "";
	
	$js_db_query = "SELECT * FROM js_patient WHERE patid = '$js_patientid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $patid) = $database->get_row( $js_db_query );
		$results['pattor'] = $patid;
	} else  {
		return false;
		header( "Location: admin.php?action=patients");	
	}
	
	if ( isset( $_POST['SavePat'] ) ) {
		js_edit_pattor($js_patientid);
		header( "Location: admin.php?action=viewpat&&js_patientid=".$js_patientid);						
	}  else if ( isset( $_POST['Delete'] ) ) {
		js_edit_pattor($js_patientid);
		header( "Location: admin.php?action=patients");						
	}  else {
		require( JS_INC . "js_adm_viewpat.php" );
	}		
}
function sessions() {
	$results = array();
	$results['pageTitle'] = "Moiben OutPatient Hospital";
	$results['pageAction'] = "All Sessions";  
	require( JS_INC . "js_adm_sessions.php" );
}

function newsess() {
	$results = array();
	$results['pageTitle'] = "Moiben OutPatient Hospital";
	$results['pageAction'] = "AddSession"; 
	
	if ( isset( $_POST['AddSession'] ) ) {
		js_add_new_session();
		header( "Location: admin.php?action=sessions");						
	}   else {
		require( JS_INC . "js_adm_newsess.php" );
	}	
	
}

function viewsess() {
	$results = array();
	$results['pageTitle'] = "Moiben OutPatient Hospital";
	$results['pageAction'] = "Viewsess"; 
	$js_sessionid = isset( $_GET['js_sessionid'] ) ? $_GET['js_sessionid'] : "";
	
	$js_db_query = "SELECT * FROM js_session WHERE sessid = '$js_sessionid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $sessid) = $database->get_row( $js_db_query );
		$results['sesstor'] = $sessid;
	} else  {
		return false;
		header( "Location: admin.php?action=sessions");	
	}
	
	if ( isset( $_POST['SaveSess'] ) ) {
		js_edit_sesstor($js_sessionid);
		header( "Location: admin.php?action=viewsess&&js_sessionid=".$js_sessionid);						
	}  else if ( isset( $_POST['Delete'] ) ) {
		js_edit_sesstor($js_sessionid);
		header( "Location: admin.php?action=sessions");						
	}  else {
		require( JS_INC . "js_adm_viewsess.php" );
	}		
}
function adminstrator() {
	$results = array();
	$results['pageTitle'] = "Moiben OutPatient Hospital";
	$results['pageAction'] = "Options"; 
	$js_loginid = isset( $_SESSION['username_loggedin'] ) ? $_SESSION['username_loggedin'] : "";
	
	if ( isset( $_POST['SaveSite'] ) ) {
			
		js_set_option('sitename', $_POST['sitename'], $js_loginid);	
		js_set_option('keywords', $_POST['keywords'], $js_loginid);
		js_set_option('description', $_POST['description'], $js_loginid);
		js_set_option('siteurl', $_POST['siteurl'], $js_loginid);
		
		header( "Location: admin.php");						
	}  else if ( isset( $_POST['CancelSave'] ) ) {
		header( "Location: admin.php");						
	}  else {
		require( JS_INC . "js_adm_general.php" );
	}
	
}
function staffs() {
	$results = array();
	$results['pageTitle'] = "Moiben OutPatient Hospital";
	$results['pageAction'] = "All Staffs";  
	require( JS_INC . "js_adm_staffs.php" );
}

function newstaff() {
	$results = array();
	$results['pageTitle'] = "Moiben OutPatient Hospital";
	$results['pageAction'] = "Newstaf"; 
	
	if ( isset( $_POST['AddStaff'] ) ) {
		js_add_new_staff();
		header( "Location: admin.php?action=staffs");						
	}   else {
		require( JS_INC . "js_adm_newstaff.php" );
	}	
	
}

function viewstaf() {
	$results = array();
	$results['pageTitle'] = "Moiben OutPatient Hospital";
	$results['pageAction'] = "Viewstaf"; 
	$js_staffid = isset( $_GET['js_staffid'] ) ? $_GET['js_staffid'] : "";
	
	$js_db_query = "SELECT * FROM js_staff WHERE stafid = '$js_staffid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
		list( $stafid) = $database->get_row( $js_db_query );
		$results['staftor'] = $stafid;
	} else  {
		return false;
		header( "Location: admin.php?action=staffs");	
	}
	
	if ( isset( $_POST['SaveStaf'] ) ) {
		js_edit_staftor($js_staffid);
		header( "Location: admin.php?action=viewstaf&&js_staffid=".$js_staffid);						
	}  else if ( isset( $_POST['Delete'] ) ) {
		js_edit_staftor($js_staffid);
		header( "Location: admin.php?action=staffs");						
	}  else {
		require( JS_INC . "js_adm_viewstaf.php" );
	}		
}
?>
