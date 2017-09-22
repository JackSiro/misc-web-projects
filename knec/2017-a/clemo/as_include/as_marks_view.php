<?php 

	$studentid = $results['student'];
	$as_db_query = "SELECT * FROM as_student WHERE studentid = '$studentid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $studentid, $student_admission, $student_class, $student_course, $student_name, $student_fee, $student_registeredby, $student_registered, $student_class, $student_gender, $student_img, $student_updated, $student_updatedby) = $database->get_row( $as_db_query );
}
		
?>

<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div>
		<br>
		  <h1>Students Student: <?php echo $student_name.' | '.$student_admission ?></h1> 
          
			<div class="main_content">
				<div class="iconic_info">
					<img src="<?php echo "as_media/".$student_img ?>" class="iconic_big_i"/>
					<hr class="detail_info_hr"/>
					<a href="index.php?action=student_edit&&as_studentid=<?php echo $studentid ?>"><h1>Edit Student</h1></a>
					<hr class="detail_info_hr"/>
					<a href="index.php?action=deletestudent&&as_studentid=<?php echo $studentid ?>" onclick="return confirm('Are you sure you want to delete: <?php echo $student_name ?> from the system? \nBe careful, this action can not be reversed.')"><h1>Delete Student</h1></a>
					
			    </div>
				<div class="detail_info">
					<h2>Title: <?php echo $student_name ?></h2>
					<h2>Class: <?php echo as_class_student($student_class) ?></h2><hr class="detail_info_hr"/>
					<h2>Description: <?php echo $student_fee ?></h2><hr class="detail_info_hr"/>
					<h2>Publisher: <?php echo $student_class ?></h2>
					<h2>Subject: <?php echo $student_gender ?></h2><hr class="detail_info_hr"/>
					<h2>Posted: <?php echo date("j/m/y", strtotime($student_registered)); ?><h2>
				</div>
			</div>
      </div> 
	</div> 	
  </div>
<?php include AS_THEME."as_footer.php" ?>
    
