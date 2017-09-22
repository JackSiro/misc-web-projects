<?php include AS_THEME."as_header.php";
	$as_db_query = "SELECT * FROM as_item ORDER BY itemid DESC LIMIT 20";
	$database = new As_Dbconn();			
	$results = $database->get_results( $as_db_query );
?>
		<div id="page">
			<div id="marketing" class="container">
				<div class="row">
					<div class="12u">
						<section>
							<header>
								<h2><?php echo $database->as_num_rows( $as_db_query ) ?> items
								  <a style="float:right;text-align:center;" href="index.php?action=item_new">New item</a> </h2>
							</header>
							<table class="tt_tb">
								<thead><tr class="tt_tr">
								  <th></th>
								  <th>Name</th>
								  <th>Code</th>
								  <th>Description</th>
								  <th>Unit</th>
								  <th>Created</th>
								</tr></thead>
								<tbody>
								<?php foreach( $results as $row ) { ?>
								<tr onclick="location='index.php?action=item_view&amp;as_itemid=<?php echo $row['itemid'] ?>'">
								   <td></td>
								   <td><?php echo $row['item_name'] ?></td>
								  <td><?php echo $row['item_code'] ?></td>
								  <td><?php echo $row['item_description'] ?></td>
								  <td><?php echo $row['item_unit'] ?></td>
								  <td><?php echo date("j/m/y", strtotime($row['item_created'])); ?></td>
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
    
