<?php
	$as_db_query = "SELECT * FROM as_patient WHERE patientid = '".$results['patient']."'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $patientid, $patient_name, $patient_sex, $patient_location, $patient_sickness, $patient_type, $patient_comment, $patient_postedby, $patient_posted, $patient_updated, $patient_updatedby) = $database->get_row( $as_db_query );
	}
	include AS_THEME."as_header.php" ?>
   <div id="content">
		<div id="blog">
			<div id="articles">
				<ul>
					<li>
						<div>
							<div>
								<span class="date">Info.</span>
								<h1>Name: <?php echo $patient_name ?></h1>
								<h2>Patient Mode: <?php echo $patient_type ?></h2>
								<p> Sex: <?php echo as_show_sex($patient_sex) ?><br> 
									Sickness: <?php echo $patient_sickness ?><br>
									Comment: <?php echo $patient_comment ?><br>
									Location: <?php echo $patient_location ?><br>
								
								</p>
								<span id="tag">Admitted: <?php echo $patient_posted ?></span>
							</div>
						</div>
					</li>
					<li>
						<div>
							<div>
								<span class="date">Add new Billing</span>
								<h1>Patient Billing</h1>
								<div id="account">
									<div>
									
										<form action="index.php?action=patient_view&&as_patientid=<?php echo $patientid ?>" method="post">
									<table class="form_table">
									
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
											<center><input type="submit" class="submitbtn" name="Updatebills" value="Update bills">
								  </center>
										</form>
										<?php } ?>
									</div>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
    <?php include AS_THEME."as_footer.php" ?>
   