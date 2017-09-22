<?php include AS_THEME."as_header.php";
	$as_db_query = "SELECT * FROM as_beneficiary ORDER BY beneficiaryid ASC LIMIT 20";
	$database = new As_Dbconn();			
	$results = $database->get_results( $as_db_query );
?>
	<div id="content">
          <div class="scroll">
            <div class="scrollContainer">
			
              <div class="panel">
				<h3><?php echo $database->as_num_rows( $as_db_query ) ?>  Beneficiaries <a style="float:right;text-align:center;" href="index.php?action=beneficiary_new">New Beneficiary</a></h3>
					<table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th valign="top">Beneficiary</th>
				  <th valign="top">Institution</th>
				  <th valign="top">Email</th>
				  <th valign="top">D.O.Birth</th>
				  <th valign="top">Address</th>
				  <th valign="top">Parent/Guardian</th>
				  <th valign="top">Region</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { 
					$beneficiaryid = $row['beneficiaryid'];
				?>
					<tr>
					   <td valign="top"><?php echo $row['beneficiary_name'] ?></td>
					   <td valign="top"><?php echo $row['beneficiary_institution'] ?></td>
					   <td valign="top"><?php echo $row['beneficiary_email'] ?></td>
					   <td valign="top"><?php echo $row['beneficiary_dateofbirth'] ?></td>
					   <td valign="top"><?php echo $row['beneficiary_address'] ?></td>
					   <td valign="top"><?php echo $row['beneficiary_guardian'] ?></td>
					   <td valign="top"><?php echo $row['beneficiary_region'] ?></td>
					</tr>			
					<?php } ?>
				  </tbody>
				</table><br>
			
				</div>
              </div>			  
            </div>
          </div>
		</div>
<?php include AS_THEME."as_footer.php" ?>
    
