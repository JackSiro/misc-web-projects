<?php 
	$myaccount = isset( $_SESSION['voting_account'] ) ? $_SESSION['voting_account'] : "";
	$myuserid = isset( $_SESSION['voting_userid'] ) ? $_SESSION['voting_userid'] : "";
	$sitename = as_get_option('as_sitename');
?>
<!DOCTYPE HTML>
<html>
<head>
	<title><?php echo $sitename ?></title>
	<meta http-equiv="content-type" content="text/html; charset=windows-1252" />
	<link rel="stylesheet" type="text/css" href="as_themes/css/style.css" />
	<script src="as_themes/js/jquery-1.11.3.min.js" type="text/javascript"></script>
	<script src="as_themes/js/processor.js" type="text/javascript"></script>
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="index.php"><?php echo $sitename ?></a></h1>
          <h2><?php echo as_get_option('as_slogan') ?></h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
			<?php if ($myaccount == 5){ ?>
			<li><a href="index.php">DashBoard</a></li>
			<li><a href="index.php?action=class_all">Classes</a></li>
			<li><a href="index.php?action=voter_all">Voters</a></li>
			<li><a href="index.php?action=elecpost_all">Posts</a></li>
			<li><a href="index.php?action=candidate_all">Candidates</a></li>
			<li><a href="index.php?action=official_all">Officials</a></li>
			<li><a href="index.php?action=logout">Logout?</a></li>
			
			<?php } else if ($myaccount == 3){ ?>
			<li><a href="index.php">DashBoard</a></li>
			<li><a href="index.php?action=vote_now">Vote Now</a></li>
			<li><a href="index.php?action=logout">Logout?</a></li>
			<?php }  else { ?>
			<li><a href="index.php">Home Page</a></li>
			<li><a href="index.php?action=register">Register</a></li>
			<li><a href="index.php?action=forgot_password">Forgot Password</a></li>
			<li><a href="index.php?action=forgot_username">Forgot Username</a></li>
		<?php } ?>
        </ul>
      </div>
    </div>