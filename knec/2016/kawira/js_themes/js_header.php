<!DOCTYPE html> 
<html>
<?php $myaccount = isset( $_SESSION['kawira_account'] ) ? $_SESSION['kawira_account'] : ""; ?>
<head>
  <title><?php echo js_get_option('sitename') ?></title>
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="js_themes/css/styles.css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="js_themes/js/modernizr-1.5.min.js"></script>
</head>

<body>
  <div id="main">
  
    <header>
	  <div id="banner">
	    <div id="welcome">
	      <h3 class="site_name"><?php echo js_get_option('sitename') ?></h3>
	    </div>
	    <div id="welcome_slogan">
	      <h3><?php echo js_get_option('slogan') ?></h3>
	    </div></div>
    </header>
	
	<div id="menubar">
        <ul id="nav">
          <li><a href=".">Home</a></li>
		<?php 
		$myaccount = isset( $_SESSION['kawira_account'] ) ? $_SESSION['kawira_account'] : "";
		if ($myaccount){ echo
		'<li><a href="index.php?action=session_all">Sessions</a></li>
		<li><a href="index.php?action=parkingslot_all">Parking Slots</a></li>
		<li><a href="index.php?action=customer_all">Customers</a></li>
		<li><a href="index.php?action=user_all">Users</a></li>
		<li><a href="index.php?action=options">Site Options</a></li>
		<li><a href="index.php?action=logout">Logout?</a></li>'; 
	
		}  else { echo
			'<li><a href="index.php?action=register">Register</a></li>
			<li><a href="index.php?action=forgot_password">Forgot Password</a></li>
			<li><a href="index.php?action=forgot_username">Forgot Username</a></li>';
		}
			?>		
        </ul>
      </div>	
	


