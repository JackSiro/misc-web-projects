<?php include AS_THEME."as_header.php"; ?>
	<div class="content">
    <div class="content_resize">
       <div class="mainbar">
        <div class="article">
          <h2>Add a new Session</h2><br>
          <form action="sessions.php?action=new" method="post">
		<table style="width:100%;font-size:20px;">
		<tr>
			<td>Doctor:</td>
			<td>
			  <select name="doctor" >
				<option value="" > - Choose a Doctor - </option>
				<?php $as_dt_query = "SELECT * FROM as_doctor ORDER BY doctorid ASC";
					$database = new As_Dbconn();			
					$results = $database->get_results( $as_dt_query );
		
					foreach( $results as $row ) { ?>
				<option value="<?php echo $row['doctorid'] ?>">  Dr <?php echo $row['doctor_name'] ?></option>
					<?php } ?>
			  </select>
			</td>
		</tr>
		<tr> 
			<td>Patient:</td>
			<td>
			<select name="patient" >
				<option value="" > - Choose a Patient - </option>
				<?php $as_dt_query = "SELECT * FROM as_patient ORDER BY patientid ASC";
					$database = new As_Dbconn();			
					$results = $database->get_results( $as_dt_query );
		
					foreach( $results as $row ) { ?>
				<option value="<?php echo $row['patientid'] ?>"><?php echo $row['patient_name'] ?></option>
					<?php } ?>
			  </select>
			</td>
		</tr>
		<tr> 
			<td>Time In (in Minutes):</td>
			<td><input type="text" class="input_form" name="timein" autocomplete="off" ></td>
		</tr>
		<tr>
			<td>Time Out (in Minutes):</td>
			<td><input type="text" class="input_form" name="timeout" autocomplete="off" ></td>
		</tr>
		<tr>
			<td></td>
			<td>
			<input type="submit" class="submit_form_i" name="AddSession" value="Add New Session">
	 
			</td>
		</tr>
		</table><br>
				<br>
		</form>
        </div>
      </div>
		
      <div class="clr"></div>
    </div>
  </div>
 
<?php include AS_THEME."as_footer.php" ?>
    
