<?php 

	$certificateid = $results['certificate'];
	$as_db_query = "SELECT * FROM as_certificate WHERE certificateid = $certificateid";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $certificateid, $certificate_student, $certificate_title, $certificate_event, $certificate_content, $certificate_remark) = $database->get_row( $as_db_query );
	}
include AS_THEME."as_header.php"; ?>
	<div id="site_content">
	  <div id="content">
        <div>
		  <h1>Edit certificate</h1>
			<div class="main_content">
				
				<form role="form" method="post" name="Postcertificate" action="index.php?action=certificate_view&as_certificateid=<?php echo $certificateid ?>" >
					<p><span>Certificate Title</span><input type="text" name="title" value="<?php echo $certificate_title ?>"></p>
					<p><span>Certificate Event</span><input type="text" name="event" value="<?php echo $certificate_event ?>"></p>
					<p><span>Certificate Content</span><input type="text" name="content" value="<?php echo $certificate_content ?>"></p>
					<p><span>Certificate Signed</span><input type="text" name="signed" value="<?php echo $certificate_signed ?>"></p>
					<p><span>Certificate Remark</span><input type="text" name="remark" value="<?php echo $certificate_remark ?>"></p>
					<p style="padding-top: 15px"><span><input type="submit" id="submitBtn" name="SaveItem" value="Save Changes"></span>
				  </p>		
				</form>
			</div><!--close content_student-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
