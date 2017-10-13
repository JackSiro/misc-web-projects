<!DOCTYPE html>
<html>
<?php 
	$myaccount = isset( $_SESSION['siteuser_account'] ) ? $_SESSION['siteuser_account'] : "";
	$administrator = isset( $_SESSION['siteuser_group'] ) ? $_SESSION['siteuser_group'] : "";
    $usergrp = isset( $_SESSION['siteuser_group'] ) ? $_SESSION['siteuser_group'] : "user";
	$loggedin = isset( $_SESSION['siteuser_user'] ) ? $_SESSION['siteuser_user'] : ""; 
	 ?>
<head>
	<meta charset="UTF-8">
	<title><?php echo as_get_option('sitename') ?></title>
	<link rel="stylesheet" type="text/css" href="as_themes/css/style.css">
	<script type="text/javascript" src="as_themes/js/jquery_1.5.2.js"></script>
	<script type="text/javascript" src="as_themes/js/sales.js"></script>
	<script type="text/javascript" src="as_themes/js/post_watermarkinput.js"></script>
</head>
<body>
	<div id="header">
		<div>
			<div id="logo">
				<a href="index.php"><img src="as_themes/images/logo.png" alt="Logo"></a>
			</div>
			<ul>
				
				
				<?php if ($loggedin) { ?>
				<li class="menu_item_i current">
					<a href="index.php?action=user_all"><span>Users</span></a>
				</li>
				<li class="menu_item_ii current">
					<a href="index.php?action=options"><span>Options</span></a>
				</li>
				<li class="menu_item_iii current">
					<a href="index.php?action=profile"><span>Profile</span></a>
				</li>
				<li class="menu_item_iv current">
					<a href="index.php?action=signout"><span>Signout</span></a>
				</li>
				<?php } else { ?>
				<li class="menu_item_i current">
					<a href="index.php"><span>Signin</span></a>
				</li>
				<li class="menu_item_ii current">
					<a href="index.php?action=signup"><span>Signup</span></a>
				</li>
				<li class="menu_item_iii current">
					<a href="index.php?action=forgot_password"><span>Password?</span></a>
				</li>
				<li class="menu_item_iv current">
					<a href="index.php?action=forgot_username"><span>Username?</span></a>
				</li>
				<?php } ?>
			</ul>
		</div>
		<div>
			<div id="figure">
				<div>
					<h1>HIRE</h1>
					<h2>Purchase</h2>
				</div>
			</div>
		</div>
	</div>
	