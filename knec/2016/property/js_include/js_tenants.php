<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	
		
<?php 
	$database = new Js_Dbconn();			
	
	$search = $_GET['js_search'];
	$searchcat = $_GET['js_houseid'];
	if ($searchcat<=0){
		$search_cat = "All";
		$js_db_query = "SELECT * FROM js_tenant
		WHERE tenant_status like '%$search%'
		OR tenant_contacts like '%$search%'
		OR tenant_inquiries like '%$search%'
		OR tenant_subject like '%$search%'";
	} else {
		$search_cat = js_house_tenant($searchcat);
		$js_db_query = "SELECT * FROM js_tenant
		WHERE tenant_status like '%$search%'
		OR tenant_contacts like '%$search%'
		OR tenant_inquiries like '%$search%'
		OR tenant_subject like '%$search%' 
		OR tenant_house like '%$searchcat%'";
	}
	
	$results = $database->get_results( $js_db_query );
	
?>
	  <div id="content">
        <div class="content_tenant">
		<br>
		  <h1><?php echo $database->js_num_rows( $js_db_query ) ?> Tenants found
		  <a class="button_small" style="float:right;width:300px;text-align:center;" href="index.php?action=newtenant">Add New Tenant</a> </h1> 
          <br><hr><br>
			<div class="main_content" align="center">
			<form method="post" >
			<table style="width:100%;"><tr><td>
			<input type="text" name="js_search" id="js_search" placeholder="Search the OnlineProperty" value="<?php echo $search ?>" />
			</td><td>
				<select name="js_houseid">
				<option  value="<?php echo $searchcat ?>"><?php echo $search_cat ?></option>
			<?php $js_house_qry = "SELECT * FROM js_house ORDER BY house_size ASC";
				$house_results = $database->get_results( $js_house_qry );
				
				foreach( $house_results as $js_cat ) { ?>
						<option value="<?php echo $js_cat['houseid'] ?>">  <?php echo $js_cat['house_size'] ?></option>
				<?php } ?>
				</select>
			</td>
			<td><input type="submit" style="width:200px" name="SearchThis" value="Search" /></td></tr>
			</table>
			</form>
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th style="width:70px;"></th>
				  <th>House</th>
				  <th>Title</th>
				  <th>Publisher</th>
				  <th>Subject</th>
				  <th></th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=viewtenant&amp;js_tenantid=<?php echo $row['tenantid'] ?>'">
				   <td><img class="iconic" src="js_media/<?php echo $row['tenant_img'] ?>" /></td>
				   <td><?php echo js_house_tenant($row['tenant_house']) ?></td>
				   <td><?php echo $row['tenant_status'] ?></td>
		          <?php //echo substr($row['tenant_contacts'],0,100).'...' ?>
				  <td><?php echo $row['tenant_inquiries'] ?></td>
				  <td><?php echo $row['tenant_subject'] ?></td>
		          <td></td>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_tenant-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
