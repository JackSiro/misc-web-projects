<?php include AS_THEME."as_header.php"; ?>
			<div id="content"> 
				<div id="featured">
		
<?php 
	$database = new As_Dbconn();			
	$as_db_query = "SELECT * FROM as_schedule
					LEFT JOIN as_worker ON as_schedule.schedule_worker = as_worker.workerid
					ORDER BY as_schedule.scheduleid  ASC LIMIT 20";
	$results = $database->get_results( $as_db_query );
?>
	  
		<br>
		  <h1><?php echo $database->as_num_rows( $as_db_query ) ?> Scheduled workers 
		<a style="float:right;width:300px;text-align:center;" href="index.php?action=schedule_new">New Schedule</a> </h1> 
          		  
          <br><hr><br>
			<div class="main_content" align="center">
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th></th>
				  <th>Worker</th>
				  <th>Type</th>
				  <th>Day</th>
				  <th>Start Time</th>
				  <th>Stop Time</th>
				  <th>Place</th>
				  <th>Created</th>
				  <th></th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=schedule_view&amp;as_scheduleid=<?php echo $row['scheduleid'] ?>'">
					<td></td>
					<td><?php echo $row['worker_fullname'] ?></td>
					<td><?php echo $row['schedule_type'] ?></td>
					<td><?php echo $row['schedule_day'] ?></td>
					<td><?php echo $row['schedule_starttime'] ?></td>
					<td><?php echo $row['schedule_stoptime'] ?></td>
					<td><?php echo $row['schedule_place'] ?></td>
					<td><?php echo date("j/m/y", strtotime($row['schedule_created'])); ?></td>
					<td></td>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table>
			</div>
		<br>
      <h2><center></center></h2>
  </div>
<?php include AS_THEME."as_footer.php" ?>
    
