<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	
	  <div id="content"> 
        <div class="content_item">
		<br>
		<?php 
			$database = new Js_Dbconn();			
			$js_vehicle_query = "SELECT * FROM js_vehicle ORDER BY vehicleid ASC";			
			$results = $database->get_results($js_vehicle_query  ); 
			$date = $_GET['date'];
			$type = $_GET['type'];
			$townfrom = $_GET['townfrom'];
			$townto = $_GET['townto'];
			
			?>	
		  <h1>Book a <u><?php echo $type ?></u> Ticket Now</h1> 
          <br><hr><br>
			<div class="main_content">
					
			<div class="ticketer">
			<form role="form" method="post" name="PostItem" action="index.php?page=book_now" 
			enctype="multipart/form-data" >
			<input type="hidden"  name="ticket" value="<?php echo $type ?>" />
			<input type="hidden"  name="datetravel" value="<?php echo $date ?>" />
                <table class="tab_ticket">
				<tr>
					<td>Choose a Vehicle:
						<select name="vehicle" style="padding-left:20px;" required >
						<option value="" > - Choose a Vehicle - </option>			
						<?php
						 foreach( $results as $row ) { ?>
						   <option value="<?php echo $row['vehicle_vehicleno'] ?>">  <?php echo $row['vehicle_vehicleno'].' - '.$row['vehicle_regno'] ?></option>
						<?php } ?>
						</select></td>
					<td>Travelling From:
					 <input type="text" autocomplete="off" name="pagefrom" required value="<?php echo $townfrom ?>" />
					</td>
					<td>Travelling To:
					 <input type="text" autocomplete="off" name="pageto" required value="<?php echo $townto ?>" />
					</td>
				</tr> 
				<tr> 
					<td>Depature Time:
					  <select name="depature" style="padding-left:20px;" required >
						<option value="" > - Depature Time - </option>
						<option value="8:00 AM"> 8:00 AM </option>
						<option value="10:00 AM"> 10:00 AM </option>
						<option value="8:00 PM"> 8:00 PM </option>
						<option value="10:00 PM"> 10:00 PM </option>
					   </select>
					</td>
					<td>Number of passengers:
					 <input type="pass" autocomplete="off" name="pass" value="1" required >
					</td>
					<td>Seat Number:
					 <input type="seat" autocomplete="off" name="seat" required >
					</td>
				</tr>
				</table>
				
				<table class="tab_ticket">
				
				<tr>
					<td>Customer Name:
					<input type="text" autocomplete="off" name="customer" required >
					</td>
					<td>Mobile Number:
						<input type="text" autocomplete="off" name="mobile" required />
					</td>
				</tr>
                <tr> 
					<td>Amount Paid:
					<input type="text" autocomplete="off" name="amount" required >
					</td>
					<td>Mode of Payment:
						<select name="payment" style="padding-left:20px;" required >
						<option value="" > - Mode of payment - </option>
						<option value="Cash payment"> Cash payment </option>
						<option value="Mpesa/AirtelMoney"> Mpesa/AirtelMoney </option>
						<option value="Cheque"> Cheque </option>
						<option value="Visa Card"> Visa Card </option>
					   </select>
					</td>
				</tr>
				
				</table><br>
				<center>
				<table style="width:50%">
				<tr>
					<td><input type="submit" class="submit_this" name="Finish" value="Finish"></td>
					<td><input type="submit" class="submit_this" name="Cancel" value="Cancel"></td>
					
				</tr>
				</table>
				</center>
                        <br></form>
			  </div>
						
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
