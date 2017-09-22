		<div class="sidebar_content">
			<h2>Nyakemincha Secondary School</h2>
			<p>Welcome to <?php echo js_get_option('sitename') ?></p>
			<br><hr><br>
			<h2>Quick Navigation</h2>
		<ul id="sidebar_nav">
          <li><a href=".">Home Page</a></li>
		<?php 
		$myaccount = isset( $_SESSION['nyakeminchasecondary_account'] ) ? $_SESSION['nyakeminchasecondary_account'] : "";
		if ($myaccount){ echo
		'<li><a href="index.php?action=class_all">Item</a></li>
		<li><a href="index.php?action=topic_all">Topics</a></li>
		<li><a href="index.php?action=field_all">Field</a></li>
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