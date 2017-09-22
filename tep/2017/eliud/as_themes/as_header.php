<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php 
	$myuserid = isset( $_SESSION['loggedin'] ) ? $_SESSION['loggedin'] : "";
	$myaccount = isset( $_SESSION['account'] ) ? $_SESSION['account'] : "";
	$mytype = isset( $_SESSION['type'] ) ? $_SESSION['type'] : "";
?>	
	<head>
		<title><?php echo as_get_option('sitename') ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link href="as_themes/style.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="as_themes/js/cufon-yui.js"></script>
		<script type="text/javascript" src="as_themes/js/arial.js"></script>
		<script type="text/javascript" src="as_themes/js/cuf_run.js"></script>
	</head>
	<body>
	<div id="main_container">
	  <div class="header"> 
		<div class="header_resize">
		  <div class="logo">
		  <div id="menu"> 
			<h1><a href="index.php"><span>Meet Your</span> Doctor<br />
			<small>An Online Consultative Platform for Modern Medical Hospital</small></a></h1>
		  </div>
		  <div class="menu_nav">
			<ul>
				<li><a href="index.php">Homepage</a></li>
				<?php if ($mytype == 'Doctor') { ?>
					<li><a href="sessions.php">Sessions</a></li>
					<li><a href="messages.php">Messages</a></li>
					<li><a href="patients.php">Patients</a></li>
					<li><a href="doctors.php">Doctors</a></li>
					<li><a href="admin.php">Admin</a></li>
					<li><a href="account.php?action=logout">Logout?</a></li>
				<?php } else if ($mytype == 'Patient') { ?>
					<li><a href="sessions.php">Sessions</a></li>
					<li><a href="messages.php">Messages</a></li>
					<li><a href="doctors.php">Doctors</a></li>
					<li><a href="account.php?action=logout">Logout?</a></li>
				<?php } else { ?>
					<li><a href="account.php?action=register">Register</a></li>
					<li><a href="contact.php">Contact us</a></li>
				<?php } ?>
			</ul>
		  </div>
		  <div class="clr"></div>
		</div>
	  </div>
