<?php include AS_THEME."as_header.php"; 
	$database = new As_Dbconn();			
	$as_db_query = "SELECT * FROM as_billing
					LEFT JOIN as_patient ON as_billing.bill_patient = as_patient.patientid
					ORDER BY as_billing.bill_patient  ASC LIMIT 20";
	$results = $database->get_results( $as_db_query );
?>
<div id="content">
	<div>
		<h1>Billing List</h1><br>
		<table class="tt_tb">
			<thead><tr class="tt_tr">
			  <th>Patient</th>
			  <th>Decription</th>
			  <th>Expected</th>
			  <th>Bill</th>
			  <th>Received</th>
			</tr></thead>
			<tbody>
			<?php foreach( $results as $row ) { ?>
				<tr onclick="location='index.php?action=billing_view&amp;as_billingid=<?php echo $row['billid'] ?>'">
				   <td><?php echo $row['patient_name'].' ('.$row['patient_type'].')' ?></td>
				  <td><?php echo $row['bill_title'] ?></td>
				  <td><?php echo $row['bill_expected'] ?></td>
				  <td><?php echo $row['bill_billing'] ?></td>
				  <td><?php echo $row['bill_posted'] ?></td>
				</tr>				
			<?php } ?>			
			  </tbody>
		</table>
		<div id="blog">
			<div id="articles">
				<div class="section">
					<a href="index.php?action=billing_new" class="oldpost">New Billing</a>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<?php include AS_THEME."as_footer.php" ?>
   