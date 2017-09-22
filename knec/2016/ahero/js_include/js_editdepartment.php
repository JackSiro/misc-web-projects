<?php 

	$departmentid = $results['department'];
	$js_db_query = "SELECT * FROM js_department WHERE departmentid = '$departmentid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $departmentid, $department_code, $department_payslip, $department_slug, $department_title, $department_content, $department_postedby, $department_posted, $department_publisher, $department_subject, $department_img, $department_updated, $department_updatedby) = $database->get_row( $js_db_query );
}
		
?>
<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_department">
		<br>
		  <h1>Edit an Departments Department</h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" name="SaveItem" action="index.php?js_pageaction=editdepartment&&js_departmentid=<?php echo $departmentid ?>" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<tr>
					<td>Choose a PaySlip:</td>
					<td><select name="payslip" style="padding-left:20px;">
						<option value="<?php echo $departmentid ?>" > - Choose a PaySlip - </option>
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
					<td>Title of the Department:</td>
					<td><input type="text" autocomplete="off" name="title" value="<?php echo $department_title ?>"></td>
				</tr>
				<tr>
					<td>Code of the Department:</td>
					<td><input type="text" autocomplete="off" name="code" value="<?php echo $department_code ?>"></td>
				</tr>
				<tr>
					<td>Upload Item Icon:</td>
					<td>
					<input type="hidden" name="departmentimg" value="<?php echo $department_img ?>">	
						<table style="width:100%"><tr><td>
						<img src="<?php echo 'js_media/'.$department_img ?>" style="width:70px;height:70px;" >
						</td><td>
						<input name="filename" autocomplete="off" type="file" accept="image/*" >
						</td></tr></table>
					</td>
				</tr>
                
                <tr>
					<td>Description (500 max):</td>
					<td><textarea style="height:200px" name="content" autocomplete="off" ><?php echo $department_content ?></textarea></td>
				</tr>
				<tr>
					<td>Publisher of the Department:</td>
					<td><input type="text" autocomplete="off" name="publisher" value="<?php echo $department_publisher ?>"></td>
				</tr>
				
				<tr>
					<td>Subject/Topic of the Department:</td>
					<td><input type="text" autocomplete="off" name="subject" value="<?php echo $department_subject ?>"></td>
				</tr>
				
				</table><br>
                        <center><input type="submit" class="submit_this" name="SaveItem" value="Save Changes"></center><br></form>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_department-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
