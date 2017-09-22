<?php 

	$payslipid = $results['payslip'];
	$js_db_query = "SELECT * FROM js_payslip WHERE payslipid = '$payslipid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $payslipid, $payslip_code, $payslip_payslip, ) = $database->get_row( $js_db_query );
}
		
?>

<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_payslip">
		<br>
		  <h1>Payslips: <?php echo $payslip_title.' | '.$payslip_code ?></h1> 
          <br><br>
			<div class="main_content">
				
				<div class="detail_info">
					<h2>Name: <?php echo $payslip_name ?></h2>
					<h2>Number: <?php echo $payslip_number ?></h2>
					<center><a href="index.php?js_pageaction=deletepayslip&&js_payslipid=<?php echo $payslipid ?>" onclick="return confirm('Are you sure you want to delete: <?php echo $payslip_title ?> from the system? \nBe careful, this action can not be reversed.')"><h1>Delete Payslip</h1></a></center>
				</div>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_payslip-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
