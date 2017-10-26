<!DOCTYPE HTML>
<?php 
	$myaccount = isset( $_SESSION['voting_account'] ) ? $_SESSION['voting_account'] : "";
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
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="index.php">KTTC <span class="logo_colour">Elections</span></a></h1>
          <h2><?php echo $sitename ?></h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <li class="selected"><a href="index.php">Home Page</a></li>
			<?php
			if ($myaccount){ echo
			'<li><a href="index.php?action=class_all">Classes</a></li>
			<li><a href="index.php?action=voter_all">Voters</a></li>
			<li><a href="index.php?action=elecpost_all">Posts</a></li>
			<li><a href="index.php?action=candidate_all">Candidates</a></li>
			<li><a href="index.php?action=official_all">Officials</a></li>
			<li><a href="index.php?action=options">Site Options</a></li>
			<li><a href="index.php?action=logout">Logout?</a></li>'; 
		
			}  else { echo
				'<li><a href="index.php?action=register">Register</a></li>
				<li><a href="index.php?action=forgot_password">Forgot Password</a></li>
				<li><a href="index.php?action=forgot_username">Forgot Username</a></li>';
			}
			?>
        </ul>
      </div>
    </div>