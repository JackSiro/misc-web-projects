<?php 
	$database = new As_Dbconn();
	$as_db_query = "SELECT * FROM as_voter
		LEFT JOIN as_class ON as_voter.voter_class = as_class.classid
		ORDER BY as_voter.voterid ASC LIMIT 20";
	$results = $database->get_results( $as_db_query );
	include AS_THEME."as_header.php";
?>
	<div id="site_content">
	  <div id="content">
        <div>
		<br>
		  <h1><?php echo $database->as_num_rows( $as_db_query ) ?> Voters
		  <a class="button_small" style="float:right;text-align:center;" href="index.php?action=voter_new">Register Voter</a> </h1> 
          
			<div class="main_content" align="center">
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th>Full Name</th>
				  <th>Adm No.</th>
				  <th>Gender</th>
				  <th>Class</th>
				  <th>Voted</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=voter_view&amp;as_voterid=<?php echo $row['voterid'] ?>'">
					<td><?php echo $row['voter_name'] ?></td>
					<td><?php echo $row['voter_admission'] ?></td>
					<td><?php echo as_show_sex($row['voter_gender']) ?></td>
					<td><?php echo $row['class_code'] ?></td>
					<td><?php echo as_has_voted($row['voter_voted']) ?></td>
		        </tr>
			
			<?php } ?>
			
				  </tbody>
				</table>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_voter-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
