<footer>
	<a href=".">Home Page</a>
		<?php 
		$myaccount = isset( $_SESSION['doctors_account'] ) ? $_SESSION['doctors_account'] : "";
		if ($myaccount){ echo
		'| <a href="index.php?action=appointment_all">Appointments</a> 
		| <a href="index.php?action=category_all">Categories</a> 
		| <a href="index.php?action=doctor_all">Doctors</a> 
		| <a href="index.php?action=user_all">Users</a> 
		| <a href="index.php?action=options">Site Options</a> 
		| <a href="index.php?action=logout">Logout?</a>'; 
	
		}  else { echo
			'| <a href="index.php?action=register">Register</a> 
			| <a href="index.php?action=forgot_password">Forgot Password</a> 
			| <a href="index.php?action=forgot_username">Forgot Username</a>';
		}
			?>		
	 <hr>
	 <?php echo js_get_option('sitename') ?>
    </footer>

  <!-- javascript at the bottom for fast page loading -->
  <script type="text/javascript" src="js_themes/js/jquery.js"></script>
  <script type="text/javascript" src="js_themes/js/image_slide.js"></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js_themes/js/index.js"></script>

  
</body>
</html>