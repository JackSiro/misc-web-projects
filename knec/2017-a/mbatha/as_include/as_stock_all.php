<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	
		
<?php 
	$database = new As_Dbconn();			
	$as_db_query = "SELECT * FROM as_item
					LEFT JOIN as_stock ON as_item.itemid = as_stock.stock_itemid
					ORDER BY as_item.itemid  ASC LIMIT 20";
		$results = $database->get_results( $as_db_query );
		$stockvl = 0;
	?>
	  <div id="content"> 
       
        <div class="content_item">
		  <h1>Stock Available
		  <a style="float:right;width:300px;text-align:center;" href="index.php?action=stock_new">Add New Stock</a> </h1> 
          <br><hr><br>
			<div class="main_content" align="center">
			
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th></th>
				  <th>Item</th>
				  <th>Avalaible Stock</th>
				  <th style="text-align:center;" colspan="2">Stock Value (Kshs)</th>
				  <th></th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { 
					$itemid = $row['itemid'];
				?>
					<tr onclick="location='index.php?action=stock_edit&amp;as_stockid=<?php echo $row['stockid'] ?>'">
					   <td></td>
					   <td><?php echo $row['item_title'] ?></td>
					   <td><?php echo $row['item_stock'].' '.$row['item_unit'].'s 
					   ('.$row['item_stock']/$row['item_items'].' '.$row['item_container'].'s)' ?></td>
					   <td style="text-align:right;"><?php $stocknow = $row['item_stock'] * $row['item_price'];
					   $stockvl = $stockvl + $stocknow; echo $stocknow; ?></td>
					   <td>.00</td>
					   <td></td>
					</tr>			
					<?php } ?>
					<tr style="font-weight:bold;background:darkblue;color:#fff;">
						<td></td><td></td><td style="text-align:right;">TOTAL</td>
						<td style="text-align:right;"><?php echo $stockvl ?></td><td>.00</td><td></td>
					</tr>
				  </tbody>
				</table><br>
				<a href="index.php?action=stock_in"><h3>Report: View All Stock Received</h3></a><br>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
