<?php include AS_THEME."as_header.php"; ?>
    <div id="tooplate_main">                
		
		<?php $as_db_query = "SELECT * FROM as_apartment ORDER BY apartmentid DESC LIMIT 20";
			$database = new As_Dbconn();			
			$results = $database->get_results( $as_db_query );
		?>
	  
		  <h1><?php echo $database->as_num_rows( $as_db_query ) ?> Apartments
		  <a style="float:right;width:300px;text-align:center;" href="index.php?action=apartment_new">New apartment</a> </h1> 
          <br><hr><br>
			<div class="main_content" align="center">
			
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th></th>
				  <th>Location</th>
				  <th>Number</th>
				  <th>Description</th>
				  <th></th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=apartment_view&amp;as_apartmentid=<?php echo $row['apartmentid'] ?>'">
					<td></td>
					<td><?php echo $row['apartment_location'] ?></td>
					<td><?php echo $row['apartment_number'] ?></td>
					<td><?php echo $row['apartment_description'] ?></td>
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
    
