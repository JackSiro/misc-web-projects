<?php 

	$leaveid = $results['leave'];
	$js_db_query = "SELECT * FROM js_leave WHERE leaveid = '$leaveid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $leaveid, $leave_code, $leave_payslip, $leave_slug, $leave_title, $leave_content, $leave_postedby, $leave_posted, $leave_publisher, $leave_subject, $leave_img, $leave_updated, $leave_updatedby) = $database->get_row( $js_db_query );
}
		
?>
<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_leave">
		<br>
		  <h1>Edit an Leaves Leave</h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" name="SaveItem" action="index.php?js_pageaction=editleave&&js_leaveid=<?php echo $leaveid ?>" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<tr>
					<td>Choose a PaySlip:</td>
					<td><select name="payslip" style="padding-left:20px;">
						<option value="<?php echo $leaveid ?>" > - Choose a PaySlip - </option>
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
					<td>Title of the Leave:</td>
					<td><input type="text" autocomplete="off" name="title" value="<?php echo $leave_title ?>"></td>
				</tr>
				<tr>
					<td>Code of the Leave:</td>
					<td><input type="text" autocomplete="off" name="code" value="<?php echo $leave_code ?>"></td>
				</tr>
				<tr>
					<td>Upload Item Icon:</td>
					<td>
					<input type="hidden" name="leaveimg" value="<?php echo $leave_img ?>">	
						<table style="width:100%"><tr><td>
						<img src="<?php echo 'js_media/'.$leave_img ?>" style="width:70px;height:70px;" >
						</td><td>
						<input name="filename" autocomplete="off" type="file" accept="image/*" >
						</td></tr></table>
					</td>
				</tr>
                
                <tr>
					<td>Description (500 max):</td>
					<td><textarea style="height:200px" name="content" autocomplete="off" ><?php echo $leave_content ?></textarea></td>
				</tr>
				<tr>
					<td>Publisher of the Leave:</td>
					<td><input type="text" autocomplete="off" name="publisher" value="<?php echo $leave_publisher ?>"></td>
				</tr>
				
				<tr>
					<td>Subject/Topic of the Leave:</td>
					<td><input type="text" autocomplete="off" name="subject" value="<?php echo $leave_subject ?>"></td>
				</tr>
				
				</table><br>
                        <center><input type="submit" class="submit_this" name="SaveItem" value="Save Changes"></center><br></form>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_leave-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
