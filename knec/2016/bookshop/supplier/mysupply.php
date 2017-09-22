<?php require_once('../Connections/bookcon.php'); ?>
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
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$maxRows_Mysupplies = 10;
$pageNum_Mysupplies = 0;
if (isset($_GET['pageNum_Mysupplies'])) {
  $pageNum_Mysupplies = $_GET['pageNum_Mysupplies'];
}
$startRow_Mysupplies = $pageNum_Mysupplies * $maxRows_Mysupplies;

$colname_Mysupplies = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_Mysupplies = $_SESSION['MM_Username'];
}
mysql_select_db($database_bookcon, $bookcon);
$query_Mysupplies = sprintf("SELECT myid, suppid, myitems.itemid,name,myitems.`desc`, quantity, amount, myitems.regdate FROM myitems,item WHERE item.itemid=myitems.itemid and suppid = %s ORDER BY regdate DESC", GetSQLValueString($colname_Mysupplies, "text"));
$query_limit_Mysupplies = sprintf("%s LIMIT %d, %d", $query_Mysupplies, $startRow_Mysupplies, $maxRows_Mysupplies);
$Mysupplies = mysql_query($query_limit_Mysupplies, $bookcon) or die(mysql_error());
$row_Mysupplies = mysql_fetch_assoc($Mysupplies);

if (isset($_GET['totalRows_Mysupplies'])) {
  $totalRows_Mysupplies = $_GET['totalRows_Mysupplies'];
} else {
  $all_Mysupplies = mysql_query($query_Mysupplies);
  $totalRows_Mysupplies = mysql_num_rows($all_Mysupplies);
}
$totalPages_Mysupplies = ceil($totalRows_Mysupplies/$maxRows_Mysupplies)-1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My supplies</title>

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














<script src="../javascript/jquery-2.1.1.min.js" language="javascript" > </script>

<script src="../javascript/bootstrap.js" language="javascript" > </script>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="table table-striped">
  <tr>
    <th><div align="center"><strong>Delete</strong></div></th>
    <th><div align="center"><strong>name</strong></div></th>
    <th><div align="center"><strong>desc</strong></div></th>
    <th><div align="center"><strong>quantity</strong></div></th>
    <th><div align="center"><strong>amount</strong></div></th>
    <th><div align="center"><strong>regdate</strong></div></th>
    
  </tr>
  <?php do { ?>
    <tr>
      <td><a href="deleteitem.php?myid=<?php echo $row_Mysupplies['myid']; ?>" class="btn btn-block btn-danger"><span class="glyphicon glyphicon-trash" >Delete </span></a></td>
      <td><?php echo $row_Mysupplies['name']; ?></td>
      <td><?php echo $row_Mysupplies['desc']; ?></td>
      <td><?php echo $row_Mysupplies['quantity']; ?></td>
      <td><?php echo $row_Mysupplies['amount']; ?></td>
      <td><?php echo $row_Mysupplies['regdate']; ?></td>
      
    </tr>
    <?php } while ($row_Mysupplies = mysql_fetch_assoc($Mysupplies)); ?>
</table>
<script src="../javascript/login.js" language="javascript" > </script>

</body>
</html>
<?php
mysql_free_result($Mysupplies);
?>
