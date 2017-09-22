<?php include AS_THEME."as_header.php"; ?>
<div class="page-top" id="templatemo_contact">
</div> <!-- /.page-header -->
		<div class="contact-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 map-wrapper"></div>
                    <div class="col-md-6 col-sm-6">
						<h3 class="widget-title">Add an Employee</h3> 
                        <div class="contact-form">
							<form role="form" method="post" name="PostUser" action="index.php?page=employee_new" enctype="multipart/form-data" >
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
									<input type="submit"class="mainBtn" id="submit" name="AddEmployee" value="Save & Add">
									<input type="submit"  class="mainBtn" id="submit" name="AddClose" value="Save & Close">
						  </form>
			
                        </div> <!-- /.contact-form -->
                    </div>
					<div class="col-md-3 col-sm-6 map-wrapper"></div>
                </div>
            </div>
        </div>
<?php include AS_THEME."as_footer.php" ?>
    
