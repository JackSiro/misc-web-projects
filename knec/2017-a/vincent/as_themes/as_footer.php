	<div id="tooplate_footer">
	    <p><a href="index.html">Home</a> | <?php 
			if ($myaccount){ echo
			'<a href="index.php?action=customer_all">Customers</a> | <a href="index.php?action=class">Class</a> | <a href="index.php?action=user_all">Users</a> | <a href="index.php?action=options">Site Options</a> | <a href="index.php?action=logout">Logout?</a>'; 
		
			}  else { echo
				'<a href="index.php?action=register">Register</a> | <a href="index.php?action=forgot_password">Forgot Password</a> | <a href="index.php?action=forgot_username">Forgot Username</a>';
			}
			?></p>
        Copyright © 2017 <a href="<?php echo as_get_option('siteurl') ?>"><?php echo as_get_option('sitename') ?></a> 
	</div>
</div>
</body>
</html>