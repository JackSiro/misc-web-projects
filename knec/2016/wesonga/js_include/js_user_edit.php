<?php include JS_THEME."js_header.php"; 
	$userid = $results['user'];
	$js_db_query = "SELECT * FROM js_user WHERE userid = '$userid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $userid, $user_name, $user_fname, $user_surname, $user_location, $user_idno, $user_sex, $user_password, $user_email, $user_group, $user_mobile, $user_web, $user_joined, $user_avatar) = $database->get_row( $js_db_query );
	}
?>
	<div id="site_content">	

	  <div id="content"> 
        
	  
        <div class="content_item">
		<br>
		  <h1>Edit a Farmer</h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" name="PostUser" action="index.php?action=user_new" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<tr>
					<td>Choose a Category:</td>
					<td><select name="group" style="padding-left:20px;">
						<option value="<?php echo $user_group ?>" > - Choose a Category - </option>
						<option value="super-admin" > Super Admin </option>
						<option value="admin" > Admin </option>
						<option value="manager" > Manager </option>
						<option value="editor" > Editor </option>
						<option value="farmer" > Farmer </option>		
						</select>
					</td>
				</tr>
				<tr>
					<td>First  Name:</td>
					<td><input type="text" autocomplete="off" name="fname" value="<?php echo $user_fname ?>"></td>
				</tr>
				<tr>
					<td>Second Name:</td>
					<td><input type="text" autocomplete="off" name="surname" value="<?php echo $user_surname ?>"></td>
				</tr>
							
				<tr>
					<td>ID. Number:</td>
					<td><input type="text" autocomplete="off" name="idno" value="<?php echo $user_idno ?>"></td>
				</tr>
				<tr>
					<td>Location:</td>
					<td><input type="text" autocomplete="off" name="location" value="<?php echo $user_location ?>"></td>
				</tr>
				<tr>
					<td>Email Address:</td>
					<td><input type="text" autocomplete="off" name="email" value="<?php echo $user_email ?>"></td>
				</tr>
				
				<tr>
					<td>Mobile (Optional):</td>
					<td><input type="text" autocomplete="off" name="mobile" value="<?php echo $user_mobile ?>"></td>
				</tr>
				
				<tr>
					<td>Preferred Username:</td>
					<td><input type="text" autocomplete="off" name="username" value="<?php echo $user_name ?>"></td>
				</tr>
				
				</table><br>
                        <center><input type="submit" class="submit_this" name="EditUser" value="Save Changes">
			  </center><br></form>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php"; ?>