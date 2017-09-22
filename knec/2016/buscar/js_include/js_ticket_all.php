<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	
		
<?php 
	$database = new Js_Dbconn();			
	
		$js_db_query = "SELECT * FROM js_ticket ORDER BY ticketid DESC LIMIT 20";
		$results = $database->get_results( $js_db_query );
	?>
	  <div id="content"> 
        
	  
        <div class="content_item">
		<br>
		  <h1><?php echo $database->js_num_rows( $js_db_query ) ?> Tickets </h1> 
          <br><hr><br>
			<div class="main_content" align="center">
			   <table class="tt_tbb" >
				<thead><tr class="tt_tr">
				  <th>Passenger</th>
				  <th>Date</th>
				  <th>Time</th>
				  <th>From</th>
				  <th>To</th>
				  <th>Mobile</th>
				  <th>Bus</th>
				  <th>Amount</th>
				  <th>Payment</th>
				</tr></thead>
				<tbody>				
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?page=ticket_view&amp;js_ticketid=<?php echo $row['ticketid'] ?>'">
					<td><?php echo $row['ticket_customer'] ?></td>
					<td><?php echo $row['ticket_date'] ?></td>
					<td><?php echo $row['ticket_depature'] ?></td>
					<td><?php echo $row['ticket_pagefrom'] ?></td>
					<td><?php echo $row['ticket_pageto'] ?></td>
					<td><?php echo $row['ticket_mobile'] ?></td>
					<td><?php echo $row['ticket_bus'] ?></td>
					<td><?php echo $row['ticket_amount'] ?></td>
					<td><?php echo $row['ticket_payment'] ?></td>
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
    
