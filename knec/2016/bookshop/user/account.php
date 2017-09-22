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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "supplierform")) {
  $updateSQL = sprintf("UPDATE tbuser SET fname=%s, lname=%s, email=%s, address=%s, phone=%s, password=%s WHERE username=%s",
                       GetSQLValueString($_POST['sfname'], "text"),
                       GetSQLValueString($_POST['slname'], "text"),
                       GetSQLValueString($_POST['semail'], "text"),
                       GetSQLValueString($_POST['slocation'], "text"),
                       GetSQLValueString($_POST['scontact'], "text"),
                       GetSQLValueString($_POST['spass'], "text"),
                       GetSQLValueString($_POST['susername'], "text"));

  mysql_select_db($database_bookcon, $bookcon);
  $Result1 = mysql_query($updateSQL, $bookcon) or die(mysql_error());

  $updateGoTo = "account.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_mydetails = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_mydetails = $_SESSION['MM_Username'];
}
mysql_select_db($database_bookcon, $bookcon);
$query_mydetails = sprintf("SELECT fname, lname, email, address, phone, username, password, regdate FROM tbuser WHERE username = %s", GetSQLValueString($colname_mydetails, "text"));
$mydetails = mysql_query($query_mydetails, $bookcon) or die(mysql_error());
$row_mydetails = mysql_fetch_assoc($mydetails);
$totalRows_mydetails = mysql_num_rows($mydetails);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My account</title>
</head>

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
















<div class="container">
			<div class="row main">
				
				
        <div >
				  <form name="supplierform" action="<?php echo $editFormAction; ?>" method="POST" class="form-horizontal" id="supplierform">
						
                        <h1 class="title">My account details</h1>
                        
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Last Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
								
								<input name="slname" type="text" class="form-control" id="slname" value="<?php echo $row_mydetails['lname']; ?>" />
							  </div>
							</div>
						</div>
                        
                        
                        <div class="form-group">
							<label for="tbname" class="cols-sm-2 control-label">First Name</label>
							<div class="cols-sm-10">
							  <div class="input-group">
							  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
							  <label for="sfname"></label>
							  <input name="sfname" type="text" class="form-control" id="sfname" value="<?php echo $row_mydetails['fname']; ?>" />
							 </div>
							</div>
						</div>

						<div class="form-group">
							<label for="location" class="cols-sm-2 control-label">Your Email</label>
							<div class="cols-sm-10">
							  <div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
								
								<input type="email" name="semail" id="semail" class="form-control" value="<?php echo $row_mydetails['email']; ?>"/>
							  </div>
							</div>
						</div>
                        
                        
                        
                         <div class="form-group">
							<label for="tbusername" class="cols-sm-2 control-label">Contact</label>
							<div class="cols-sm-10">
							  <div class="input-group">
							  <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
							  
							  <input type="text" name="scontact" id="scontact" class="form-control" value="<?php echo $row_mydetails['phone']; ?>"/>
							
							</div>
				</div>
                        
                        
                        <div class="form-group">
							<label for="location" class="cols-sm-2 control-label">Location</label>
							<div class="cols-sm-10">
								<div class="input-group">
							  <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
							  <label for="slocation"></label>
							  <input type="text" name="slocation" id="slocation" class="form-control" value="<?php echo $row_mydetails['address']; ?>"/>
							  </div>
						  </div>
</div>

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Username</label>
							<div class="cols-sm-10">
								<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
								
								<input type="text" name="susername" id="susername" class="form-control" readonly="readonly" value="<?php echo $row_mydetails['username']; ?>"/>
							  </div>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
								
								<input type="password" name="spass" id="spass" class="form-control" value="<?php echo $row_mydetails['password']; ?>"/>
								
							</div>
				</div>

			

						<div class="form-group ">
							<input class="btn btn-primary btn-lg btn-block login-button" type="submit" name="sbmsup" value="Update account"  /> 
</div>
						<div class="login-register">
			             
					  </div>
						<input type="hidden" name="MM_insert" value="supplierform" />
						<input type="hidden" name="MM_update" value="supplierform" />
                  </form>
				</div>
                
                
                
                
			</div>
</div>


</body>
</html>
<?php
mysql_free_result($mydetails);
?>
