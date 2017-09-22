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

$maxRows_RequestedItems = 1000;
$pageNum_RequestedItems = 0;
if (isset($_GET['pageNum_RequestedItems'])) {
  $pageNum_RequestedItems = $_GET['pageNum_RequestedItems'];
}
$startRow_RequestedItems = $pageNum_RequestedItems * $maxRows_RequestedItems;

$colname_RequestedItems = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_RequestedItems = $_SESSION['MM_Username'];
}
mysql_select_db($database_bookcon, $bookcon);
$query_RequestedItems = sprintf("SELECT tbbook.bookid, tbbook.myid, tbbook.userid, item.name,tbbook.quantity,tbbook.amount, tbbook.`desc`,coalesce(sum(tbbook.quantity*tbbook.amount),0)as total,tbbook.regdate,fname,lname,email,address,phone FROM tbbook,item,myitems,tbsupplier WHERE tbbook.status='Pending' and myitems.suppid=tbsupplier.username and item.itemid=myitems.itemid and tbbook.myid=myitems.myid and tbbook.userid='".$colname_RequestedItems."' GROUP BY tbbook.bookid ORDER BY tbbook.regdate DESC", GetSQLValueString($colname_RequestedItems, "int"));


$query_limit_RequestedItems = sprintf("%s LIMIT %d, %d", $query_RequestedItems, $startRow_RequestedItems, $maxRows_RequestedItems);
$RequestedItems = mysql_query($query_limit_RequestedItems, $bookcon) or die(mysql_error());
$row_RequestedItems = mysql_fetch_assoc($RequestedItems);

if (isset($_GET['totalRows_RequestedItems'])) {
  $totalRows_RequestedItems = $_GET['totalRows_RequestedItems'];
} else {
  $all_RequestedItems = mysql_query($query_RequestedItems);
  $totalRows_RequestedItems = mysql_num_rows($all_RequestedItems);
}
$totalPages_RequestedItems = ceil($totalRows_RequestedItems/$maxRows_RequestedItems)-1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pending requests</title>


<link rel="stylesheet" href="../css/bootstrap-theme.min.css"  />
<link rel="stylesheet" href="../css/bootstrap-theme.css"  />
<link rel="stylesheet" href="../css/bootstrap.css"  />
<link rel="stylesheet" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="../css/sticky-footer-navbar.css"  />
<link rel="stylesheet" href="../css/bootstrapcss.css"  />
<link rel="stylesheet" href="../css/font-awesome.min.css"  />
<link rel="stylesheet" href="../css/jquery-ui.min.css"  />
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
  <li><a href="order.php">New order</a></li>
    <li><a href="accepted.php">Accepted requests</a></li>
    <li><a href="pending.php">Waiting requests</a></li>
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
<table border="0" cellpadding="0" cellspacing="0" class="table table-striped">
  <tr>
    <td><div align="center"><strong>Item</strong></div></td>
    <td><div align="center"><strong>Quantity</strong></div></td>
    <td><div align="center"><strong>Amount</strong></div></td>
    <td><div align="center"><strong>Description</strong></div></td>
    <td><div align="center"><strong>Total</strong></div></td>
    <td><div align="center"><strong>Date of request</strong></div></td>
    
    <td><div align="center"><strong>Last name</strong></div></td>
    <td><div align="center"><strong>First Name</strong></div></td>
     <td><div align="center"><strong>Contact</strong></div></td>
    <td><div align="center"><strong>Email</strong></div></td>
    <td><div align="center"><strong>Location</strong></div></td>
    
     <td><div align="center"><strong>Go to action</strong></div></td>
  </tr>
  <?php do { ?>
    <tr>
      <td><div align="center"><?php echo $row_RequestedItems['name']; ?></div></td>
      <td><div align="center"><?php echo $row_RequestedItems['quantity']; ?></div></td>
      <td><div align="center"><?php echo $row_RequestedItems['amount']; ?></div></td>
      <td><div align="center"><?php echo $row_RequestedItems['desc']; ?></div></td>
      <td><div align="center"><?php echo $row_RequestedItems['total']; ?></div></td>
      <td><div align="center"><?php echo $row_RequestedItems['regdate']; ?></div></td>
      
      <td><div align="center"><?php echo $row_RequestedItems['lname']; ?></div></td>
      <td><div align="center"><?php echo $row_RequestedItems['fname']; ?></div></td>
      <td><div align="center"><?php echo $row_RequestedItems['phone']; ?></div></td>
      <td><div align="center"><?php echo $row_RequestedItems['email']; ?></div></td>
      <td><div align="center"><?php echo $row_RequestedItems['address']; ?></div></td>
      
       <td><div align="center"><a href="actonrequest.php?bookid=<?php echo $row_RequestedItems['bookid']; ?>&amp;name=<?php echo $row_RequestedItems['name']; ?>&amp;amount=<?php echo $row_RequestedItems['amount']; ?>&amp;quantity=<?php echo $row_RequestedItems['quantity']; ?>&amp;total=<?php echo $row_RequestedItems['total']; ?>&amp;lname=<?php echo $row_RequestedItems['lname']; ?>&amp;fname=<?php echo $row_RequestedItems['fname']; ?>">Go to action</a></div></td>
    </tr>
    <?php } while ($row_RequestedItems = mysql_fetch_assoc($RequestedItems)); ?>
</table>
<script src="../javascript/bootstrap.js" language="javascript" > </script>

</body>
</html>
<?php
mysql_free_result($RequestedItems);
?>
