<?php 

	$payslipid = $results['payslip'];
	$js_db_query = "SELECT * FROM js_payslip WHERE payslipid = '$payslipid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $payslipid, $payslip_code, $payslip_payslip, $payslip_slug, $payslip_title, $payslip_content, $payslip_postedby, $payslip_posted, $payslip_publisher, $payslip_subject, $payslip_img, $payslip_updated, $payslip_updatedby) = $database->get_row( $js_db_query );
}
		
?>
<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_payslip">
		<br>
		  <h1>Edit a Payslip</h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" name="SaveItem" action="index.php?js_pageaction=editpayslip&&js_payslipid=<?php echo $payslipid ?>" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<tr>
					<td>Choose a PaySlip:</td>
					<td><select name="payslip" style="padding-left:20px;">
						<option value="<?php echo $payslipid ?>" > - Choose a PaySlip - </option>
			<?php $js_db_query = "SELECT * FROM js_payslip ORDER BY payslip_fullname ASC";
				$database = new Js_Dbconn();			
				$results = $database->get_results( $js_db_query );
				
				foreach( $results as $row ) { ?>
						<option value="<?php echo $row['payslipid'] ?>">  <?php echo $row['payslip_fullname'] ?></option>
				<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Title of the Payslip:</td>
					<td><input type="text" autocomplete="off" name="title" value="<?php echo $payslip_title ?>"></td>
				</tr>
				<tr>
					<td>Code of the Payslip:</td>
					<td><input type="text" autocomplete="off" name="code" value="<?php echo $payslip_code ?>"></td>
				</tr>
				<tr>
					<td>Upload Item Icon:</td>
					<td>
					<input type="hidden" name="payslipimg" value="<?php echo $payslip_img ?>">	
						<table style="width:100%"><tr><td>
						<img src="<?php echo 'js_media/'.$payslip_img ?>" style="width:70px;height:70px;" >
						</td><td>
						<input name="filename" autocomplete="off" type="file" accept="image/*" >
						</td></tr></table>
					</td>
				</tr>
                
                <tr>
					<td>Description (500 max):</td>
					<td><textarea style="height:200px" name="content" autocomplete="off" ><?php echo $payslip_content ?></textarea></td>
				</tr>
				<tr>
					<td>Publisher of the Payslip:</td>
					<td><input type="text" autocomplete="off" name="publisher" value="<?php echo $payslip_publisher ?>"></td>
				</tr>
				
				<tr>
					<td>Subject/Topic of the Payslip:</td>
					<td><input type="text" autocomplete="off" name="subject" value="<?php echo $payslip_subject ?>"></td>
				</tr>
				
				</table><br>
                        <center><input type="submit" class="submit_this" name="SaveItem" value="Save Changes"></center><br></form>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_payslip-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
