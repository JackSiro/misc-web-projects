<?php include AS_THEME."as_header.php"; 
	$database = new As_Dbconn();			
	$as_db_query = "SELECT * FROM as_resource
					LEFT JOIN as_beneficiary ON as_resource.resource_beneficiary = as_beneficiary.beneficiaryid
					ORDER BY as_resource.resource_beneficiary  ASC LIMIT 20";
		$results = $database->get_results( $as_db_query );
	?>
	<div id="content">
          <div class="scroll">
            <div class="scrollContainer">
			
              <div class="panel">    
		  <h1>Resources
		  <a style="float:right;text-align:center;" href="index.php?action=resource_new">New Resource</a> </h1> 
          
			<div class="main_content" align="center">
			
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th>Beneficiary</th>
				  <th>Item Title</th>
				  <th>Item Description</th>
				  <th>Allocated on</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
					<tr>
					   <td><?php echo $row['beneficiary_name'] ?></td>
					   <td><?php echo $row['resource_title'] ?></td>
					   <td><?php echo $row['resource_content'] ?></td>
					   <td><?php echo $row['resource_posted'] ?></td>
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
  </div>
              </div>			  
            </div>
          </div>
		</div>
<?php include AS_THEME."as_footer.php" ?>
    
