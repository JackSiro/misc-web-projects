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
						<h2>Groups Group: <?php echo $group_name.' | '.$group_title ?></h2> 
          
			<div class="main_content">
				<div class="iconic_info">
					<img src="<?php echo "as_media/".$group_img ?>" class="iconic_big_i"/>
					<hr class="detail_info_hr"/>
					<a href="index.php?action=group_edit&&as_groupid=<?php echo $groupid ?>"><h1>Edit Group</h1></a>
					<hr class="detail_info_hr"/>
					<a href="index.php?action=deletegroup&&as_groupid=<?php echo $groupid ?>" onclick="return confirm('Are you sure you want to delete: <?php echo $group_name ?> from the system? \nBe careful, this action can not be reversed.')"><h1>Delete Group</h1></a>
					
			    </div>
				<div class="detail_info">
					<h2>Title: <?php echo $group_name ?></h2>
					<h2>Class: <?php echo as_topic_group($group_content) ?></h2><hr class="detail_info_hr"/>
					<h2>Description: <?php echo $group_fee ?></h2><hr class="detail_info_hr"/>
					<h2>Publisher: <?php echo $group_content ?></h2>
					<h2>Subject: <?php echo $group_gender ?></h2><hr class="detail_info_hr"/>
					<h2>Posted: <?php echo date("j/m/y", strtotime($group_created)); ?><h2>
				</div>
			</div>
      </div> 
	</div> 	
  </div>
<?php include AS_THEME."as_footer.php" ?>
    
