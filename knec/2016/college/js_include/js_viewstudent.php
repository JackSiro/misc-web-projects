<?php 

	$studentid = $results['student'];
	$js_db_query = "SELECT * FROM js_student WHERE studentid = '$studentid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $studentid, $student_admission, $student_department, $student_course, $student_name, $student_fee, $student_postedby, $student_posted, $student_class, $student_gender, $student_img, $student_updated, $student_updatedby) = $database->get_row( $js_db_query );
}
		
?>

<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_student">
		<br>
		  <h1>Students Student: <?php echo $student_name.' | '.$student_admission ?></h1> 
          <br><hr><br>
			<div class="main_content">
				<div class="iconic_info">
					<img src="<?php echo "js_media/".$student_img ?>" class="iconic_big_i"/>
					<hr class="detail_info_hr"/>
					<a href="index.php?action=editstudent&&js_studentid=<?php echo $studentid ?>"><h1>Edit Student</h1></a>
					<hr class="detail_info_hr"/>
					<a href="index.php?action=deletestudent&&js_studentid=<?php echo $studentid ?>" onclick="return confirm('Are you sure you want to delete: <?php echo $student_name ?> from the system? \nBe careful, this action can not be reversed.')"><h1>Delete Student</h1></a>
					
			    </div>
				<div class="detail_info">
					<h2>Title: <?php echo $student_name ?></h2>
					<h2>Department: <?php echo js_department_student($student_department) ?></h2><hr class="detail_info_hr"/>
					<h2>Description: <?php echo $student_fee ?></h2><hr class="detail_info_hr"/>
					<h2>Publisher: <?php echo $student_class ?></h2>
					<h2>Subject: <?php echo $student_gender ?></h2><hr class="detail_info_hr"/>
					<h2>Posted: <?php echo date("j/m/y", strtotime($student_posted)); ?><h2>
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
    
