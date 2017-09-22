<?php 

	$sessionid = $results['session'];
	$js_db_query = "SELECT * FROM js_session WHERE sessionid = '$sessionid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $sessionid, $session_customer, $session_parkingslot, $session_datetime, $session_amount, $session_payment) = $database->get_row( $js_db_query );
}
		
?>

<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content"> 
        
        <div class="content_session">
		<br>
		  
			<div class="main_content">
				<div class="detail_info">				
				<h2>Customer: <?php echo $session_customer ?></h2>
				<h2>Parking Slot: <?php echo $session_parkingslot ?></h2>
				<h2>When: <?php echo $session_datetime ?></h2>
				<h2>Amount: <?php echo $session_amount ?></h2>
				<h2>Payment: <?php echo $session_payment ?></h2>
				</td></tr>
				</table>
				<hr>
				<center><h2><a href="index.php?action=session_delete&&js_sessionid=<?php echo $sessionid ?>" onclick="return confirm('Are you sure you want to delete this session from the system? \nBe careful, this action can not be reversed.')">Delete this Item</a></h2></center>
				 
				<br>
				
				</div>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_session-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
