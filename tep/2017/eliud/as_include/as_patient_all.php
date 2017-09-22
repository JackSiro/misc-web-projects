<?php include AS_THEME."as_header.php";
	$as_db_query = "SELECT * FROM as_patient ORDER BY patientid DESC LIMIT 20";
	$database = new As_Dbconn();			
	$results = $database->get_results( $as_db_query );
?>
	<div class="content">
    <div class="content_resize">
       <div class="mainbar">
        <div class="article">
          <h2 style="text-transform:uppercase">Patients in Session</h2>
		  <center>		  
			<br>
			<table class="tt_tb">
				<tr>
					<th>Name</th>
					<th>Mobile</th>
					<th>Email</th>
					<th>Location</th>
					<th>Action</th>
				</tr>
				<?php foreach( $results as $row ) { ?>
				<tr>
					<td><?php echo $row['patient_name'].' ('.$row['patient_sex'].')' ?></td>
					<td><?php echo $row['patient_mobile'] ?></td>
					<td><?php echo $row['patient_email'] ?></td>
					<td><?php echo $row['patient_address'] ?></td>
					<td><a href="messages.php?action=new&&group=Patient&&recipient=<?php echo $row['patientid'] ?>">Message this Patient</a></td>
				</tr>
				<?php } ?>
			</table>
		</center>
        </div>
      </div>
		<?php // include AS_THEME."as_sidebar.php" ?>
      <div class="clr"></div>
    </div>
  </div>
 
<?php include AS_THEME."as_footer.php" ?>
    