<?php 
	$sitename = as_get_option('sitename');
	$myaccount = isset( $_SESSION['siteuser_account'] ) ? $_SESSION['siteuser_account'] : "";
	$administrator = isset( $_SESSION['siteuser_group'] ) ? $_SESSION['siteuser_group'] : "";
    $usergrp = isset( $_SESSION['siteuser_group'] ) ? $_SESSION['siteuser_group'] : "user";
	$loggedin = isset( $_SESSION['siteuser_user'] ) ? $_SESSION['siteuser_user'] : ""; 
?>
<!DOCTYPE HTML>
<html>
<head>
  <title><?php echo $sitename ?></title>
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="as_themes/style/style.css" />
	<script type="text/javascript" src="as_themes/js/jquery_1.5.2.js"></script>
	<script type="text/javascript" src="as_themes/js/sales.js"></script>
	<script type="text/javascript" src="as_themes/js/post_watermarkinput.js"></script>
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <h1><a href="index.html"><span class="logo_colour"><?php echo $sitename ?></span></a></h1>
          <h2><?php echo as_get_option('description') ?></h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <li class="selected"><a href="index.php">Home</a></li>
          <?php 
			if ($loggedin) {
				if ($administrator) { echo
				'<li><a href="index.php?action=drug_all">Drugs</a></li>
				<li><a href="index.php?action=stock_all">Stock</a></li>
				<li><a href="index.php?action=sales_all">Sales</a></li>
				<li><a href="index.php?action=user_all">Users</a></li>'; 
			
				}  else {
					echo '<li><a href="index.php?action=signout">Sign Out</a></li>';
				}
			} else {
				echo
					'<li><a href="index.php?action=signup">Sign Up</a></li>
					<li><a href="index.php?action=forgot_password">Forgot Password</a></li>
					<li><a href="index.php?action=forgot_username">Forgot Username</a></li>';		  
			}
		?>	
        </ul>
      </div>
    </div>
    <div id="content_header"></div>