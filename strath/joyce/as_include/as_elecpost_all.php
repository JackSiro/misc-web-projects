<?php 
	$database = new As_Dbconn();		
	$as_db_query = "SELECT * FROM as_elecpost ORDER BY elecpostid DESC LIMIT 20";
	$results = $database->get_results( $as_db_query );
include AS_THEME."as_header.php"; ?>
	<div id="site_content">	
	  <div id="content">
        <div>
		<br>
		  <h1><?php echo $database->as_num_rows( $as_db_query ) ?> Posts
		  <a class="button_small" style="float:right;text-align:center;" href="index.php?action=elecpost_new">New Post</a> </h1>          
			<div class="main_content" align="center">
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th>Post Name</th>
				  <th>Post Code</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=elecpost_view&amp;as_elecpostid=<?php echo $row['elecpostid'] ?>'">
					<td><?php echo $row['elecpost_title'] ?></td>
					<td><?php echo $row['elecpost_code'] ?></td>
		        </tr>
			
			<?php } ?>
			
				  </tbody>
				</table>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_elecpost-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
