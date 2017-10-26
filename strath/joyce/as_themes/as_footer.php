	<div id="footer">
      <p><a href="index.html">Home</a> | <?php 
			if ($myaccount){ echo
			'<a href="index.php?action=voter_all">Voters</a> | <a href="index.php?action=class">Classes</a> | <a href="index.php?action=official_all">Officials</a> | <a href="index.php?action=options">Site Options</a> | <a href="index.php?action=logout">Logout?</a>'; 
		
			}  else { echo
				'<a href="index.php?action=register">Register</a> | <a href="index.php?action=forgot_password">Forgot Password</a> | <a href="index.php?action=forgot_username">Forgot Username</a>';
			}
			?></p>
	<p><?php echo $sitename ?> <br> <?php echo as_get_option('slogan') ?></p>
    </div>
  </div>
</body>
</html>
