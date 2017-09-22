<?php include JS_THEME."js_header.php";
	$myaccount = isset( $_SESSION['account'] ) ? $_SESSION['account'] : "";
	?>
	<div class="content">
    <div class="content_resize">
       <div class="mainbarx">
        <div class="article"><br>
		<?php include JS_THEME."js_sidebar_adm.php";	?>	
          <h2>Add a new Patient</h2>
		  <br>
		  	
          <form action="admin.php?action=newpat" method="post">
		<table style="width:100%;font-size:20px;">
		<tr>
			<td>Full Name:</td>
			<td><input type="text" class="input_form" name="fullname"></td>
		</tr>
		<tr> 
			<td>Email Address:</td>
			<td><input type="text" class="input_form" name="email"></td>
		</tr>
		<tr>
			<td>Sex:</td>
			<td><input type="radio" name="sex" value="M" /> Male 
			<input type="radio" name="sex" value="F" /> Female</td>
		</tr>
		<tr> 
			<td>Mobile:</td>
			<td><input type="text" class="input_form" name="mobile" autocomplete="off" ></td>
		</tr>
		<tr>
			<td>Physical Address:</td>
			<td><input type="text" class="input_form" name="address" autocomplete="off" ></td>
		</tr>
		<tr>
			<td></td>
			<td>
			<input type="submit" class="submit_form_i" name="AddPatient" value="Add New Patient">
	 
			</td>
		</tr>
		</table><br>
				<br>
		</form></center>
        </div>
      </div>
		
      <div class="clr"></div>
    </div>
  </div>
 
<?php include JS_THEME."js_footer.php" ?>
    
