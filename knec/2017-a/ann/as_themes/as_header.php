<?php 
	$myaccount = isset( $_SESSION['siteuser_account'] ) ? $_SESSION['siteuser_account'] : "";
	$administrator = isset( $_SESSION['siteuser_group'] ) ? $_SESSION['siteuser_group'] : "";
    $usergrp = isset( $_SESSION['siteuser_group'] ) ? $_SESSION['siteuser_group'] : "user";
	$loggedin = isset( $_SESSION['siteuser_user'] ) ? $_SESSION['siteuser_user'] : ""; 
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo as_get_option('sitename') ?></title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<link href="as_themes/tooplate_style.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="as_themes/css/coda-slider.css" type="text/css" charset="utf-8" />
		<script type="text/javascript" src="as_themes/js/jquery_1.5.2.js"></script>
		<script type="text/javascript" src="as_themes/js/sales.js"></script>
		<script type="text/javascript" src="as_themes/js/post_watermarkinput.js"></script>

	</head>
	<body>		
		<div id="slider">
			<div id="tooplate_wrapper">
				<div id="tooplate_sidebar">
				
					<div id="header">
						<h1><a href="index.php"><img src="as_themes/images/tooplate_logo.png" title="<?php echo as_get_option('sitename') ?>" alt="<?php echo as_get_option('sitename') ?>" /></a></h1>
					</div>    
					
					<div id="menu">
						<ul class="navigation">
							<li><a href="index.php" class="selected menu_01">Home</a></li>
							<li><a href="index.php?action=products" class="menu_02">Products</a></li>
							<li><a href="index.php?action=stocks" class="menu_03">Stocks</a></li>
							<li><a href="index.php?action=users" class="menu_04">Users</a></li>
							<li><a href="index.php?action=options" class="menu_05">Options</a></li>
						</ul>
					</div>
				</div>