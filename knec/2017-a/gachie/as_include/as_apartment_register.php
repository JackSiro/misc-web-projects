<?php include AS_THEME."as_header.php"; ?>
    <div id="tooplate_main">                            <h1>Register your account now!!!</h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" name="PostUser" action="index.php?action=register" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">for="text">First  Name:</label> <input type="text" autocomplete="off" name="fname">
				<label for="text">Second Name:</label> <input type="text" autocomplete="off" name="surname">
				<label for="text">Upload User Avatar:</label> <input name="avatar" autocomplete="off" type="file" accept="image/*">
                
				<label for="text">Email Address:</label> <input type="text" autocomplete="off" name="email">for="text">Mobile (Optional):</label> <input type="text" autocomplete="off" name="mobile">for="text">Preferred Username:</label> <input type="text" autocomplete="off" name="username">for="text">Preferred Password:</label> <input type="password" autocomplete="off" name="password">for="text">Confirm Password:</label> <input type="password" autocomplete="off" name="passwordcon">
				
				</table><br>
                        <center><input type="submit" class="submit_this" name="Register" value="Register">
			  </center><br></form>
				
			</div>
		<br>
      <h2><center></center></h2>
		
			
			</div>
<?php include AS_THEME."as_footer.php" ?>
    
