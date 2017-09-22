<?php include AS_THEME."as_header.php" ?>
	<div id="content">
          <div class="scroll">
            <div class="scrollContainer">
              <div class="panel" id="home">
                <div class="content_section">
					<h2>Sign Up your account now!!!</h2> 
					<form role="form" method="post" name="Sign_MeUp" action="index.php?action=signup" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				
				<tr>
					<td>First  Name:</td>
					<td><input type="text" autocomplete="off" name="fname" required class="required input_field"></td>
				</tr>
				<tr>
					<td>Second Name:</td>
					<td><input type="text" autocomplete="off" name="surname" required class="required input_field"></td>
				</tr>
				<tr>
					<td>Upload User Avatar (Optional):</td>
					<td><input name="avatar" autocomplete="off" type="file" accept="image/*" class="required input_field"></td>
				</tr>
                
				<tr>
					<td>Email Address:</td>
					<td><input type="text" autocomplete="off" name="email" required class="required input_field"></td>
				</tr>
				
				<tr>
					<td>Mobile (Optional):</td>
					<td><input type="text" autocomplete="off" name="mobile" class="required input_field"></td>
				</tr>
				
				<tr>
					<td>Preferred Username:</td>
					<td><input type="text" autocomplete="off" name="username" required class="required input_field"></td>
				</tr>
				
				<tr>
					<td>Preferred Password:</td>
					<td><input type="password" autocomplete="off" name="password" required class="required input_field"></td>
				</tr>
				
				<tr>
					<td>Confirm Password:</td>
					<td><input type="password" autocomplete="off" name="passwordcon" required class="required input_field"></td>
				</tr>
				
				</table><br>
                        <center><input type="submit" class="submit_this" name="SignMeUp" value="Sign Up">
			  </center><br></form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include AS_THEME."as_footer.php" ?>
    
