<?php include AS_THEME."as_header.php"; 
	$database = new As_Dbconn();			
	$as_db_query = "SELECT * FROM as_beneficiary
					LEFT JOIN as_beneficiary ON as_beneficiary.beneficiary_beneficiaryid = as_beneficiary.beneficiaryid
					ORDER BY as_beneficiary.beneficiary_beneficiaryid  ASC LIMIT 20";
	$results = $database->get_results( $as_db_query );
?>
	<div id="content">
          <div class="scroll">
            <div class="scrollContainer">
			
              <div class="panel">
				<h3>Group Registration
		  <a style="float:right;text-align:center;" href="index.php?action=beneficiary_new">Register</a> </h3> 
          <div class="main_content" align="center">
			
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th></th>
				  <th>Beneficiary</th>
				  <th>Groups Registered</th>
				  <th>Paid on</th>
				  <th></th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { 
					$beneficiaryid = $row['beneficiaryid'];
				?>
					<tr>
					   <td></td>
					   <td><?php echo $row['beneficiary_name'] ?></td>
					   <td><?php echo $row['beneficiary_title'] ?></td>
					   <td><?php echo $row['beneficiary_date'] ?></td>
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
    
