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
  case 'viewitem':
    viewitem();
    break;
  case 'newitem':
    newitem();
    break;
  case 'edititem':
    edititem();
    break;
  case 'giveout':
    giveout();
    break;
  case 'allitems':
    allitems();
    break;
  case 'allcats':
    allcats();
    break;
  case 'newcat':
    newcat();
    break;
  case 'editcat':
    editcat();
    break;
  case 'deleteitem':
    deleteitem();
    break;
  default:
    homepage();
}


function login() {

  $results = array();
  $results['pageTitle'] = "Admin Login | Shule Yetu Primary Category";

  if ( isset( $_POST['login'] ) ) {
    if ( $_POST['username'] == ADMIN_USERNAME && $_POST['password'] == ADMIN_PASSWORD ) {
      $_SESSION['username'] = ADMIN_USERNAME;
	  $_SESSION['fullname'] = "Sande Maloba";
      header( "Location: index.php" );
    } else {
      $results['errorMessage'] = "Incorrect username or password. Please try again.";
      require( PAGE_DIR . "/login.php" );
    }
  } else {
    require( PAGE_DIR . "/login.php" );
  }
}


function logout() {
  unset( $_SESSION['username'] );
  unset( $_SESSION['fullname'] );
  header( "Location: index.php" );
}


function newitem() {

  $results = array();
  $results['pageTitle'] = "CMC Holdings Ltd";
  $results['pageDescription'] = "Admin Panel - New Item";
  $results['formAction'] = "newitem";
  $data = Category::getList();
  $results['categorys'] = $data['results'];
  
  if ( isset( $_POST['receive'] ) ) {
    $item = new Item;
    $item->storeFormValues( $_POST );
    $item->insert();
    header( "Location: index.php?status=changesSaved" );

  } elseif ( isset( $_POST['cancel'] ) ) {
    header( "Location: index.php" );
  } else {
    $results['item'] = new Item;
    require( PAGE_DIR . "/newitem.php" );
  }

}


function editItem() {

  $results = array();
  $results['pageTitle'] = "Edit Item";
  $results['pageDescription'] = "Admin Panel - Edit Item";
  $results['formAction'] = "editItem";
  
  if ( isset( $_POST['editItem'] ) ) {

    if ( !$Item = Item::getByAdmno( $_POST['colour'] ) ) {
      header( "Location: index.php?error=ItemNotFound&category=".$_GET['category'] );
      return;
    }
	
    $Item->storeFormValues( $_POST );
    $Item->update();
    header( "Location: index.php?action=putMarks&status=changesSaved&colour=".$_POST['colour']."&category=".$_POST['code'] );

  } elseif ( isset( $_POST['cancel'] ) ) {

    header( "Location: index.php?category=".$_POST['code'] );
  } else {
    $results['Item'] = Item::getByAdmno( $_GET['colour'] );
    require( PAGE_DIR . "/editItem.php" );
  }

}

function giveout() {

  $results = array();
  $results['pageTitle'] = "CMC Holdings Ltd";
  $results['pageDescription'] = "Admin Panel - Give Out an Item";
  $results['formAction'] = "giveout";
  
  if ( isset( $_POST['giveout'] ) ) {

    if ( !$item = Item::getById( $_POST['itemid'] ) ) {
      header( "Location: index.php?error=ItemNotFound" );
      return;
    }
	
    $item->storeFormValues( $_POST );
    $item->giveout();
    header( "Location: index.php?status=changesSaved" );

  } elseif ( isset( $_POST['cancel'] ) ) {

    header( "Location: index.php" );
  } else {
    $results['item'] = Item::getById( $_GET['itemid'] );
    require( PAGE_DIR . "/giveout.php" );
  }

}

function deleteitem() {

  if ( !$Item = Item::getById( (int)$_GET['itemid'] ) ) {
    header( "Location: index.php?error=ItemNotFound" );
    return;
  }

  $Item->delete();
  header( "Location: index.php?status=ItemDeleted" );
}

function newcat() {

  $results = array();
  $results['pageTitle'] = "CMC Holdings Ltd";
  $results['pageDescription'] = "Admin Panel - New Category";
  $results['formAction'] = "newcat";

  if ( isset( $_POST['newcat'] ) ) {
    $category = new Category;
    $category->storeFormValues( $_POST );
    $category->insert();
    header( "Location: index.php?status=changesSaved&action=allcats" );

  } elseif ( isset( $_POST['cancel'] ) ) {
    header( "Location: index.php?action=allcats" );
  } else {
    $results['category'] = new Category;
    require( PAGE_DIR . "/newcat.php" );
  }

}


function editCategory() {

  $results = array();
  $results['pageTitle'] = "Editting a  Category";
  $results['pageDescription'] = "Admin Panel - Edit Category";
  $results['formAction'] = "editCategory";

  if ( isset( $_POST['editCategory'] ) ) {

    if ( !$category = Category::getByCode( $_POST['code'] ) ) {
      header( "Location: index.php?error=categoryNotFound" );
      return;
    }
	
    $category->storeFormValues( $_POST );
    $category->update();
    header( "Location: index.php?status=changesSaved" );

  } elseif ( isset( $_POST['cancel'] ) ) {

    header( "Location: index.php" );
  } else {
    $results['category'] = Category::getByCode( $_GET['code'] );
    require( PAGE_DIR . "/editCategory.php" );
  }

}

function allcats() {
  $results = array();
  $data = Category::getList();
  $results['categorys'] = $data['results'];
  $results['totalRows'] = $data['totalRows'];
  $results['pageTitle'] = "CMC Holdings Ltd";
  $results['pageDescription'] = "Admin Panel - view All Categorys";

  if ( isset( $_GET['error'] ) ) {
    if ( $_GET['error'] == "ItemNotFound" ) $results['errorMessage'] = "Error: Item not found.";
  }

  if ( isset( $_GET['status'] ) ) {
    if ( $_GET['status'] == "changesSaved" ) $results['statusMessage'] = "Your changes have been saved.";
    if ( $_GET['status'] == "ItemDeleted" ) $results['statusMessage'] = "Item deleted.";
  }

  require( PAGE_DIR . "/allcats.php" );
}

function allitems() {
  $results = array(); 
  $data = Item::getListIn();
  $results['items'] = $data['results'];
  $results['totalRows'] = $data['totalRows'];
  $results['pageTitle'] = "CMC Holdings Ltd";
  $results['pageDescription'] = "Admin Panel - view All Items";
  
  if ( isset( $_GET['error'] ) ) {
    if ( $_GET['error'] == "ItemNotFound" ) $results['errorMessage'] = "Error: Item not found.";
  }

  if ( isset( $_GET['status'] ) ) {
    if ( $_GET['status'] == "changesSaved" ) $results['statusMessage'] = "Your changes have been saved.";
    if ( $_GET['status'] == "ItemDeleted" ) $results['statusMessage'] = "Item deleted.";
  }

  require( PAGE_DIR . "/allitems.php" );
}

function viewitem() {
	$results = array();
	$results['pageTitle'] = "CMC Holdings Ltd";	
    $results['pageDescription'] = "Admin Panel - viewing an item";
	$results['item'] = Item::getById( $_GET['itemid'] );
    require( PAGE_DIR . "/viewitem.php" );
  
}

function homepage() {
  	
  $results = array(); 
  $data = Item::getList();
  $results['items'] = $data['results'];
  $results['totalRows'] = $data['totalRows'];
  
  $data1 = Item::getListOut();
  $results1['outitems'] = $data1['results'];
  $results1['totalRows'] = $data1['totalRows'];
  
  
  $results['pageTitle'] = "CMC Holdings Ltd";
  $results['pageDescription'] = "Admin Panel - view timeline";

  require( PAGE_DIR . "/index.php" );
}

?>
