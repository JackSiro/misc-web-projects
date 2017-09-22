<?php include AS_THEME."as_header.php"; ?>
<div id="tooplate_main">
	<div class="col_w900 col_w900_last">
		  <h3>Register Students for Exams</h3>
          	<div id="cp_contact_form">
			<?php 
			
			$database = new As_Dbconn();			
			
			$as_student_query = "SELECT * FROM as_student ORDER BY studentid ASC";			
			$results = $database->get_results($as_student_query  ); 
			
			if ($database->as_num_rows( $as_student_query)<=0) { ?>
				<h2 style="color:#000">You need to fix the following errors before you pay fees</h2>
				<ul>
				<h3><li><a href="index.php?action=student_new">No Student found! Add a Student</a></li><h3>
				
				</ul>
			<?php } else { ?>
			<form role="form" method="post" name="Fees" action="index.php?action=exam_new" >
                <label for="text">Choose a Student:</label>
					<select name="student" style="padding-left:20px;" required >
						<option value="" > - Choose a Student - </option>			
						<?php
							foreach( $results as $row ) { ?>
								<option value="<?php echo $row['studentid'] ?>">  <?php echo $row['student_name'] ?></option>
						<?php } ?>
						</select>
                <div class="cleaner h10"></div>		
				<label for="text">Exams Name:</label><input type="text" autocomplete="off" name="title" required ></td>
				</tr>
				<div class="cleaner h10"></div>
				
				<label for="text">Exams Date:</label><input type="text" autocomplete="off" name="date" required >
				
				<div class="cleaner h10"></div>
					
                <input type="submit" id="submit" name="SaveItem" value="Save and Add" class="submit_btn float_l" />
                <input type="submit" id="submit" name="SaveClose" value="Save and Close" class="submit_btn float_l" />
			  </form>
						<?php } ?>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
 <script>
 function mySelectContainer() {
    document.getElementById("myText").select();
} 
 </script>
<?php include AS_THEME."as_footer.php" ?>
    
