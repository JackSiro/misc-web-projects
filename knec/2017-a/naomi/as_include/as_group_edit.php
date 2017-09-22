<?php
	$groupid = $results['group'];
	$as_db_query = "SELECT * FROM as_group WHERE groupid = '$groupid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $groupid, $group_title, $group_content, $group_course, $group_name, $group_fee, $group_createdby, $group_created, $group_content, $group_gender, $group_img, $group_updated, $group_updatedby) = $database->get_row( $as_db_query );
}
include AS_THEME."as_header.php"; ?>
				</div>
			</div>

			<div id="main" class="wrapper style1">
				<section class="container">
					<header class="major">
						<h2>Edit a Group</h2> 
          
			<div class="main_content">
				<form role="form" method="post" name="SaveGroup" action="index.php?action=group_edit&&as_groupid=<?php echo $groupid ?>" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<p><span>Choose a Class</span>
					<td><select name="class" style="padding-left:20px;">
						<option value="<?php echo $groupid ?>" > - Choose a Class - </option>
			<?php $as_db_query = "SELECT * FROM as_topic ORDER BY topic_participants ASC";
				$database = new As_Dbconn();			
				$results = $database->get_results( $as_db_query );
				
				foreach( $results as $row ) { ?>
						<option value="<?php echo $row['topicid'] ?>">  <?php echo $row['topic_participants'] ?></option>
				<?php } ?>
						</select>
					</p>
				<p><span>Title of the Group</span>
				<input type="text" autocomplete="off" name="title" value="<?php echo $group_name ?>"></p>
				<p><span>Code of the Group</span>
				<input type="text" autocomplete="off" name="code" value="<?php echo $group_title ?>"></p>
				<p><span>Upload Group Icon</span>
					<td>
					<input type="hidden" name="groupimg" value="<?php echo $group_img ?>">	
						<table style="width:100%"><tr><td>
						<img src="<?php echo 'as_media/'.$group_img ?>" style="width:70px;height:70px;" >
						</td><td>
						<input name="filename" autocomplete="off" type="file" accept="image/*" >
						</td></tr></table>
					</p>
                
                <p><span>Description (500 max)</span>
					<td><textarea style="height:200px" name="content" autocomplete="off" ><?php echo $group_fee ?></textarea></p>
				<p><span>Publisher of the Group</span>
				<input type="text" autocomplete="off" name="publisher" value="<?php echo $group_content ?>"></p>
				
				<p><span>Subject/Topic of the Group</span>
				<input type="text" autocomplete="off" name="subject" value="<?php echo $group_gender ?>"></p>
				
				<p style="padding-top: 15px"><span>&nbsp;</span><input type="submit" id="submitBtn" name="SaveGroup" value="Save Changes">
						<input type="submit" id="submitBtn" name="SaveClose" value="Save & Close">
			  </p>		
			</form>
			</div>
      </div> 
	</div> 	
  </div>
<?php include AS_THEME."as_footer.php" ?>
    
