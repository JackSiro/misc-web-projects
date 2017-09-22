<?php include AS_THEME."as_header.php";
	$as_db_query = "SELECT * FROM as_drug ORDER BY drugid ASC LIMIT 20";
	$database = new As_Dbconn();			
	$results = $database->get_results( $as_db_query );
?>
    <div id="site_content">
      <div id="banner"></div>	
		<div id="content">
		  <h1><?php echo $database->as_num_rows( $as_db_query ) ?>  Drugs
		  <a style="float:right;width:300px;text-align:center;" href="index.php?action=drug_new">New Drug</a> </h1>
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
		        <tr onclick="location='index.php?action=drug_view&amp;as_drugid=<?php echo $row['drugid'] ?>'">
				   <td></td>
				   <td><?php echo $row['drug_title'] ?></td>
		          <td><?php echo $row['drug_items'].' '.$row['drug_unit'].'s x '.$row['drug_container'] ?></td>
		          <td>@ Ksh. <?php echo $row['drug_price'].' per '.$row['drug_unit'] ?></td>
					
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
    
