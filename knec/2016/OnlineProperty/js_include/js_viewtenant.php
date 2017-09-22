<?php 

	$tenantid = $results['tenant'];
	$js_db_query = "SELECT * FROM js_tenant WHERE tenantid = '$tenantid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $tenantid, $tenant_name, $tenant_house, $tenant_idno, $tenant_status, $tenant_contacts, $tenant_postedby, $tenant_posted, $tenant_inquiries, $tenant_subject, $tenant_img, $tenant_updated, $tenant_updatedby) = $database->get_row( $js_db_query );
}
		
?>

<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_tenant">
		<br>
		  <h1>Tenants: <?php echo $tenant_status.' | '.$tenant_name ?></h1> 
          <br><hr><br>
			<div class="main_content">
				<div class="iconic_info">
					<img src="<?php echo "js_media/".$tenant_img ?>" class="iconic_big_i"/>
					<hr class="detail_info_hr"/>
					<a href="index.php?action=edittenant&&js_tenantid=<?php echo $tenantid ?>"><h1>Edit House</h1></a>
					<hr class="detail_info_hr"/>
					<a href="index.php?action=deletetenant&&js_tenantid=<?php echo $tenantid ?>" onclick="return confirm('Are you sure you want to delete: <?php echo $tenant_status ?> from the system? \nBe careful, this action can not be reversed.')"><h1>Delete House</h1></a>
					
			    </div>
				<div class="detail_info">
					<h2>Title: <?php echo $tenant_status ?></h2>
					<h2>House: <?php echo js_house_tenant($tenant_house) ?></h2><hr class="detail_info_hr"/>
					<h2>Description: <?php echo $tenant_contacts ?></h2><hr class="detail_info_hr"/>
					<h2>Publisher: <?php echo $tenant_inquiries ?></h2>
					<h2>Subject: <?php echo $tenant_subject ?></h2><hr class="detail_info_hr"/>
					<h2>Posted: <?php echo date("j/m/y", strtotime($tenant_posted)); ?><h2>
				</div>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_tenant-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
