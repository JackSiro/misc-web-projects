<?php 

	$customerid = $results['customer'];
	$js_db_query = "SELECT * FROM js_customer WHERE customerid = '$customerid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $customerid, $customer_name, $customer_fullname, $customer_sex, $customer_email, $customer_joined,) = $database->get_row( $js_db_query );
}
		
?>

<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content"> 
        
        <div class="content_item">
		<br>
		  <h1>customer Profile</h1> 
          <br><hr><br>
			<div class="main_content">
				<div class="iconic_infol">
					<a href="index.php?action=editcustomer&&js_customerid=<?php echo $customerid ?>"><h1>Edit customer</h1></a>
					<hr class="detail_info_hr"/>
					<a href="index.php?action=deletecustomer&&js_customerid=<?php echo $customerid ?>" onclick="return confirm('Are you sure you want to delete: <?php echo $customer_fullname ?> from the system? \nBe careful, this action can not be reversed.')"><h1>Delete customer</h1></a>
			    </div>
				<div class="detail_info">
					<h2><?php echo $customer_fullname ?></h2>
<hr class="detail_info_hr"/>
					<h2>Email: <?php echo $customer_email ?></h2>
					<h2>Since: <?php echo date("j/m/y", strtotime($customer_joined)); ?><h2>
				</div>
				</div>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
