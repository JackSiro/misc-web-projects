<?php 

	$elecpostid = $results['elecpost'];
	$as_db_query = "SELECT * FROM as_elecpost WHERE elecpostid = '$elecpostid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $elecpostid, $elecpost_admission, $elecpost_class, $elecpost_course, $elecpost_name, $elecpost_fee, $elecpost_registeredby, $elecpost_registered, $elecpost_class, $elecpost_gender, $elecpost_img, $elecpost_updated, $elecpost_updatedby) = $database->get_row( $as_db_query );
}
		
?>
<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div>
		<br>
		  <h1>Edit a Post</h1> 
          
			<div class="main_content">
				<form role="form" method="post" name="SavePost" action="index.php?action=elecpost_edit&&as_elecpostid=<?php echo $elecpostid ?>" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<p><span>Choose a Class</span>
					<td><select name="class" style="padding-left:20px;">
						<option value="<?php echo $elecpostid ?>" > - Choose a Class - </option>
			<?php $as_db_query = "SELECT * FROM as_class ORDER BY class_title ASC";
				$database = new As_Dbconn();			
				$results = $database->get_results( $as_db_query );
				
				foreach( $results as $row ) { ?>
						<option value="<?php echo $row['classid'] ?>">  <?php echo $row['class_title'] ?></option>
				<?php } ?>
						</select>
					</p>
				<p><span>Name of the Post</span>
				<input type="text" autocomplete="off" name="title" value="<?php echo $elecpost_name ?>"></p>
				<p><span>Code of the Post</span>
				<input type="text" autocomplete="off" name="code" value="<?php echo $elecpost_admission ?>"></p>
				
				<p style="padding-top: 15px"><span>&nbsp;</span><input type="submit" id="submitBtn" name="SavePost" value="Save Changes">
						<input type="submit" id="submitBtn" name="SaveClose" value="Save & Close">
			  </p>		
			</form>
			</div>
      </div> 
	</div> 	
  </div>
<?php include AS_THEME."as_footer.php" ?>
    
