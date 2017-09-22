<?php 

	$subjectid = $results['subject'];
	$as_db_query = "SELECT * FROM as_subject WHERE subjectid = '$subjectid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $subjectid, $subject_title, $subject_code) = $database->get_row( $as_db_query );
}
include AS_THEME."as_header.php"; ?>
	<div id="tooplate_main">    	        
        <div class="content_box">
            <h2>Edit a Subject</h2>
            <div class="col_w340 float_l">
                <div id="contact_form">
				<form role="form" method="post" name="PostSubject" action="index.php?action=subject_view&as_subjectid=<?php echo $subjectid ?>" >
					<label for="text">Subject Name</label> <input type="text" class="required input_field" name="title" value="<?php echo $subject_title ?>"/>
						<div class="cleaner h10"></div>  
					<label for="text">Subject Code</label> <input type="text" class="required input_field" name="code" value="<?php echo $subject_code ?>"/>
						<div class="cleaner h10"></div>  
					<p style="padding-top: 15px"><span><input type="submit" class="submit_btn float_l" id="submitBtn" name="SaveSubject" value="Save Changes"></label> </p>		
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