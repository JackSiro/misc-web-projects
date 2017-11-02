<?php
	$database = new As_Dbconn();			
	$as_db_query = "SELECT * FROM as_client
		LEFT JOIN as_plan ON as_client.client_plan = as_plan.planid
		ORDER BY clientid DESC LIMIT 50";
	$results = $database->get_results( $as_db_query );
	include AS_THEME."as_header.php"; 
?>
	<div id="tooplate_content">	
	  <div id="content">
        <div>
		<br>
		  <h1><?php echo $database->as_num_rows( $as_db_query ) ?> Clients
		  <a class="button_small" style="float:right;text-align:center;" href="index.php?action=client_new">New Client</a> </h1> 
         
			<div class="main_content" align="center">
			
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th>Name</th>
				  <th>Contacts</th>
				  <th>Location</th>
				  <th>Car Details</th>
				  <th>I. Rate</th>
				  <th>Plan </th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=client_view&amp;as_clientid=<?php echo $row['clientid'] ?>'">
				   <td><?php echo $row['client_name'] ?></td>
				   <td><?php echo $row['client_mobile'] ?>,<br><?php echo $row['client_email'] ?></td>
		          <td><?php echo $row['client_location'] ?></td>
		          <td><?php echo $row['client_cyear'] ?> <?php echo $row['client_cmodel'] ?> worth: <?php echo $row['client_cvalue'] ?>/=</td>
		          <td><?php echo $row['client_cirate'] ?>%</td>
		          <?php if (empty($row['client_plan'])) { ?>
					<td> - </td>
					<?php } else { ?>
					<td><?php echo $row['plan_title'] ?> <?php echo $row['plan_price'] ?>/= 
					<br>Installments of <?php echo $row['plan_instal'] ?> @ <?php echo $row['plan_irate'] ?>%</td>
					<?php } ?>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div>
      </div>  
	</div> 	
  </div>
<?php include AS_THEME."as_footer.php" ?>
    
