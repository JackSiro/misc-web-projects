<?php include AS_THEME."as_header.php"; ?>
<div id="tooplate_main_wrapper">
    <div id="tooplate_top"></div>
	
    <div id="tooplate_main">
        <div id="tooplate_content_wrapper">
        	<div id="tc_top"></div>
			
        	<div id="tooplate_content">
				<div id="contact_form">
               	
                <div class="post_box">
					<h2 class="meta">Add an User</h2> 
                    <div class="cleaner"></div>
				<form role="form" method="post" name="ItemUser" action="index.php?action=user_new" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<tr>
					<td>Choose a Item:</td>
					<td><select name="group" style="padding-left:20px;" class="required input_field">
						<option value="" > - Choose a Item - </option>
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
					<td><input type="text" autocomplete="off" name="fname" class="required input_field"></td>
				</tr>
				<tr>
					<td>Second Name:</td>
					<td><input type="text" autocomplete="off" name="surname" class="required input_field"></td>
				</tr>
				<tr>
					<td>Upload User Avatar:</td>
					<td><input name="avatar" autocomplete="off" type="file" accept="image/*" class="required input_field"></td>
				</tr>
                
				<tr>
					<td>Email Address:</td>
					<td><input type="text" autocomplete="off" name="email" class="required input_field"></td>
				</tr>
				
				<tr>
					<td>Mobile (Optional):</td>
					<td><input type="text" autocomplete="off" name="mobile" class="required input_field"></td>
				</tr>
				
				<tr>
					<td>Preferred Username:</td>
					<td><input type="text" autocomplete="off" name="username" class="required input_field"></td>
				</tr>
				
				<tr>
					<td>Preferred Password:</td>
					<td><input type="password" autocomplete="off" name="password" class="required input_field"></td>
				</tr>
				
				<tr>
					<td>Confirm Password:</td>
					<td><input type="password" autocomplete="off" name="passwordcon" class="required input_field"></td>
				</tr>
				
				</table><br>
                        <center><input type="submit" class="submit_this" name="AddUser" value="Save & Add">
						<input type="submit" class="submit_this" name="AddClose" value="Save & Close">
			  </center><br></form>
			</div>
                </div>
            </div>
			
            <div id="tc_bottom"></div>
        </div>         
        <div class="cleaner"></div>
    </div>
<?php include AS_THEME."as_footer.php" ?>
    
