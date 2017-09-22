<?php 

	$certificateid = $results['certificate'];
	$as_db_query = "SELECT * FROM as_certificate WHERE certificateid = '$certificateid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $certificateid, $certificate_admission, $certificate_class, $certificate_course, $certificate_name, $certificate_fee, $certificate_registeredby, $certificate_registered, $certificate_class, $certificate_gender, $certificate_img, $certificate_updated, $certificate_updatedby) = $database->get_row( $as_db_query );
}
		
?>
<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div>
		<br>
		  <h1>Edit a certificate</h1> 
          
			<div class="main_content">
				<form role="form" method="post" name="Savecertificate" action="index.php?action=certificate_edit&&as_certificateid=<?php echo $certificateid ?>" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<p><span>Choose a Class</span>
					<td><select name="class" style="padding-left:20px;">
						<option value="<?php echo $certificateid ?>" > - Choose a Class - </option>
			<?php $as_db_query = "SELECT * FROM as_class ORDER BY class_title ASC";
				$database = new As_Dbconn();			
				$results = $database->get_results( $as_db_query );
				
				foreach( $results as $row ) { ?>
						<option value="<?php echo $row['classid'] ?>">  <?php echo $row['class_title'] ?></option>
				<?php } ?>
						</select>
					</p>
				<p><span>Name of the certificate</span>
				<input type="text" autocomplete="off" name="title" value="<?php echo $certificate_name ?>"></p>
				<p><span>Code of the certificate</span>
				<input type="text" autocomplete="off" name="code" value="<?php echo $certificate_admission ?>"></p>
				
				<p style="padding-top: 15px"><span>&nbsp;</span><input type="submit" id="submitBtn" name="Savecertificate" value="Save Changes">
						<input type="submit" id="submitBtn" name="SaveClose" value="Save & Close">
			  </p>		
			</form>
			</div>
      </div> 
	</div> 	
  </div>
<?php include AS_THEME."as_footer.php" ?>
    
