	<div id="footer">
      <p><a href="index.html">Home</a> | <?php 
			if ($myaccount){ echo
			'<a href="index.php?action=student_all">Students</a> | <a href="index.php?action=class">Class</a> | <a href="index.php?action=teacher_all">Teachers</a> | <a href="index.php?action=options">Site Options</a> | <a href="index.php?action=logout">Logout?</a>'; 
		
			}  else { echo
				'<a href="index.php?action=register">Register</a> | <a href="index.php?action=forgot_password">Forgot Password</a> | <a href="index.php?action=forgot_username">Forgot Username</a>';
			}
			?></p>
	<p><?php echo as_get_option('sitename') ?> <br> <?php echo as_get_option('slogan') ?></p>
    </div>
  </div>
</body>
</html>
