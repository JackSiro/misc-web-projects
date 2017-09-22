  <?php include AS_THEME."as_header.php" ?>
    <div id="content">
		<div>
			<div id="account">
				<div>
					<form action="index.php?action=login" method="post" >
						<span>PLEASE SIGN IN TO CONTINUE</span>
						<table>
							<tr>
								<td><label for="name">Username:</label></td>
								<td><input type="text" name="username" placeholder="Enter your username" data-constraints="@Required @JustLetters"/></td>
							</tr>
							<tr>
								<td><label for="password">Password</label></td>
								<td><input type="password" name="password" id="password" placeholder="Enter your password" data-constraints="@Required"/></td>
							</tr>
							<tr>
								<td></td>
								<td class="rememberme"><label for="rememberme"><input type="checkbox" id="rememberme" /> Remember me on this computer</label></td>
							</tr>
						</table>
						<input type="submit" class="submitbtn" name="SignMeIn" value="Sign In" />
					</form>
				</div>
			</div>
		</div>
	</div>
    <?php include AS_THEME."as_footer.php" ?>
   