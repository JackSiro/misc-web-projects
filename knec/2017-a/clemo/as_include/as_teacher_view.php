<?php 

	$teacherid = $results['teacher'];
	$as_db_query = "SELECT * FROM as_teacher WHERE teacherid = '$teacherid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $teacherid, $teacher_name, $teacher_fname, $teacher_surname, $teacher_sex, $teacher_password, $teacher_email, $teacher_group, $teacher_joined, $teacher_mobile, $teacher_web, $teacher_avatar) = $database->get_row( $as_db_query );
}
		
?>

<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div>
		<br>
		  <h1>Teacher Profile</h1> 
          
			<div class="main_content">
				<div class="iconic_infol">
					<img src="<?php echo "as_media/".$teacher_avatar ?>" class="iconic_big"/>
					<a href="index.php?action=editteacher&&as_teacherid=<?php echo $teacherid ?>"><h1>Edit Teacher</h1></a>
					<hr class="detail_info_hr"/>
					<a href="index.php?action=deleteteacher&&as_teacherid=<?php echo $teacherid ?>" onclick="return confirm('Are you sure you want to delete: <?php echo $teacher_name ?> from the system? \nBe careful, this action can not be reversed.')"><h1>Delete Teacher</h1></a>
			    </div>
				<div class="detail_info">
					<h2><?php echo $teacher_fname.' '.$teacher_surname ?></h2>
<hr class="detail_info_hr"/>
					<h2>Username: <?php echo $teacher_name ?></h2>
					<h2>Email: <?php echo $teacher_email ?></h2>
					<h2>Since: <?php echo date("j/m/y", strtotime($teacher_joined)); ?><h2>
				</div>
				</div>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_student-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
