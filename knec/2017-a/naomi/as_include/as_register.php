<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div>
		<br>
		  <h1>Register your account now!!!</h1> 
          
			<div class="main_content">
				<form role="form" method="post" name="PostStudent" action="index.php?action=register" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				
				<p><span>First  Name</span>
				<input type="text" autocomplete="off" name="fname"></p>
				<p><span>Second Name</span>
				<input type="text" autocomplete="off" name="surname"></p>
				<p><span>Upload Student Avatar</span>
				<input name="avatar" autocomplete="off" type="file" accept="image/*"></p>
                
				<p><span>Email Address</span>
				<input type="text" autocomplete="off" name="email"></p>
				
				<p><span>Mobile (Optional)</span>
				<input type="text" autocomplete="off" name="mobile"></p>
				
				<p><span>Preferred Username</span>
				<input type="text" autocomplete="off" name="username"></p>
				
				<p><span>Preferred Password</span>
				<input type="password" autocomplete="off" name="password"></p>
				
				<p><span>Confirm Password</span>
				<input type="password" autocomplete="off" name="passwordcon"></p>
				
				<p style="padding-top: 15px"><span>&nbsp;</span><input type="submit" id="submitBtn" name="Register" value="Register">
			  </p>		
			</form>
			</div>
      </div> 
	</div> 	
  </div>
<?php include AS_THEME."as_footer.php" ?>
    
