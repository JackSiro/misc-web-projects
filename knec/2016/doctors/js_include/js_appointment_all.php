<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	
		
<?php 
	$database = new Js_Dbconn();			
	
		$js_db_query = "SELECT * FROM js_appointment ORDER BY appointmentid DESC LIMIT 20";
		$results = $database->get_results( $js_db_query );
	?>
	  <div id="content"> 
        
        <div class="content_appointment">
		<br>
		  <h1><?php echo $database->js_num_rows( $js_db_query ) ?> Appointments
		  <a style="float:right;width:300px;text-align:center;" href="index.php?action=appointment_new">New Appointment</a> </h1> 
          <br><hr><br>
			<div class="main_content" align="center">
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th>Patient</th>
				  <th>Clinic</th>
				  <th>Reservation</th>
				  <th>Department</th>
				  <th>Doctor</th>
				  <th>When</th>
				  <th>Amount</th>
				  <th>Payment</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=appointment_view&amp;js_appointmentid=<?php echo $row['appointmentid'] ?>'">
					<td><?php echo $row['appointment_patient'].' ('.$row['appointment_pgender'].')' ?></td>
					<td><?php echo $row['appointment_clinic'] ?></td>
					<td><?php echo $row['appointment_reserve'] ?></td>
					<td><?php echo $row['appointment_dept'] ?></td>
					<td><?php echo $row['appointment_doctor'] ?></td>
					<td><?php echo $row['appointment_datetime'] ?></td>
					<td><?php echo $row['appointment_amount'] ?>/=</td>
					<td><?php echo $row['appointment_payment'] ?></td>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_appointment-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
