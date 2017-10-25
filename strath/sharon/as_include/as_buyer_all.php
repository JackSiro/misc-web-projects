<?php 
	$as_db_query = "SELECT * FROM as_user WHERE user_group='buyer' ORDER BY userid DESC LIMIT 20";
	$database = new As_Dbconn();			
	$results = $database->get_results( $as_db_query );
	
	include AS_THEME."as_header.php"; ?>
<div id="body">
		<div>
			<div>
				<div>
					<div>
		  <h1><?php echo $database->as_num_rows( $as_db_query ) ?> Buyers</h1> 
          <br><hr><br>
			<div class="main_content" align="center">
			
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th></th>
				  <th>Full Name</th>
				  <th>Group</th>
				  <th>Mobile</th>
				  <th>Email</th>
				  <th>Registered</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=user_view&amp;as_userid=<?php echo $row['userid'] ?>'">
				   <td></td>
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
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
