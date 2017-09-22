<?php 
	$myaccount = isset( $_SESSION['school_account'] ) ? $_SESSION['school_account'] : "";
	$sitename = as_get_option('sitename');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $sitename ?></title>
<link href="as_themes/css/tooplate_style.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div id="tooplate_wrapper"><div id="top"></div>

	<div id="templatmeo_header">    	
        <div id="social_box">
        	<?php
			if ($myaccount){ echo
			'<a href="index.php?action=options">Site Options</a>
			<a href="index.php?action=logout">Logout?</a>'; 
		
			}  else { echo
				'<a href="index.php?action=register">Register</a>
				<a href="index.php?action=forgot_password">Forgot Password</a>
				<a href="index.php?action=forgot_username">Forgot Username</a>';
			}
			?>
        </div>
        
        <div id="site_title">
			<h1><a href="index.php"><?php echo $sitename ?></a></h1> 
        </div>
        
        <div id="tooplate_menu">
            <ul>
                <li class="selected"><a href="index.php">Home Page</a></li>
			<?php
			if ($myaccount){ echo
			'<li><a href="index.php?action=customer_all">Customers</a></li>
			<li><a href="index.php?action=salesitem_all">Items</a></li>
			<li><a href="index.php?action=user_all">Users</a></li>';
		
			} 
			?>
            </ul>    	
        </div> <!-- end of tooplate_menu -->
        
    </div>