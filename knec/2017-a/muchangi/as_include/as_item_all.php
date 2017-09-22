<?php include AS_THEME."as_header.php"; ?>
<div id="body">
		<div>
			<div>
				<div>
					<div>
		<?php $as_db_query = "SELECT * FROM as_item ORDER BY itemid ASC LIMIT 20";
			$database = new As_Dbconn();			
			$results = $database->get_results( $as_db_query );
		?>
	  
		  <h1><?php echo $database->as_num_rows( $as_db_query ) ?>  Items
		  <a style="float:right;width:300px;text-align:center;" href="index.php?action=item_new">New Item</a> </h1> 
          <br><hr><br>
			<div class="main_content" align="center">
			
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th></th>
				  <th>Name</th>
				  <th>Units</th>
				  <th>Price</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=item_view&amp;as_itemid=<?php echo $row['itemid'] ?>'">
				   <td></td>
				   <td><?php echo $row['item_title'] ?></td>
		          <td><?php echo $row['item_items'].' '.$row['item_unit'].'s x '.$row['item_container'] ?></td>
		          <td>@ Ksh. <?php echo $row['item_price'].' per '.$row['item_unit'] ?></td>
					
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
    
