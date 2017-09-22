<?php 

	$studentid = $results['user'];
	$js_db_query = "SELECT * FROM js_student WHERE studentid = '$studentid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $studentid, $student_name, $student_fname, $student_surname, $student_sex, $student_password, $student_email, $student_group, $student_joined, $student_mobile, $student_web, $student_avatar) = $database->get_row( $js_db_query );
}
		
?>

<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_book">
		<br>
		  <h1>User Profile</h1> 
          <br><hr><br>
			<div class="main_content">
				<div class="iconic_infol">
					<img src="<?php echo "js_media/".$student_avatar ?>" class="iconic_big"/>
					<a href="index.php?js_page=edituser&&js_studentid=<?php echo $studentid ?>"><h1>Edit User</h1></a>
					<hr class="detail_info_hr"/>
					<a href="index.php?js_page=deleteuser&&js_studentid=<?php echo $studentid ?>" onclick="return confirm('Are you sure you want to delete: <?php echo $student_name ?> from the system? \nBe careful, this js_page can not be reversed.')"><h1>Delete User</h1></a>
			    </div>
				<div class="detail_info">
					<h2><?php echo $student_fname.' '.$student_surname ?></h2>
<hr class="detail_info_hr"/>
					<h2>Username: <?php echo $student_name ?></h2>
					<h2>Email: <?php echo $student_email ?></h2>
					<h2>Since: <?php echo date("j/m/y", strtotime($student_joined)); ?><h2>
				</div>
				</div>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_book-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
