  <?php include AS_THEME."as_header.php" ?>
    <div id="content">
		<div>
			<div id="account">
				<div>
					<form action="index.php?action=recover_password" method="post" >
						<span>RECOVER YOUR PASSWORD</span>					
						<fieldset>
						<table class="form_table" >
						<tr>
					<td>New Password</td>
					<td><input type="password" name="password" id="password" autocomplete="off" required autofocus  maxlength="20"/></td>
				</tr>
				<tr><td>Confirm Password</td>
			<td>
			<input type="password" name="passwordcon" id="passwordcon" autocomplete="off" required autofocus maxlength="20" />
			</td></tr>
					<tr><td></td><td>
					<input type="submit" class="submitbtn" name="RecoverPassword" value="Reset" /></td></tr>
					</table>
				</fieldset>
			   
			</form>
			</div>
			</div>
		</div>
	</div>
    <?php include AS_THEME."as_footer.php" ?>
   