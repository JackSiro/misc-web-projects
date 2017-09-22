<?php include AS_THEME."as_header.php";
	$database = new As_Dbconn();			
	$as_db_query = "SELECT * FROM as_payment
					LEFT JOIN as_client ON as_payment.payment_paidby = as_client.clientid
					ORDER BY as_payment.paymentid  ASC LIMIT 20";
	$results = $database->get_results( $as_db_query );
?>
<div id="site_content">
	<h1>Payment 
		<a style="float:right;width:300px;text-align:center;" href="index.php?action=payment_new">New Payment</a> </h1>          	<table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th></th>
				  <th>Client</th>
				  <th>Amount</th>
				  <th>Date</th>
				  <th>Session</th>
				  <th>Paid on</th>
				  <th></th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=payment_view&amp;as_paymentid=<?php echo $row['paymentid'] ?>'">
					<td></td>
					<td><?php echo $row['client_fullname'] ?></td>
					<td><?php echo $row['payment_amount'] ?></td>
					<td><?php echo $row['payment_date'] ?></td>
					<td><?php echo $row['payment_session'] ?></td>
					<td><?php echo date("j/m/y", strtotime($row['payment_paid'])); ?></td>
					<td></td>
		        </tr>
			
			<?php } ?>			
	  </tbody>
	</table>
</div>
<?php include AS_THEME."as_footer.php" ?>
    
