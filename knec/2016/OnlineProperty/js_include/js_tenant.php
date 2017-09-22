<?php include JS_THEME."js_header.php"; ?>
<?php $database = new Js_Dbconn();			
		
		$js_db_query = "SELECT * FROM js_tenant ORDER BY tenantid DESC LIMIT 20";
		$results = $database->get_results( $js_db_query );
		?>

	<section id="service">
		<div class="container">
			<div class="row">
				<div class="text-center col-md-12 wow fadeInDown" data-wow-delay="2000">
					<h3><?php echo $database->js_num_rows( $js_db_query ) ?> Tenant
		  <a class="button_small" style="float:right;width:300px;text-align:center;" href="index.php?action=newtenant">Add New Tenant</a></h3>
				</div>
				<div class="col-md-2"></div>
				<div class="col-md-8 text-center">
				</div>
				<div class="col-md-2"></div>
				<div class="col-sm-12 col-md-12 wow fadeInLeft" data-wow-delay="2000">
					<div class="media">
						<i class="fa fa-cog pull-left media-object"></i>
							<div class="media-body">
								<table class="tt_tb">
								<thead><tr class="tt_tr">
								  <th>Tenant</th>
								  <th>ID. No</th>
								  <th>Status</th>
								  <th>House</th>
								  <th>Contacts</th>
								</tr></thead>
								<tbody> 
								<?php foreach( $results as $row ) { ?>
								<tr onclick="location='index.php?action=viewtenant&amp;js_tenantid=<?php echo $row['tenantid'] ?>'">
								  <td><?php echo $row['tenant_name'] ?></td>
								   <td><?php echo $row['tenant_idno'] ?></td>
								  <td><?php echo $row['tenant_status'] ?></td>
								  <td><?php echo $row['tenant_house'] ?></td>
								  <td><?php echo $row['tenant_contacts'] ?></td>
								</tr>							
							<?php } ?>
			
                      </tbody>
                    </table>
								
							</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>		
<?php include JS_THEME."js_footer.php" ?>
    
