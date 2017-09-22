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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Itemsonoffer = 10;
$pageNum_Itemsonoffer = 0;
if (isset($_GET['pageNum_Itemsonoffer'])) {
  $pageNum_Itemsonoffer = $_GET['pageNum_Itemsonoffer'];
}
$startRow_Itemsonoffer = $pageNum_Itemsonoffer * $maxRows_Itemsonoffer;

mysql_select_db($database_bookcon, $bookcon);
$query_Itemsonoffer = "SELECT myid, myitems.suppid,myitems.itemid, name,myitems.`desc`,myitems.quantity, myitems.amount,coalesce(sum(myitems.amount*myitems.quantity),0) as total,lname,fname,email,address,phone FROM myitems,item,tbsupplier    where myitems.itemid=item.itemid and tbsupplier.username=myitems.suppid group by myid ORDER BY myitems.regdate DESC";
$query_limit_Itemsonoffer = sprintf("%s LIMIT %d, %d", $query_Itemsonoffer, $startRow_Itemsonoffer, $maxRows_Itemsonoffer);
$Itemsonoffer = mysql_query($query_limit_Itemsonoffer, $bookcon) or die(mysql_error());
$row_Itemsonoffer = mysql_fetch_assoc($Itemsonoffer);

if (isset($_GET['totalRows_Itemsonoffer'])) {
  $totalRows_Itemsonoffer = $_GET['totalRows_Itemsonoffer'];
} else {
  $all_Itemsonoffer = mysql_query($query_Itemsonoffer);
  $totalRows_Itemsonoffer = mysql_num_rows($all_Itemsonoffer);
}
$totalPages_Itemsonoffer = ceil($totalRows_Itemsonoffer/$maxRows_Itemsonoffer)-1;

$queryString_Itemsonoffer = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Itemsonoffer") == false && 
        stristr($param, "totalRows_Itemsonoffer") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Itemsonoffer = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Itemsonoffer = sprintf("&totalRows_Itemsonoffer=%d%s", $totalRows_Itemsonoffer, $queryString_Itemsonoffer);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Requests items</title>

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



  
  <table border="0" align="center" cellpadding="0" cellspacing="0" class="table table-striped">
    <tr>
      <td><strong>Item</strong></td>
      <td><strong>Description</strong></td>
      <td><strong>Quantity</strong></td>
      <td><strong>Amount</strong></td>
      <td><strong>Total</strong></td>
      <td><strong>Last name</strong></td>
      <td><strong>First name</strong></td>
      <td><strong>Phone</strong></td>
      <td><strong>Email</strong></td>
      <td><strong>Location</strong></td>
      <td><strong>Go to action</strong></td>
    </tr>
    <?php do { ?>
      <tr>
        <td><?php echo $row_Itemsonoffer['name']; ?></td>
        <td><?php echo $row_Itemsonoffer['desc']; ?></td>
        <td><?php echo $row_Itemsonoffer['quantity']; ?></td>
        <td><?php echo $row_Itemsonoffer['amount']; ?></td>
        <td><?php echo $row_Itemsonoffer['total']; ?></td>
        <td><?php echo $row_Itemsonoffer['lname']; ?></td>
        <td><?php echo $row_Itemsonoffer['fname']; ?></td>
         <td><?php echo $row_Itemsonoffer['phone']; ?></td>
        <td><?php echo $row_Itemsonoffer['email']; ?></td>
        <td><?php echo $row_Itemsonoffer['address']; ?></td>
        <td><a href="makeorder.php?myid=<?php echo $row_Itemsonoffer['myid']; ?>&amp;name=<?php echo $row_Itemsonoffer['name']; ?>&amp;desc=<?php echo $row_Itemsonoffer['desc']; ?>&amp;quantity=<?php echo $row_Itemsonoffer['quantity']; ?>&amp;amount=<?php echo $row_Itemsonoffer['amount']; ?>&amp;fname=<?php echo $row_Itemsonoffer['fname']; ?>&amp;lname=<?php echo $row_Itemsonoffer['lname']; ?>">Go to order</a></td>
      </tr>
      <?php } while ($row_Itemsonoffer = mysql_fetch_assoc($Itemsonoffer)); ?>
  </table>
  <table border="0">
    <tr>
      <td><?php if ($pageNum_Itemsonoffer > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_Itemsonoffer=%d%s", $currentPage, 0, $queryString_Itemsonoffer); ?>">First</a>
          <?php } // Show if not first page ?></td>
      <td><?php if ($pageNum_Itemsonoffer > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_Itemsonoffer=%d%s", $currentPage, max(0, $pageNum_Itemsonoffer - 1), $queryString_Itemsonoffer); ?>">Previous</a>
          <?php } // Show if not first page ?></td>
      <td><?php if ($pageNum_Itemsonoffer < $totalPages_Itemsonoffer) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_Itemsonoffer=%d%s", $currentPage, min($totalPages_Itemsonoffer, $pageNum_Itemsonoffer + 1), $queryString_Itemsonoffer); ?>">Next</a>
          <?php } // Show if not last page ?></td>
      <td><?php if ($pageNum_Itemsonoffer < $totalPages_Itemsonoffer) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_Itemsonoffer=%d%s", $currentPage, $totalPages_Itemsonoffer, $queryString_Itemsonoffer); ?>">Last</a>
          <?php } // Show if not last page ?></td>
    </tr>
  </table>
<script src="../javascript/jquery-2.1.1.min.js" language="javascript" > </script>
  <script src="../javascript/bootstrap.js" language="javascript" > </script>

</body>
</html>
<?php
mysql_free_result($Itemsonoffer);
?>
