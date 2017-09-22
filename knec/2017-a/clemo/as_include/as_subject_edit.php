<?php 

	$subjectid = $results['subject'];
	$as_db_query = "SELECT * FROM as_subject WHERE subjectid = '$subjectid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $subjectid, $subject_admission, $subject_class, $subject_course, $subject_name, $subject_fee, $subject_registeredby, $subject_registered, $subject_class, $subject_gender, $subject_img, $subject_updated, $subject_updatedby) = $database->get_row( $as_db_query );
}
		
?>
<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div>
		<br>
		  <h1>Edit a Subject</h1> 
          
			<div class="main_content">
				<form role="form" method="post" name="SaveSubject" action="index.php?action=subject_edit&&as_subjectid=<?php echo $subjectid ?>" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<p><span>Choose a Class</span>
					<td><select name="class" style="padding-left:20px;">
						<option value="<?php echo $subjectid ?>" > - Choose a Class - </option>
			<?php $as_db_query = "SELECT * FROM as_class ORDER BY class_title ASC";
				$database = new As_Dbconn();			
				$results = $database->get_results( $as_db_query );
				
				foreach( $results as $row ) { ?>
						<option value="<?php echo $row['classid'] ?>">  <?php echo $row['class_title'] ?></option>
				<?php } ?>
						</select>
					</p>
				<p><span>Name of the Subject</span>
				<input type="text" autocomplete="off" name="title" value="<?php echo $subject_name ?>"></p>
				<p><span>Code of the Subject</span>
				<input type="text" autocomplete="off" name="code" value="<?php echo $subject_admission ?>"></p>
				
				<p style="padding-top: 15px"><span>&nbsp;</span><input type="submit" id="submitBtn" name="SaveSubject" value="Save Changes">
						<input type="submit" id="submitBtn" name="SaveClose" value="Save & Close">
			  </p>		
			</form>
			</div>
      </div> 
	</div> 	
  </div>
<?php include AS_THEME."as_footer.php" ?>
    
