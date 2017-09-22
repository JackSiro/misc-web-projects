<?php  include 'header.php'; ?>
			<div id="lower-section" class="rounded">
<?php  include 'connect.php'; 
	if (!$connect_state) echo $output_error;
	else { ?>
			<form action="signin.php" method="post">
                <h2>Please Sign in to your account</h2>
				<table>
				 <tr><td>First Name:</td><td><input type="text" name="fname" autocomplete="off" required></td></tr>
				 <tr><td>Last Name:</td><td><input type="text" name="surname" autocomplete="off" required></td></tr>
				 <tr><td>Username:</td><td><input type="text" name="username" autocomplete="off" required></td></tr>
				 <tr><td>Email Address:</td><td><input type="text" name="email" autocomplete="off" required></td></tr>
				 <tr><td>Password:</td><td><input type="password" name="password" autocomplete="off" min="8" required></td></tr> 
				 </table><br>
              <center><input type="submit" class="submit_this" name="SigninNow" value="Sign Now"></center>
			  <br>
			</form>
		<?php } ?>
		</div>
<?php  include 'footer.php'; ?>