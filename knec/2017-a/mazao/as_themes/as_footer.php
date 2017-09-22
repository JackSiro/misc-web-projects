<footer>
	<a href=".">Home Page</a>
		<?php 
		$myaccount = isset( $_SESSION['nafaka_account'] ) ? $_SESSION['nafaka_account'] : "";
		if ($myaccount){ echo
		'| <a href="index.php?action=item_all">Cereals</a> 
		| <a href="index.php?action=type_all">Types</a> 
		| <a href="index.php?action=supp_all">Suppliers</a> 
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
	 <?php echo as_get_option('sitename') ?>
    </footer>

  <!-- javascript at the bottom for fast page loading -->
  <script type="text/javascript" src="as_themes/js/jquery.js"></script>
  <script type="text/javascript" src="as_themes/js/image_slide.js"></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="as_themes/js/index.js"></script>

  
</body>
</html>