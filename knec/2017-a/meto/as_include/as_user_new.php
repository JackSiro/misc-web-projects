<?php include AS_THEME."as_header.php"; ?>
				</div>
			</div>

			<div id="main" class="wrapper style2">
				<section class="container">
					<header class="major">
						<h2>Add a User</h2>  
					</header>
					<form role="form" method="post" name="PostUser" action="index.php?action=user_new" enctype="multipart/form-data" >
                <div class="form_settings">
			<p><span>Choose a Category</span><select name="group" style="padding-left:20px;">
						<option value="" > - Choose a Category - </option>
						<option value="super-admin" > Super Admin </option>
						<option value="admin" > Admin </option>
						<option value="manager" > Manager </option>
						<option value="editor" > Editor </option>
						<option value="xplorer" > Explorer </option>		
						</select>
					</p>
			<p><span>First  Name</span><input type="text" autocomplete="off" name="fname"></p>
			<p><span>Second Name</span><input type="text" autocomplete="off" name="surname"></p>
			<p><span>Upload User Avatar</span><input name="avatar" autocomplete="off" type="file" accept="image/*"></p>
                
			<p><span>Email Address</span><input type="text" autocomplete="off" name="email"></p>
				
			<p><span>Mobile (Optional)</span><input type="text" autocomplete="off" name="mobile"></p>
				
			<p><span>Preferred Username</span><input type="text" autocomplete="off" name="username"></p>
				
			<p><span>Preferred Password</span><input type="password" autocomplete="off" name="password"></p>
				
			<p><span>Confirm Password</span><input type="password" autocomplete="off" name="passwordcon"></p>
				
			<br><p><input type="submit" class="submit_this" name="AddUser" value="Save & Add">
						<input type="submit" class="submit_this" name="AddClose" value="Save & Close">
			</p></div></form>
				</section>
			</div>
		</div>
	</section>
</div>
<?php include AS_THEME."as_footer.php" ?>
    
