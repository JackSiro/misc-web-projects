<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content"> 
        
        <div class="content_item">
		<br>
		  <h1>Add an Appointment</h1> 
          <br><hr><br>
			<div class="main_content">
			<?php 
			
			$database = new Js_Dbconn();			
			
			$js_category_query = "SELECT * FROM js_category ORDER BY category_title ASC";			
			$results = $database->get_results($js_category_query  ); 
			
			$js_doctor_query = "SELECT * FROM js_doctor ORDER BY doctor_fullname ASC";
			$results_i = $database->get_results( $js_doctor_query ); 
							
			if ($database->js_num_rows( $js_category_query)<=0) { ?>
				<h2 style="color:#000">You need to fix the following errors before you add a Appointment</h2>
				<ul>
				<h3><li><a href="index.php?action=category_new">No Department found! Add a Department</a></li><h3>
				<?php if ($database->js_num_rows( $js_doctor_query)<=0) { ?>
				<h3><li><a href="index.php?action=doctor_new">No Doctor found! Add a Doctor</a></li><h3>
				<?php } ?>
				</ul>
			<?php } else if ($database->js_num_rows( $js_doctor_query)<=0) { ?>
				<h2 style="color:#000">You need to fix the following errors before you add a Appointment</h2>
				<ul>
				<h3><li><a href="index.php?action=doctor_new">No Doctors found! Add a Doctor</a></li><h3>
				</ul>
			<?php } else { ?>
			<form role="form" method="post" name="PostItem" action="index.php?action=appointment_new" 
			enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<tr>
					<td>Choose a Department:</td>
					<td>
					
				
						<select name="department" style="padding-left:20px;" required >
						<option value="" > - Choose a Department - </option>
			
						<?php
							foreach( $results as $row ) { ?>
								<option value="<?php echo $row['category_title'] ?>">  <?php echo $row['category_title'] ?></option>
						<?php } ?>
						</select>
					</td>
				</tr>	
				<tr>
					<td>Choose a Doctor:</td>
					<td>
									
						<select name="doctor" style="padding-left:20px;" required >
						<option value="" > - Choose a Doctor - </option>
			
						<?php
							foreach( $results_i as $row ) { ?>
								<option value="<?php echo $row['doctor_fullname'] ?>">  <?php echo $row['doctor_fullname'] ?></option>
						<?php } ?>
						</select>
					</td>
				</tr>
										
                <tr>
					<td>Patient's Full Name:</td>
					<td><input type="text" autocomplete="off" name="patient" required ></td>
				</tr>					
                <tr>
					<td>Patient's Gender:</td>
					<td>
					<table><tr><td>
					<input type="radio" name="gender" required value="M">
					</td><td>Male</td><td>
					<input type="radio" name="gender" required value="F">
					</td><td>Female</td>
					</tr></table>
				</tr>					
                <tr>
					<td>Choose a Clinic:</td>
					<td>
						<select name="clinic" required>
						<option value="" > - Which Clinic -</option>
						<option value="Njoro Clinic" > Njoro Clinic </option>
						<option value="Magadi Clinic" > Magadi Clinic </option>
						<option value="Umoja Clinic" > Umoja Clinic </option>
						<option value="Huruma Clinic" > Huruma Clinic </option>
					</td>
				</tr>					
                <tr>
					<td>Reservation:</td>
					<td>
						<select name="reserve" required>
						<option value="" > - Reservation -</option>
						<option value="Consultation" > Consultation </option>
						<option value="General Sickness" > General Sickness </option>
						<option value="Clinic" > Clinic </option>
						<option value="Medicine/Phamacy" > Medicine/Phamacy </option>
						<option value="Others" > Others </option>
					</td>
				</tr>					
                <tr>
					<td>Date/Time:</td>
					<td><input type="text" autocomplete="off" name="datetime" placeholder="DD-MM-YYYY" required ></td>
				</tr>					
                <tr>
					<td>Amount to Pay (KSHs):</td>
					<td><input type="text" autocomplete="off" name="amount" required ></td>
				</tr>					
                <tr>
					<td>Mode of Payment:</td>
					<td>
						<select name="payment" required>
						<option value="" > - How you pay -</option>
						<option value="cash" > Cash </option>
						<option value="Mpesa" > Mpesa </option>
						<option value="Airtel Money" > Airtel Money </option>
						<option value="Credit Card" > Credit Card </option>
						<option value="Bank Slips" > Bank Slips </option>
						<option value="Cheques" > Cheques </option>
					</td>
				</tr>
								
				</table><br>
                        <center><input type="submit" class="submit_this" name="AddAppointment" value="Save and Add Another">
						<input type="submit" class="submit_this" name="AddClose" value="Save and Close">
			  </center><br></form>
						<?php } ?>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
