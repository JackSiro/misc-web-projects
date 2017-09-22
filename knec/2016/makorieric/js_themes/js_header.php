<!DOCTYPE html> 
<html>
<?php $myaccount = isset( $_SESSION['nyakeminchasecondary_account'] ) ? $_SESSION['nyakeminchasecondary_account'] : ""; ?>
<head>
  <title><?php echo js_get_option('sitename') ?></title>
  <meta http-equiv="content-class" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" class="text/css" href="js_themes/css/styles.css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="js_themes/js/modernizr-1.5.min.js"></script>
</head>

<body>
  <div id="main">
  
    <header>
	  <div id="banner">
	    <div id="welcome">
	      <h3 class="site_name"><?php echo js_get_option('sitename') ?></h3>
	    </div><!--close welcome-->
	    <div id="welcome_slogan">
	      <h3>"<?php echo js_get_option('slogan') ?>"</h3>
	    </div><!--close welcome_slogan-->			
	  </div><!--close banner-->
    </header>
	<nav>
	  <div id="menubar">
        <ul id="nav">
          <li><a href=".">Home</a></li>
		<?php 
		$myaccount = isset( $_SESSION['nyakeminchasecondary_account'] ) ? $_SESSION['nyakeminchasecondary_account'] : "";
		if ($myaccount){ echo
		'<li><a href="index.php?action=class_all">Class</a></li>
		<li><a href="index.php?action=topic_all">Topic</a></li>
		<li><a href="index.php?action=field_all">Field</a></li>
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
    </nav>


