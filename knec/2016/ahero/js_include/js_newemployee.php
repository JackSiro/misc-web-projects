<?php include JS_THEME."js_header.php"; 

$database = new Js_Dbconn();			
			
			$js_type_query = "SELECT * FROM js_department";			
			$results = $database->get_results($js_type_query  ); 
			
?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_leave">
		<br>
		  <h1>Add an Employee</h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" name="PostEmployee" action="index.php?js_pageaction=newemployee" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<tr>
					<td>Choose a Category:</td>
					<td><select name="group" style="padding-left:20px;">
						<option value="" > - Choose a category - </option>
						<option value="super-admin" > Super Admin </option>
						<option value="admin" > Admin </option>
						<option value="manager" > Manager </option>
						<option value="editor" > Editor </option>
						<option value="farmer" > farmer </option>		
						</select>
					</td>
				</tr>
				<tr>
					<td>Full  Name:</td>
					<td><input type="text" autocomplete="off" name="fullname"></td>
				</tr>
				<tr>
					<td>Marital Status:</td>
					<td>
						<table><tr><td><input type="radio" autocomplete="off" name="status" value="Male"></td>
						<td>Male</td><td><input type="radio" autocomplete="off" name="status" value="Female"></td>
						<td>Female</td></tr></table>
				</tr>
				<tr>
					<td>Bank Account:</td>
					<td><input type="text" autocomplete="off" name="account"></td>
				</tr>
				<tr>
					<td>Department</td>
					<td>
					<select name="department" style="padding-left:20px;" required >
						<option value="" > - Choose a Department - </option>
			
						<?php
							foreach( $results as $row ) { ?>
								<option value="<?php echo $row['department_name'] ?>">  <?php echo $row['department_name'] ?></option>
						<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>ID. Number:</td>
					<td><input name="idno" autocomplete="off" type="text" ></td>
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
                        <center><input type="submit" class="submit_this" name="AddEmployee" value="Register Employee"></center><br></form>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_leave-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
