<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	
		
<?php 
	$database = new As_Dbconn();		
	
	$as_db_query = "SELECT * FROM as_subject ORDER BY subjectid DESC LIMIT 20";
	$results = $database->get_results( $as_db_query );
?>
	  <div id="content">
        <div>
		<br>
		  <h1><?php echo $database->as_num_rows( $as_db_query ) ?> Subjects
		  <a class="button_small" style="float:right;text-align:center;" href="index.php?action=subject_new">New Subject</a> </h1>          
			<div class="main_content" align="center">
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th>Subject Name</th>
				  <th>Subject Code</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=subject_view&amp;as_subjectid=<?php echo $row['subjectid'] ?>'">
					<td><?php echo $row['subject_title'] ?></td>
					<td><?php echo $row['subject_code'] ?></td>
		        </tr>
			
			<?php } ?>
			
				  </tbody>
				</table>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_subject-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
