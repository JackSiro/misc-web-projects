<?php include AS_THEME."as_header.php";
	$database = new As_Dbconn();
	$as_db_query = "SELECT * FROM as_candidate
		LEFT JOIN as_elecpost ON as_candidate.candidate_post = as_elecpost.elecpostid
		ORDER BY as_candidate.candidateid ASC LIMIT 20";
	$results = $database->get_results( $as_db_query );
?>
	<div id="site_content">	
	  <div id="content">
        <div>
		<br>
		  <h1><?php echo $database->as_num_rows( $as_db_query ) ?> Candidates
		  <a class="button_small" style="float:right;text-align:center;" href="index.php?action=candidate_new">Register a Candidate</a> </h1> 
          
			<div class="main_content" align="center">
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th>Full Name</th>
				  <th>Gender</th>
				  <th>Post</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=candidate_view&amp;as_candidateid=<?php echo $row['candidateid'] ?>'">
					<td><?php echo $row['candidate_name'] ?></td>
					<td><?php echo as_show_sex($row['candidate_gender']) ?></td>
					<td><?php echo $row['elecpost_code'] ?></td>
		        </tr>
			
				<?php } ?>
			
				  </tbody>
				</table>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_candidate-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
