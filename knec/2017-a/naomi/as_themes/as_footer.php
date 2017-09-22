			<div id="footer">
				<div class="container">

					<!-- Lists -->
						<div class="row">
							<div class="12u" style="text-align:center;">
							<a href="index.html">Home</a> | <?php 
							if ($myaccount){ echo
							'<a href="index.php?action=topic_all">Topics</a> | <a href="index.php?action=student_all">Students</a> | <a href="index.php?action=options">Site Options</a> | <a href="index.php?action=logout">Logout?</a>'; 
						
							}  else { echo
								'<a href="index.php?action=register">Register</a> | <a href="index.php?action=forgot_password">Forgot Password</a> | <a href="index.php?action=forgot_username">Forgot Username</a>';
							}
							?>
							</div>
						</div>

						<div class="copyright">
							<?php echo as_get_option('sitename') ?> <br> <?php echo as_get_option('slogan') ?>
						</div>

				</div>
			</div>

	</body>
</html>