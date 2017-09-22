<?php 

	$stockid = $results['shopitem'];
	$as_db_query = "SELECT * FROM as_stock WHERE stockid = '$stockid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $stockid, $stock_itemid, $stock_unit, $stock_postedby, $stock_posted, $stock_client, $stock_quantity, $stock_unit, $stock_img, $stock_updated, $stock_updatedby) = $database->get_row( $as_db_query );
}
		
?>

<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	

	  <div id="content"> 
       
        <div class="content_item">
		  
			<div class="main_content">
				<div class="detail_info">
				<h1> Item: <?php echo as_item_item($stock_itemid) ?></h1> 
          <br><hr>
				<table>
				<tr><td>
				<center><img src="<?php echo "as_media/".$stock_img ?>" class="iconic_big_i"/></center>
				</td><td>
				<h2>Item: <?php echo as_item_item($stock_itemid) ?></h2>
				<h2>Quantity: <?php echo $stock_unit.' '.$stock_unit ?>
				<?php echo ', Kshs. '.$stock_quantity.' each' ?></h2>
				<h2>Client: <?php echo as_client_item($stock_client) ?></h2>
				<h2>Received on: <?php echo date("j/m/y", strtotime($stock_posted)); ?></h2>
				</td></tr>
				</table>
				<hr>
				<center><h2><a href="index.php?action=stock_edit&&as_stockid=<?php echo $stockid ?>">Edit this Item</a>
				 | <a href="index.php?action=stock_delete&&as_stockid=<?php echo $stockid ?>" onclick="return confirm('Are you sure you want to delete this shopitem from the system? \nBe careful, this action can not be reversed.')">Delete this Item</a></h2></center>
				 
				<br>
				 <form role="form" method="post" name="PlacePrescription" 
				 action="index.php?action=stock_view&&as_stockid=<?php echo $stockid ?>" >
				<input type="hidden" name="stockid" value="<?php echo $stockid ?>" />
				<input type="hidden" name="itemprice" value="<?php echo $stock_quantity ?>" />
				<input type="hidden" name="itemtitle" value="<?php echo $stock_unit." of ".as_item_item($stock_itemid) ?>" />
				<div class="detail_info">
					<br><br>
					<h1>Place an Prescription for this Item</h1> 
					  <br><hr><br>
					<table style="width:100%;font-size:20px;">
					<tr>
						<td>Choose Quantity:</td>
						<td>
						<input type="text" autocomplete="off" name="quantity" value="<?php echo $stock_unit ?>" required >
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
						<input type="submit" class="submit_this" name="PrescriptionNow" value="Prescription this Item">
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
<?php include AS_THEME."as_footer.php" ?>
    
