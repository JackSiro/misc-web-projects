<footer>
	<a href=".">Home Page</a>
		<?php 
		$myaccount = isset( $_SESSION['clients_account'] ) ? $_SESSION['clients_account'] : "";
		if ($myaccount){ 
			if ($myaccount == 'manager') {
				echo
				'| <a href="index.php?action=complaint_all">complaints</a>
				| <a href="index.php?action=client_all">Clients</a>
				| <a href="index.php?action=user_all">Users</a> 
				| <a href="index.php?action=options">Site Options</a> 
				| <a href="index.php?action=logout">Logout?</a>';
			}  else { echo			
				'| <a href="index.php?action=complaint_new">New Complaint</a>
				| <a href="index.php?action=logout">Logout?</a>'; 
			}		
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
  <!--
  <script type="text/javascript" src="AS_THEMEs/js/jquery.js"></script>
  <script type="text/javascript" src="AS_THEMEs/js/image_slide.js"></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>-->

        <script src="AS_THEMEs/js/index.js"></script>

  
</body>
</html>