<div id="tooplate_bottom"></div>
</div> 
<div id="tooplate_footer">
<a href="index.php">Home</a>
				<?php 
				if ($loggedin) {
					if ($administrator) { echo
				' | <a href="index.php?action=profile">My Profile</a>
				| <a href="index.php?action=user_all">Manage Users</a> 
				| <a href="index.php?action=options">Manage Site</a>
				| <a href="index.php?action=signout">Sign Out</a>'; 
			
				}  else {
						echo ' | <a href="index.php?action=signout">Sign Out</a>';
					}
				  } else {
					  echo
							' | <a href="index.php?action=signup">Sign Up</a>
							| <a href="index.php?action=forgot_password">Forgot Password</a>
							| <a href="index.php?action=forgot_username">Forgot Username</a>';			  
				  }
			   ?><br>
&copy; Copyright 2012. <?php echo as_get_option('sitename') ?> All rights reserved.</div>
</body>
</html>