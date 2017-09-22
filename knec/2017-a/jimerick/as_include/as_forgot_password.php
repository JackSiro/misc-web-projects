  <?php include AS_THEME."as_header.php" ?>
    <div id="content">
		<div>
			<div id="account">
				<div>
					<form action="index.php?action=forgot_password" method="post">
					<span>PASSWORD RECOVERY</span>
					<span>Fill in the form below to get assistance on recovering your pasword</span>
					<table class="form_table">					
						<tr>
					<td>Your username</td>
					<td><input type="text" name="username" id="username" autocomplete="off" required autofocus  /></td>
						</tr>
						<tr><td>Your Email</td>
					</td><td>
					<input type="email" name="email" id="email" autocomplete="off" required autofocus />
					</td></tr>
						</table><br>
						<input type="submit" class="submitbtn" name="ForgotPassword" value="Proceed" >
					<br></form>
						</div>
			</div>
		</div>
	</div>
    <?php include AS_THEME."as_footer.php" ?>
   