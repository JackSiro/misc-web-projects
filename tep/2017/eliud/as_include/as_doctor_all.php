<?php include AS_THEME."as_header.php";
	$as_db_query = "SELECT * FROM as_doctor ORDER BY doctorid DESC LIMIT 20";
	$database = new As_Dbconn();			
	$results = $database->get_results( $as_db_query );
?>
	<div class="content">
    <div class="content_resize">
       <div class="mainbar">
        <div class="article">
          <h2 style="text-transform:uppercase">Doctors Available</h2>
		  <?php if ($mytype == 'Doctor') { ?>
			<a href="doctors.php?action=new"><h3>Add a New Doctor</h3></a>
		  <?php } ?>
		  <center>		  
			<br>
			<table class="tt_tb">
				<tr>
					<th>Name</th>
					<th>Mobile</th>
					<th>Email</th>
					<th>Action</th>
				</tr>
				<?php foreach( $results as $row ) { ?>
				<tr>
					<td><?php echo $row['doctor_name'] ?></td>
					<td><?php echo $row['doctor_mobile'] ?></td>
					<td><?php echo $row['doctor_email'] ?></td>
					<td><a href="messages.php?action=new&&group=Doctor&&recipient=<?php echo $row['doctorid'] ?>">Message this Doctor</a></td>
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
    