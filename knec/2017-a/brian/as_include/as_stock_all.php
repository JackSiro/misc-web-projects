<?php include AS_THEME."as_header.php";
	$database = new As_Dbconn();			
	$as_db_query = "SELECT * FROM as_drug
					LEFT JOIN as_stock ON as_drug.drugid = as_stock.stock_drugid
					ORDER BY as_drug.drugid  ASC LIMIT 20";
	$results = $database->get_results( $as_db_query );
	$stockvl = 0;
?>
    <div id="site_content">
      <div id="banner"></div>	
		<div id="content">
		  <h1>Stock Available
		  <a style="float:right;width:300px;text-align:center;" href="index.php?action=stock_new">Add New Stock</a> </h1>
			<div class="main_content" align="center">
			
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th></th>
				  <th>Drug</th>
				  <th>Avalaible Stock</th>
				  <th style="text-align:center;" colspan="2">Stock Value (Kshs)</th>
				  <th></th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { 
					$drugid = $row['drugid'];
				?>
					<tr>
					   <td></td>
					   <td><?php echo $row['drug_title'] ?></td>
					   <td><?php echo $row['drug_stock'].' '.$row['drug_unit'].'s 
					   ('.$row['drug_stock']/$row['drug_items'].' '.$row['drug_container'].'s)' ?></td>
					   <td style="text-align:right;"><?php $stocknow = $row['drug_stock'] * $row['drug_price'];
					   $stockvl = $stockvl + $stocknow; echo $stocknow; ?></td>
					   <td>.00</td>
					   <td></td>
					</tr>			
					<?php } ?>
					<tr style="font-weight:bold;background:red;color:#fff;">
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
    
