<?php include JS_THEME."js_header.php";
	$myaccount = isset( $_SESSION['account'] ) ? $_SESSION['account'] : "";
	?>
	<div class="content">
    <div class="content_resize">
       <div class="mainbarx">
        <div class="article"><br>
		<?php include JS_THEME."js_sidebar_adm.php";	?>	
          <h2>Add a new Doctor</h2>
		  <br>
		  	
          <form action="admin.php?action=newdoc" method="post">
		<table style="width:100%;font-size:20px;">
		<tr>
			<td>Full Name:</td>
			<td><input type="text" class="input_form" name="fullname"></td>
		</tr>
		<tr>
			<td>Username:</td>
			<td><input type="text" class="input_form" name="username" autocomplete="off" ></td>
		</tr>
		<tr>
			<td>Mobile:</td>
			<td><input type="text" class="input_form" name="mobile" autocomplete="off" ></td>
		</tr>
		<tr>
			<td>Email Address:</td>
			<td><input type="text" class="input_form" name="email" autocomplete="off" ></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input type="password" class="input_form" name="password" autocomplete="off" ></td>
		</tr>
		<tr>
			<td>Confirm Password:</td>
			<td><input type="password" class="input_form" name="passwordcon" autocomplete="off" ></td>
		</tr>
		<tr>
			<td></td>
			<td>
			<input type="submit" class="submit_form_i" name="AddDoctor" value="Add New Doctor">
	 
			</td>
		</tr>
		</table><br>
				<br></form></center>
        </div>
      </div>
		
      <div class="clr"></div>
    </div>
  </div>
 
<?php include JS_THEME."js_footer.php" ?>
    
