  <?php include AS_THEME."as_header.php" ?>
    <div id="content">
		<div>
			<h1>Add a Patient Billing</h1>
			<div id="account">
				<div>
				<?php
					$database = new As_Dbconn();			
					$as_db_query = "SELECT * FROM as_patient ORDER BY patientid DESC LIMIT 20";
					$results = $database->get_results( $as_db_query ); 
					if ($database->as_num_rows( $as_db_query)<=0) { ?>
				<h2 style="color:#000">You need to fix the following errors before you add a Item</h2>
				<ul>
				<h3><li><a href="index.php?action=patient_new">No patients found! Add a patient</a></li><h3>
				
				</ul>
			<?php } else { ?>
					<form action="index.php?action=billing_new" method="post">
				<table class="form_table">
				
				<tr>
					<td>Patient</td>
					<td>
						<select name="patient" style="font-size:20px;">
							<option value=""> Choose a patient </option>
							<?php foreach( $results as $row ) { ?>
							<option value="<?php echo $row['patientid'] ?>"><?php echo $row['patient_name'] ?></option>
							<?php } ?>
						</select>
					</td>
				</tr>
				<tr> 
					<td>Description:</td>
					<td><input type="text" name="description"></td>
				</tr>
				<tr>
					<td>Expected:</td>
					<td><input type="text" name="expected"></td>
				</tr>
				<tr>
					<td>Amount:</td>
					<td><input type="text" name="amount"></td>
				</tr>
						</table>
						<center><input type="submit" class="submitbtn" name="Submitbills" value="Submit bills">
			  </center>
					</form>
					<?php } ?>
				</div>
				</div>
			</div>
		</div>
	</div>
    <?php include AS_THEME."as_footer.php" ?>
   