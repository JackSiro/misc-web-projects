<?php 

	$studentid = $results['student'];
	$as_db_query = "SELECT * FROM as_student WHERE studentid = '$studentid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $studentid, $student_admission, $student_class, $student_course, $student_name, $student_fee, $student_registeredby, $student_registered, $student_class, $student_gender, $student_img, $student_updated, $student_updatedby) = $database->get_row( $as_db_query );
}
		
?>
<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div>
		<br>
		  <h1>Edit a Student</h1> 
          
			<div class="main_content">
				<form role="form" method="post" name="SaveStudent" action="index.php?action=student_edit&&as_studentid=<?php echo $studentid ?>" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<p><span>Choose a Class</span>
					<td><select name="class" style="padding-left:20px;">
						<option value="<?php echo $studentid ?>" > - Choose a Class - </option>
			<?php $as_db_query = "SELECT * FROM as_class ORDER BY class_title ASC";
				$database = new As_Dbconn();			
				$results = $database->get_results( $as_db_query );
				
				foreach( $results as $row ) { ?>
						<option value="<?php echo $row['classid'] ?>">  <?php echo $row['class_title'] ?></option>
				<?php } ?>
						</select>
					</p>
				<p><span>Title of the Student</span>
				<input type="text" autocomplete="off" name="title" value="<?php echo $student_name ?>"></p>
				<p><span>Code of the Student</span>
				<input type="text" autocomplete="off" name="code" value="<?php echo $student_admission ?>"></p>
				<p><span>Upload Student Icon</span>
					<td>
					<input type="hidden" name="studentimg" value="<?php echo $student_img ?>">	
						<table style="width:100%"><tr><td>
						<img src="<?php echo 'as_media/'.$student_img ?>" style="width:70px;height:70px;" >
						</td><td>
						<input name="filename" autocomplete="off" type="file" accept="image/*" >
						</td></tr></table>
					</p>
                
                <p><span>Description (500 max)</span>
					<td><textarea style="height:200px" name="content" autocomplete="off" ><?php echo $student_fee ?></textarea></p>
				<p><span>Publisher of the Student</span>
				<input type="text" autocomplete="off" name="publisher" value="<?php echo $student_class ?>"></p>
				
				<p><span>Subject/Topic of the Student</span>
				<input type="text" autocomplete="off" name="subject" value="<?php echo $student_gender ?>"></p>
				
				<p style="padding-top: 15px"><span>&nbsp;</span><input type="submit" id="submitBtn" name="SaveStudent" value="Save Changes">
						<input type="submit" id="submitBtn" name="SaveClose" value="Save & Close">
			  </p>		
			</form>
			</div>
      </div> 
	</div> 	
  </div>
<?php include AS_THEME."as_footer.php" ?>
    
