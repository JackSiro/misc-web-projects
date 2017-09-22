<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_student">
		<br>
		  <h1>Add a Student</h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" name="PostStudent" action="index.php?action=newstudent" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">				
				<tr>
					<td>Full Name:</td>
					<td><input type="text" name="name"></td>
				</tr>
				<tr>
					<td>Admission Number:</td>
					<td><input type="text" name="admno"></td>
				</tr>
				<tr>
					<td>Upload Student Image:</td>
					<td><input name="filename" type="file" accept="image/*"></td>
				</tr>
				<tr>
					<td>Choose a Department:</td>
					<td><select name="department" style="padding-left:20px;">
						<option value="" > - Choose a Department - </option>
			<?php $js_db_query = "SELECT * FROM js_department ORDER BY department_title ASC";
				$database = new Js_Dbconn();			
				$results = $database->get_results( $js_db_query );
				
				foreach( $results as $row ) { ?>
						<option value="<?php echo $row['departmentid'] ?>">  <?php echo $row['department_title'] ?></option>
				<?php } ?>
						</select>
					</td>
				</tr>
                <tr>
					<td>Course:</td>
					<td><input type="text" name="course"></td>
				</tr>
				<tr>
					<td>Class:</td>
					<td><input type="text" name="class"></td>
				</tr>
				<tr>
					<td>Gender:</td>
					<td>
						<table><tr><td><input type="radio" name="gender" value="Male"></td>
						<td>Male</td><td><input type="radio" name="gender" value="Female"></td>
						<td>Female</td></tr></table>
					</td>
				</tr>
				<tr>
					<td>Fees Payment:</td>
					<td><input type="text" name="fees"></td>
				</tr>
				</table><br>
                        <center><input type="submit" class="submit_this" name="AddStudent" value="Save & Add">
						<input type="submit" class="submit_this" name="AddClose" value="Save & Close">
			  </center><br></form>
				 
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_student-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
