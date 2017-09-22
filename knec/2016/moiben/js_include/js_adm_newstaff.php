<?php include JS_THEME."js_header.php";
	$myaccount = isset( $_SESSION['account'] ) ? $_SESSION['account'] : "";
	?>
	<div class="content">
    <div class="content_resize">
       <div class="mainbarx">
        <div class="article"><br>
		<?php include JS_THEME."js_sidebar_adm.php";	?>	
          <h2>Add a new Member of Staff</h2>
		  <br>
		  	
          <form action="admin.php?action=newstaff" method="post">
		<table style="width:100%;font-size:20px;">
		<tr>
			<td>Full Name:</td>
			<td><input type="text" class="input_form" name="fullname"></td>
		</tr>
		<tr> 
			<td>Mobile Number:</td>
			<td><input type="text" class="input_form" name="mobile"></td>
		</tr>
		
		<tr> 
			<td>Station:</td>
			<td><input type="text" class="input_form" name="station" autocomplete="off" ></td>
		</tr>
		<tr>
			<td>Vital Task:</td>
			<td><input type="text" class="input_form" name="task" autocomplete="off" ></td>
		</tr>
		<tr>
			<td></td>
			<td>
			<input type="submit" class="submit_form_i" name="AddStaff" value="Add New Member of Staff">
	 
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
    
