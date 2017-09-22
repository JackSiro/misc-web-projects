<!DOCTYPE HTML>
<?php 
	$myaccount = isset( $_SESSION['kmdnwdems_account'] ) ? $_SESSION['kmdnwdems_account'] : "";
	$sitename = as_get_option('sitename');
?>
<html>
	<head>
		<title><?php echo $sitename ?></title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		
		<link rel="stylesheet" href="as_themes/css/skel-noscript.css" />
		<link rel="stylesheet" href="as_themes/css/style.css" />
		<link rel="stylesheet" href="as_themes/css/style-desktop.css" />
		<script src="as_themes/js/skel.min.js"></script>
		<script src="as_themes/js/skel-panels.min.js"></script>
		<script src="as_themes/js/init.js"></script>
	</head>
	<body class="homepage">

	<!-- Header -->
		<div id="header">
			<div class="container">
					
				<!-- Logo -->
					<div id="logo">
						<a href="index.php"><img src="as_media/logo.png" height="60" /></a>
					</div>
				
				<!-- Nav -->
					<nav id="nav">
						<ul>
						<?php
							if ($myaccount){echo
							'<li>
								<a href="index.php?action=item_all">Items</a>
								<ul>
									<li><a href="index.php?action=item_all">All Items</a></li>
									<li><a href="index.php?action=item_ew">New Items</a></li>
								</ul>
							</li>
							<li>
								<a href="index.php?action=record_all">Records</a>
								<ul>
									<li><a href="index.php?action=record_all">All Records</a></li>
									<li><a href="index.php?action=record_new">New Record</a></li>
								</ul>
							</li>
							<li>
								<a href="index.php?action=user_all">Users</a>
								<ul>
									<li><a href="index.php?action=user_all">All Users</a></li>
									<li><a href="index.php?action=user_new">New User</a></li>
								</ul>
							</li>
							<li><a href="index.php?action=options">Site Options</a></li>
							<li><a href="index.php?action=logout">Logout?</a></li>'; 
						
							}  else { echo
								'<li><a href="index.php?action=register">Register</a></li>
								<li><a href="index.php?action=forgot_password">Forgot Password</a></li>
								<li><a href="index.php?action=forgot_username">Forgot Username</a></li>';
							}
							?>
						</ul>
					</nav>

			</div>
		</div>
		<div id="banner">
			<div class="container">
			</div>
		</div>
		