<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	
		
<?php 
	$database = new Js_Dbconn();			
	
		$js_db_query = "SELECT * FROM js_field ORDER BY fieldid DESC LIMIT 20";
		$results = $database->get_results( $js_db_query );
	?>
	  <div id="content"> 
        <?php include JS_THEME."js_sidebar.php" ?>
	  
        <div class="content_item">
		<br>
		  <h1><?php echo $database->js_num_rows( $js_db_query ) ?> Fields </h1> 
          <br><hr><br>
			<div class="main_content" align="center">
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th style="width:70px;"></th>
				  <th>Order</th>
				  <th>Cost</th>
				  <th>Buyer</th>
				  <th>Ordered on</th>
				  <th></th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=field_view&amp;js_fieldid=<?php echo $row['fieldid'] ?>'">
					<td><img class="iconic" src="js_media/field_default.jpg" /></td>
					<td><?php echo $row['field_qty']." ".$row['field_title'] ?></td>
					<td><?php echo $row['field_price'] ?>/=</td>
					<td><?php echo $row['field_fullname'] ?><br>
					<?php echo $row['field_mobile'] ?><br>
					<?php echo $row['field_email'] ?><br>
					<?php echo $row['field_address'] ?></td>
					<td><?php echo date("j/m/y", strtotime($row['field_created'])); ?></td>
					<td></td>
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
<?php include JS_THEME."js_footer.php" ?>
    
