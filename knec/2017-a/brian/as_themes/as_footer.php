	<div id="content_footer"></div>
	
    <div id="footer">
	<a href=".">Home</a>
	<?php if ($loggedin) {
			if ($administrator) { echo
		' | <a href="index.php?action=user_all">Manage Users</a> 
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
	   ?>		
	<br>
      <p><?php echo as_get_option('sitename') ?></p>
    </div>
  </div>
</body>
</html>