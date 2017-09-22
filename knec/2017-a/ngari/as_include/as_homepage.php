<?php include AS_THEME."as_header.php";
	$as_db_query = "SELECT * FROM as_member ORDER BY memberid DESC LIMIT 20";
	$database = new As_Dbconn();			
	$results = $database->get_results( $as_db_query );
?>
<div id="site_content">
	<h1><?php echo $database->as_num_rows( $as_db_query ) ?> members
		  <a style="float:right;width:300px;text-align:center;" href="index.php?action=member_new">New member</a> </h1>
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
		        <tr onclick="location='index.php?action=member_view&amp;as_memberid=<?php echo $row['memberid'] ?>'">
				   <td></td>
				   <td><?php echo $row['member_fullname'] ?></td>
		          <td><?php echo $row['member_mobile'] ?></td>
		          <td><?php echo $row['member_email'] ?></td>
		          <td><?php echo $row['member_address'] ?></td>
				  <td><?php echo date("j/m/y", strtotime($row['member_joined'])); ?></td>
		        </tr>
			
			<?php } ?>			
	  </tbody>
	</table>
</div>
<?php include AS_THEME."as_footer.php" ?>
    
