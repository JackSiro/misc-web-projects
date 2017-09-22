<?php include AS_THEME."as_header.php";

	$paymentid = $results['payment'];
	$as_db_query = "SELECT * FROM as_payment WHERE paymentid = '$paymentid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list($paymentid, $payment_amount, $payment_date, $payment_session, $payment_paidby, $payment_paid) = $database->get_row( $as_db_query );
}
		
?><div id="site_content">
	<h1>Update a Client's Payment</h1> 
		<form role="form" method="post" name="Postpayment" action="index.php?action=payment_view&&<?php echo $paymentid ?>" >
                <div class="form_settings">
				
			<p><span>Session</span><input type="text" autocomplete="off" name="session" value="<?php echo $payment_session ?>"></p>
					
			<p><span>Amount Paid</span><input type="text" autocomplete="off" name="amount" value="<?php echo $payment_amount ?>"></p>
			<br>
                    <input type="submit" class="readmore" name="UpdateItem" value="Update Payment">
					<input type="submit" class="readmore" name="DeleteItem" value="Delete Payment">
			  </center><br>
			  </form>
		</div>
		<br>
	</div>
<?php include AS_THEME."as_footer.php" ?>
    
