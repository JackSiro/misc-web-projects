<?php 
	$database = new As_Dbconn();
	$as_db_query = "SELECT * FROM as_sales 
		LEFT JOIN as_item ON as_sales.sales_itemid = as_item.itemid
		LEFT JOIN as_user ON as_sales.sales_buyerid = as_user.userid
		ORDER BY itemid ASC";
	$results = $database->get_results( $as_db_query );
 include AS_THEME."as_header.php"; ?>
<div id="body">
		<div>
			<div>
				<div>
					<div>
					  <h1><?php echo $database->as_num_rows( $as_db_query ) ?>  Sales
					  <a style="float:right;width:300px;text-align:center;" href="index.php?action=buyers">Buyers</a> </h1> 
					  <br><hr><br>
						<div class="main_content" align="center">
						
						   <table class="tt_tb">
							<thead><tr class="tt_tr">
							  <th></th>
							  <th>Image</th>
							  <th>Name</th>
							  <th>Price</th>
							  <th>Buyer</th>
							  <th>Mobile</th>
							  <th>Payment</th>
							</tr></thead>
							<tbody>
							<?php foreach( $results as $row ) { ?>
							<tr onclick="location='index.php?action=item_sell&amp;as_itemid=<?php echo $row['itemid'] ?>'">
							   <td></td>
							   <td><img src="as_media/posts/<?php echo $row['item_image'] ?>" width="50" height="50" /></td>
							   <td><?php echo $row['item_name'] ?></td>
							  <td><?php echo $row['item_price'] ?></td>
							  <td><?php echo $row['user_fname'].' '.$row['user_surname'] ?>/=</td>
							  <td><?php echo $row['user_mobile'] ?></td>
							  <td><?php echo $row['sales_paymode'] ?></td>
								
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