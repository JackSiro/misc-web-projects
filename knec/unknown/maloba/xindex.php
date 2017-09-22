<?php

require( "config.php" );
session_start();
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$username = isset( $_SESSION['username'] ) ? $_SESSION['username'] : "";
$myaccount = isset( $_SESSION['account'] ) ? $_SESSION['account'] : "";

switch ( $action ) {
  case 'viewItem':
    viewItem();
    break;	
  default:
    homePage();
}
function homePage() {
	$results = array();
	$results['pageTitle'] = "Shule Yetu Primary Category";
	$results['formAction'] = "viewResults";
	
  if ( isset( $_POST['viewResults'] ) ) {    
    header( "Location: index.php?action=viewItem&colour=".$_POST['colour']."&category=".$_POST['code'] );

  }  else {
    require( TEMPLATE_PATH . "/home.php" );
 }
}


function viewItem() {
	$results = array();
	$results['category'] = Category::getByCode( $_GET['category'] );
	$results['pageTitle'] = "Shule Yetu Primary Category";	
	$results['Item'] = Item::getByAdmno( $_GET['colour'] );
    require( TEMPLATE_PATH . "/viewItem.php" );
  
}

?>
