<?php include AS_THEME."as_header.php"; ?>
			<div id="content"> 
				<div id="featured">
		
		<?php $as_db_query = "SELECT * FROM as_attendant ORDER BY attendantid DESC LIMIT 20";
			$database = new As_Dbconn();			
			$results = $database->get_results( $as_db_query );
		?>
	  
		  <h1><?php echo $database->as_num_rows( $as_db_query ) ?> attendants
		  <a style="float:right;width:300px;text-align:center;" href="index.php?action=attendant_new">New attendant</a> </h1> 
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
		        <tr onclick="location='index.php?action=attendant_view&amp;as_attendantid=<?php echo $row['attendantid'] ?>'">
				   <td></td>
				   <td><?php echo $row['attendant_fullname'] ?></td>
		          <td><?php echo $row['attendant_mobile'] ?></td>
		          <td><?php echo $row['attendant_email'] ?></td>
		          <td><?php echo $row['attendant_address'] ?></td>
				  <td><?php echo date("j/m/y", strtotime($row['attendant_joined'])); ?></td>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table>
			</div>
		<br>
      <h2><center></center></h2>
		
			
			</div>
<?php include AS_THEME."as_footer.php" ?>
    
