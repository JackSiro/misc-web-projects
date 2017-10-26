<?php 

	$elecpostid = $results['elecpost'];
	$as_db_query = "SELECT * FROM as_elecpost WHERE elecpostid = '$elecpostid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $elecpostid, $elecpost_title, $elecpost_code) = $database->get_row( $as_db_query );
}
include AS_THEME."as_header.php"; ?>
	<div id="site_content">
	  <div id="content">
        <div>
		  <h1>Edit Post</h1>
			<div class="main_content">
				<form role="form" method="post" name="PostPost" action="index.php?action=elecpost_view&as_elecpostid=<?php echo $elecpostid ?>" >
					<p><span>Post Name</span><input type="text" name="title" value="<?php echo $elecpost_title ?>"></p>
					<p><span>Post Code</span><input type="text" name="code" value="<?php echo $elecpost_code ?>"></p>
					<p style="padding-top: 15px"><span><input type="submit" id="submitBtn" name="SavePost" value="Save Changes"></span></p>		
				</form>
			</div><!--close content_voter-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
