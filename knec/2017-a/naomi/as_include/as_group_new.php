<?php include AS_THEME."as_header.php"; ?>
				</div>
			</div>

			<div id="main" class="wrapper style1">
				<section class="container">
					<header class="major">
						<h2>Add a Group</h2>
			<div class="main_content">
				<form role="form" method="post" name="PostGroup" action="index.php?action=group_new" >
                <p><span>Full Name</span><input type="text" name="name"></p>
				<p><span>Admission Number</span><input type="text" name="admno"></p>
				<p><span>Choose a Class</span>
					<select name="class" style="padding-left:20px;">
						<option value="" > - Choose a Class - </option>
							<?php $as_db_query = "SELECT * FROM as_topic ORDER BY topic_participants ASC";
								$database = new As_Dbconn();			
								$results = $database->get_results( $as_db_query );
								
								foreach( $results as $row ) { ?>
										<option value="<?php echo $row['topicid'] ?>">  <?php echo $row['topic_participants'] ?></option>
								<?php } ?>
						</select></p>                	
				<p style="padding-top: 15px"><span><input type="submit" id="submitBtn" name="AddGroup" value="Save & Add"></span><input type="submit" id="submitBtn" name="AddClose" value="Save & Close">
			  </p>		
			</form>
		</div><!--close content_group-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
