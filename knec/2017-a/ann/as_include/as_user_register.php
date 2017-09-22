<?php include AS_THEME."as_header.php"; ?>
	<div id="content">
          <div class="scroll">
            <div class="scrollContainer">
              <div class="panel" id="home">
                <div class="content_section">
                  <h2>Sign Up your account now!!!</h2> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" name="ItemUser" action="index.php?action=signup" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				
				<tr>
					<td>First  Name:</td>
					<td><input type="text" autocomplete="off" name="fname"></td>
				</tr>
				<tr>
					<td>Second Name:</td>
					<td><input type="text" autocomplete="off" name="surname"></td>
				</tr>
				<tr>
					<td>Upload User Avatar:</td>
					<td><input name="avatar" autocomplete="off" type="file" accept="image/*"></td>
				</tr>
                
				<tr>
					<td>Email Address:</td>
					<td><input type="text" autocomplete="off" name="email"></td>
				</tr>
				
				<tr>
					<td>Mobile (Optional):</td>
					<td><input type="text" autocomplete="off" name="mobile"></td>
				</tr>
				
				<tr>
					<td>Preferred Username:</td>
					<td><input type="text" autocomplete="off" name="username"></td>
				</tr>
				
				<tr>
					<td>Preferred Password:</td>
					<td><input type="password" autocomplete="off" name="password"></td>
				</tr>
				
				<tr>
					<td>Confirm Password:</td>
					<td><input type="password" autocomplete="off" name="passwordcon"></td>
				</tr>
				
				</table><br>
                        <center><input type="submit" class="submit_this" name="Sign Up" value="Sign Up">
			  </center><br></form>
			</div>
				</div>
			</div>
		</div>
	</div>
<?php include AS_THEME."as_footer.php" ?>
    
