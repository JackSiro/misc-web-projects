<?php include AS_THEME."as_header.php"; ?>
	<div id="tooplate_content">	
		
		<?php $as_db_query = "SELECT * FROM as_user ORDER BY userid DESC LIMIT 20";
			$database = new As_Dbconn();			
			$results = $database->get_results( $as_db_query );
		?>
	  <div id="content">
        <div>
		<br>
		  <h1><?php echo $database->as_num_rows( $as_db_query ) ?> Officials
		  <a class="button_small" style="float:right;text-align:center;" href="index.php?action=user_new">Add New Official</a> </h1> 
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
		        <tr onclick="location='index.php?action=user_view&amp;as_userid=<?php echo $row['userid'] ?>'">
				   <td><?php echo $row['user_fname'].' '.$row['user_surname'] ?></td>
					<td><?php echo $row['user_group'] ?></td>
					<td><?php echo $row['user_mobile'] ?></td>
					<td><?php echo $row['user_email'] ?></td>
					<td><?php echo date("j/m/y", strtotime($row['user_joined'])); ?></td>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_client-->
      </div><!--close content-->   
	</div><!--close tooplate_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
