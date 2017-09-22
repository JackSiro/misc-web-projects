<?php include AS_THEME."as_header.php"; 
	$database = new As_Dbconn();
	$as_db_query = "SELECT * FROM as_certificate
					LEFT JOIN as_student ON as_certificate.certificate_student = as_student.studentid
					ORDER BY as_certificate.certificate_student  ASC LIMIT 20";
	$results = $database->get_results( $as_db_query );
?>
	<div id="site_content">
	  <div id="content">
        <div>
		<br>
		  <h1><?php echo $database->as_num_rows( $as_db_query ) ?> certificates
		  <a class="button_small" style="float:right;text-align:center;" href="index.php?action=certificate_new">New certificate</a> </h1>          
			<div class="main_content" align="center">
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th>Student</th>
				  <th>Title</th>
				  <th>Event</th>
				  <th>Date</th>
				  
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=certificate_view&amp;as_certificateid=<?php echo $row['certificateid'] ?>'">
					<td><?php echo $row['student_name'] ?></td>
					<td><?php echo $row['certificate_title'] ?></td>
					<td><?php echo $row['certificate_event'] ?></td>
					<td><?php echo $row['certificate_created'] ?></td>
		        </tr>
			
			<?php } ?>
			
				  </tbody>
				</table>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_certificate-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
