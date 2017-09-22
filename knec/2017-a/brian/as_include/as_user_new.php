<?php include AS_THEME."as_header.php"; ?>
    <div id="site_content">
      <div id="banner"></div>	
		<div id="content">
		  <h1>Add a User</h1>
			<div class="main_content">
				<form role="form" method="post" name="DrugUser" action="index.php?action=user_new">
                <div class="form_settings">
				<p><span>Choose a position:</span><select name="group" style="padding-left:20px;">
						<option value="" > - Choose a position - </option>
						<option value="super-admin" > Super Admin </option>
						<option value="admin" > Admin </option>
						<option value="manager" > Manager </option>
						<option value="editor" > Editor </option>
						<option value="xplorer" > Explorer </option>		
						</select>
					</p>
				<p><span>First  Name:</span><input type="text" autocomplete="off" name="fname"></p>
				<p><span>Second Name:</span><input type="text" autocomplete="off" name="surname"></p>
				<p><span>Email Address:</span><input type="text" autocomplete="off" name="email"></p>
				
				<p><span>Mobile (Optional):</span><input type="text" autocomplete="off" name="mobile"></p>
				
				<p><span>Preferred Username:</span><input type="text" autocomplete="off" name="username"></p>
				
				<p><span>Preferred Password:</span><input type="password" autocomplete="off" name="password"></p>
				
				<p><span>Confirm Password:</span><input type="password" autocomplete="off" name="passwordcon"></p>
				<p style="padding-top: 15px"><span><input type="submit" class="submit" name="SaveItem" value="Save Chnages"></span>
						<input type="submit" class="submit" name="SaveClose" value="Save & Close"></p>
			  </div>
			</form>
		</div>
    </div>
    </div>
    </div>
<?php include AS_THEME."as_footer.php" ?>
    
