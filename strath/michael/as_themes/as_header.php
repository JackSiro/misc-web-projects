<?php
/*
	File: as_themes/as_header.php
	Description: site header file used globally throughout the system

*/

	$sitename = as_get_option('as_sitename');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta charset="UTF-8" />
	<title><?php echo $pageTitle ?></title>
	<meta name="keywords" content="<?php echo $pageKeywords ?>">
	<meta name="description" content="<?php echo $pageDescription ?>">
	<meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1">
	
	<link rel="shortcut icon" href="<?php echo as_siteUrl ?>as_themes/images/favicon.png">
	<link rel="stylesheet" type="text/css" href="<?php echo as_siteUrl ?>as_themes/style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo as_siteUrl ?>as_themes/styles.css" />
	</head>
	<body>
	<div id="main_container">
	  <div id="header">
		<center>
		<div id="logo"> <a href="<?php echo as_menu_handler("index") ?>">
			<?php echo $sitename ?></a>
		</div>
		<div class="menu" align="center">
		  <ul>
			<li><a href="<?php echo as_menu_handler("index") ?>">Home</a></li>
			<?php if (as_user_is_logged()) { ?>
			<li><a href="#">Crime Categories</a>
			<ul>
				<li><a href="<?php echo as_menu_handler("category/new") ?>">Add a New Category</a></li>
				<li><a href="<?php echo as_menu_handler("category/all") ?>">View All Categories</a></li>
			  </ul>
			</li>
			<li><a href="#">Occurrence Book</a>
			<ul>
				<li><a href="<?php echo as_menu_handler("crime/new") ?>">Add a New Crime</a></li>
				<li><a href="<?php echo as_menu_handler("crime/all") ?>">View All Crimes</a></li>
			  </ul>
			</li>
			<li><a href="#">Lost Items</a>
			<ul>
				<li><a href="<?php echo as_menu_handler("item/new") ?>">Add a New Item</a></li>
				<li><a href="<?php echo as_menu_handler("item/all") ?>">View All Items</a></li>
			  </ul>
			</li>
			<li><a href="#">Station Officers</a>
			<ul>
				<li><a href="<?php echo as_menu_handler("officer/new") ?>">Add an Officer</a></li>
				<li><a href="<?php echo as_menu_handler("officer/all") ?>">View All Officers</a></li>
			  </ul>
			</li>
			<li><a href="#">User Account</a>
			<ul>
				<li><a href="<?php echo as_menu_handler("account/logout") ?>">Logout?</a></li>
			  </ul>
			</li>
			<?php }  else { ?>
			<li><a href="<?php echo as_menu_handler("account/login") ?>">Login</a></li> 
			<li><a href="<?php echo as_menu_handler("account/register") ?>">Register</a></li> 
			<li><a href="<?php echo as_menu_handler("account/passrecover") ?>">Lost Password</a></li>
		<?php } ?>
		  </ul>
		</div>
		</center>	
	  </div>