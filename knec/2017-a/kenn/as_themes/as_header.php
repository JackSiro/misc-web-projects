<!DOCTYPE html>
<?php 
	$sitename = as_get_option('sitename');
	$myaccount = isset( $_SESSION['mysite_account'] ) ? $_SESSION['mysite_account'] : ""; 
?> 
<html class="no-js">
    <head>
		<title><?php echo $sitename ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="as_themes/css/bootstrap.min.css">
		<link rel="stylesheet" href="as_themes/css/font-awesome.css">
		<link rel="stylesheet" href="as_themes/css/animate.css">
		<link rel="stylesheet" href="as_themes/css/templatemo_misc.css">
		<link rel="stylesheet" href="as_themes/css/templatemo_style.css">

		<script src="as_themes/js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <div class="site-header">
            <div class="container">
                <div class="main-header">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-10">
                            <div class="logo">
                                <a href="#">
                                    <img src="as_media/logo.png" alt="<?php echo $sitename ?>" title="<?php echo $sitename ?>">
                                </a>
                            </div> <!-- /.logo -->
                        </div> <!-- /.col-md-4 -->
                        <div class="col-md-8 col-sm-6 col-xs-2">
                            <div class="main-menu">
                                <ul class="visible-lg visible-md">
                                    <li class="active"><a href="index.php">Home</a></li>
									  <li><a href="index.php?page=hotel_all">Hotels</a></li>
									  <li><a href="index.php?page=place_all">Places</a></li>
									<?php if ($myaccount){ ?>
									  <li><a href="index.php?page=ticket_all">Tickets</a></li>
									  <li><a href="index.php?page=employee_all">Employees</a></li>
									  <li><a href="index.php?page=logout">Logout?</a></li>
									<?php } ?>
                                </ul>
                                <a href="#" class="toggle-menu visible-sm visible-xs">
                                    <i class="fa fa-bars"></i>
                                </a>
                            </div> <!-- /.main-menu -->
                        </div> <!-- /.col-md-8 -->
                    </div> <!-- /.row -->
                </div> <!-- /.main-header -->
                <div class="row">
                    <div class="col-md-12 visible-sm visible-xs">
                        <div class="menu-responsive">
                            <ul>
                                <li class="active"><a href="index.php">Home</a></li>
									  <li><a href="index.php?page=hotel_all">Hotels</a></li>
									  <li><a href="index.php?page=place_all">Places</a></li>
									<?php if ($myaccount){ ?>
									  <li><a href="index.php?page=ticket_all">Tickets</a></li>
									  <li><a href="index.php?page=employee_all">Employees</a></li>
									  <li><a href="index.php?page=logout">Logout?</a></li>
									<?php } ?>
                            </ul>
                        </div> <!-- /.menu-responsive -->
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.site-header -->

