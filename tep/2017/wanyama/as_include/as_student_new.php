<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">
	  <div id="content">
        <div>
		  <h1>Add a Student</h1>
			<div class="main_content">
				<form role="form" method="post" name="PostStudent" action="index.php?action=student_new" >
                <p><span>Full Name</span><input type="text" name="name"></p>
				<p><span>Admission Number</span><input type="text" name="admno"></p>
				<p><span>Choose a Class</span>
					<select name="class" style="padding-left:20px;">
						<option value="" > - Choose a Class - </option>
							<?php $as_db_query = "SELECT * FROM as_class ORDER BY class_title ASC";
								$database = new As_Dbconn();			
								$results = $database->get_results( $as_db_query );
								
								foreach( $results as $row ) { ?>
										<option value="<?php echo $row['classid'] ?>">  <?php echo $row['class_title'] ?></option>
								<?php } ?>
						</select></p>                	
				<p style="padding-top: 15px"><span><input type="submit" id="submitBtn" name="SaveAdd" value="Save & Add"></span><input type="submit" id="submitBtn" name="AddClose" value="Save & Close">
			  </p>		
			</form>
		</div><!--close content_student-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
