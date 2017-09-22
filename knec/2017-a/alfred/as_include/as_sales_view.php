<?php 

	$salesid = $results['sales'];
	$as_db_query = "SELECT * FROM as_sales WHERE salesid = '$salesid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $salesid, $sales_stockid, $sales_qty, $sales_price, $sales_title, $sales_fullname, $sales_mobile, $sales_email, $sales_address, $sales_content, $sales_createdby, $sales_created) = $database->get_row( $as_db_query );
}
		
?>

<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	

	  <div id="content"> 
       
        <div class="content_item">
		  
			<div class="main_content">
				<div class="detail_info">
				
				<h1>Prescriptioned Drug: <?php echo $sales_qty.' '.$sales_title ?></h1> 
          <br><hr>
		 		<h2>Prescription Cost: <?php echo $sales_price ?></h2>
				<h2>Buyer's Mobile: <?php echo $sales_mobile ?></h2>
				<h2>Buyer's Email: <?php echo $sales_email ?></h2>
				<h2>Buyer's Address: <?php echo $sales_address ?></h2>
				<h2>Prescriptioned on: <?php echo date("j/m/y", strtotime($sales_created)) ?></h2>
				
				<hr>
				<center><h2><a href="index.php?action=sales_edit&&as_salesid=<?php echo $salesid ?>">Edit this Drug</a>
				 | <a href="index.php?action=sales_delete&&as_salesid=<?php echo $salesid ?>" onclick="return confirm('Are you sure you want to delete this sales from the system? \nBe careful, this action can not be reversed.')">Delete this Drug</a></h2></center>
				</div>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>