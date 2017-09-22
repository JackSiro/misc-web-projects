<?php 
	$myaccount = isset( $_SESSION['mysitei_account'] ) ? $_SESSION['mysitei_account'] : "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo as_get_option('sitename') ?></title>
    <meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="as_themes/css/style.css" />
</head>
<body>
	<div id="header">
		<div>
			<div>
				<div id="logo">
					<a href="index.php"><img src="as_media/logo.png" alt="Logo"/></a>
				</div>
				<div>
					<div>
						<a href="#">My Account</a>
						<a href="#">Help</a>
						<?php if (!$myaccount) echo '<a href="index.php" class="last">Sign in</a>'; 
						else echo '<a href="index.php?action=logout" class="last">Sign Out</a>';   ?>
					</div>
					<form action="#">
						<input type="text" id="search" maxlength="30" />
						<input type="submit" value="" id="searchbtn" />
					</form>
				</div>
			</div>
			<ul>
				<li><a href="index.php">Home</a></li>
				<?php 
				if ($myaccount){ echo				
					'<li><a href="index.php?action=patient_all">Patients</a></li>
					<li><a href="index.php?action=billing_all">Billing</a></li>
					<li><a href="index.php?action=user_all">Users</a></li> 
					<li><a href="index.php?action=options">Options</a></li>'; 
			
				}  else { echo
					'<li><a href="index.php?action=register">Register</a></li>
					<li><a href="index.php?action=forgot_password">Forgot Password</a></li>
					<li><a href="index.php?action=forgot_username">Forgot Username</a></li>';
				}
				?>
			</ul>
			<div class="section">
				<a href="index.php"><img src="as_media/medical-billing-banner.jpg" alt="Image"/></a>
			</div>
		</div>
	</div>