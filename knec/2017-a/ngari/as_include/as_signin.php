<?php include AS_THEME."as_header.php" ?>
	<div id="site_content">
      <div>
        <h1>Sign In to Your Account to Continue</h1>
        <form action="index.php?action=login" method="post" >
			<div class="form_settings">
			<p><input type="text" name="username" id="username" placeholder="Enter your username" autocomplete="off" required autofocus maxlength="20" /></p>
			<p><input type="password" name="password" id="password" placeholder="Enter your password" autocomplete="off" required maxlength="20" /></p><br>
			<p><input type="submit" class="submit" name="SignMeIn" value="Sign In" /></p>
			</div>
		</form>
       
      </div>
</div>	
<?php include AS_THEME."as_footer.php" ?>
    
