<?php

require( "config.php" );
session_start();
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$username = isset( $_SESSION['username'] ) ? $_SESSION['username'] : "";

if ( $action != "login" && $action != "logout" && !$username ) {
  login();
  exit;
}

switch ( $action ) {
  case 'login':
    login();
    break;
  case 'logout':
    logout();
    break;
  case 'newPupil':
    newPupil();
    break;
  case 'editPupil':
    editPupil();
    break;
  case 'putMarks':
    putMarks();
    break;
  case 'listSchools':
    listSchools();
    break;
  case 'newSchool':
    newSchool();
    break;
  case 'editSchool':
    editSchool();
    break;
  case 'deletePupil':
    deletePupil();
    break;
  default:
    listPupils();
}


function login() {

  $results = array();
  $results['pageTitle'] = "Admin Login | Shule Yetu Primary School";

  if ( isset( $_POST['login'] ) ) {
    if ( $_POST['username'] == ADMIN_USERNAME && $_POST['password'] == ADMIN_PASSWORD ) {
      $_SESSION['username'] = ADMIN_USERNAME;
      header( "Location: admin.php" );
    } else {
      $results['errorMessage'] = "Incorrect username or password. Please try again.";
      require( TEMPLATE_PATH . "/admin/login.php" );
    }
  } else {
    require( TEMPLATE_PATH . "/admin/login.php" );
  }
}


function logout() {
  unset( $_SESSION['username'] );
  header( "Location: admin.php" );
}


function newPupil() {

  $results = array();
  $results['pageTitle'] = "New Pupil";
  $results['pageDescription'] = "Admin Panel - New Pupil";
  $results['formAction'] = "newPupil";

  if ( isset( $_POST['register'] ) ) {
    $pupil = new Pupil;
    $pupil->storeFormValues( $_POST );
    $pupil->insert();
    header( "Location: admin.php?status=changesSaved&school=".$_POST['code'] );

  } elseif ( isset( $_POST['cancel'] ) ) {
    header( "Location: admin.php?school=".$_POST['code'] );
  } else {
    $results['pupil'] = new Pupil;
    require( TEMPLATE_PATH . "/admin/newPupil.php" );
  }

}


function editPupil() {

  $results = array();
  $results['pageTitle'] = "Edit Pupil";
  $results['pageDescription'] = "Admin Panel - Edit Pupil";
  $results['formAction'] = "editPupil";
  
  if ( isset( $_POST['editPupil'] ) ) {

    if ( !$pupil = Pupil::getByAdmno( $_POST['admno'] ) ) {
      header( "Location: admin.php?error=pupilNotFound&school=".$_GET['school'] );
      return;
    }
	
    $pupil->storeFormValues( $_POST );
    $pupil->update();
    header( "Location: admin.php?action=putMarks&status=changesSaved&admno=".$_POST['admno']."&school=".$_POST['code'] );

  } elseif ( isset( $_POST['cancel'] ) ) {

    header( "Location: admin.php?school=".$_POST['code'] );
  } else {
    $results['pupil'] = Pupil::getByAdmno( $_GET['admno'] );
    require( TEMPLATE_PATH . "/admin/editPupil.php" );
  }

}

function putMarks() {

  $results = array();
  $results['pageTitle'] = "Put Marks ";
  $results['pageDescription'] = "Admin Panel - Put Marks";
  $results['formAction'] = "putMarks";
  
  if ( isset( $_POST['putMarks'] ) ) {

    if ( !$pupil = Pupil::getByAdmno( $_POST['admno'] ) ) {
      header( "Location: admin.php?error=pupilNotFound&school=".$_GET['school'] );
      return;
    }
	
    $pupil->storeFormValues( $_POST );
    $pupil->putMarks();
    header( "Location: admin.php?status=changesSaved&school=".$_POST['code'] );

  } elseif ( isset( $_POST['cancel'] ) ) {

    header( "Location: admin.php?school=".$_POST['code'] );
  } else {
    $results['pupil'] = Pupil::getByAdmno( $_GET['admno'] );
    require( TEMPLATE_PATH . "/admin/putMarks.php" );
  }

}

function deletePupil() {

  if ( !$pupil = Pupil::getById( (int)$_GET['pupilId'] ) ) {
    header( "Location: admin.php?error=pupilNotFound" );
    return;
  }

  $pupil->delete();
  header( "Location: admin.php?status=pupilDeleted" );
}


function listPupils() {
  	$school = isset( $_GET['school'] ) ? $_GET['school'] : "";
	if ( !$school ) {
		listSchools();
	exit;
	}
  $results = array();
  $results['school'] = School::getByCode($school);  
  $data = Pupil::getList();
  $results['pupils'] = $data['results'];
  $results['totalRows'] = $data['totalRows'];
  $results['pageTitle'] = "All Pupils - ".$results['school']->schoolname;
  $results['pageDescription'] = "Admin Panel - view All Students";

  if ( isset( $_GET['error'] ) ) {
    if ( $_GET['error'] == "pupilNotFound" ) $results['errorMessage'] = "Error: Pupil not found.";
  }

  if ( isset( $_GET['status'] ) ) {
    if ( $_GET['status'] == "changesSaved" ) $results['statusMessage'] = "Your changes have been saved.";
    if ( $_GET['status'] == "pupilDeleted" ) $results['statusMessage'] = "Pupil deleted.";
  }

  require( TEMPLATE_PATH . "/admin/listPupils.php" );
}


function newSchool() {

  $results = array();
  $results['pageTitle'] = "Add a New School";
  $results['pageDescription'] = "Admin Panel - New School";
  $results['formAction'] = "newSchool";

  if ( isset( $_POST['newSchool'] ) ) {
    $school = new School;
    $school->storeFormValues( $_POST );
    $school->insert();
    header( "Location: admin.php?status=changesSaved" );

  } elseif ( isset( $_POST['cancel'] ) ) {
    header( "Location: admin.php" );
  } else {
    $results['school'] = new School;
    require( TEMPLATE_PATH . "/admin/newSchool.php" );
  }

}


function editSchool() {

  $results = array();
  $results['pageTitle'] = "Editting a  School";
  $results['pageDescription'] = "Admin Panel - Edit School";
  $results['formAction'] = "editSchool";

  if ( isset( $_POST['editSchool'] ) ) {

    if ( !$school = School::getByCode( $_POST['code'] ) ) {
      header( "Location: admin.php?error=schoolNotFound" );
      return;
    }
	
    $school->storeFormValues( $_POST );
    $school->update();
    header( "Location: admin.php?status=changesSaved" );

  } elseif ( isset( $_POST['cancel'] ) ) {

    header( "Location: admin.php" );
  } else {
    $results['school'] = School::getByCode( $_GET['code'] );
    require( TEMPLATE_PATH . "/admin/editSchool.php" );
  }

}

function setSchool() {

  if ( isset( $_GET['code'] ) ) {

    if ( !$_GET['code'] ) {
      header( "Location: admin.php?error=schoolNotFound" );
      return;
    }
	$results = array();
	$results['shule'] = $_GET['code'];
    header( "Location: admin.php?status=schoolset" );

  } 
  
}

function listSchools() {
  $results = array();
  $data = School::getList();
  $results['schools'] = $data['results'];
  $results['totalRows'] = $data['totalRows'];
  $results['pageTitle'] = "All Schools - Shule Management system";
  $results['pageDescription'] = "Admin Panel - view All Schools";

  if ( isset( $_GET['error'] ) ) {
    if ( $_GET['error'] == "pupilNotFound" ) $results['errorMessage'] = "Error: Pupil not found.";
  }

  if ( isset( $_GET['status'] ) ) {
    if ( $_GET['status'] == "changesSaved" ) $results['statusMessage'] = "Your changes have been saved.";
    if ( $_GET['status'] == "pupilDeleted" ) $results['statusMessage'] = "Pupil deleted.";
  }

  require( TEMPLATE_PATH . "/admin/listSchools.php" );
}

?>
