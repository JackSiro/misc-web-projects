<!DOCTYPE html> 
<html>
<?php $myaccount = isset( $_SESSION['clients_account'] ) ? $_SESSION['clients_account'] : ""; ?>
<head>
	<title><?php echo as_get_option('sitename') ?></title>
	<meta http-equiv="content-type" content="text/html; charset=windows-1252" />
	<link rel="stylesheet" type="text/css" href="AS_THEMEs/css/styles.css" />
	<script type="text/javascript" src="AS_THEMEs/js/jquery_1.5.2.js"></script>
	<script type="text/javascript" src="AS_THEMEs/js/complaint.js"></script>
	<script type="text/javascript" src="AS_THEMEs/js/post_watermarkinput.js"></script>

</head>

<body>
  <div id="main">
  
    <header>
	  <div id="banner">
	    <div id="welcome">
	      <h3 class="site_name"><?php echo as_get_option('sitename') ?></h3>
	    </div>
	    <div id="welcome_slogan">
	      <h3><?php echo as_get_option('slogan') ?></h3>
	    </div></div>
    </header>
	
	<div id="menubar">
        <ul id="nav">
          <li><a href=".">Home</a></li>
		<?php 
		$myaccount = isset( $_SESSION['clients_account'] ) ? $_SESSION['clients_account'] : "";
		$userid = isset( $_SESSION['clients_userid'] ) ? $_SESSION['clients_userid'] : "";
		if ($myaccount){ 
			if ($myaccount == 'manager') {
				echo
				'<li><a href="index.php?action=complaint_all">complaints</a></li>
				<li><a href="index.php?action=client_all">Clients</a></li>
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
        </ul>
      </div>	
	


