	<div id="footer">
		<div class="section">
			<div>
				<div class="aside">
					<div>
						<div>
							<b>Too <span>BUSY</span> to visit us?</b>
							<a href="index.php">Sign up for free</a>
							<p>and we&#39;ll help you out</p>
						</div>
					</div>
				</div>
				<div class="connect">
					<span>Follow Us</span>
					<ul>
						<li><a href="#" target="_blank" class="facebook">Facebook</a></li>
						<li><a href="#" target="_blank" class="twitter">Twitter</a></li>
						<li><a href="#" class="subscribe">Subscribe</a></li>
						<li><a href="#" target="_blank" class="flicker">Flicker</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div id="navigation">
			<div>
				<ul>
					<li class="first"><a href="index.php">Home</a></li>
					<?php 
						if ($myaccount){ echo				
							'<li><a href="index.php?action=patient_all">patients</a></li>
							<li><a href="index.php?action=user_all">Users</a></li> 
							<li><a href="index.php?action=options">Options</a></li>'; 
					
						}  else { echo
							'<li><a href="index.php?action=register">Register</a></li>
							<li><a href="index.php?action=forgot_password">Forgot Password</a></li>
							<li><a href="index.php?action=forgot_username">Forgot Username</a></li>';
						}
					?>
				</ul>
				<p>Copyright © 2017 <?php echo as_get_option('sitename') ?>  All rights reserved</p>
			</div>
		</div>
	</div>
</body>
</html>