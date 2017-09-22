<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	
		
<?php 
	$database = new Js_Dbconn();			
	
		$js_db_query = "SELECT * FROM js_session ORDER BY sessionid DESC LIMIT 20";
		$results = $database->get_results( $js_db_query );
	?>
	  <div id="content"> 
        
        <div class="content_session">
		<br>
		  <h1><?php echo $database->js_num_rows( $js_db_query ) ?> Sessions
		  <a style="float:right;width:300px;text-align:center;" href="index.php?action=session_new">New Session</a> </h1> 
          <br><hr><br>
			<div class="main_content" align="center">
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th>Parking Slot</th>
				  <th>Customer</th>
				  <th>Date</th>
				  <th>Amount</th>
				  <th>Payment</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=session_view&amp;js_sessionid=<?php echo $row['sessionid'] ?>'">
					<td><?php echo $row['session_parkingslot'] ?></td>
					<td><?php echo $row['session_customer'] ?></td>
					<td><?php echo $row['session_datetime'] ?></td>
					<td><?php echo $row['session_amount'] ?>/=</td>
					<td><?php echo $row['session_payment'] ?></td>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_session-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
