<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	
		
		<?php $as_db_query = "SELECT * FROM as_teacher ORDER BY teacherid DESC LIMIT 20";
			$database = new As_Dbconn();			
			$results = $database->get_results( $as_db_query );
		?>
	  <div id="content">
        <div>
		<br>
		  <h1><?php echo $database->as_num_rows( $as_db_query ) ?> Teachers
		  <a class="button_small" style="float:right;text-align:center;" href="index.php?action=teacher_new">Add New Teacher</a> </h1> 
          <hr>
			<div class="main_content" align="center">
			
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th>Full Name</th>
				  <th>Group</th>
				  <th>Mobile</th>
				  <th>Email</th>
				  <th>Registered</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=teacher_view&amp;as_teacherid=<?php echo $row['teacherid'] ?>'">
				   <td><?php echo $row['teacher_fname'].' '.$row['teacher_surname'] ?></td>
					<td><?php echo $row['teacher_group'] ?></td>
					<td><?php echo $row['teacher_mobile'] ?></td>
					<td><?php echo $row['teacher_email'] ?></td>
					<td><?php echo date("j/m/y", strtotime($row['teacher_joined'])); ?></td>
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
    
