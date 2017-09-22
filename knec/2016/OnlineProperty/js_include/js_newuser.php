<?php include JS_THEME."js_header.php"; ?>
<?php $js_db_query = "SELECT * FROM js_house ORDER BY houseid DESC LIMIT 20";
			$database = new Js_Dbconn();			
			$results = $database->get_results( $js_db_query );
		?>

	<section id="service">
		<div class="container">
			<div class="row">
				<div class="text-center col-md-12 wow fadeInDown" data-wow-delay="2000">
					<h3>Add a Manager</h3>
				</div>
				<div class="col-md-2"></div>
				<div class="col-md-8 text-center">
				</div>
				<div class="col-md-2"></div>
				<div class="col-sm-12 col-md-12 wow fadeInLeft" data-wow-delay="2000">
					<div class="media">
						<i class="fa fa-cog pull-left media-object"></i>
							<div class="media-body">
								<form role="form" method="post" name="PostUser" action="index.php?action=newuser" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
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
                        <center><input type="submit" class="submit_this" name="AddUser" value="Save & Add">
						<input type="submit" class="submit_this" name="AddClose" value="Save & Close">
			  </center><br></form>
							</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>		
<?php include JS_THEME."js_footer.php" ?>
    
