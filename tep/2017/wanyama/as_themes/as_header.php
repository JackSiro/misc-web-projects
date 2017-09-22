<!DOCTYPE HTML>
<?php 
	$myaccount = isset( $_SESSION['school_account'] ) ? $_SESSION['school_account'] : "";
	$sitename = as_get_option('sitename'); ?>
<html>
<head>
	<title><?php echo $sitename ?></title>
	<meta http-equiv="content-type" content="text/html; charset=windows-1252" />
	<link rel="stylesheet" type="text/css" href="as_themes/style/style.css" />
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <h1><a href="index.php">KTTC <span class="logo_colour">Certificates</span></a></h1>
          <h2><?php echo $sitename ?></h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <li class="selected"><a href="index.php">Home Page</a></li>
			<?php
			if ($myaccount){ echo
			'<li><a href="index.php?action=certificate_all">Certificates</a></li>
			<li><a href="index.php?action=student_all">Students</a></li>
			<li><a href="index.php?action=class_all">Classes</a></li>
			<li><a href="index.php?action=admin_all">Admin</a></li>'; 
		
			}  else { echo
				'<li><a href="index.php?action=register">Register</a></li>';
			}
			?>
        </ul>
      </div>
    </div>