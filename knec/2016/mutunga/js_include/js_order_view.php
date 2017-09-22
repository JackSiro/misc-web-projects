<?php 

	$orderid = $results['order'];
	$js_db_query = "SELECT * FROM js_order WHERE orderid = '$orderid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $orderid, $order_itemid, $order_qty, $order_price, $order_title, $order_fullname, $order_mobile, $order_email, $order_address, $order_content, $order_createdby, $order_created) = $database->get_row( $js_db_query );
}
		
?>

<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content"> 
       
        <div class="content_item">

		  <br> 
         <?php include JS_THEME."js_slide.php" ?>
		  
			<div class="main_content">
				<div class="detail_info">
				
				<h1>Ordered Item: <?php echo $order_qty.' '.$order_title ?></h1> 
          <br><hr>
		 		<h2>Order Cost: <?php echo $order_price ?></h2>
				<h2>Buyer's Mobile: <?php echo $order_mobile ?></h2>
				<h2>Buyer's Email: <?php echo $order_email ?></h2>
				<h2>Buyer's Address: <?php echo $order_address ?></h2>
				<h2>Ordered on: <?php echo date("j/m/y", strtotime($order_created)) ?></h2>
				
				<hr>
				<center><h2><a href="index.php?action=order_edit&&js_orderid=<?php echo $orderid ?>">Edit this Item</a>
				 | <a href="index.php?action=order_delete&&js_orderid=<?php echo $orderid ?>" onclick="return confirm('Are you sure you want to delete this order from the system? \nBe careful, this action can not be reversed.')">Delete this Item</a></h2></center>
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
    
