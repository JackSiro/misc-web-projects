<?php 

	$customerid = $results['customer'];
	$as_db_query = "SELECT * FROM as_customer WHERE customerid = '$customerid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $customerid, $customer_name, $customer_sex, $customer_course, $customer_address, $customer_fee, $customer_registeredby, $customer_registered, $customer_sex, $customer_mobile, $customer_img, $customer_updated, $customer_updatedby) = $database->get_row( $as_db_query );
}
		
?>

<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div>
		<br>
		  <h1>Customers Customer: <?php echo $customer_address.' | '.$customer_name ?></h1> 
          
			<div class="main_content">
				<div class="iconic_info">
					<img src="<?php echo "as_media/".$customer_img ?>" class="iconic_big_i"/>
					<hr class="detail_info_hr"/>
					<a href="index.php?action=customer_edit&&as_customerid=<?php echo $customerid ?>"><h1>Edit Customer</h1></a>
					<hr class="detail_info_hr"/>
					<a href="index.php?action=customer_delete&&as_customerid=<?php echo $customerid ?>" onclick="return confirm('Are you sure you want to delete: <?php echo $customer_address ?> from the system? \nBe careful, this action can not be reversed.')"><h1>Delete Customer</h1></a>
					
			    </div>
				<div class="detail_info">
					<h2>Title: <?php echo $customer_address ?></h2>
					<h2>Class: <?php echo as_salesitem_customer($customer_sex) ?></h2><hr class="detail_info_hr"/>
					<h2>Description: <?php echo $customer_fee ?></h2><hr class="detail_info_hr"/>
					<h2>Publisher: <?php echo $customer_sex ?></h2>
					<h2>Subject: <?php echo $customer_mobile ?></h2><hr class="detail_info_hr"/>
					<h2>Posted: <?php echo date("j/m/y", strtotime($customer_registered)); ?><h2>
				</div>
			</div>
      </div> 
	</div> 	
  </div>
<?php include AS_THEME."as_footer.php" ?>
    
