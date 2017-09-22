<?php include AS_THEME."as_header.php";
	$database = new As_Dbconn();			
	$as_db_query = "SELECT * FROM as_payment ORDER BY paymentid ASC LIMIT 20";
	$results = $database->get_results( $as_db_query );
?>
	<div id="site_content">
	<h1><?php echo $database->as_num_rows( $as_db_query ) ?> orders 
		<a style="float:right;width:300px;text-align:center;" href="index.php?action=payment_new">New Order</a> </h1>          	<table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th></th>
				  <th>Date</th>
				  <th>Time</th>
				  <th>Customers</th>
				  <th>Items</th>
				  <th>Bill (kshs)</th>
				  <th></th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=payment_view&amp;as_paymentid=<?php echo $row['paymentid'] ?>'">
					<td></td>
					<td><?php echo $row['payment_date'] ?></td>
					<td><?php echo $row['payment_time'] ?></td>
					<td><?php echo $row['payment_quantity'] ?></td>
					<td><?php echo $row['payment_itemi'].' '.$row['payment_itemii'] ?></td>
					<td><?php echo $row['payment_amount'] ?></td>
					<td></td>
		        </tr>
			
			<?php } ?>			
	  </tbody>
	</table>
</div>
<?php include AS_THEME."as_footer.php" ?>
    
