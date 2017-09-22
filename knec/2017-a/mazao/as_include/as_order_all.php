<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	
		
<?php 
	$database = new As_Dbconn();			
	
		$as_db_query = "SELECT * FROM as_order ORDER BY orderid DESC LIMIT 20";
		$results = $database->get_results( $as_db_query );
	?>
	  <div id="content"> 
        <?php include AS_THEME."as_sidebar.php" ?>
	  
        <div class="content_item">
		<br>
		  <h1><?php echo $database->as_num_rows( $as_db_query ) ?> Order Items </h1> 
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
		        <tr onclick="location='index.php?action=order_view&amp;as_orderid=<?php echo $row['orderid'] ?>'">
					<td><img class="iconic" src="as_media/order_default.jpg" /></td>
					<td><?php echo $row['order_qty']." ".$row['order_title'] ?></td>
					<td><?php echo $row['order_price'] ?>/=</td>
					<td><?php echo $row['order_fullname'] ?><br>
					<?php echo $row['order_mobile'] ?><br>
					<?php echo $row['order_email'] ?><br>
					<?php echo $row['order_address'] ?></td>
					<td><?php echo date("j/m/y", strtotime($row['order_created'])); ?></td>
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
<?php include AS_THEME."as_footer.php" ?>
    
