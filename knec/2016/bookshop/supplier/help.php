<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "index.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Help</title>

<link rel="stylesheet" href="../css/bootstrap-theme.min.css"  />
<link rel="stylesheet" href="../css/bootstrap-theme.css"  />
<link rel="stylesheet" href="../css/bootstrap.css"  />
<link rel="stylesheet" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="../css/sticky-footer-navbar.css"  />
<link rel="stylesheet" href="../css/bootstrapcss.css"  />
<link rel="stylesheet" href="../css/font-awesome.min.css"  />
<link rel="stylesheet" href="../css/jquery-ui.min.css"  />
<link rel="stylesheet" href="../css/login.css"  />
<link rel="stylesheet" href="../css/styles.css"  />


<script src="../javascript/jquery-2.1.1.min.js" language="javascript" > </script>
<script src="../javascript/jquery.min.js" language="javascript" > </script>

<script src="../javascript/bootstrap.min.js" language="javascript" > </script>
<script src="../javascript/html5shiv.min.js" language="javascript" > </script>
<script src="../javascript/respond.min.js" language="javascript" > </script>
<script src="../javascript/bootstrap.js" language="javascript" > </script>
</head>

<body>


<div id="evaheader" class="alert alert-info col-sm-2">
  <p> BOOKSHOP ITEMS ORDER SYSTEM</p>
</div>
<div id="menu" class="well col-sm-9 pull-right">
  <ul>
    <li><a href="request.php">Requested items</a></li>
    <li><a href="supply.php">Approved request</a></li>
    <li><a href="addsupply.php">Add Supply</a></li>
    <li><a href="alladdedsupply.php">All Supply</a></li>
    <li><a href="mysupply.php">My Supply</a></li>
    <li> <a href="cancelled.php"> Cancelled requests</a></li>
    <li> <a href="declined.php"> Declined requests</a></li>
    <li> <a href="delivered.php"> Delivered Items</a></li>
    <li> <a href="account.php"> my account</a></li>
    <li> <a href="help.php">Help</a></li>
    <li> <a href="logout.php"> Logout</a></li>
  </ul>
</div>
<div class="clearfix"> </div>



<table width="500" cellspacing="0" cellpadding="0" class="table table-striped">
  <caption>
    Kindly find help here
  </caption>
  <tr>
    <th scope="row">Requested requests</th>
    <td>This page contains the orders that have been requested by bookshop user is awaiting approval by supplier. All the items are displayed bigining with the most recent</td>
  </tr>
  <tr>
    <th scope="row">Add supply</th>
    <td>This page allow the suppliers to add new items that are not in the system for supply. Probably have been deleted or have never been in the system</td>
  </tr>
  <tr>
    <th scope="row">Cancelled items</th>
    <td>This page contains the requests that have been cancelled and are no longer required to be  supplied. All the items are displayed bigining with the most recent</td>
  </tr>
  <tr>
    <th scope="row">Declined requests</th>
    <td>This page contains the requests that have been declined and supplier no longer want to supply them. All the items are displayed bigining with the most recent</td>
  </tr>
  <tr>
    <th scope="row">All supply</th>
    <td>This page contains all items that have been added by diffent suppliers for supply. All the items are displayed bigining with the most recent.</td>
  </tr>
  <tr>
    <th scope="row">My supply</th>
    <td>This page contains all items that the logged in supplier supply to the bookshop users. All the items are displayed bigining with the most recent.</td>
  </tr>
  <th scope="row">Add item to my supply</th>
    <td>GO to all supply page and click on the add to my supply  link alongside the item you want and you will be taken to action page where you will click on the add as my supply button to complete the process.</td>
  </tr>
  </tr>
  <th scope="row">Accept order</th>
    <td>GO to requested items page and click on the go to action link alongside the item you want and you will be taken to action page where you will click on the send my selection button to complete the process.</td>
  </tr>
</table>




</body>
</html>