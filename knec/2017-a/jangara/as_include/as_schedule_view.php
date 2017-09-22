<?php 

	$itemid = $results['item'];
	$as_db_query = "SELECT * FROM as_item WHERE itemid = '$itemid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $itemid, $item_type, $item_quantity, $item_postedby, $item_posted, $item_worker, $item_price, $item_unit, $item_img, $item_updated, $item_updatedby) = $database->get_row( $as_db_query );
}
		
?>

<?php include AS_THEME."as_header.php"; ?>
			<div id="content">

	  
		  
			<div class="main_content">
				<div class="detail_info">
				<h1>worker: <?php echo as_type_item($item_type) ?></h1> 
          <br><hr>
				<table>
				<tr><td>
				<center><img src="<?php echo "as_media/".$item_img ?>" class="iconic_big_i"/></center>
				</td><td>
				<h2>Item: <?php echo as_type_item($item_type) ?></h2>
				<h2>Quantity: <?php echo $item_quantity.' '.$item_unit ?>
				<?php echo ', Kshs. '.$item_price.' each' ?></h2>
				<h2>worker: <?php echo as_worker_item($item_worker) ?></h2>
				<h2>Received on: <?php echo date("j/m/y", strtotime($item_posted)); ?></h2>
				</td></tr>
				</table>
				<hr>
				<center><h2><a href="index.php?action=item_edit&&as_itemid=<?php echo $itemid ?>">Edit this Item</a>
				 | <a href="index.php?action=item_delete&&as_itemid=<?php echo $itemid ?>" onclick="return confirm('Are you sure you want to delete this item from the system? \nBe careful, this action can not be reversed.')">Delete this Item</a></h2></center>
				 <form role="form" method="post" name="PostItem" action="index.php?action=item_view" >
				<input type="hidden" name="itemid" value="<?php echo $itemid ?>" />
				<input type="hidden" name="itemprice" value="<?php echo $item_price ?>" />
				<input type="hidden" name="itemtitle" value="<?php echo $item_unit." of ".as_type_item($item_type) ?>" />
				<br>
				<div class="detail_info">
					<br><br>
					<h1>Place an schedule for this Item</h1> 
					  <br><hr><br>
					<table style="width:100%;font-size:20px;">
					<tr>
						<td>Choose Quantity:</td>
						<td>
						<input type="text" autocomplete="off" name="quantity" value="<?php echo $item_quantity ?>" required >
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
						<input type="submit" class="submit_this" name="scheduleNow" value="schedule this Item">
			  </center><br>
				</form>
				</div>
			</div>
		<br>
      <h2><center></center></h2>
		
			
			</div>
<?php include AS_THEME."as_footer.php" ?>
    
