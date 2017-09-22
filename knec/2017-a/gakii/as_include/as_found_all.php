<?php include AS_THEME."as_header.php";
	$as_db_query = "SELECT * FROM as_found ORDER BY foundid DESC LIMIT 20";
	$database = new As_Dbconn();			
	$results = $database->get_results( $as_db_query );
?>
<div id="tooplate_main">        
	<h2><?php echo $database->as_num_rows( $as_db_query ) ?> found Item
		  <a style="float:right;width:300px;text-align:center;" href="index.php?action=found_new">New Found Item</a> </h2>
		  <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th></th>
				  <th>Item Name</th>
				  <th>Place Found</th>
				  <th>Description</th>
				  <th>Reported</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=found_view&amp;as_foundid=<?php echo $row['foundid'] ?>'">
				   <td></td>
				   <td><?php echo $row['found_title'] ?></td>
		          <td><?php echo $row['found_place'] ?></td>
		          <td><?php echo $row['found_content'] ?></td>
				  <td><?php echo date("j/m/y", strtotime($row['found_posted'])); ?></td>
		        </tr>
			<?php } ?>			
	  </tbody>
	</table>
</div>
<?php include AS_THEME."as_footer.php" ?>
    
