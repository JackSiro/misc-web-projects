<?php 

	$productid = $results['product'];
	$js_db_query = "SELECT * FROM js_product WHERE productid = '$productid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $productid, $product_title, $product_quantity, $product_price, $product_unit ) = $database->get_row( $js_db_query );
}
		
?>
  <?php include JS_THEME."js_header.php" ?>
	<div class="container">		
		<div class="row box-5">
			<div>
				<h2><?php echo js_get_option('sitename') ?></h2>
				<div class="page_wrap">
				<h1>Product: <?php echo $product_title ?></h1>
				<h3>Quantity: <?php echo $product_quantity ?> | Price: <?php echo $product_price ?></h3><br><br>
				<div>
				<center><h3><a href="index.php?action=product_delete&&js_productid=<?php echo $productid ?>" onclick="return confirm('Are you sure you want to delete this product from the system? \nBe careful, this action can not be reversed.')">Delete this Product</a></h3></center><hr>
				 <h2>Edit Product</h2>
				 <form class='mkangara-form' method="post" 
				 action="index.php?action=product_edit&&js_productid=<?php echo $productid ?>" >
				<fieldset>
				 <table class="form_table">
				<tr>
					<td>Product Title:</td>
					<td><input type="text" autocomplete="off" name="title" value="<?php echo $product_title ?>" required ></td>
				</tr>
                <tr>
					<td>Quantity of Product:</td>
					<td><input type="text" autocomplete="off" name="quantity" value="<?php echo $product_quantity ?>" required ></td>
				</tr>
						
                <tr>
					<td>Price Per Unit:</td>
					<td><input type="text" autocomplete="off" name="price" value="<?php echo $product_price ?>" required ></td>
				</tr>
				</table>
				</fieldset> <br>
						<center><input type="submit" class="submit_this" name="SaveChanges" value="Save Changes">
			  </center><br></form>
				</div>    
              </div>
			</div>
        </div>
    </div>
<?php include JS_THEME."js_footer.php" ?>
   
