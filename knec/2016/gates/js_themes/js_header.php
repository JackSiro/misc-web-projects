<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo js_get_option('sitename') ?></title>
<meta charset="utf-8">
<link rel="stylesheet" href="js_themes/css/reset.css" type="text/css" media="screen">
<link rel="stylesheet" href="js_themes/css/style.css" type="text/css" media="screen">
<link rel="stylesheet" href="js_themes/css/layout.css" type="text/css" media="screen">
<link href='http://fonts.googleapis.com/css?family=Adamina' rel='stylesheet' type='text/css'>
<script src="js_themes/js/jquery-1.6.3.min.js" type="text/javascript"></script>
<script src="js_themes/js/cufon-yui.js" type="text/javascript"></script>
<script src="js_themes/js/cufon-replace.js" type="text/javascript"></script>
<script src="js_themes/js/Lobster_13_400.font.js" type="text/javascript"></script>
<script src="js_themes/js/NewsGoth_BT_400.font.js" type="text/javascript"></script>
<script src="js_themes/js/FF-cash.js" type="text/javascript"></script>
<script src="js_themes/js/easyTooltip.js" type="text/javascript"></script>
<script src="js_themes/js/script.js" type="text/javascript"></script>
<script src="js_themes/js/bgSlider.js" type="text/javascript"></script>
<script src="js_themes/js/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="js_themes/js/tms-0.3.js" type="text/javascript"></script>
<script src="js_themes/js/tms_presets.js" type="text/javascript"></script>

</head>
<body id="page1">
<div id="bgSlider"></div>
<div class="bg_spinner"></div>
<div class="extra">
 
  <header>
    <div class="top-row">
      <div class="main">
        <div class="wrapper">
          <h1><a href="."><?php echo js_get_option('sitename') ?></a></h1>
          <ul class="pagination">
            <li class="current" style="display:none;"><a href="js_themes/images/bg-img1.jpg">1</a></li>
            <li style="display:none;"><a href="js_themes/images/bg-img2.jpg">2</a></li>
            <li style="display:none;"><a href="js_themes/images/bg-img3.jpg">3</a></li>
          </ul>
      </div>
    </div>
    <div class="menu-row">
      <div class="menu-border">
        <div class="main">
          <nav>
            <ul class="menu">
              <li><a href=".">Home</a></li>
		  
	<?php $myaccount = isset( $_SESSION['gates_account'] ) ? $_SESSION['gates_account'] : ""; ?> 
		<?php if (!$myaccount){	?>
			<li><a href="index.php?page=register">Register</a></li>		
			<li><a href="index.php?page=forgot_password">Forgot Password</a></li>		
			<li><a href="index.php?page=forgot_username ">Forgot Username</a></li>		
		<?php } else if ($myaccount){ ?>
			<li><a href="index.php?page=booking">Booking</a></li>
			<li><a href="index.php?page=ticket_all">Tickets</a></li>
			<li><a href="index.php?page=employee_all">Employees</a></li>
		<?php } ?>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
  