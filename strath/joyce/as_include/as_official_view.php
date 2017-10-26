<?php 

	$officialid = $results['official'];
	$as_db_query = "SELECT * FROM as_official WHERE officialid = '$officialid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $officialid, $official_name, $official_fname, $official_surname, $official_sex, $official_password, $official_email, $official_group, $official_joined, $official_mobile, $official_web, $official_avatar) = $database->get_row( $as_db_query );
}
		
?>

<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div>
		<br>
		  <h1>Official Profile</h1> 
          
			<div class="main_content">
				<div class="iconic_infol">
					<img src="<?php echo "as_media/".$official_avatar ?>" class="iconic_big"/>
					<a href="index.php?action=editofficial&&as_officialid=<?php echo $officialid ?>"><h1>Edit Official</h1></a>
					<hr class="detail_info_hr"/>
					<a href="index.php?action=deleteofficial&&as_officialid=<?php echo $officialid ?>" onclick="return confirm('Are you sure you want to delete: <?php echo $official_name ?> from the system? \nBe careful, this action can not be reversed.')"><h1>Delete Official</h1></a>
			    </div>
				<div class="detail_info">
					<h2><?php echo $official_fname.' '.$official_surname ?></h2>
<hr class="detail_info_hr"/>
					<h2>Username: <?php echo $official_name ?></h2>
					<h2>Email: <?php echo $official_email ?></h2>
					<h2>Since: <?php echo date("j/m/y", strtotime($official_joined)); ?><h2>
				</div>
				</div>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_voter-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
