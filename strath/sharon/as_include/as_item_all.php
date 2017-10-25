<?php $as_db_query = "SELECT * FROM as_item ORDER BY itemid ASC LIMIT 20";
	$database = new As_Dbconn();			
	$results = $database->get_results( $as_db_query );
include AS_THEME."as_header.php"; ?>
<div id="body">
		<div>
			<div>
				<div>
					<div>
					  <h1><?php echo $database->as_num_rows( $as_db_query ) ?>  Items
					  <a style="float:right;width:300px;text-align:center;" href="index.php?action=item_new">New Item</a> </h1> 
					  <br><hr><br>
						<div class="main_content" align="center">
						
						   <table class="tt_tb">
							<thead><tr class="tt_tr">
							  <th></th>
							  <th>Image</th>
							  <th>Name</th>
							  <th>Stock</th>
							  <th>Price</th>
							  <th>Deposit</th>
							  <th>Installments</th>
							</tr></thead>
							<tbody>
							<?php foreach( $results as $row ) { ?>
							<tr onclick="location='index.php?action=item_sell&amp;as_itemid=<?php echo $row['itemid'] ?>'">
							   <td></td>
							   <td><img src="as_media/posts/<?php echo $row['item_image'] ?>" width="50" height="50" /></td>
							   <td><?php echo $row['item_name'] ?></td>
							  <td><?php echo $row['item_stock'] ?></td>
							  <td><?php echo $row['item_price'] ?>/=</td>
							  <td><?php echo $row['item_deposit'] ?>/=</td>
							  <td><?php echo $row['item_instal'].'/= x '.$row['item_months'] ?> months</td>
								
							</tr>			
						<?php } ?>			
						 </tbody>
					   </table>
		
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
<?php include AS_THEME."as_footer.php" ?>
    
