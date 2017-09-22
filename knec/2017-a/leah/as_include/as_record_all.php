<?php include AS_THEME."as_header.php";
	$database = new As_Dbconn();			
	$as_db_query = "SELECT * FROM as_record
					LEFT JOIN as_item ON as_record.record_item = as_item.itemid
					ORDER BY as_record.recordid  ASC LIMIT 20";
	$results = $database->get_results( $as_db_query );
?>
		<div id="page">
			<div id="marketing" class="container">
				<div class="row">
					<div class="12u">
						<section>
							<header>
								<h2><?php echo $database->as_num_rows( $as_db_query ) ?> records  
		<a style="float:right;text-align:center;" href="index.php?action=record_new">New Record</a> </h2>									<table class="tt_tb">
										<thead><tr class="tt_tr">
										  <th></th>
										  <th>Item</th>
										  <th>Place</th>
										  <th>Time</th>
										  <th>Date</th>
										  <th>Measure</th>
										  <th>Submitted on</th>
										  <th></th>
										</tr></thead>
										<tbody>
										<?php foreach( $results as $row ) { ?>
										<tr onclick="location='index.php?action=record_view&amp;as_recordid=<?php echo $row['recordid'] ?>'">
											<td></td>
											<td><?php echo $row['item_name'] ?></td>
											<td><?php echo $row['record_place'] ?></td>
											<td><?php echo $row['record_time'] ?></td>
											<td><?php echo $row['record_date'] ?></td>
											<td><?php echo $row['record_measure'].' '.$row['item_unit'].'s' ?></td>
											<td><?php echo date("j/m/y", strtotime($row['record_posted'])); ?></td>
											<td></td>
										</tr>
									
									<?php } ?>			
							  </tbody>
							</table>
						</section>
					</div>
				</div>
			</div>

		</div>
<?php include AS_THEME."as_footer.php" ?>
    
