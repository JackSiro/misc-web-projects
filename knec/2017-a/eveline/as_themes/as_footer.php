	<div id="tooplate_footer">
	<a href=".">Home</a>		
    <?php if ($loggedin) {
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
	   ?>	
	
	<br /><br />    
    Copyright © 2017 <a href="#"><?php echo $sitename ?></a>    
	</div> 
</body>
</html>