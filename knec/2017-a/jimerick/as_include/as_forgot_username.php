  <?php include AS_THEME."as_header.php" ?>
    <div id="content">
		<div>
			<div id="account">
				<div>
					<form action="index.php?action=forgot_username" method="post">
					<span>USERNAME RECOVERY</span>
					<span>Fill in the form below to get assistance on recovering your username</span>
					<table class="form_table">
					
						<tr>
					<td>Your email</td>
					<td><input type="text" name="username" id="username" autocomplete="off" required autofocus  /></td>
				</tr>
				<tr><td>Your password</td>
					</td><td>
					<input type="password" name="password" id="password" autocomplete="off" required maxlength="20" />
					</td></tr>
						</table><br>
							<input type="submit" class="submitbtn" name="ForgotUsername" value="Proceed" >
					  <br></form>
						</div>
			</div>
		</div>
	</div>
    <?php include AS_THEME."as_footer.php" ?>
   