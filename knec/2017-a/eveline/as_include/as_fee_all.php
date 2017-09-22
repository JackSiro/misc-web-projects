<?php include AS_THEME."as_header.php"; 
	$database = new As_Dbconn();			
	$as_db_query = "SELECT * FROM as_fee
					LEFT JOIN as_student ON as_fee.fee_studentid = as_student.studentid
					ORDER BY as_fee.fee_studentid  ASC LIMIT 20";
		$results = $database->get_results( $as_db_query );
		$feevl = 0;
	?>
<div id="tooplate_main">
	<div class="col_w900">      
		  <h1>Fees Payment
		  <a style="float:right;width:300px;text-align:center;" href="index.php?action=fee_new">Add New Payment</a> </h1> 
          <br><hr><br>
			<div class="main_content" align="center">
			
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th></th>
				  <th>Student</th>
				  <th>Fees paid</th>
				  <th>Paid on</th>
				  <th></th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { 
					$studentid = $row['studentid'];
				?>
					<tr>
					   <td></td>
					   <td><?php echo $row['student_name'] ?></td>
					   <td><?php echo $row['fee_amount'] ?></td>
					   <td><?php echo $row['fee_posted'] ?></td>
					   <td></td>
					</tr>			
					<?php } ?>
				  </tbody>
				</table><br>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
