<?php include AS_THEME."as_header.php"; 
	$database = new As_Dbconn();			
	$as_db_query = "SELECT * FROM as_patient WHERE patient_type='out-patient' ORDER BY patientid DESC LIMIT 20";
	$results = $database->get_results( $as_db_query );
?>
<div id="content">
		<div>
			<h1><?php echo $database->as_num_rows( $as_db_query ) ?> out-patients | <a href="index.php?action=patient_new">New patient</a></h1><br>
				<!--<table class="tb_dashboard">-->
				<table class="tt_tb">
					<thead><tr class="tt_tr">
					  <th>Patient</th>
					  <th>Sex</th>
					  <th>Location</th>
					  <th>Sickness</th>
					</tr></thead>
					<tbody>
					<?php foreach( $results as $row ) { ?>
						<tr onclick="location='index.php?action=patient_view&amp;as_patientid=<?php echo $row['patientid'] ?>'">
						   <td><?php echo $row['patient_name'] ?></td>
						  <td><?php echo as_show_sex($row['patient_sex']) ?></td>
						  <td><?php echo $row['patient_location'] ?></td>
						  <td><?php echo $row['patient_sickness'] ?></td>
						</tr>				
					<?php } ?>			
                      </tbody>
                    </table>
              </div>
			</div>
        </div>
    </div>
<?php include AS_THEME."as_footer.php" ?>
   