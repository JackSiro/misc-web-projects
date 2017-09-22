<!DOCTYPE HTML>
<?php 
	$myaccount = isset( $_SESSION['school_account'] ) ? $_SESSION['school_account'] : "";
	$sitename = as_get_option('sitename'); ?>
<html>
	<head>
		<title><?php echo $sitename ?></title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="as_themes/css/skel.css" />
		<link rel="stylesheet" href="as_themes/css/style.css" />
			
		<script src="as_themes/js/jquery.min.js"></script>
		<script src="as_themes/js/jquery.dropotron.min.js"></script>
		<script src="as_themes/js/skel.min.js"></script>
		<script src="as_themes/js/skel-layers.min.js"></script>
		<script src="as_themes/js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="as_themes/css/skel.css" />
			<link rel="stylesheet" href="as_themes/css/style.css" />
		</noscript>
	</head>
	<body class="homepage">
	<div id="header">
		<div class="container">
			<h1><a href="index.php" id="logo"><?php echo $sitename ?></a></h1>		
			<nav id="nav">
				<ul>
					<li><a href="index.php">Home</a></li>
				<?php
					if ($myaccount){
					/*echo
					'<li>
						<a href="index.php?action=group_all">Groups</a>
						<ul>
							<li><a href="index.php?action=group_all">All Groups</a></li>
							<li><a href="index.php?action=group_new">New Group</a></li>
						</ul>
					</li>';*/
					
					echo
					'<li>
						<a href="index.php?action=topic_all">Topics</a>
						<ul>
							<li><a href="index.php?action=topic_all">All Topics</a></li>
							<li><a href="index.php?action=topic_new">New Topic</a></li>
						</ul>
					</li>
					<li>
						<a href="index.php?action=student_all">Students</a>
						<ul>
							<li><a href="index.php?action=student_all">All Students</a></li>
							<li><a href="index.php?action=student_new">New Student</a></li>
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