<?php include AS_THEME."as_header.php"; 
	$database = new As_Dbconn();			
	$as_db_query = "SELECT * FROM as_class ORDER BY class_title ASC";
	$results = $database->get_results( $as_db_query );
	
?>
	<div id="site_content">
	  <div id="content">
        <div>
		  <h1>Voter Registration</h1>
			<div class="main_content">
				<form role="form" method="post" name="PostVoter" action="index.php?action=voter_new" >
                <p><span>Choose a Class</span>
					<select name="class" style="padding-left:20px;">
						<option value="" > - Choose a Class - </option>
						<?php foreach( $results as $row ) { ?>
						<option value="<?php echo $row['classid'] ?>">  <?php echo $row['class_title'] ?></option>
						<?php } ?>
					</select>
				</p>     
				<p><span>Full Name</span><input type="text" name="name"></p>
				<p><span>Admission Number</span><input type="text" name="admno"></p>
				<p><span>Gender</span><br>
					<label for="gender"><input type="radio" name="gender" value="1"/>  Male </label>
					<label for="gender"><input type="radio" name="gender" value="2"/>  Female </label>
				</p>      	
				<p style="padding-top: 15px"><span><input type="submit" id="submitBtn" name="AddVoter" value="Save & Add"></span><input type="submit" id="submitBtn" name="AddClose" value="Save & Close">
			  </p>		
			</form>
		</div><!--close content_voter-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
