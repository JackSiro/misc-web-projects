<?php 

	$orderid = $results['order'];
	$js_db_query = "SELECT * FROM js_order WHERE orderid = '$orderid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $orderid, $order_orderid, $order_qty, $order_price, $order_title, $order_fullname, $order_mobile, $order_email, $order_address, $order_content) = $database->get_row( $js_db_query );
}
		
?>

<?php include JS_THEME."js_header.php"; ?>

	<section id="content">
	  <div class="innerblock pad-2">
        <div class="block-4 col-3">
          <div class="h2">

	  
		  
			<div class="main_content">
				<div class="detail_info">
				<h1>Shoe order: <?php echo $order_qty.' '.$order_title ?></h1> 
          <br><hr>
				<h2>Price: <?php echo ', Kshs. '.$order_price.' each' ?></h2>
				<h2>Buyer: <?php echo $order_fullname.'<br>'.$order_mobile ?><br>
				<?php echo $order_email ?><br>
				<?php echo $order_address ?></h2>
				<h2>Details: <?php echo $order_content; ?></h2>
				
				<hr>
				<center><h2><a href="index.php?action=order_edit&&js_orderid=<?php echo $orderid ?>">Edit this order</a>
				 | <a href="index.php?action=order_delete&&js_orderid=<?php echo $orderid ?>" onclick="return confirm('Are you sure you want to delete this order from the system? \nBe careful, this action can not be reversed.')">Delete this order</a></h2></center>
				 
				</div>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_order-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </section>
<?php include JS_THEME."js_footer.php" ?>
    
