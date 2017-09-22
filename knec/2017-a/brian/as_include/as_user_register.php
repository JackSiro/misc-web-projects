<?php include AS_THEME."as_header.php"; ?>
    <div id="site_content">
      <div id="banner"></div>	
		<div id="content">
		  <h1>Sign Up your account now!!!</h1>
			<div class="main_content">
				<form role="form" method="post" name="DrugUser" action="index.php?action=signup">
                <div class="form_settings">
				
				<p><span>First  Name:</span><input type="text" autocomplete="off" name="fname"></p>
				<p><span>Second Name:</span><input type="text" autocomplete="off" name="surname"></p>                
				<p><span>Email Address:</span><input type="text" autocomplete="off" name="email"></p>
				
				<p><span>Mobile (Optional):</span><input type="text" autocomplete="off" name="mobile"></p>
				
				<p><span>Preferred Username:</span><input type="text" autocomplete="off" name="username"></p>
				
				<p><span>Preferred Password:</span><input type="password" autocomplete="off" name="password"></p>
				
				<p><span>Confirm Password:</span><input type="password" autocomplete="off" name="passwordcon"></p>
				
				<p style="padding-top: 15px"><span>&nbsp;</span><input type="submit" class="submit" name="Sign Up" value="Sign Up"></p>
			  </form>
				
      </div>
    </div>
<?php include AS_THEME."as_footer.php" ?>
    
