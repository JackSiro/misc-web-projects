<?php 

	$feeid = $results['student'];
	$as_db_query = "SELECT * FROM as_fee WHERE feeid = '$feeid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $feeid, $fee_studentid, $fee_unit, $fee_postedby, $fee_posted, $fee_amount, $fee_img, $fee_updated, $fee_updatedby) = $database->get_row( $as_db_query );
}
		
?>
<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	

	  <div id="content"> 
       
        <div class="content_item">
		  <h1>Edit a Student</h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" name="SaveStudent" action="index.php?action=fee_edit&&as_feeid=<?php echo $feeid ?>" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
								
				<tr>
					<td>Full Name:</td>
					<td><input type="text" autocomplete="off" name="fullname" value="<?php echo $fee_unit ?>" required ></td>
				</tr>
				<tr>
					<td>Student Student:</td>
					<td><select name="category" style="padding-left:20px;" required>
						<option value="<?php echo $fee_studentid ?>" ><?php echo as_student_student($fee_studentid) ?></option>
					<?php $as_db_query = "SELECT * FROM as_student ORDER BY studentid ASC";
						$database = new As_Dbconn();			
						$results = $database->get_results( $as_db_query );
					
						foreach( $results as $row ) { ?>
						  <option value="<?php echo $row['studentid'] ?>">  <?php echo $row['student_name'] ?></option>
					<?php } ?>
						</select>
					</td>
				</tr>
                <tr>
					<td>Student Slogan:</td>
					<td><input type="text" autocomplete="off" name="slogan" value="<?php echo $fee_amount ?>" required ></td>
				</tr>
				</table><br>
                        <center><input type="submit" class="submit_this" name="SaveStudent" value="Save Changes">
						<input type="submit" class="submit_this" name="SaveClose" value="Save & Close">
			  </center><br>
			  </form>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
