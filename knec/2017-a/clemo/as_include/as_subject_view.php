<?php 

	$subjectid = $results['subject'];
	$as_db_query = "SELECT * FROM as_subject WHERE subjectid = '$subjectid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $subjectid, $subject_title, $subject_code) = $database->get_row( $as_db_query );
}
include AS_THEME."as_header.php"; ?>
	<div id="site_content">
	  <div id="content">
        <div>
		  <h1>Edit Subject</h1>
			<div class="main_content">
				<form role="form" method="post" name="PostSubject" action="index.php?action=subject_view&as_subjectid=<?php echo $subjectid ?>" >
					<p><span>Subject Name</span><input type="text" name="title" value="<?php echo $subject_title ?>"></p>
					<p><span>Subject Code</span><input type="text" name="code" value="<?php echo $subject_code ?>"></p>
					<p style="padding-top: 15px"><span><input type="submit" id="submitBtn" name="SaveSubject" value="Save Changes"></span></p>		
				</form>
			</div><!--close content_student-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
