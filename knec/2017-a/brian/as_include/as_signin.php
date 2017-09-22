<?php include AS_THEME."as_header.php" ?>
    <div id="site_content">
      <div id="banner"></div>	
		<div id="content">
			<h1>Sign in to Continue</h1>
			<form action="index.php?action=signin" method="post" >
				<div class="form_settings">
					<p><span>Username</span><input class="contact" type="text" name="username" value="" /></p>
					<p><span>Password</span><input class="contact" type="password" name="password" value="" /></p>
					<p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="SignMeIn" value="Sign In" /></p>
				</div>
			</form>
      </div>
    </div>
  <?php include AS_THEME."as_footer.php" ?>
    
