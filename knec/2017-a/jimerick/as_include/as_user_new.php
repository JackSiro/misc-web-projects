  <?php include AS_THEME."as_header.php"; ?>
<div id="content">Add an patient</h3><br>
				<div>
				<form method="post" action="index.php?action=user_new" 
			enctype="multipart/form-data">
				<table class="form_table">
				<tr>
					<td>Choose a Category:</td>
					<td><select name="group" style="padding-left:20px;">
						<option value="" > - Choose a Category - </option>
						<option value="super-admin" > Super Admin </option>
						<option value="admin" > Admin </option>
						<option value="manager" > Manager </option>
						<option value="editor" > Editor </option>
						<option value="xplorer" > Explorer </option>		
						</select>
					</td>
				</tr>
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
						<center><input type="submit" class="submitbtn" name="AddUser" value="Save & Add">
			  </center><br></form>
				</div>
			</div>    
			</div>
		</div>
	</div>
<?php include AS_THEME."as_footer.php" ?>
   