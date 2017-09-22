<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	

	  <div id="content"> 
        
        <div class="content_item">
		<br>
		  <?php 
				$database = new As_DbConn();
				if ($myaccount == 'manager')
					$as_db_query = "SELECT * FROM as_complaint
								LEFT JOIN as_client ON as_complaint.complaint_client = as_client.clientid
								 ORDER BY complaintid DESC LIMIT 20";
				else 
					$as_db_query = "SELECT * FROM as_complaint
								LEFT JOIN as_client ON as_complaint.complaint_client = as_client.clientid
								 WHERE complaint_client =$userid 
								 ORDER BY complaintid DESC LIMIT 20";
				$results = $database->get_results( $as_db_query );
			?>
				<h1><?php echo $database->as_num_rows( $as_db_query ) ?> Complaint
		  <a style="float:right;width:300px;text-align:center;" href="index.php?action=complaint_new">Add New Complaint</a> </h1> 
          <hr>
			<br><br>
			<div class="main_content">
								
				<?php foreach( $results as $row ) { ?>
					<div class="td_dashboard" onclick="location='index.php?action=complaint_view&amp;as_complaintid=<?php echo $row['complaintid'] ?>'">
					<h3><?php echo $row['complaint_title'] ?> 
					<?php if (!empty($row['complaint_reply'])) { ?>
					<span style="float:right;width:300px;text-align:center;">[Resolved]</span><?php } ?></h3>		
					<p><?php echo substr($row['complaint_content'], 0, 100).'...' ?><br>
					Submitted: <?php echo as_timeago($row['complaint_created']) ?> by <a href="#">
					<?php echo as_complaint_client($row['client_fullname'], $row['clientid']) ?></a></p>
				</div>
				<?php } ?>
										
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
