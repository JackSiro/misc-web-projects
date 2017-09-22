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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "supplyform")) {
  $updateSQL = sprintf("UPDATE tbbook SET status=%s WHERE bookid=%s",
                       GetSQLValueString($_POST['status'], "text"),
                       GetSQLValueString($_POST['bookid'], "int"));

  mysql_select_db($database_bookcon, $bookcon);
  $Result1 = mysql_query($updateSQL, $bookcon) or die(mysql_error());

  $updateGoTo = "request.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Action page</title>



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
<script src="../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
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


<div class="container">
  
  <div class="row" id="pwd-container">
    <div class="col-md-4"></div>
    
    <div class="col-md-4">
      <section class="login-form">
       <form action="<?php echo $editFormAction; ?>" name="supplyform" method="POST" role="login" id="supplyform">
       
       
        <div class="form-group">
							<label for="tbname" class="cols-sm-2 control-label">Item</label>
							<div class="cols-sm-10">
							  <div class="input-group">
								
								<?php echo $_GET['name']; ?>
								
								
							  </div>
							</div>
		  </div>
          
           <div class="form-group">
							<label for="tbname" class="cols-sm-2 control-label">Quantity</label>
							<div class="cols-sm-10">
							  <div class="input-group">
								
								<?php echo $_GET['quantity']; ?>
								
								
							  </div>
							</div>
		  </div>
       
       
       
       
        <div class="form-group">
							<label for="tbname" class="cols-sm-2 control-label">Amount</label>
							<div class="cols-sm-10">
							  <div class="input-group">
								
								<?php echo $_GET['amount']; ?>
								
								
							  </div>
							</div>
		  </div>
          
          
          
           <div class="form-group">
							<label for="tbname" class="cols-sm-2 control-label">Total</label>
							<div class="cols-sm-10">
							  <div class="input-group">
								
								<?php echo $_GET['total']; ?>
								
								
							  </div>
							</div>
		  </div>
          
          
          
           <div class="form-group">
							<label for="tbname" class="cols-sm-2 control-label">Name </label>
							<div class="cols-sm-10">
							  <div class="input-group">
								
								<?php echo $_GET['lname']; ?> &nbsp; &nbsp; <?php echo $_GET['fname']; ?>
								
								
							  </div>
							</div>
		  </div>
       
       
       
       
       
        
<div class="form-group">
							<label for="tbname" class="cols-sm-2 control-label">Action</label>
<div class="cols-sm-10">
							  <div class="input-group">
							  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span><span id="spryselect1">
							  <label for="status"></label>
							  <select name="status" id="status">
							    <option value="Pending" selected="selected">Pending</option>
							    <option value="Approved">Approve</option>
							    <option value="Declined">Decline</option>
						      </select>
							  <span class="selectRequiredMsg">Please select an item.</span></span></div>
            </div>
		  </div>
                        
                        
          
         
                        
                        
          
          
          <div class="pwstrength_viewport_progress"></div>
          
          <input class="btn btn-lg btn-primary btn-block" type="submit" name="additembt" id="additembt" value="Send my selection" />
          <input name="bookid" type="hidden" id="bookid" value="<?php echo $_GET['bookid']; ?>" />
<div>
  
</div>
<input type="hidden" name="MM_update" value="supplyform" />
       </form>
        
        <div class="form-links">
         
        </div>
      </section>  
    </div>
      
      <div class="col-md-4"></div>
      

  </div>
  
  <p>
    <a href="#" target="_blank"><small>Act</small><sup>ion</sup></a>
    <br>
    <br>
    
  </p>     
  
  
</div>











<script src="../javascript/jquery-2.1.1.min.js" language="javascript" > </script>

<script src="../javascript/bootstrap.js" language="javascript" > </script>
<script type="text/javascript">
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
</script>
</body>
</html>