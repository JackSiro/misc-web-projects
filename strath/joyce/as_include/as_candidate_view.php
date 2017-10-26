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
		  <h1>Voters Voter: <?php echo $voter_name.' | '.$voter_admission ?></h1> 
          
			<div class="main_content">
				<div class="iconic_info">
					<img src="<?php echo "as_media/".$voter_img ?>" class="iconic_big_i"/>
					<hr class="detail_info_hr"/>
					<a href="index.php?action=voter_edit&&as_voterid=<?php echo $voterid ?>"><h1>Edit Voter</h1></a>
					<hr class="detail_info_hr"/>
					<a href="index.php?action=deletevoter&&as_voterid=<?php echo $voterid ?>" onclick="return confirm('Are you sure you want to delete: <?php echo $voter_name ?> from the system? \nBe careful, this action can not be reversed.')"><h1>Delete Voter</h1></a>
					
			    </div>
				<div class="detail_info">
					<h2>Title: <?php echo $voter_name ?></h2>
					<h2>Class: <?php echo as_class_voter($voter_class) ?></h2><hr class="detail_info_hr"/>
					<h2>Description: <?php echo $voter_fee ?></h2><hr class="detail_info_hr"/>
					<h2>Publisher: <?php echo $voter_class ?></h2>
					<h2>Post: <?php echo $voter_gender ?></h2><hr class="detail_info_hr"/>
					<h2>Posted: <?php echo date("j/m/y", strtotime($voter_registered)); ?><h2>
				</div>
			</div>
      </div> 
	</div> 	
  </div>
<?php include AS_THEME."as_footer.php" ?>
    
