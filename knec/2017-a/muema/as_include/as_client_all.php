<?php include AS_THEME."as_header.php";
	$as_db_query = "SELECT * FROM as_client ORDER BY clientid DESC LIMIT 20";
	$database = new As_Dbconn();			
	$results = $database->get_results( $as_db_query );
?>
<div id="site_content">
	<h1><?php echo $database->as_num_rows( $as_db_query ) ?> clients
		  <a style="float:right;width:300px;text-align:center;" href="index.php?action=client_new">New client</a> </h1>
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
		        <tr onclick="location='index.php?action=client_view&amp;as_clientid=<?php echo $row['clientid'] ?>'">
				   <td></td>
				   <td><?php echo $row['client_fullname'] ?></td>
		          <td><?php echo $row['client_mobile'] ?></td>
		          <td><?php echo $row['client_email'] ?></td>
		          <td><?php echo $row['client_address'] ?></td>
				  <td><?php echo date("j/m/y", strtotime($row['client_joined'])); ?></td>
		        </tr>
			
			<?php } ?>			
	  </tbody>
	</table>
</div>
<?php include AS_THEME."as_footer.php" ?>
    
