<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<title><?php echo js_get_option('sitename') ?></title>
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="">
		<meta name="description" content="">
		<link rel="icon" type="image/png" href="images/favicon.png">
		<link rel="stylesheet" href="js_themes/css/bootstrap.min.css">
		<link rel="stylesheet" href="js_themes/css/font-awesome.min.css">
		<link rel="stylesheet" href="js_themes/css/animate.min.css">
		<link rel="stylesheet" href="js_themes/css/templatemo-style.css">
		<link rel="stylesheet" href="js_themes/css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	</head>
	
	<body data-spy="scroll" data-target=".navbar-collapse">

		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="row">
					<div class="navbar-header">
						<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="icon icon-bar"></span>
							<span class="icon icon-bar"></span>
							<span class="icon icon-bar"></span>
						</button>
						<a href="." style="width:100px;text-decoration:none;color:#2A80B9;"><h3>ONLINE PROPERTY</h3></a>
					</div>
					<div class="collapse navbar-collapse">
							<ul class="nav navbar-nav navbar-right">
								<li><a href="index.html" >HOME</a></li>
								<?php 
									$myaccount = isset( $_SESSION['property_account'] ) ? $_SESSION['property_account'] : "";
									if ($myaccount){ echo
									'<li><a href="index.php?action=tenants">TENANTS</a></li>
									<li><a href="index.php?action=houses">HOUSES</a></li>
									<li><a href="index.php?action=users">MANAGERS</a></li>
									<li><a href="index.php?action=options">OPTIONS</a></li>
									<li><a href="index.php?action=logout">LOGOUT?</a></li>'; 
								
									}  else { echo
										'<li><a href="index.php?action=register">REGISTER</a></li>
									<li><a href="index.php?action=forgot_password">FORGOT PASSWORD</a></li>
									<li><a href="index.php?action=forgot_username">FORGOT USERNAME</a></li>';
									}
										?>		
							</ul>
						</div>
				</div>				
			</div>
		</nav>
	