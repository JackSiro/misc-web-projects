		<div class="sidebar_content">
			<h2><?php echo js_get_option('sitename') ?></h2>
			<p>Welcome to <?php echo js_get_option('slogan') ?></p>
			<br><hr><br>
			<h2>Quick Navigation</h2>
		<ul id="sidebar_nav">
          <li><a href=".">Home Page</a></li>
		<?php 
		$myaccount = isset( $_SESSION['kawira_account'] ) ? $_SESSION['kawira_account'] : "";
		if ($myaccount){ echo
		'<li><a href="index.php?action=session_all">Sessions</a></li>
		<li><a href="index.php?action=parkingslot_all">Categories</a></li>
		<li><a href="index.php?action=customer_all">Customers</a></li>
		<li><a href="index.php?action=user_all">Users</a></li>
		<li><a href="index.php?action=options">Site Options</a></li>
		<li><a href="index.php?action=logout">Logout?</a></li>'; 
	
		}  else { echo
			'<li><a href="index.php?action=register">Register</a></li>
			<li><a href="index.php?action=forgot_password">Forgot Password</a></li>
			<li><a href="index.php?action=forgot_username">Forgot Username</a></li>';
		}
			?>		
        </ul>
		</div>