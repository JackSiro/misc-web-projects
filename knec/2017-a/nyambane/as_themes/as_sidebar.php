		<div class="sidebar_content">
			<h2>Nafaka Stationery visitorlies</h2>
			<p>Welcome to <?php echo as_get_option('sitename') ?></p>
			<br><hr><br>
			<h2>Quick Navigation</h2>
		<ul id="sidebar_nav">
          <li><a href=".">Home Page</a></li>
		<?php 
		$myaccount = isset( $_SESSION['appsmata_account'] ) ? $_SESSION['appsmata_account'] : "";
		if ($myaccount){ echo
		'<li><a href="index.php?action=item_all">Stationery</a></li>
		<li><a href="index.php?action=type_all">Types</a></li>
		<li><a href="index.php?action=visitor_all">visitors</a></li>
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