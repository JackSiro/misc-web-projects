<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	

	  <div id="content"> 
       
        <div class="content_item">
		  <h1>Sign Up your account now!!!/h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" name="Sign_MeUp" action="index.php?action=signup" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				
				<tr>
					<td>First  Name:</td>
					<td><input type="text" autocomplete="off" name="fname" required></td>
				</tr>
				<tr>
					<td>Second Name:</td>
					<td><input type="text" autocomplete="off" name="surname" required></td>
				</tr>
				<tr>
					<td>Upload User Avatar (Optional):</td>
					<td><input name="avatar" autocomplete="off" type="file" accept="image/*"></td>
				</tr>
                
				<tr>
					<td>Email Address:</td>
					<td><input type="text" autocomplete="off" name="email" required></td>
				</tr>
				
				<tr>
					<td>Mobile (Optional):</td>
					<td><input type="text" autocomplete="off" name="mobile"></td>
				</tr>
				
				<tr>
					<td>Preferred Username:</td>
					<td><input type="text" autocomplete="off" name="username" required></td>
				</tr>
				
				<tr>
					<td>Preferred Password:</td>
					<td><input type="password" autocomplete="off" name="password" required></td>
				</tr>
				
				<tr>
					<td>Confirm Password:</td>
					<td><input type="password" autocomplete="off" name="passwordcon" required></td>
				</tr>
				
				</table><br>
                        <center><input type="submit" class="submit_this" name="SignMeUp" value="Sign Up">
			  </center><br></form>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
