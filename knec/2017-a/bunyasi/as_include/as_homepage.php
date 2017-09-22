<?php include AS_THEME."as_header.php"; ?>
			<div id="content"> 
				<div id="featured">
		
<?php 
	$database = new As_Dbconn();			
	$as_db_query = "SELECT * FROM as_payment
					LEFT JOIN as_attendant ON as_payment.payment_paidby = as_attendant.attendantid
					ORDER BY as_payment.paymentid  ASC LIMIT 20";
	$results = $database->get_results( $as_db_query );
?>
	  
		<br>
		  <h1>Payment 
		<a style="float:right;width:300px;text-align:center;" href="index.php?action=payment_new">New Payment</a> </h1> 
          		  
          <br><hr><br>
			<div class="main_content" align="center">
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th></th>
				  <th>Attendant</th>
				  <th>Amount</th>
				  <th>Session</th>
				  <th>Paid</th>
				  <th></th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=payment_view&amp;as_paymentid=<?php echo $row['paymentid'] ?>'">
					<td></td>
					<td><?php echo $row['attendant_fullname'] ?></td>
					<td><?php echo $row['payment_amount'] ?></td>
					<td><?php echo $row['payment_session'] ?></td>
					<td><?php echo date("j/m/y", strtotime($row['payment_paid'])); ?></td>
					<td></td>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table>
			</div>
		<br>
      <h2><center></center></h2>
  </div>
<?php include AS_THEME."as_footer.php" ?>
    
