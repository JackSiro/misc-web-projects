<?php include JS_THEME."js_header.php"; ?>

	<section id="content">
	  <div class="innerblock pad-2">
        <div class="block-4 col-3">
          <div class="h2">
		
		<?php $js_db_query = "SELECT * FROM js_supplier ORDER BY suppid DESC LIMIT 20";
			$database = new Js_Dbconn();			
			$results = $database->get_results( $js_db_query );
		?>
	  
		  <h1><?php echo $database->js_num_rows( $js_db_query ) ?> Suppliers
		  <a style="float:right;width:300px;text-align:center;" href="index.php?action=supp_new">New Supplier</a> </h1> 
          <br><hr><br>
			<div class="main_content" align="center">
			
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th style="width:70px;"></th>
				  <th>Full Name</th>
				  <th>Mobile</th>
				  <th>Email</th>
				  <th>Address</th>
				  <th>Registered</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=supp_view&amp;js_suppid=<?php echo $row['suppid'] ?>'">
				   <td><img class="iconic" src="js_media/<?php echo $row['supp_avatar'] ?>" /></td>
				   <td><?php echo $row['supp_fullname'] ?></td>
		          <td><?php echo $row['supp_mobile'] ?></td>
		          <td><?php echo $row['supp_email'] ?></td>
		          <td><?php echo $row['supp_address'] ?></td>
				  <td><?php echo date("j/m/y", strtotime($row['supp_joined'])); ?></td>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </section>
<?php include JS_THEME."js_footer.php" ?>
    
