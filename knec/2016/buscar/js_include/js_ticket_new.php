<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	
	  <div id="content"> 
        <div class="content_item">
		<br>
		  <h1>Book a Ticket Now</h1> 
          <br><hr><br>
			<div class="main_content">
			<?php 
			
			$database = new Js_Dbconn();			
			$js_bus_query = "SELECT * FROM js_bus ORDER BY busid ASC";			
			$results = $database->get_results($js_bus_query  ); 
			
			$placefrom = $_GET['placefrom'];
			$placeto = $_GET['placeto'];
			
			?>			
			<div class="ticketer">
			<form role="form" method="post" name="PostItem" action="index.php?page=book_now" 
			enctype="multipart/form-data" >
                <table class="tab_ticket">
				<tr>
					<td>Choose a Bus:
						<select name="bus" style="padding-left:20px;" required >
						<option value="" > - Choose a Bus - </option>			
						<?php
						 foreach( $results as $row ) { ?>
						   <option value="<?php echo $row['bus_busno'] ?>">  <?php echo $row['bus_busno'].' - '.$row['bus_regno'] ?></option>
						<?php } ?>
						</select></td>
					<td>Travelling From:
					 <input type="text" autocomplete="off" name="pagefrom" required value="<?php echo $placefrom ?>" />
					</td>
					<td>Travelling To:
					 <input type="text" autocomplete="off" name="pageto" required value="<?php echo $placeto ?>" />
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
    
