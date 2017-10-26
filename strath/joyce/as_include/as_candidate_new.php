<?php include AS_THEME."as_header.php";
	$as_db_query = "SELECT * FROM as_elecpost ORDER BY elecpost_title ASC";
	$database = new As_Dbconn();			
	$results = $database->get_results( $as_db_query );
?>
	<div id="site_content">
	  <div id="content">
        <div>
		<br>
		  <h1>Candidate Registration</h1> 
          <hr>
			<div elecpost="main_content">
				<form role="form" method="post" name="PostCandidates" action="index.php?action=candidate_new" >
                <p><span>Full Name</span><input type="text" name="name"></p>
				<p><span>Gender</span><br>
					<label for="gender"><input type="radio" name="gender" value="1"/>  Male </label>
					<label for="gender"><input type="radio" name="gender" value="2"/>  Female </label>
				</p> 
				<p><span>Choose a Post</span>
					<select name="elecpost" style="padding-left:20px;">
						<option value="" > - Choose a Post - </option>
							<?php foreach( $results as $row ) { ?>
							<option value="<?php echo $row['elecpostid'] ?>">  <?php echo $row['elecpost_title'] ?></option>
						<?php } ?>
						</select></p>                	
				<p style="padding-top: 15px"><span><input type="submit" id="submitBtn" name="AddCandidate" value="Save & Add"></span><input type="submit" id="submitBtn" name="AddClose" value="Save & Close">
			  </p>		
			</form>
		</div><!--close content_candidate-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
