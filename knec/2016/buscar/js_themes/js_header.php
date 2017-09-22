<!DOCTYPE html> 
<html>
<?php $myaccount = isset( $_SESSION['buscar_account'] ) ? $_SESSION['buscar_account'] : ""; ?>
<head>
  <title><?php echo js_get_option('sitename') ?></title>
  <meta http-equiv="content-bus" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="js_themes/css/styles.css" />
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
	      <ul id="nav">
          <li><a href=".">Home</a></li>
		  <li><a href="index.php?page=booking">Booking</a></li>
		  
	<?php $myaccount = isset( $_SESSION['buscar_account'] ) ? $_SESSION['buscar_account'] : ""; ?> 
		<?php if (!$myaccount){	?>
		  <li><a href="index.php?page=register">Register</a></li>		
		<?php } else if ($myaccount){ ?>
		  <li><a href="index.php?page=ticket_all">Tickets</a></li>
		  <li><a href="index.php?page=customer_all">Customers</a></li>
		  <li><a href="index.php?page=bus_all">Buses</a></li>
		  <li><a href="index.php?page=place_all">Places</a></li>
		  <li><a href="index.php?page=employee_all">Employees</a></li>
		<?php } ?>
        </ul>
	    </div>			
	  </div><!--close banner-->
    </header>
	


