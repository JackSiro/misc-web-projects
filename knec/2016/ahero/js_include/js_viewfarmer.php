<?php 

	$payslipid = $results['payslip'];
	$js_db_query = "SELECT * FROM js_payslip WHERE payslipid = '$payslipid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $payslipid, $payslip_slug, $payslip_fullname, $payslip_icon, $payslip_content) = $database->get_row( $js_db_query );
}
		
?>

<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_leave">
		<br>
		  <h1>Edit payslip</h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" name="PostPaySlip" action="index.php?js_pageaction=viewpayslip&&js_payslipid=<?php echo $payslipid ?>" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<tr>
					<td>PaySlip Title: </td>
					<td><input type="text" autocomplete="off" name="title" value="<?php echo $payslip_fullname ?>"></td>
				</tr>
				<tr>
					<td>PaySlip Icon:</td>
					<td>		
						<input type="hidden" name="payslipicon" value="<?php echo $payslip_icon ?>">	
						<table style="width:100%"><tr><td>
						<img src="<?php echo 'js_media/'.$payslip_icon ?>" style="width:70px;height:70px;" >
						</td><td>
						<input name="filename" autocomplete="off" type="file" accept="image/*" >
						</td></tr></table>
						</td>
				</tr>
                
                <tr>
					<td>Description (500 max):</td>
					<td><textarea name="content" autocomplete="off" ><?php echo $payslip_content?></textarea></td>
				</tr>
				</table><br>
                        <center><input type="submit" class="submit_this" name="SavePaySlip" value="Save Changes">
						<input type="submit" class="submit_this" name="SaveClose" value="Save & Close">
			  </center><br></form>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_leave-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
