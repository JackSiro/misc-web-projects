<?php include AS_THEME."as_header.php";
	$as_db_query = "SELECT * FROM as_user ORDER BY userid DESC LIMIT 20";
	$database = new As_Dbconn();			
	$results = $database->get_results( $as_db_query );
?>
	<div id="tooplate_main">    	        
        <div class="content_box">
		   <h2>Users List <div class="button_small" style="float:right;text-align:center;">
			<a href="#"><?php echo $database->as_num_rows( $as_db_query ) ?> Users</a>
			<a href="index.php?action=user_new">New User</a></div> </h2>
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
            <div class="cleaner h30"></div>
            <a class="gototop" href="#top"></a>
            <div class="cleaner"></div>
            <div class="cleaner"></div>
        </div>
	</div>
<?php include AS_THEME."as_footer.php" ?>
