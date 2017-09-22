<?php include AS_THEME."as_header.php";
	$database = new As_Dbconn();
	$as_db_query = "SELECT * FROM as_message WHERE message_parentid=0 AND message_sentby=$myuserid
		OR  message_parentid=0 AND message_sentto=$myuserid 
		ORDER BY messageid DESC LIMIT 30";
	$results = $database->get_results( $as_db_query );
?>
	<div class="content">
    <div class="content_resize">
       <div class="mainbar">
        <div class="article">
			<h2 style="text-transform:uppercase">Doctor-Patient Messages</h2>
		  <?php if ($mytype == 'Doctor') { ?>
			<a href="patients.php"><h3>Start a New Message</h3></a>
		  <?php } else { ?>
			<a href="doctors.php"><h3>Start a New Message</h3></a>
		  <?php } ?>	  
			<br>
			<?php if ($database->as_num_rows( $as_db_query ) < 1) { ?>
				<hr>
				<h2>There are currently no messages in your inbox. <a href="#">You can start one now!</a></h2>
				<hr>
			<?php } else { ?>
			<table class="tt_tb">
				<tr>
					<th>Select</th><th>By</th><th>Topic</th><th>Messages</th><th>Started</th>
				</tr>
				<?php foreach( $results as $row ) { 
					$messageid = $row['messageid']; 
					$messages = $database->as_num_rows("SELECT * FROM as_message WHERE message_parentid=$messageid") + 1; ?>
				<tr onclick="location='messages.php?action=view&&messageid=<?php echo $messageid ?>'">
					<td><input type="checkbox" /></td>
					<td><h3><?php if ($row['message_sentby'] == $myuserid) echo 'You: ';
						else echo as_user_code($row['message_sender'], $row['message_sentby']).': ';
					?></h3></td>
					<td><h3><?php echo $row['message_content'] ?><h3></td>
					<td><h3><?php echo '('.$messages.')';?></h3></td>
					<td><h3><?php echo as_timeago_now($row['message_sent']);?> </h3></td>
				</tr>
				<?php } ?>
			</table>
			<?php } ?>
        </div>
      </div>
		<?php // include AS_THEME."as_sidebar.php" ?>
      <div class="clr"></div>
    </div>
  </div>
 
<?php include AS_THEME."as_footer.php" ?>
    