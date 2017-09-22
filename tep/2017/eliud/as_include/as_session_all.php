<?php include AS_THEME."as_header.php";
	$database = new As_Dbconn();
	if ($mytype == 'Doctor') { 
		$as_db_query = "SELECT * FROM as_session ORDER BY sessionid DESC LIMIT 20";
	} else {
		$as_db_query = "SELECT * FROM as_session WHERE sess_patient=$myuserid ORDER BY sessionid DESC LIMIT 20";
	}
	$results = $database->get_results( $as_db_query );
?>
	<div class="content">
    <div class="content_resize">
       <div class="mainbar">
        <div class="article">
		  <?php if ($mytype == 'Doctor') { ?>
			<h2 style="text-transform:uppercase">Doctor-Patient Sessions</h2>
			<a href="sessions.php?action=new"><h3>Start a New Session</h3></a>
		  <?php } else { ?>
			<h2 style="text-transform:uppercase">Your Sessions with Doctors</h2>
		  <?php } ?>	  
			<br>
			<?php if ($database->as_num_rows( $as_db_query ) < 1) { ?>
				<hr>
				<?php if ($mytype == 'Doctor') { ?>
				<h2>There are currently no sessions. <a href="sessions.php?action=new">You can start one now!</a></h2>
				 <?php } else { ?>
				<h3>It looks like you currently have no ongoing sessions.</h3>
				<p>Check back later to see if a doctor has created a session for you</p>
			  <?php } ?>
				<hr>
			<?php } else { ?>
			<table class="tt_tb">
				<tr>
					<th>Patient</th>
					<th>Doctor</th>
					<th>Time in</th>
					<th>Time out</th>
				</tr>
				<?php foreach( $results as $row ) { ?>
				<tr>
					<td><?php echo as_user_name('Patient', $row['sess_patient']) ?></td>
					<td>Dr. <?php echo as_user_name('Doctor', $row['sess_doctor']) ?></td>
					<td><?php echo $row['sess_timein'] ?></td>
					<td><?php echo $row['sess_timeout'] ?></td>
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
    