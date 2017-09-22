<?php include AS_THEME."as_header.php"; ?>
			<div id="content"> 
				<div id="featured">
		
		<?php $as_db_query = "SELECT * FROM as_worker ORDER BY workerid DESC LIMIT 20";
			$database = new As_Dbconn();			
			$results = $database->get_results( $as_db_query );
		?>
	  
		  <h1><?php echo $database->as_num_rows( $as_db_query ) ?> workers
		  <a style="float:right;width:300px;text-align:center;" href="index.php?action=worker_new">New worker</a> </h1> 
          <br><hr><br>
			<div class="main_content" align="center">
			
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th></th>
				  <th>Full Name</th>
				  <th>Mobile</th>
				  <th>Email</th>
				  <th>Address</th>
				  <th>Registered</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=worker_view&amp;as_workerid=<?php echo $row['workerid'] ?>'">
				   <td></td>
				   <td><?php echo $row['worker_fullname'] ?></td>
		          <td><?php echo $row['worker_mobile'] ?></td>
		          <td><?php echo $row['worker_email'] ?></td>
		          <td><?php echo $row['worker_address'] ?></td>
				  <td><?php echo date("j/m/y", strtotime($row['worker_joined'])); ?></td>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table>
			</div>
		<br>
      <h2><center></center></h2>
		
			
			</div>
<?php include AS_THEME."as_footer.php" ?>
    
