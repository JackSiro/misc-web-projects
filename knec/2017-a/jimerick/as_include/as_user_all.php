<?php include AS_THEME."as_header.php"; 
	$database = new As_Dbconn();			
	 $as_db_query = "SELECT * FROM as_user ORDER BY userid DESC LIMIT 20";
	$database = new As_Dbconn();			
	$results = $database->get_results( $as_db_query );
?>
<div id="content">
	<div>
		<h1>Users List</h1><br>
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
				<tr onclick="location='index.php?action=type_view&amp;as_typeid=<?php echo $row['typeid'] ?>'">
				   <td><?php echo $row['user_fname'].' '.$row['user_surname'] ?></td>
		          <td><?php echo $row['user_group'] ?></td>
		          <td><?php echo $row['user_mobile'] ?></td>
		          <td><?php echo $row['user_email'] ?></td>
				  <td><?php echo date("j/m/y", strtotime($row['user_joined'])); ?></td>
		        </tr>				
			<?php } ?>			
			  </tbody>
		</table>
		<div id="blog">
			<div id="articles">
				<div class="section">
					<a href="#" class="newpost"><?php echo $database->as_num_rows( $as_db_query ) ?> users</a>
					<a href="index.php?action=user_new" class="oldpost">New Users</a>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<?php include AS_THEME."as_footer.php" ?>
   