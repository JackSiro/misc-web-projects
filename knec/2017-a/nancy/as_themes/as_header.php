<?php 
	$myaccount = isset( $_SESSION['siteuser_account'] ) ? $_SESSION['siteuser_account'] : "";
	$administrator = isset( $_SESSION['siteuser_group'] ) ? $_SESSION['siteuser_group'] : "";
    $usergrp = isset( $_SESSION['siteuser_group'] ) ? $_SESSION['siteuser_group'] : "user";
	$loggedin = isset( $_SESSION['siteuser_user'] ) ? $_SESSION['siteuser_user'] : ""; 
?>			
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo as_get_option('sitename') ?></title>
<link href="as_themes/tooplate_style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="as_themes/js/jquery_1.5.2.js"></script>
	<script type="text/javascript" src="as_themes/js/sales.js"></script>
	<script type="text/javascript" src="as_themes/js/post_watermarkinput.js"></script>
</head>
<body>

<div id="tooplate_header_wrapper">
	<div id="tooplate_header">

        <div id="tooplate_menu">
            <ul>
				<li><a href="index.php" class="current">Home</a></li>
				<li><a href="index.php?action=products">Products</a></li>
				<li><a href="index.php?action=stocks">Stocks</a></li>
				<li><a href="index.php?action=users">Users</a></li>
				<li><a href="index.php?action=options">Options</a></li>
            </ul>    	
        </div> <!-- end of tooplate_menu -->

    	<div id="site_title"><h1><a rel="nofollow" href="http://www.tooplate.com">Free Website Templates</a></h1></div>
        
    </div> <!-- end of header -->
</div> <!-- end of header wrapper -->
