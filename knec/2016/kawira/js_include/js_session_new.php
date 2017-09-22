<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content"> 
        
        <div class="content_item">
		<br>
		  <h1>Add an Session</h1> 
          <br><hr><br>
			<div class="main_content">
			<?php 
			
			$database = new Js_Dbconn();			
			
			$js_parkingslot_query = "SELECT * FROM js_parkingslot ORDER BY parkingslot_title ASC";			
			$results = $database->get_results($js_parkingslot_query  ); 
			
			$js_customer_query = "SELECT * FROM js_customer ORDER BY customer_fullname ASC";
			$results_i = $database->get_results( $js_customer_query ); 
							
			if ($database->js_num_rows( $js_parkingslot_query)<=0) { ?>
				<h2 style="color:#000">You need to fix the following errors before you add a Session</h2>
				<ul>
				<h3><li><a href="index.php?action=parkingslot_new">No Parking Slot found! Add a Parking Slot</a></li><h3>
				<?php if ($database->js_num_rows( $js_customer_query)<=0) { ?>
				<h3><li><a href="index.php?action=customer_new">No Customer found! Add a Customer</a></li><h3>
				<?php } ?>
				</ul>
			<?php } else if ($database->js_num_rows( $js_customer_query)<=0) { ?>
				<h2 style="color:#000">You need to fix the following errors before you add a Session</h2>
				<ul>
				<h3><li><a href="index.php?action=customer_new">No Customers found! Add a Customer</a></li><h3>
				</ul>
			<?php } else { ?>
			<form role="form" method="post" name="PostItem" action="index.php?action=session_new" 
			enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<tr>
					<td>Choose a Parking Slot:</td>
					<td>
					
				
						<select name="parkingslot" style="padding-left:20px;" required >
						<option value="" > - Choose a Parking Slot - </option>
			
						<?php
							foreach( $results as $row ) { ?>
								<option value="<?php echo $row['parkingslot_title'] ?>">  <?php echo $row['parkingslot_title'] ?></option>
						<?php } ?>
						</select>
					</td>
				</tr>	
				<tr>
					<td>Choose a Customer:</td>
					<td>
									
						<select name="customer" style="padding-left:20px;" required >
						<option value="" > - Choose a Customer - </option>
			
						<?php
							foreach( $results_i as $row ) { ?>
								<option value="<?php echo $row['customer_fullname'] ?>">  <?php echo $row['customer_fullname'] ?></option>
						<?php } ?>
						</select>
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
                        <center><input type="submit" class="submit_this" name="AddSession" value="Save and Add Another">
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
    
