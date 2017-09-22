<!DOCTYPE html> 
<html>
<?php 
	$myaccount = isset( $_SESSION['siteuser_account'] ) ? $_SESSION['siteuser_account'] : "";
	$administrator = isset( $_SESSION['siteuser_group'] ) ? $_SESSION['siteuser_group'] : "";
    $usergrp = isset( $_SESSION['siteuser_group'] ) ? $_SESSION['siteuser_group'] : "user";
	$loggedin = isset( $_SESSION['siteuser_user'] ) ? $_SESSION['siteuser_user'] : ""; 
	 ?>
<head>
  <title><?php echo as_get_option('sitename') ?></title>
  <meta http-equiv="content-category" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="as_themes/css/styles.css" />

  <link rel="stylesheet" type="text/css" href="as_themes/css/style-tab.css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
	<script type="text/javascript" src="as_themes/js/jquery_1.5.2.js"></script>
	<script type="text/javascript" src="as_themes/js/sales.js"></script>
	<script type="text/javascript" src="as_themes/js/post_watermarkinput.js"></script>
	<!--<script type="text/javascript" src="as_themes/js/modernizr-1.5.min.js"></script>-->
</head>

<body>
  <div id="main">
  
    <header>
	  <div id="banner">
	    <div id="welcome">
	      <h3 class="site_name"><?php echo as_get_option('sitename') ?></h3>
	    </div><!--close welcome-->
	    <div id="welcome_slogan">
	      <br><p>
		  <?php if ($loggedin) echo "You are logged in as: ".$loggedin ?></p>
	    </div><!--close welcome_slogan-->			
	  </div><!--close banner-->
    </header>
	<nav>
	  <div id="menubar">
        <ul id="nav">
			<li><a href=".">Home</a></li>
          <?php 
		  if ($loggedin) {
			if ($administrator) { echo
			'<li><a href="index.php?action=dashboard">DashBoard</a></li>
			<li><a href="index.php?action=drug_all">Drugs</a></li>
			<li><a href="index.php?action=stock_all">Stock</a></li>
			<li><a href="index.php?action=sales_new">New Sales</a></li>
			<li><a href="index.php?action=sales_all">Sales</a></li>'; 
		
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
    </nav>
	


