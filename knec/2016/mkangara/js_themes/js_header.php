<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo js_get_option('sitename') ?></title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no"/>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/contact-form.css">

    <script src="js/jquery.js"></script>
    <script src="js/jquery-migrate-1.2.1.js"></script>
    <script src='js/device.min.js'></script> 
</head>

<body>
<div class="page">
   
    <header>

        <div id="stuck_container" class="stuck_container">
            <div class="container">

                <div class="brand">
                    <h1 class="brand_name">
                        <a href=".">Mkangara</a>
                    </h1>
                </div>

                <nav class="nav">
                    <ul class="sf-menu">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <?php 
						$myaccount = isset( $_SESSION['mysitei_account'] ) ? $_SESSION['mysitei_account'] : "";
						if ($myaccount){ echo
						
						'<li><a href="index.php?action=product_all">Products</a></li>
						<li><a href="index.php?action=request_all">Requests</a></li>
						<li><a href="index.php?action=invoice_all">Invoice</a></li>
						<li><a href="index.php?action=schedule_all">Schedules</a></li>
						<li><a href="#">More</a><ul>
							<li><a href="index.php?action=payment_all">Payments</a></li>
							<li><a href="index.php?action=user_all">Users</a></li>
							<li><a href="index.php?action=options">Site Options</a></li>
							<li><a href="index.php?action=logout">Logout?</a></li>
						</ul></li>'; 
					
						}  else { echo
							'<li><a href="index.php?action=register">Register</a></li>
							<li><a href="index.php?action=forgot_password">Forgot Password</a></li>
							<li><a href="index.php?action=forgot_username">Forgot Username</a></li>';
						}
							?>	
                    </ul>
                </nav>
            </div>
        </div>

    </header>
    
    <main>
        <section class="parallax parallax1" data-parallax-speed="-0.4">