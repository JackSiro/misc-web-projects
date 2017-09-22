<!DOCTYPE html> 
<html>
<?php $myaccount = isset( $_SESSION['digilibacc'] ) ? $_SESSION['digilibacc'] : ""; ?>
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
	      <h3 class="sitename" style="color:#2a80b9;">
		  <img src="js_themes/book.png" class="my_logo"/>
		  <?php echo js_get_option('sitename') ?>
		  <img src="js_themes/buk.png" class="my_logo"/>
		  </h3>
	    </div>		
	  </div><!--close banner-->
    </header>
	
	<div class="outer_nav">
		<div class="inner_nav">
		  <div class="list-menu">
		  <ul>
			<li><a href=".">Home Page</a></li>
			<?php 
			$myaccount = isset( $_SESSION['digilibacc'] ) ? $_SESSION['digilibacc'] : "";
			if ($myaccount){ echo
			'<li><a href="index.php?js_page=books">Books</a></li>
			<li><a href="index.php?js_page=booksection">Sections</a></li>
			<li><a href="index.php?js_page=users">Students</a></li>
			<li><a href="index.php?js_page=options">Manage Site</a></li>
			<li><a href="index.php?js_page=logout">Sign out?</a></li>'; 
		
			}  else { echo
				'<li><a href="index.php?js_page=signup">Sign Up</a></li>
			<li><a href="index.php?js_page=manage_pass">Manage Password</a></li>
			<li><a href="index.php?js_page=manage_username">Manage Username</a></li>';
			}
				?>		
			</ul>                   
		 </div> 
		</div> 
	</div> 
	