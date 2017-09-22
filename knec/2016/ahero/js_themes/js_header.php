<!DOCTYPE html> 
<html>
<?php $js_loggedacc = isset( $_SESSION['js_aheroacc'] ) ? $_SESSION['js_aheroacc'] : ""; ?>
<head>
  <title><?php echo js_get_option('sitename') ?></title>
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="js_themes/css/styles.css" />
  <link rel="stylesheet" type="text/css" href="js_themes/css/style-tab.css" />
  <script type="text/javascript" src="js_themes/js/modernizr-1.5.min.js"></script>
</head>

<body>
  <div id="main">
    <header>
	  <div id="banner">
	    <div id="welcome">
	      <h3><?php echo js_get_option('sitename') ?></h3>
	      <h2><?php echo js_get_option('slogan') ?></h2>
	    </div>		
	  </div><!--close banner-->
    </header>
	<div id="menu-outer">
		<div class="table">
			<ul id="horizontal-list">
				<li><a href=".">Home Page</a></li>
			<?php 
			$js_loggedacc = isset( $_SESSION['js_aherouser'] ) ? $_SESSION['js_aherouser'] : "";
			if ($js_loggedacc){ echo
			'<li><a href="index.php?js_pageaction=leaves">Leaves</a></li>
			<li><a href="index.php?js_pageaction=payslips">PaySlips</a></li>
			<li><a href="index.php?js_pageaction=departments">Departments</a></li>
			<li><a href="index.php?js_pageaction=employees">Employees</a></li>
			<li><a href="index.php?js_pageaction=options">Manage Site</a></li>
			<li><a href="index.php?js_pageaction=logout">Sign out?</a></li>'; 
		
			}  else { echo
				'<li><a href="index.php?js_pageaction=signup">Sign Up</a></li>
			<li><a href="index.php?js_pageaction=manage_pass">Manage Password</a></li>
			<li><a href="index.php?js_pageaction=manage_username">Manage Username</a></li>';
			}
				?>		
			</ul>
		</div>
	</div>
	