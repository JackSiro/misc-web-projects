<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<?php 
	$myaccount = isset( $_SESSION['siteuser_account'] ) ? $_SESSION['siteuser_account'] : "";
	$administrator = isset( $_SESSION['siteuser_group'] ) ? $_SESSION['siteuser_group'] : "";
    $usergrp = isset( $_SESSION['siteuser_group'] ) ? $_SESSION['siteuser_group'] : "user";
	$loggedin = isset( $_SESSION['siteuser_user'] ) ? $_SESSION['siteuser_user'] : "";
?>
<head>
	<meta charset="UTF-8">
	<title><?php echo as_get_option('as_sitename') ?></title>
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
					<a href="index.php?action=sales"><span>Sales</span></a>
				</li>
				<li class="menu_item_ii current">
					<a href="index.php?action=buyers"><span>Buyers</span></a>
				</li>
				<li class="menu_item_iii current">
					<a href="index.php?action=users"><span>Managers</span></a>
				</li>
				<li class="menu_item_iv current">
					<a href="index.php?action=options"><span>Options</span></a>
				</li>
				<?php } else { ?>
				<li class="menu_item_i current">
					<a href="index.php"><span>Home</span></a>
				</li>
				<li class="menu_item_ii current">
					<a href="index.php?action=signup"><span>Register</span></a>
				</li>
				<li class="menu_item_iii current">
					<a href="index.php?action=password"><span>Password?</span></a>
				</li>
				<li class="menu_item_iv current">
					<a href="index.php?action=username"><span>Username?</span></a>
				</li>
				<?php } ?>
			</ul>
		</div>
		<div>
			<div id="figure">
				<div>
					<h1>THE HIRE</h1>
					<h2>Purchase Center</h2>
				</div>
			</div>
		</div>
	</div>
	