  <?php include JS_THEME."js_header.php"; ?>
	<div class="container">		
		<div class="row box-5">
			<div>
				<h2><?php echo js_get_option('sitename') ?></h2>
				<div class="page_wrap">
				<h1>Register your account now!!!</h1> <br>
				<div>
				<form class='mkangara-form' method="post" action="index.php?action=register" 
			enctype="multipart/form-data">
				<table class="form_table">
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
						<center><input type="submit" class="submit_this" name="AddUser" value="Save & Add">
			  </center><br></form>
				</div>
			</div>    
			</div>
		</div>
	</div>
<?php include JS_THEME."js_footer.php" ?>
   