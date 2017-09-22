<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">
	  <div id="content">
        <div>
		<br>
		  <h1>Add a certificate</h1> 
          <hr>
			<div class="main_content">
				<form role="form" method="post" name="Postcertificate" action="index.php?action=certificate_new" >
					<p><span>Choose a Student</span>
						<select name="student" style="padding-left:20px;">
							<option value="" > - Choose a Student - </option>
								<?php $as_db_query = "SELECT * FROM as_student ORDER BY studentid ASC";
									$database = new As_Dbconn();			
									$results = $database->get_results( $as_db_query );
									foreach( $results as $row ) { ?>
											<option value="<?php echo $row['studentid'] ?>">  <?php echo $row['student_name'] ?></option>
									<?php } ?>
							</select></p> 
					<p><span>Certificate Title</span><input type="text" name="title"></p>
					<p><span>Certificate Event</span><input type="text" name="event"></p>
					<p><span>Certificate Content</span><input type="text" name="content"></p>
					<p><span>Certificate Signed</span><input type="text" name="signed"></p>
					<p><span>Certificate Remark</span><input type="text" name="remark"></p>
					<p style="padding-top: 15px"><span><input type="submit" id="submitBtn" name="SaveAdd" value="Save & Add"></span><input type="submit" id="submitBtn" name="AddClose" value="Save & Close">
				  </p>		
				</form>
		</div><!--close content_student-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
