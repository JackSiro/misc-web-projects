<?php $myaccount = isset( $_SESSION['clients_account'] ) ? $_SESSION['clients_account'] : ""; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo as_get_option('sitename') ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="as_themes/styles.css" />
</head>

<body>
  <div id="wrapper">
      <div id="header">
          <div class="tr"><div class="br"><div class="bl">
              <h1><a href="index.php"><img src="as_themes/images/logo.gif" width="203" height="49" alt="SouthEnd" /></a></h1>
              <ul id="nav-top">
			  	<?php 
				$myaccount = isset( $_SESSION['clients_account'] ) ? $_SESSION['clients_account'] : "";
				$userid = isset( $_SESSION['clients_userid'] ) ? $_SESSION['clients_userid'] : "";
				if ($myaccount){ 
					if ($myaccount == 'manager') {
						echo
						'<li><a href="index.php?action=complaint_all">complaints</a></li>
						<li><a href="index.php?action=user_all">Users</a></li>
						<li><a href="index.php?action=options">Site Options</a></li>
						<li><a href="index.php?action=logout">Logout?</a></li>'; 
					}  else { echo			
						'<li><a href="index.php?action=complaint_new">New Complaint</a></li> 
						<li><a href="index.php?action=logout">Logout?</a></li>'; 
					}
				}  else { echo
					'<li><a href="index.php?action=register">Register</a></li>
					<li><a href="index.php?action=forgot_password">Forgot Password</a></li>
					<li><a href="index.php?action=forgot_username">Forgot Username</a></li>';
				}
				?>
              </ul><!-- end top-nav -->
              <ul id="nav-left">
                  <li><a href="#"><img src="as_themes/images/menu_1.gif" width="96" height="19" alt="Parteners" /></a></li>
                  <li><a href="#"><img src="as_themes/images/menu_2.gif" width="96" height="18" alt="Home and Office" /></a></li>
                  <li><a href="#"><img src="as_themes/images/menu_3.gif" width="96" height="19" alt="Small Business" /></a></li>
              </ul>
          </div></div></div><!-- end .corners -->
      </div><!-- end header -->
<div id="body"><div id="cap"></div>