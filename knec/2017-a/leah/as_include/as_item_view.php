<?php 

	$itemid = $results['item'];
	$as_db_query = "SELECT * FROM as_item WHERE itemid = '$itemid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $itemid, $item_name, $item_code, $item_description, $item_unit, $item_created) = $database->get_row( $as_db_query );
}
	include AS_THEME."as_header.php"; ?>
		<div id="page">
			<div id="marketing" class="container">
				<div class="row">
					<div class="12u">
						<section>
							<header>
								<h2>Update item</h2> 
								<form role="form" method="post" name="Postitem" action="index.php?action=item_view&&as_itemid=<?php echo $itemid ?>">
                					<p><span>Item Name</span><input type="text" autocomplete="off" name="name" value="<?php echo $item_name ?>"></p>				
									<p><span>Item Code</span><input type="text" autocomplete="off" name="code" value="<?php echo $item_code ?>"></p>				
									<p><span>Item Description</span><input type="text" autocomplete="off" name="description" value="<?php echo $item_description ?>"></p>
									<p><span>Item Unit</span><input type="text" autocomplete="off" name="unit" value="<?php echo $item_unit ?>"></p>
									<br><p>
									<input type="submit" class="button" name="UpdateItem" value="Update item">
								<input type="submit" class="button" name="DeleteItem" value="Delete Item"></p>
							</form>
					</section>
				</div>
				<div class="divider"></div>
			</div>
		</div>
<?php include AS_THEME."as_footer.php" ?>
    
