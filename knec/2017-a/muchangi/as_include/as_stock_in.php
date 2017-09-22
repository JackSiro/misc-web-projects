<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	
		
<?php 
	$database = new As_Dbconn();			
	
		$as_db_query = "SELECT * FROM as_stock ORDER BY stock_itemid ASC LIMIT 50";
		$results = $database->get_results( $as_db_query );
	?>
	  <div id="content"> 
       
        <div class="content_item">
		  <h1><?php echo $database->as_num_rows( $as_db_query ) ?>  Stock Items
		  <a style="float:right;width:300px;text-align:center;" href="index.php?action=stock_new">New Stock Item</a> </h1> 
          <br><hr><br>
			<div class="main_content" align="center">
			
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th></th>
				  <th>Item</th>
				  <th>Quantity</th>
				  <th>Stock</th>
				  <th></th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { 
					$itemid = $row['stock_itemid'];
				?>
					<tr onclick="location='index.php?action=stock_edit&amp;as_stockid=<?php echo $row['stockid'] ?>'">
					   <td></td>
					   <td><?php echo as_item_item($itemid) ?></td>
					   <td><?php echo $row['stock_quantity'].' '.as_item_container($itemid).'s' ?></td>
					   <td><?php echo $row['stock_quantity']*as_item_items($itemid).' '.as_item_unit($itemid).'s' ?></td>
					   <td></td>
					</tr>			
					<?php } ?>			
				  </tbody>
				</table>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
