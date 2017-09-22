<?php 

	$studentid = $results['student'];
	$js_db_query = "SELECT * FROM js_student WHERE studentid = '$studentid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $studentid, $student_admission, $student_department, $student_course, $student_name, $student_fee, $student_postedby, $student_posted, $student_class, $student_gender, $student_img, $student_updated, $student_updatedby) = $database->get_row( $js_db_query );
}
		
?>
<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_student">
		<br>
		  <h1>Edit a Student</h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" name="SaveStudent" action="index.php?action=editstudent&&js_studentid=<?php echo $studentid ?>" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<tr>
					<td>Choose a Department:</td>
					<td><select name="department" style="padding-left:20px;">
						<option value="<?php echo $studentid ?>" > - Choose a Department - </option>
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
					<td>Title of the Student:</td>
					<td><input type="text" autocomplete="off" name="title" value="<?php echo $student_name ?>"></td>
				</tr>
				<tr>
					<td>Code of the Student:</td>
					<td><input type="text" autocomplete="off" name="code" value="<?php echo $student_admission ?>"></td>
				</tr>
				<tr>
					<td>Upload Student Icon:</td>
					<td>
					<input type="hidden" name="studentimg" value="<?php echo $student_img ?>">	
						<table style="width:100%"><tr><td>
						<img src="<?php echo 'js_media/'.$student_img ?>" style="width:70px;height:70px;" >
						</td><td>
						<input name="filename" autocomplete="off" type="file" accept="image/*" >
						</td></tr></table>
					</td>
				</tr>
                
                <tr>
					<td>Description (500 max):</td>
					<td><textarea style="height:200px" name="content" autocomplete="off" ><?php echo $student_fee ?></textarea></td>
				</tr>
				<tr>
					<td>Publisher of the Student:</td>
					<td><input type="text" autocomplete="off" name="publisher" value="<?php echo $student_class ?>"></td>
				</tr>
				
				<tr>
					<td>Subject/Topic of the Student:</td>
					<td><input type="text" autocomplete="off" name="subject" value="<?php echo $student_gender ?>"></td>
				</tr>
				
				</table><br>
                        <center><input type="submit" class="submit_this" name="SaveStudent" value="Save Changes">
						<input type="submit" class="submit_this" name="SaveClose" value="Save & Close">
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
    
