<?php 

	$voterid = $results['voter'];
	$as_db_query = "SELECT * FROM as_voter WHERE voterid = '$voterid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $voterid, $voter_admission, $voter_class, $voter_course, $voter_name, $voter_fee, $voter_registeredby, $voter_registered, $voter_class, $voter_gender, $voter_img, $voter_updated, $voter_updatedby) = $database->get_row( $as_db_query );
}
		
?>
<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div>
		<br>
		  <h1>Edit a Voter</h1> 
          
			<div class="main_content">
				<form role="form" method="post" name="SaveVoter" action="index.php?action=voter_edit&&as_voterid=<?php echo $voterid ?>" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<p><span>Choose a Class</span>
					<td><select name="class" style="padding-left:20px;">
						<option value="<?php echo $voterid ?>" > - Choose a Class - </option>
			<?php $as_db_query = "SELECT * FROM as_class ORDER BY class_title ASC";
				$database = new As_Dbconn();			
				$results = $database->get_results( $as_db_query );
				
				foreach( $results as $row ) { ?>
						<option value="<?php echo $row['classid'] ?>">  <?php echo $row['class_title'] ?></option>
				<?php } ?>
						</select>
					</p>
				<p><span>Title of the Voter</span>
				<input type="text" autocomplete="off" name="title" value="<?php echo $voter_name ?>"></p>
				<p><span>Code of the Voter</span>
				<input type="text" autocomplete="off" name="code" value="<?php echo $voter_admission ?>"></p>
				<p><span>Upload Voter Icon</span>
					<td>
					<input type="hidden" name="voterimg" value="<?php echo $voter_img ?>">	
						<table style="width:100%"><tr><td>
						<img src="<?php echo 'as_media/'.$voter_img ?>" style="width:70px;height:70px;" >
						</td><td>
						<input name="filename" autocomplete="off" type="file" accept="image/*" >
						</td></tr></table>
					</p>
                
                <p><span>Description (500 max)</span>
					<td><textarea style="height:200px" name="content" autocomplete="off" ><?php echo $voter_fee ?></textarea></p>
				<p><span>Publisher of the Voter</span>
				<input type="text" autocomplete="off" name="publisher" value="<?php echo $voter_class ?>"></p>
				
				<p><span>Post/Topic of the Voter</span>
				<input type="text" autocomplete="off" name="elecpost" value="<?php echo $voter_gender ?>"></p>
				
				<p style="padding-top: 15px"><span>&nbsp;</span><input type="submit" id="submitBtn" name="SaveVoter" value="Save Changes">
						<input type="submit" id="submitBtn" name="SaveClose" value="Save & Close">
			  </p>		
			</form>
			</div>
      </div> 
	</div> 	
  </div>
<?php include AS_THEME."as_footer.php" ?>
    
