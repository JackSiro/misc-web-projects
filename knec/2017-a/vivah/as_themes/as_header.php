<?php
	$sitename = as_get_option('sitename');
	$sitedescription = as_get_option('description');
	
	$myaccount = isset( $_SESSION['sitefacilitator_account'] ) ? $_SESSION['sitefacilitator_account'] : "";
	$administrator = isset( $_SESSION['sitefacilitator_group'] ) ? $_SESSION['sitefacilitator_group'] : "";
    $facilitatorgrp = isset( $_SESSION['sitefacilitator_group'] ) ? $_SESSION['sitefacilitator_group'] : "facilitator";
	$loggedin = isset( $_SESSION['sitefacilitator_facilitator'] ) ? $_SESSION['sitefacilitator_facilitator'] : ""; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $sitename ?></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="as_themes/tooplate_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="as_themes/css/coda-slider.css" type="text/css" charset="utf-8" />

<script src="as_themes/js/jquery-1.2.6.js" type="text/javascript"></script>
<script src="as_themes/js/jquery.scrollTo-1.3.3.js" type="text/javascript"></script>
<script src="as_themes/js/jquery.localscroll-1.2.5.js" type="text/javascript" charset="utf-8"></script>
<script src="as_themes/js/jquery.serialScroll-1.2.1.js" type="text/javascript" charset="utf-8"></script>
<script src="as_themes/js/coda-slider.js" type="text/javascript" charset="utf-8"></script>
<script src="as_themes/js/jquery.easing.1.3.js" type="text/javascript" charset="utf-8"></script>

</head>
<body>
	
<div id="slider">
   	<div id="tooplate_wrapper">
    	
        <div id="tooplate_header">
            <div id="site_title"><h1><a href="index.php">Vera RC</a></h1></div>
            
            <div id="menu">
                <ul class="navigation">
                    <?php 
						  if ($loggedin) {
							if ($administrator) { echo
							'<li><a href="index.php?action=dashboard">DashBoard</a></li>
							<li><a href="index.php?action=beneficiary_all">Beneficiaries</a></li>
							<li><a href="index.php?action=resource_all">Resources</a></li>
							<!--<li><a href="index.php?action=group_all">Groups</a></li>-->
							<li><a href="index.php?action=options">Options</a></li>
							<li><a href="index.php?action=logout">Logout?</a></li>'; 
						
							}  else {
								echo '<li><a href="index.php?action=signout">Sign Out</a></li>';
							}
						  } else {
							  echo
									'<li><a href="index.php?action=signup">Sign Up</a></li>
									<li><a href="index.php?action=forgot_password">Lost Password</a></li>
									<li><a href="index.php?action=forgot_username">Lost Username</a></li>';					  
							}
					?>	
                </ul>    	
            </div>
            <div class="cleaner"></div>
        </div> 
    