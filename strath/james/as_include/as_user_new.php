<?php include AS_THEME."as_header.php"; ?>
	<div id="tooplate_content">	

	  <div id="content">
        <div>
		<br>
		  <h1>Add a Official</h1> 
          
			<div class="main_content">
				<form role="form" method="post" name="PostOfficial" action="index.php?action=user_new" enctype="multipart/form-data" >
                <p><span>First  Name</span>
				<input type="text" autocomplete="off" name="fname"></p>
				<p><span>Second Name</span>
				<input type="text" autocomplete="off" name="surname"></p>
				
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
				
				<p style="padding-top: 15px"><span><input type="submit" id="submitBtn" name="AddOfficial" value="Save & Add"></span><input type="submit" id="submitBtn" name="AddClose" value="Save & Close"></p>
		
			</form>
			</div>
      </div> 
	</div> 	
  </div>
<?php include AS_THEME."as_footer.php" ?>
    
