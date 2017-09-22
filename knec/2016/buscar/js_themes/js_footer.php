<footer>
<?php 
		$myaccount = isset( $_SESSION['buscar_account'] ) ? $_SESSION['buscar_account'] : "";
		?>
	<br><a href=".">Home Page</a> 
	<?php if (!$myaccount){	?> 
		| <a href="index.php?page=login">Login</a>
		| <a href="index.php?page=register">Register</a>
		| <a href="index.php?page=forgot_password">Forgot Password</a>
		| <a href="index.php?page=forgot_username">Forgot Username</a>
		
	<?php } else if ($myaccount){ ?>
		| <a href="index.php?page=options">Site Options</a>
		| <a href="index.php?page=logout">Logout?</a>
	<?php } ?>
	<br><br>	
	 <?php echo js_get_option('sitename') ?><br>
    </footer>

  <!-- javascript at the bottom for fast page loading -->
  <script type="text/javascript" src="js_themes/js/jquery.js"></script>
  <script type="text/javascript" src="js_themes/js/image_slide.js"></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js_themes/js/index.js"></script>

  
</body>
</html>