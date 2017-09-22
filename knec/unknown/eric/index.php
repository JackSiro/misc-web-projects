<?php

require( "config.php" );
session_start();
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$username = isset( $_SESSION['username'] ) ? $_SESSION['username'] : "";
$myaccount = isset( $_SESSION['account'] ) ? $_SESSION['account'] : "";

switch ( $action ) {
  case 'viewPupil':
    viewPupil();
    break;	
  default:
    homePage();
}
function homePage() {
	$results = array();
	$results['pageTitle'] = "Shule Yetu Primary School";
	$results['formAction'] = "viewResults";
	
  if ( isset( $_POST['viewResults'] ) ) {    
    header( "Location: index.php?action=viewPupil&admno=".$_POST['admno']."&school=".$_POST['code'] );

  }  else {
    require( TEMPLATE_PATH . "/home.php" );
 }
}


function viewPupil() {
	$results = array();
	$results['school'] = School::getByCode( $_GET['school'] );
	$results['pageTitle'] = "Shule Yetu Primary School";	
	$results['pupil'] = Pupil::getByAdmno( $_GET['admno'] );
    require( TEMPLATE_PATH . "/viewPupil.php" );
  
}

?>
