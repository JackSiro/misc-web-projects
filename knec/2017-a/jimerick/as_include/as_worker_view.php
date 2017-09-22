<?php 

	$patientid = $results['patient'];
	$as_db_query = "SELECT * FROM as_patient WHERE patientid = '$patientid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $patientid, $patient_name, $patient_sex, $patient_location, $patient_unit ) = $database->get_row( $as_db_query );
}
		
?>
  <?php include AS_THEME."as_header.php" ?>
	<div class="container">		
		<div class="row box-5">
			<div>
				<h2 class="sitename"><?php echo as_get_option('sitename') ?></h2>
				<div class="page_wrap">
				<h1>patient: <?php echo $patient_name ?></h1>
				<h3>Quantity: <?php echo $patient_sex ?> | Price: <?php echo $patient_location ?></h3><br><br>
				<div>
				<center><h3><a href="index.php?action=patient_delete&&as_patientid=<?php echo $patientid ?>" onclick="return confirm('Are you sure you want to delete this patient from the system? \nBe careful, this action can not be reversed.')">Delete this patient</a></h3></center><hr>
				 <h2>Edit patient</h2>
				 <form method="post" 
				 action="index.php?action=patient_edit&&as_patientid=<?php echo $patientid ?>" >
				<fieldset>
				 <table class="form_table">
				<tr>
					<td>patient Title:</td>
					<td><input type="text" autocomplete="off" name="title" value="<?php echo $patient_name ?>" required ></td>
				</tr>
                <tr>
					<td>Quantity of patient:</td>
					<td><input type="text" autocomplete="off" name="quantity" value="<?php echo $patient_sex ?>" required ></td>
				</tr>
						
                <tr>
					<td>Price Per Unit:</td>
					<td><input type="text" autocomplete="off" name="price" value="<?php echo $patient_location ?>" required ></td>
				</tr>
				</table>
				</fieldset> <br>
						<center><input type="submit" class="submitbtn" name="SaveChanges" value="Save Changes">
			  </center><br></form>
				</div>    
              </div>
			</div>
        </div>
    </div>
<?php include AS_THEME."as_footer.php" ?>
   
