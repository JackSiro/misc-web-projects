<?php 

	$lecturerid = $results['lecturer'];
	$js_db_query = "SELECT * FROM js_lecturer WHERE lecturerid = '$lecturerid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $lecturerid, $lecturer_name, $lecturer_fname, $lecturer_surname, $lecturer_sex, $lecturer_password, $lecturer_email, $lecturer_group, $lecturer_joined, $lecturer_mobile, $lecturer_web, $lecturer_avatar) = $database->get_row( $js_db_query );
}
		
?>

<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_student">
		<br>
		  <h1>Lecturer Profile</h1> 
          <br><hr><br>
			<div class="main_content">
				<div class="iconic_infol">
					<img src="<?php echo "js_media/".$lecturer_avatar ?>" class="iconic_big"/>
					<a href="index.php?action=editlecturer&&js_lecturerid=<?php echo $lecturerid ?>"><h1>Edit Lecturer</h1></a>
					<hr class="detail_info_hr"/>
					<a href="index.php?action=deletelecturer&&js_lecturerid=<?php echo $lecturerid ?>" onclick="return confirm('Are you sure you want to delete: <?php echo $lecturer_name ?> from the system? \nBe careful, this action can not be reversed.')"><h1>Delete Lecturer</h1></a>
			    </div>
				<div class="detail_info">
					<h2><?php echo $lecturer_fname.' '.$lecturer_surname ?></h2>
<hr class="detail_info_hr"/>
					<h2>Username: <?php echo $lecturer_name ?></h2>
					<h2>Email: <?php echo $lecturer_email ?></h2>
					<h2>Since: <?php echo date("j/m/y", strtotime($lecturer_joined)); ?><h2>
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
<?php include JS_THEME."js_footer.php" ?>
    
