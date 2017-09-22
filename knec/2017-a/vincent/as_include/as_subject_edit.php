<?php 

	$subjectid = $results['subject'];
	$as_db_query = "SELECT * FROM as_subject WHERE subjectid = '$subjectid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $subjectid, $subject_admission, $subject_class, $subject_course, $subject_name, $subject_fee, $subject_registeredby, $subject_registered, $subject_class, $subject_gender, $subject_img, $subject_updated, $subject_updatedby) = $database->get_row( $as_db_query );
}
		
?>
<?php include AS_THEME."as_header.php"; ?>
	<div id="tooplate_main">    	        
        <div class="content_box">
            <h2>Edit a Subject</h2>
            <div class="col_w340 float_l">
                <div id="contact_form">
				<form role="form" method="post" name="SaveSubject" action="index.php?action=subject_edit&&as_subjectid=<?php echo $subjectid ?>">
					<table style="width:100%;font-size:20px;">
					<label for="text">Choose a Class</label> 
						<td><select class="required input_field" name="class" style="padding-left:20px;">
							<option value="<?php echo $subjectid ?>" > - Choose a Class - </option>
				<?php $as_db_query = "SELECT * FROM as_salesitem ORDER BY salesitem_content ASC";
					$database = new As_Dbconn();			
					$results = $database->get_results( $as_db_query );
					
					foreach( $results as $row ) { ?>
							<option value="<?php echo $row['salesitemid'] ?>">  <?php echo $row['salesitem_content'] ?></option>
					<?php } ?>
							</select>
						</p>
					<label for="text">Name of the Subject</label> 
					<input type="text" class="required input_field" autocomplete="off" name="title" value="<?php echo $subject_name ?>"/>
					<div class="cleaner h10"></div>  
					<label for="text">Code of the Subject</label> 
					<input type="text" class="required input_field" autocomplete="off" name="code" value="<?php echo $subject_admission ?>"/>
					<div class="cleaner h10"></div>  
					
					<input type="submit" class="submit_btn float_l" id="submitBtn" name="SaveSubject" value="Save Changes">
							<input type="submit" class="submit_btn float_l" id="submitBtn" name="SaveClose" value="Save & Close">
				</form>
                </div> 
            </div>
            <div class="cleaner h30"></div>
            <a class="gototop" href="#top"></a>
            <div class="cleaner"></div>
            <div class="cleaner"></div>
        </div>
	</div>
<?php include AS_THEME."as_footer.php" ?>