<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo js_get_option('sitename') ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" media="all" href="js_themes/styles/960.css" />
<link rel="stylesheet" type="text/css" media="all" href="js_themes/styles/reset.css" />
<link rel="stylesheet" type="text/css" media="all" href="js_themes/styles/text.css" />
<link rel="stylesheet" type="text/css" media="all" href="js_themes/style.css" />
<link rel="stylesheet" type="text/css" media="all" href="js_themes/themes/brown/style.css" />
<script type="text/javascript" src="js_themes/scripts/jquery-1.4.2.js"></script>
<script type="text/javascript" src="js_themes/scripts/jquery.tools.min.js"></script>
<script type="text/javascript" src="js_themes/scripts/dapur.js"></script>
</head>
<body>
<div id="warp">
  <div id="main" class="container_16">
    <div id="header" class="grid_16">
      <div id="mylogo">
        <h1 class="sitename"><a href="."><?php echo js_get_option('sitename') ?></a></h1>
        <h2><?php echo js_get_option('keywords') ?></h2>
      </div>
     
    </div>
    <div id="mainMenu" class="grid_16">
      <ul id="nav">
       <li><a href=".">Home</a></li>		  
	<?php $myaccount = isset( $_SESSION['kinyua_account'] ) ? $_SESSION['kinyua_account'] : ""; ?> 
		<?php if (!$myaccount){	?>
			<li><a href="index.php?page=login">Login</a></li>
			<li><a href="index.php?page=register">Register</a></li>	
			<li><a href="index.php?page=forgot_password">Forgot Password</a></li>
			<li><a href="index.php?page=forgot_username">Forgot Username</a></li>		  
		<?php } else if ($myaccount){ ?>
		  <li><a href="index.php?page=vehicle_all">Vehicles</a></li>
		  <li><a href="index.php?page=ticket_all">Tickets</a></li>
		  <li><a href="index.php?page=town_all">Towns</a></li>
		  <li><a href="index.php?page=employee_all">Employees</a></li>
		  <li><a href="index.php?page=logout">Logout?</a></li>
		<?php } ?>
      </ul>
    </div>
   <center><h1>'</h1></center>