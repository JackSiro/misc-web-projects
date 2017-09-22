<?php include AS_THEME."as_header.php";

	$paymentid = $results['payment'];
	$as_db_query = "SELECT * FROM as_payment WHERE paymentid = '$paymentid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list($paymentid, $payment_quantity, $payment_date, $payment_time, $payment_paidby, $payment_paid) = $database->get_row( $as_db_query );
}
		
?>	<div id="site_content">
	<?php include AS_THEME."as_sidebar.php" ?>
	<h1>Update a Client's Payment</h1> 
		<form role="form" method="post" name="Postpayment" action="index.php?action=payment_view&&<?php echo $paymentid ?>" >
                <div class="form_settings">
				
			<p><span>Session</span><input type="text" autocomplete="off" name="session" value="<?php echo $payment_time ?>"></p>
					
			<p><span>Amount Paid</span><input type="text" autocomplete="off" name="amount" value="<?php echo $payment_quantity ?>"></p>
			<br>
                    <input type="submit" class="readmore" name="UpdateItem" value="Update Payment">
					<input type="submit" class="readmore" name="DeleteItem" value="Delete Payment">
			  </center><br>
			  </form>
		</div>
		<br>
	</div>
<?php include AS_THEME."as_footer.php" ?>
    
