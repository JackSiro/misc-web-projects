<?php require_once('Connections/bookcon.php'); ?>
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "bookuserform")) {
  $insertSQL = sprintf("INSERT INTO tbuser (fname, lname, email, address, phone, username, password) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['tbfname'], "text"),
                       GetSQLValueString($_POST['tblname'], "text"),
                       GetSQLValueString($_POST['tbemail'], "text"),
                       GetSQLValueString($_POST['tbloc'], "text"),
                       GetSQLValueString($_POST['tbcontact'], "text"),
                       GetSQLValueString($_POST['tbusername'], "text"),
                       GetSQLValueString($_POST['tbpass'], "text"));

  mysql_select_db($database_bookcon, $bookcon);
  $Result1 = mysql_query($insertSQL, $bookcon) or die(mysql_error());

  $insertGoTo = "user/index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "supplierform")) {
  $insertSQL = sprintf("INSERT INTO tbsupplier (fname, lname, email, address, phone, username, password) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['sfname'], "text"),
                       GetSQLValueString($_POST['slname'], "text"),
                       GetSQLValueString($_POST['semail'], "text"),
                       GetSQLValueString($_POST['slocation'], "text"),
                       GetSQLValueString($_POST['scontact'], "text"),
                       GetSQLValueString($_POST['susername'], "text"),
                       GetSQLValueString($_POST['spass'], "text"));

  mysql_select_db($database_bookcon, $bookcon);
  $Result1 = mysql_query($insertSQL, $bookcon) or die(mysql_error());

  $insertGoTo = "supplier/index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration</title>
<link rel="stylesheet" href="css/bootstrap-theme.min.css"  />
<link rel="stylesheet" href="css/bootstrap-theme.css"  />
<link rel="stylesheet" href="css/bootstrap.css"  />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/sticky-footer-navbar.css"  />
<link rel="stylesheet" href="css/bootstrapcss.css"  />
<link rel="stylesheet" href="css/font-awesome.min.css"  />
<link rel="stylesheet" href="css/jquery-ui.min.css"  />


<link href="css/reg.css" rev="stylesheet" />
<link rel="stylesheet" href="css/styles.css"  />

<script src="javascript/jquery-2.1.1.min.js" language="javascript" > </script>
<script src="javascript/jquery.min.js" language="javascript" > </script>

<script src="javascript/bootstrap.min.js" language="javascript" > </script>
<script src="javascript/html5shiv.min.js" language="javascript" > </script>
<script src="javascript/respond.min.js" language="javascript" > </script>
<script src="javascript/bootstrap.js" language="javascript" > </script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css" />
</head>

<body>


<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">Create account</h1>
	               		<hr />
               	  </div>
	            </div> 
				<div  class="col-sm-5 pull-left">
				  <form name="bookuserform" action="<?php echo $editFormAction; ?>" method="POST" class="form-horizontal" id="bookuserform">
                  
						<h1 class="title">Bookshop account</h1>
                        
						<div class="form-group">
							<label for="tbname" class="cols-sm-2 control-label">Last Name</label>
							<div class="cols-sm-10">
							  <div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span><span id="sprytextfield1">
								<label for="tblname"></label>
								<input type="text" name="tblname" id="tblname" class="form-control" />
								<span class="textfieldRequiredMsg">A value is required.</span></span></div>
							</div>
						</div>
                        
                        
                        <div class="form-group">
							<label for="tbname" class="cols-sm-2 control-label">First Name</label>
							<div class="cols-sm-10">
							  <div class="input-group">
							  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span><span id="sprytextfield2">
							  <label for="tbfname"></label>
							  <input type="text" name="tbfname" id="tbfname" class="form-control" />
							  <span class="textfieldRequiredMsg">A value is required.</span></span></div>
							</div>
						</div>
                        

						<div class="form-group">
							<label for="tbemail" class="cols-sm-2 control-label">Your Email</label>
							<div class="cols-sm-10">
							  <div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span><span id="sprytextfield3">
								<label for="tbemail2"></label>
								<input type="email" name="tbemail" id="tbemail2" class="form-control" />
								<span class="textfieldRequiredMsg">A value is required.</span></span></div>
							</div>
						</div>
                        
                        
                        <div class="form-group">
							<label for="tbemail" class="cols-sm-2 control-label">Contact</label>
							<div class="cols-sm-10">
								<div class="input-group">
							  <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span><span id="sprytextfield4">
							  <label for="tbcontact"></label>
							  <input type="text" name="tbcontact" id="tbcontact" class="form-control"/>
							  <span class="textfieldRequiredMsg">A value is required.</span></span></div>
						  </div>
					</div>
                        
                        
                        <div class="form-group">
							<label for="tbusername" class="cols-sm-2 control-label">Location</label>
							<div class="cols-sm-10">
							  <div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
								<label for="tbloc"></label>
								<input type="text" name="tbloc" id="tbloc" class="form-control" />
							  </div>
							</div>
						</div>

                        

<div class="form-group">
							<label for="tbusername" class="cols-sm-2 control-label">Username</label>
							<div class="cols-sm-10">
							  <div class="input-group">
								<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span><span id="sprytextfield5">
								<label for="tbusername2"></label>
								<input type="text" name="tbusername" id="tbusername2" class="form-control" />
								<span class="textfieldRequiredMsg">A value is required.</span></span></div>
							</div>
						</div>

						<div class="form-group">
							<label for="tbpassword" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
							  <div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span><span id="sprypassword1">
								<label for="tbpass"></label>
								<input type="password" name="tbpass" id="tbpass" class="form-control" />
								<span class="passwordRequiredMsg">A value is required.</span></span></div>
							</div>
						</div>

						<div class="form-group">
							<label for="tbconfirm" class="cols-sm-2 control-label">Confirm Password</label>
							<div class="cols-sm-10">
							  <div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span><span id="spryconfirm1">
								<label for="tbconfirm2"></label>
								<input type="password" name="tbconfirm" id="tbconfirm2"  class="form-control" />
								<span class="confirmRequiredMsg">A value is required.</span><span class="confirmInvalidMsg">The values don't match.</span></span></div>
							</div>
						</div>

						<div class="form-group ">
							<input class="btn btn-primary btn-lg btn-block login-button" type="submit" name="sbmuser" value="Register"  /> 
</div>
						<div class="login-register">
			              <p><a href="user/index.php">Login</a>				      </p>
					  </div>
						<input type="hidden" name="MM_insert" value="bookuserform" />
                  </form>
				</div>
                
                
                
                
                <div  class="col-sm-5 pull-right">
				  <form name="supplierform" action="<?php echo $editFormAction; ?>" method="POST" class="form-horizontal" id="supplierform">
						
                        <h1 class="title">Supplier account</h1>
                        
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Last Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span><span id="sprytextfield6">
								<label for="slname"></label>
								<input type="text" name="slname" id="slname" class="form-control" />
								<span class="textfieldRequiredMsg">A value is required.</span></span></div>
							</div>
						</div>
                        
                        
                        <div class="form-group">
							<label for="tbname" class="cols-sm-2 control-label">First Name</label>
							<div class="cols-sm-10">
							  <div class="input-group">
							  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span><span id="sprytextfield7">
							  <label for="sfname"></label>
							  <input type="text" name="sfname" id="sfname" class="form-control" />
							  <span class="textfieldRequiredMsg">A value is required.</span></span></div>
							</div>
						</div>

						<div class="form-group">
							<label for="location" class="cols-sm-2 control-label">Your Email</label>
							<div class="cols-sm-10">
							  <div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span><span id="sprytextfield8">
								<label for="semail"></label>
								<input type="email" name="semail" id="semail" class="form-control" />
								<span class="textfieldRequiredMsg">A value is required.</span></span></div>
							</div>
						</div>
                        
                        
                        
                         <div class="form-group">
							<label for="tbusername" class="cols-sm-2 control-label">Contact</label>
							<div class="cols-sm-10">
							  <div class="input-group">
							  <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span><span id="sprytextfield9">
							  <label for="scontact"></label>
							  <input type="text" name="scontact" id="scontact" class="form-control" />
							  <span class="textfieldRequiredMsg">A value is required.</span></span></div>
							</div>
						</div>
                        
                        
                        <div class="form-group">
							<label for="location" class="cols-sm-2 control-label">Location</label>
							<div class="cols-sm-10">
								<div class="input-group">
							  <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
							  <label for="slocation"></label>
							  <input type="text" name="slocation" id="slocation" class="form-control" />
							  </div>
						  </div>
</div>

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Username</label>
							<div class="cols-sm-10">
								<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span><span id="sprytextfield10">
								<label for="susername"></label>
								<input type="text" name="susername" id="susername" class="form-control" />
								<span class="textfieldRequiredMsg">A value is required.</span></span></div>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span><span id="sprypassword2">
								<label for="spass"></label>
								<input type="password" name="spass" id="spass" class="form-control" />
								<span class="passwordRequiredMsg">A value is required.</span></span></div>
							</div>
						</div>

						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span><span id="spryconfirm2">
								<label for="sconfirm"></label>
								<input type="password" name="sconfirm" id="sconfirm" class="form-control" />
								<span class="confirmRequiredMsg">A value is required.</span><span class="confirmInvalidMsg">The values don't match.</span></span></div>
							</div>
						</div>

						<div class="form-group ">
							<input class="btn btn-primary btn-lg btn-block login-button" type="submit" name="sbmsup" value="Register"  /> 
</div>
						<div class="login-register">
			              <p><a href="supplier/index.php">Login</a>				      </p>
					  </div>
						<input type="hidden" name="MM_insert" value="supplierform" />
                  </form>
				</div>
                
                
                
                
			</div>
		</div>






<script src="javascript/jquery-2.1.1.min.js" language="javascript" > </script>

<script src="javascript/bootstrap.js" language="javascript" > </script>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1");
var spryconfirm1 = new Spry.Widget.ValidationConfirm("spryconfirm1", "tbpass");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7");
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8");
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9");
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10");
var sprypassword2 = new Spry.Widget.ValidationPassword("sprypassword2");
var spryconfirm2 = new Spry.Widget.ValidationConfirm("spryconfirm2", "spass");
</script>
</body>
</html>