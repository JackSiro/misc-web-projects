<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo as_get_option('sitename') ?></title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no"/>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="as_themes/css/grid.css">
    <link rel="stylesheet" href="as_themes/css/style.css">
    <link rel="stylesheet" href="as_themes/css/contact-form.css">

    <script src="as_themes/js/jquery.js"></script>
    <script src="as_themes/js/jquery-migrate-1.2.1.js"></script>
    <script src='as_themes/js/device.min.js'></script> 
</head>

<body>
<div class="page">
   
    <header>

        <div id="stuck_container" class="stuck_container">
            <div class="container">

                <div class="brand">
                    <h1 class="brand_name">
                        <a href=".">Mwangaza</a>
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
						
						'<li><a href="index.php?action=worker_all">Workers</a></li>
						<li><a href="index.php?action=user_all">Users</a></li> 
						<li><a href="index.php?action=options">Options</a></li>'; 
					
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