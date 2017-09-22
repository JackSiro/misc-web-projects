<?php include AS_THEME."as_header.php"; ?>
    <div id="site_content">
      <div id="banner"></div>	
		<div id="content">
		  <h1>Sign Up your account now!!!</h1>
			<div class="main_content">
				<form role="form" method="post" name="Sign_MeUp" action="index.php?action=signup">
                <div class="form_settings">
				
				<p><span>First  Name:</span><input type="text" autocomplete="off" name="fname" required></p>
				<p><span>Second Name:</span><input type="text" autocomplete="off" name="surname" required></p>
				<p><span>Upload User Avatar (Optional):</span><input name="avatar" autocomplete="off" type="file" accept="image/*"></p>
                
				<p><span>Email Address:</span><input type="text" autocomplete="off" name="email" required></p>
				
				<p><span>Mobile (Optional):</span><input type="text" autocomplete="off" name="mobile"></p>
				
				<p><span>Preferred Username:</span><input type="text" autocomplete="off" name="username" required></p>
				
				<p><span>Preferred Password:</span><input type="password" autocomplete="off" name="password" required></p>
				
				<p><span>Confirm Password:</span><input type="password" autocomplete="off" name="passwordcon" required></p>
				
				<p style="padding-top: 15px"><span>&nbsp;</span><input type="submit" class="submit" name="SignMeUp" value="Sign Up"></p>
			  </form>
				
      </div>
    </div>
<?php include AS_THEME."as_footer.php" ?>
    
