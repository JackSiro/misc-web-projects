<?php 
	$studentid = $results['student'];
	$as_db_query = "SELECT * FROM as_student WHERE studentid = '$studentid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $studentid, $student_name, $student_fname, $student_surname, $student_sex, $student_password, $student_email, $student_role, $student_joined, $student_mobile, $student_web, $student_avatar) = $database->get_row( $as_db_query );
}
	include AS_THEME."as_header.php"; ?>
				</div>
			</div>

			<div id="main" class="wrapper style1">
				<section class="container">
					<header class="major">
						<h2>Student Profile</h2> 
          
			<div class="main_content">
				<div class="iconic_infol">
					<img src="<?php echo "as_media/".$student_avatar ?>" class="iconic_big"/>
					<a href="index.php?action=editstudent&&as_studentid=<?php echo $studentid ?>"><h1>Edit Student</h1></a>
					<hr class="detail_info_hr"/>
					<a href="index.php?action=deletestudent&&as_studentid=<?php echo $studentid ?>" onclick="return confirm('Are you sure you want to delete: <?php echo $student_name ?> from the system? \nBe careful, this action can not be reversed.')"><h1>Delete Student</h1></a>
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
		</div><!--close content_group-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
