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
		  <h1>Edit a Tenant</h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" name="SaveHouse" action="index.php?action=edittenant&&js_tenantid=<?php echo $tenantid ?>" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<tr>
					<td>Choose a House:</td>
					<td><select name="house" style="padding-left:20px;">
						<option value="<?php echo $tenantid ?>" > - Choose a House - </option>
			<?php $js_db_query = "SELECT * FROM js_house ORDER BY house_size ASC";
				$database = new Js_Dbconn();			
				$results = $database->get_results( $js_db_query );
				
				foreach( $results as $row ) { ?>
						<option value="<?php echo $row['houseid'] ?>">  <?php echo $row['house_size'] ?></option>
				<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Title of the Tenant:</td>
					<td><input type="text" autocomplete="off" name="title" value="<?php echo $tenant_status ?>"></td>
				</tr>
				<tr>
					<td>Code of the Tenant:</td>
					<td><input type="text" autocomplete="off" name="code" value="<?php echo $tenant_name ?>"></td>
				</tr>
				<tr>
					<td>Upload House Icon:</td>
					<td>
					<input type="hidden" name="tenantimg" value="<?php echo $tenant_img ?>">	
						<table style="width:100%"><tr><td>
						<img src="<?php echo 'js_media/'.$tenant_img ?>" style="width:70px;height:70px;" >
						</td><td>
						<input name="filename" autocomplete="off" type="file" accept="image/*" >
						</td></tr></table>
					</td>
				</tr>
                
                <tr>
					<td>Description (500 max):</td>
					<td><textarea style="height:200px" name="content" autocomplete="off" ><?php echo $tenant_contacts ?></textarea></td>
				</tr>
				<tr>
					<td>Publisher of the Tenant:</td>
					<td><input type="text" autocomplete="off" name="publisher" value="<?php echo $tenant_inquiries ?>"></td>
				</tr>
				
				<tr>
					<td>Subject/Topic of the Tenant:</td>
					<td><input type="text" autocomplete="off" name="subject" value="<?php echo $tenant_subject ?>"></td>
				</tr>
				
				</table><br>
                        <center><input type="submit" class="submit_this" name="SaveHouse" value="Save Changes">
						<input type="submit" class="submit_this" name="SaveClose" value="Save & Close">
			  </center><br></form>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_tenant-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
