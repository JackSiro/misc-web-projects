		<div class="sidebar_content">
		<div class="widghet">
			<h2>About Us</h2>
			<p>Welcome to <?php echo js_get_option('sitename') ?></p>
			<p><?php echo js_get_option('description') ?></p>
		</div>
		
		<div class="widghet">
			<h2>Quick Navigation</h2>
		<ul id="sidebar_nav">
          <li><a href=".">Home Page</a></li>
		<?php 
		$myaccount = isset( $_SESSION['glado_account'] ) ? $_SESSION['glado_account'] : "";
		if ($myaccount){ echo
		'<li><a href="index.php?action=item_all">Cereals</a></li>
		<li><a href="index.php?action=type_all">Types</a></li>
		<li><a href="index.php?action=supp_all">Suppliers</a></li>
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
		</div></div>