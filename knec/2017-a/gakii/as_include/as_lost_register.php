<?php include AS_THEME."as_header.php"; ?>
<div id="site_content">    <h1>Register your account now!!!</h1> 
    <form role="form" method="post" name="PostUser" action="index.php?action=register" method="post" >
		<div class="form_settings">
                <div class="form_settings">
				
			<p><span>First  Name</span><input type="text" autocomplete="off" name="fname"></p>
			<p><span>Second Name</span><input type="text" autocomplete="off" name="surname"></p>
			<p><span>Upload User Avatar</span><input name="avatar" autocomplete="off" type="file" accept="image/*"></p>
                
			<p><span>Email Address</span><input type="text" autocomplete="off" name="email"></p>
				
			<p><span>Mobile (Optional)</span><input type="text" autocomplete="off" name="mobile"></p>
				
			<p><span>Preferred Username</span><input type="text" autocomplete="off" name="username"></p>
				
			<p><span>Preferred Password</span><input type="password" autocomplete="off" name="password"></p>
				
			<p><span>Confirm Password</span><input type="password" autocomplete="off" name="passwordcon"></p>
				
			<br><p><input type="submit" class="submit_this" name="Register" value="Register">
			</p></div></form>
			</div>
<?php include AS_THEME."as_footer.php" ?>
    
