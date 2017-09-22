<?php include AS_THEME."as_header.php";

	$paymentid = $results['payment'];
	$as_db_query = "SELECT * FROM as_payment WHERE paymentid = '$paymentid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list($paymentid, $payment_amount, $payment_expected, $payment_session, $payment_paidby, $payment_paid) = $database->get_row( $as_db_query );
}
		
?>
<div id="content">
            <div id="featured">
            <h2 class="h2-line-2">Update a Attendant's Payment</h1> 
          <br><hr><br>
			<div class="main_content">
			
				<form role="form" method="post" name="Postpayment" action="index.php?action=payment_view&&as_paymentid=<?php echo $paymentid ?>" >
                <table style="width:100%;font-size:20px;">
				
				<tr>
					<td>Session</td>
					<td><input type="text" autocomplete="off" name="session" value="<?php echo $payment_session ?>"></td>
				</tr>
					
				<tr>
					<td>Amount Paid:</td>
					<td><input type="text" autocomplete="off" name="amount" value="<?php echo $payment_amount ?>"></td>
				</tr>
							
				</table><br>
                    <input type="submit" class="readmore" name="UpdateItem" value="Update Payment">
					<a href="index.php?action=payment_delete&&as_paymentid=<?php echo $paymentid ?>" class="readmore" onclick="return confirm('Are you sure you want to delete this payment from the system? \nBe careful, this page can not be reversed.')">Delete Payment</a>
			  </center><br>
			  </form>
		</div>
		<br>
	</div>
<?php include AS_THEME."as_footer.php" ?>
    
