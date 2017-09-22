<?php 

	$ticketid = $results['item'];
	$js_db_query = "SELECT * FROM js_ticket WHERE ticketid = '$ticketid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $ticketid, $ticket_bus, $ticket_quantity, $ticket_postedby, $ticket_posted, $ticket_supplier, $ticket_price, $ticket_unit, $ticket_img, $ticket_updated, $ticket_updatedby) = $database->get_row( $js_db_query );
}
		
?>

<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content"> 
        
	  
        <div class="content_item">
		<br>
		  
			<div class="main_content">
				<div class="detail_info">
				<h1>Company Item: <?php echo js_bus_item($ticket_bus) ?></h1> 
          <br><hr>
				<table>
				<tr><td>
				<center><img src="<?php echo "js_media/".$ticket_img ?>" class="iconic_big_i"/></center>
				</td><td>
				<h2>Item: <?php echo js_bus_item($ticket_bus) ?></h2>
				<h2>Quantity: <?php echo $ticket_quantity.' '.$ticket_unit ?>
				<?php echo ', Kshs. '.$ticket_price.' each' ?></h2>
				<h2>Supplier: <?php echo js_supplier_item($ticket_supplier) ?></h2>
				<h2>Received on: <?php echo date("j/m/y", strtotime($ticket_posted)); ?></h2>
				</td></tr>
				</table>
				<hr>
				<center><h2><a href="index.php?page=ticket_edit&&js_ticketid=<?php echo $ticketid ?>">Edit this Item</a>
				 | <a href="index.php?page=ticket_delete&&js_ticketid=<?php echo $ticketid ?>" onclick="return confirm('Are you sure you want to delete this item from the system? \nBe careful, this page can not be reversed.')">Delete this Item</a></h2></center>
				 <form role="form" method="post" name="PostItem" action="index.php?page=ticket_view" >
				<input type="hidden" name="ticketid" value="<?php echo $ticketid ?>" />
				<input type="hidden" name="itemprice" value="<?php echo $ticket_price ?>" />
				<input type="hidden" name="itemtitle" value="<?php echo $ticket_unit." of ".js_bus_item($ticket_bus) ?>" />
				<br>
				<div class="detail_info">
					<br><br>
					<h1>Place an Order for this Item</h1> 
					  <br><hr><br>
					<table style="width:100%;font-size:20px;">
					<tr>
						<td>Choose Quantity:</td>
						<td>
						<input type="text" autocomplete="off" name="quantity" value="<?php echo $ticket_quantity ?>" required >
						</td>
					</tr>
					<tr>
						<td>Buyer's Full Name</td>
						<td>
						<input type="text" autocomplete="off" name="fullname" required >
						</td>
					</tr> 
					<tr>
						<td>Buyer's Mobile No.</td>
						<td>
						<input type="text" autocomplete="off" name="mobile" required >
						</td>
					</tr>
					<tr>
						<td>Buyer's Email</td>
						<td>
						<input type="text" autocomplete="off" name="email" required >
						</td>
					</tr>
					<tr>
						<td>Physical Address:</td>
						<td>
						<textarea name="address" autocomplete="off" ></textarea>
						</td>
					</tr>
					<tr>
						<td>Additional Notes (Options):</td>
						<td>
						<textarea name="content" autocomplete="off" ></textarea>
						</td>
					</tr>
					
					</table>
					<br>
                        <center>
						<input type="submit" class="submit_this" name="OrderNow" value="Order this Item">
			  </center><br>
				</form>
				</div>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
