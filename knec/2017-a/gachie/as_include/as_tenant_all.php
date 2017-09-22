<?php include AS_THEME."as_header.php"; ?>
    <div id="tooplate_main">                
		
<?php 
	$database = new As_Dbconn();			
	$as_db_query = "SELECT * FROM as_tenant
					LEFT JOIN as_apartment ON as_tenant.tenant_registeredby = as_apartment.apartmentid
					ORDER BY as_tenant.tenantid  ASC LIMIT 20";
	$results = $database->get_results( $as_db_query );
?>
	  
		<br>
		  <h1><?php echo $database->as_num_rows( $as_db_query ) ?> Tenants 
		<a style="float:right;width:300px;text-align:center;" href="index.php?action=tenant_new">New Tenant</a> </h1> 
          		  
          <br><hr><br>
			<div class="main_content" align="center">
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th></th>
				  <th>Apartment</th>
				  <th>Amount</th>
				  <th>Session</th>
				  <th>Paid</th>
				  <th></th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=tenant_view&amp;as_tenantid=<?php echo $row['tenantid'] ?>'">
					<td></label> <?php echo $row['apartment_fullname'] ?></label> <?php echo $row['tenant_amount'] ?></label> <?php echo $row['tenant_startdate'] ?></label> <?php echo date("j/m/y", strtotime($row['tenant_registered'])); ?></label> </td>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table>
			</div>
		<br>
      <h2><center></center></h2>
  </div>
<?php include AS_THEME."as_footer.php" ?>
    
