<?php include AS_THEME."as_header.php";
	$database = new As_Dbconn();			
			
	$as_db_query = "SELECT * FROM as_sales
					LEFT JOIN as_drug ON as_sales.sales_drugid = as_drug.drugid
					ORDER BY as_sales.sales_drugid  ASC LIMIT 20";
	$results = $database->get_results( $as_db_query );
?>
    <div id="site_content">
      <div id="banner"></div>	
		<div id="content">
		  <h1><?php echo $database->as_num_rows( $as_db_query ) ?> Sales </h1>
			<div class="main_content" align="center">
			   
			   <table class="tt_tb" border="1">
				<thead><tr class="tt_tr">
				<th></th>
				  <th>Drug</th>
				  <th>Quantity</th>
				  <th style="text-align:center;" colspan="2">Sales Value (Kshs)</th>
				  <th></th>
				
				</tr></thead>
                <tbody>
                <?php
					foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=stock_edit&amp;as_stockid=<?php echo $row['stockid'] ?>'">
					   <td></td>
					   <td><?php echo $row['drug_title'] ?></td>
					   <td><?php echo $row['sales_quantity'].' '.$row['drug_unit'].'s' ?></td>
					   <td style="text-align:right;"><?php echo $row['sales_prices']; ?></td>
					   <td>.00</td>
					   <td></td>
					</tr>				
				<?php } ?>
                    
					</tbody>
				</table>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div>
      </div> 
	</div> 	
  </div>
<?php include AS_THEME."as_footer.php" ?>
    
