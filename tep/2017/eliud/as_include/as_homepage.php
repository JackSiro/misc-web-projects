<?php include AS_THEME."as_header.php";
	$database = new As_Dbconn();
?>
	<div class="content">
    <div class="content_resize">
       <div class="mainbar">
        <div class="article">
          <h2 style="text-transform:uppercase"><?php echo $mytype ?>'s Dashboard</h2>
		  <center>		  
			<br>
			<table style="width:100%;">
			  <tr>
				<td style="width:50%;  border:2px solid #eee; padding:20px;">
					<h3 style="font-size:30px;">Welcome <?php echo $myaccount ?></h3><hr>
					<h2> Account Type: <?php echo $mytype ?></h2>
					<?php if ($mytype=='Doctor') {
					$as_db_query = "SELECT * FROM as_doctor WHERE doctorid =$myuserid";
					list( $doctorid, $doctor_code, $doctor_name, $doctor_sex, $doctor_password, $doctor_email, $doctor_group, 
						$doctor_joined, $doctor_mobile) = $database->get_row( $as_db_query ); ?>
					<table>
						<tr><td><h3>Full Name:</h3></td><td><h3><?php echo $doctor_name ?></h3></td></tr>
						<tr><td><h3>Username:</h3></td><td><h3><?php echo $doctor_code ?></h3></td></tr>
						<tr><td><h3>Email:</h3></td><td><h3><?php echo $doctor_email ?></h3></td></tr>
						<tr><td><h3>Mobile:</h3></td><td><h3><?php echo $doctor_mobile ?></h3></td></tr>
						<tr><td><h3>Joined:</h3></td><td><h3><?php echo $doctor_joined ?></h3></td></tr>
					</table>
					<?php } else {
					$as_db_query = "SELECT * FROM as_patient WHERE patientid = '$myuserid'";
					list( $patientid, $patient_code, $patient_name, $patient_sex, $patient_password, $patient_email, 
						$patient_address, $patient_mobile, $patient_joined) = $database->get_row( $as_db_query ); ?>
					<table>
						<tr><td><h3>Full Name:</h3></td><td><h3><?php echo $patient_name ?></h3></td></tr>
						<tr><td><h3>Username:</h3></td><td><h3><?php echo $patient_code ?></h3></td></tr>
						<tr><td><h3>Email:</h3></td><td><h3><?php echo $patient_email ?></h3></td></tr>
						<tr><td><h3>Mobile:</h3></td><td><h3><?php echo $patient_mobile ?></h3></td></tr>
						<tr><td><h3>Location:</h3></td><td><h3><?php echo $patient_address ?></h3></td></tr>
						<tr><td><h3>Joined:</h3></td><td><h3><?php echo $patient_joined ?></h3></td></tr>
					</table>
					<?php } ?>
				</td>
				<td style="width:50%; border:2px solid #eee; padding:20px;">
					<h3 style="font-size:30px;">More Info</h3>
					<ul>
						<li><a href="sessions.php"><h2>Check you sessions</h2></a></li>
						<li><a href="messages.php"><h2>Check your Messages</h2></a></li>
					</ul>
				</td>
			  </tr>
			</table>
		</center>
        </div>
      </div>
		<?php // include AS_THEME."as_sidebar.php" ?>
      <div class="clr"></div>
    </div>
  </div>
 
<?php include AS_THEME."as_footer.php" ?>
    
