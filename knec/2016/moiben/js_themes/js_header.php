<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php $myaccount = isset( $_SESSION['account'] ) ? $_SESSION['account'] : ""; ?>

<head>
<title><?php echo js_get_option('sitename') ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="js_themes/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js_themes/js/cufon-yui.js"></script>
<script type="text/javascript" src="js_themes/js/arial.js"></script>
<script type="text/javascript" src="js_themes/js/cuf_run.js"></script>
</head>
<body>
<div id="main_container">

  <div class="header"> 
    <div class="header_resize">
      <div class="logo">
      <div id="menu"> 
		<h1><a href="index.php"><small>Clinical Management System</small><br />
          <span>MOIBEN OUTPATIENT</span> CLINIC</a></h1>
      </div>
      <div class="menu_nav">
        <ul>
	  <li><a href="index.php">HOME</a></li>
          <li><a href="schedule.php">TIME SCHEDULER</a></li>
          <li><a href="Doctor.php">DOCTOR </a></li>
          <li><a href="staff.php">CLINIC STAFF </a></li>
          <li><a href="contact.php">PATIENT FEEDS</a></li>
		  <?php
			if ($myaccount == 'Doctor')
				echo '<li><a href="admin.php">ADMINSTRATOR</a></li>';
		  ?>
        </ul>
      </div>
      <div class="clr"></div><hr>
    </div>
  </div>
