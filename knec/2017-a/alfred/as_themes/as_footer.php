<footer>
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
	<br><br>
	 <?php echo as_get_option('sitename') ?>
    </footer>

  <!-- javascript at the bottom for fast page loading -->
  <script type="text/javascript" src="as_themes/js/tabs.js"></script>
  <script type="text/javascript" src="as_themes/js/tabs_old.js"></script>
  <script type="text/javascript" src="as_themes/js/jquery.js"></script>
  <script type="text/javascript" src="as_themes/js/image_slide.js"></script>
  <script src="as_themes/js/index.js"></script>
  
</body>
</html>