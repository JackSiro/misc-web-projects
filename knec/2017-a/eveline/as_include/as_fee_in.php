<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	
		
<?php 
	$database = new As_Dbconn();			
	
		$as_db_query = "SELECT * FROM as_fee ORDER BY fee_studentid ASC LIMIT 50";
		$results = $database->get_results( $as_db_query );
	?>
	  <div id="content"> 
       
        <div class="content_item">
		  <h1><?php echo $database->as_num_rows( $as_db_query ) ?>  Fees Items
		  <a style="float:right;width:300px;text-align:center;" href="index.php?action=fee_new">New Fees Item</a> </h1> 
          <br><hr><br>
			<div class="main_content" align="center">
			
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th></th>
				  <th>Student</th>
				  <th>Quantity</th>
				  <th>Fees</th>
				  <th></th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { 
					$studentid = $row['fee_studentid'];
				?>
					<tr onclick="location='index.php?action=fee_edit&amp;as_feeid=<?php echo $row['feeid'] ?>'">
					   <td></td>
					   <td><?php echo as_student_item($studentid) ?></td>
					   <td><?php echo $row['fee_amount'].' '.as_student_fee($studentid).'s' ?></td>
					   <td><?php echo $row['fee_amount']*as_student_comment($studentid).' '.as_student_password($studentid).'s' ?></td>
					   <td></td>
					</tr>			
					<?php } ?>			
				  </tbody>
				</table>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
