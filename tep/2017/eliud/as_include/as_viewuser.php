<?php 

	$doctorid = $results['user'];
	$as_db_query = "SELECT * FROM as_doctor WHERE doctorid = '$doctorid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $doctorid, $doctor_code, $doctor_fname, $doctor_surname, $doctor_sex, $doctor_password, $doctor_email, $doctor_group, $doctor_joined, $doctor_mobile, $doctor_web, $doctor_avatar) = $database->get_row( $as_db_query );
}
		
?>

<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_item">
		<br>
		  <h1>User Profile</h1> 
          <br><hr><br>
			<div class="main_content">
				<div class="iconic_infol">
					<img src="<?php echo "as_media/".$doctor_avatar ?>" class="iconic_big"/>
					<a href="index.php?action=edituser&&as_doctorid=<?php echo $doctorid ?>"><h1>Edit User</h1></a>
					<hr class="detail_info_hr"/>
					<a href="index.php?action=deleteuser&&as_doctorid=<?php echo $doctorid ?>" onclick="return confirm('Are you sure you want to delete: <?php echo $doctor_code ?> from the system? \nBe careful, this action can not be reversed.')"><h1>Delete User</h1></a>
			    </div>
				<div class="detail_info">
					<h2><?php echo $doctor_fname.' '.$doctor_surname ?></h2>
<hr class="detail_info_hr"/>
					<h2>Username: <?php echo $doctor_code ?></h2>
					<h2>Email: <?php echo $doctor_email ?></h2>
					<h2>Since: <?php echo date("j/m/y", strtotime($doctor_joined)); ?><h2>
				</div>
				</div>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
