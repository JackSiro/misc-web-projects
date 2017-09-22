<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	
		
<?php 
	$database = new As_Dbconn();
	$as_db_query = "SELECT * FROM as_student ORDER BY studentid DESC LIMIT 20";
	$results = $database->get_results( $as_db_query );
?>
	  <div id="content">
        <div>
		<br>
		  <h1><?php echo $database->as_num_rows( $as_db_query ) ?> Students
		  <a class="button_small" style="float:right;text-align:center;" href="index.php?action=student_new">New Student</a> </h1> 
          
			<div class="main_content" align="center">
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th>Full Name</th>
				  <th>Adm No.</th>
				  <th>Gender</th>
				  <th>Class</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=student_view&amp;as_studentid=<?php echo $row['studentid'] ?>'">
					<td><?php echo $row['student_name'] ?></td>
					<td><?php echo $row['student_admission'] ?></td>
					<td><?php echo $row['student_gender'] ?></td>
					<td><?php echo $row['student_class'] ?></td>
		        </tr>
			
			<?php } ?>
			
				  </tbody>
				</table>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_student-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
