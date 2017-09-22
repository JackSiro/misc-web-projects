<?php 

	$itemid = $results['item'];
	$js_db_query = "SELECT * FROM js_item WHERE itemid = '$itemid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $itemid, $item_type, $item_quantity, $item_postedby, $item_posted, $item_supplier, $item_price, $item_unit, $item_img, $item_updated, $item_updatedby) = $database->get_row( $js_db_query );
}
		
?>

<?php include JS_THEME."js_header.php"; ?>

	<section id="content">
	  <div class="innerblock pad-2">
        <div class="block-4 col-3">
          <div class="h2">

	  
		  
			<div class="main_content">
				<div class="detail_info">
				<h1>Stationery Item: <?php echo js_type_item($item_type) ?></h1> 
          <br><hr>
				<table>
				<tr><td>
				<center><img src="<?php echo "js_media/".$item_img ?>" class="iconic_big_i"/></center>
				</td><td>
				<h2>Item: <?php echo js_type_item($item_type) ?></h2>
				<h2>Quantity: <?php echo $item_quantity.' '.$item_unit ?>
				<?php echo ', Kshs. '.$item_price.' each' ?></h2>
				<h2>Supplier: <?php echo js_supplier_item($item_supplier) ?></h2>
				<h2>Received on: <?php echo date("j/m/y", strtotime($item_posted)); ?></h2>
				</td></tr>
				</table>
				<hr>
				<center><h2><a href="index.php?action=item_edit&&js_itemid=<?php echo $itemid ?>">Edit this Item</a>
				 | <a href="index.php?action=item_delete&&js_itemid=<?php echo $itemid ?>" onclick="return confirm('Are you sure you want to delete this item from the system? \nBe careful, this action can not be reversed.')">Delete this Item</a></h2></center>
				 <form role="form" method="post" name="PostItem" action="index.php?action=item_view" >
				<input type="hidden" name="itemid" value="<?php echo $itemid ?>" />
				<input type="hidden" name="itemprice" value="<?php echo $item_price ?>" />
				<input type="hidden" name="itemtitle" value="<?php echo $item_unit." of ".js_type_item($item_type) ?>" />
				<br>
				<div class="detail_info">
					<br><br>
					<h1>Place an Order for this Item</h1> 
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
  </section>
<?php include JS_THEME."js_footer.php" ?>
    
