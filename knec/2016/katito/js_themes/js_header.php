<!DOCTYPE html> 
<html>
<?php $myaccount = isset( $_SESSION['nafaka_account'] ) ? $_SESSION['nafaka_account'] : ""; ?>
<head>
  <title><?php echo js_get_option('sitename') ?></title>
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="js_themes/css/styles.css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="js_themes/js/modernizr-1.5.min.js"></script>
</head>
<body>
<div class="bg-top">
  <div class="bgr">
    <!--==============================header=================================-->
    <header>
      <h1 class="sitelogo"><?php echo js_get_option('sitename') ?></h1>
      <nav>
       <ul class="menu">
		<li><a href=".">Home</a></li>
		 <?php 
		$myaccount = isset( $_SESSION['nafaka_account'] ) ? $_SESSION['nafaka_account'] : "";
		if ($myaccount){ echo
		'<li><a href="index.php?action=item_all">Stationery</a></li>
		<li><a href="index.php?action=type_all">Types</a></li>
		<li><a href="index.php?action=supp_all">Suppliers</a></li>
		<li><a href="index.php?action=user_all">Users</a></li>
		<li><a href="index.php?action=order_all">Orders</a></li>
		<li><a href="index.php?action=options">Site Options</a></li>
		<li><a href="index.php?action=logout">Logout?</a></li>'; 
	
		}  else { echo
			'<li><a href="index.php?action=register">Register</a></li>
			<li><a href="index.php?action=forgot_password">Forgot Password</a></li>
			<li><a href="index.php?action=forgot_username">Forgot Username</a></li>';
		}
			?>	
        </ul>
        <div class="clear"></div>
      </nav>
      
    </header>
    