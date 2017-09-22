<?php 

	$feeid = $results['student'];
	$as_db_query = "SELECT * FROM as_fee WHERE feeid = '$feeid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $feeid, $fee_studentid, $fee_unit, $fee_postedby, $fee_posted, $fee_client, $fee_amount, $fee_unit, $fee_img, $fee_updated, $fee_updatedby) = $database->get_row( $as_db_query );
}
		
?>

<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	

	  <div id="content"> 
       
        <div class="content_item">
		  
			<div class="main_content">
				<div class="detail_info">
				<h1> Student: <?php echo as_student_student($fee_studentid) ?></h1> 
          <br><hr>
				<table>
				<tr><td>
				<center><img src="<?php echo "as_media/".$fee_img ?>" class="iconic_big_i"/></center>
				</td><td>
				<h2>Student: <?php echo as_student_student($fee_studentid) ?></h2>
				<h2>Quantity: <?php echo $fee_unit.' '.$fee_unit ?>
				<?php echo ', Kshs. '.$fee_amount.' each' ?></h2>
				<h2>Client: <?php echo as_client_student($fee_client) ?></h2>
				<h2>Received on: <?php echo date("j/m/y", strtotime($fee_posted)); ?></h2>
				</td></tr>
				</table>
				<hr>
				<center><h2><a href="index.php?action=fee_edit&&as_feeid=<?php echo $feeid ?>">Edit this Student</a>
				 | <a href="index.php?action=fee_delete&&as_feeid=<?php echo $feeid ?>" onclick="return confirm('Are you sure you want to delete this student from the system? \nBe careful, this action can not be reversed.')">Delete this Student</a></h2></center>
				 
				<br>
				 <form role="form" method="post" name="PlacePrescription" 
				 action="index.php?action=fee_view&&as_feeid=<?php echo $feeid ?>" >
				<input type="hidden" name="feeid" value="<?php echo $feeid ?>" />
				<input type="hidden" name="studentprice" value="<?php echo $fee_amount ?>" />
				<input type="hidden" name="studenttitle" value="<?php echo $fee_unit." of ".as_student_student($fee_studentid) ?>" />
				<div class="detail_info">
					<br><br>
					<h1>Place an Prescription for this Student</h1> 
					  <br><hr><br>
					<table style="width:100%;font-size:20px;">
					<tr>
						<td>Choose Quantity:</td>
						<td>
						<input type="text" autocomplete="off" name="quantity" value="<?php echo $fee_unit ?>" required >
						</td>
					</tr>
					<tr>
						<td>Buyer's Full Name</td>
						<td>
						<input type="text" autocomplete="off" name="fullname" required >
						</td>
					</tr> 
					<tr>
						<td>Buyer's Mobile No.</td>
						<td>
						<input type="text" autocomplete="off" name="mobile" required >
						</td>
					</tr>
					<tr>
						<td>Buyer's Email</td>
						<td>
						<input type="text" autocomplete="off" name="email" required >
						</td>
					</tr>
					<tr>
						<td>Physical Address:</td>
						<td>
						<textarea name="address" autocomplete="off" ></textarea>
						</td>
					</tr>
					<tr>
						<td>Additional Notes (Options):</td>
						<td>
						<textarea name="content" autocomplete="off" ></textarea>
						</td>
					</tr>
					
					</table>
					<br>
                        <center>
						<input type="submit" class="submit_this" name="PrescriptionNow" value="Prescription this Student">
			  </center><br>
				</form>
				</div>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
