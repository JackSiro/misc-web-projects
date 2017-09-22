<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	
		
		<?php $js_db_query = "SELECT * FROM js_customer ORDER BY customerid DESC LIMIT 20";
			$database = new Js_Dbconn();			
			$results = $database->get_results( $js_db_query );
		?>
	  <div id="content"> 
        
        <div class="content_item">
		<br>
		  <h1><?php echo $database->js_num_rows( $js_db_query ) ?> Customers
		  <a style="float:right;width:300px;text-align:center;" href="index.php?action=customer_new">New Customer</a> </h1> 
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
		        <tr onclick="location='index.php?action=customer_view&amp;js_customerid=<?php echo $row['customerid'] ?>'">
				   <td><img class="iconic" src="js_media/<?php echo $row['customer_avatar'] ?>" /></td>
				   <td><?php echo $row['customer_fullname'] ?></td>
		          <td><?php echo $row['customer_mobile'] ?></td>
		          <td><?php echo $row['customer_email'] ?></td>
		          <td><?php echo $row['customer_address'] ?></td>
				  <td><?php echo date("j/m/y", strtotime($row['customer_joined'])); ?></td>
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
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
