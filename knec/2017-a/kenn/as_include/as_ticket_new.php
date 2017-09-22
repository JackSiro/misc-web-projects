<?php include AS_THEME."as_header.php";
	$database = new As_Dbconn();			
	$as_hotel_query = "SELECT * FROM as_hotel ORDER BY hotelid ASC";			
	$results = $database->get_results($as_hotel_query  ); 
	$date = $_GET['date'];
	$type = $_GET['type'];
	$placefrom = $_GET['placefrom'];
	$placeto = $_GET['placeto'];
	
	?>
<div class="page-top" id="templatemo_contact">
</div> <!-- /.page-header -->
		<div class="contact-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 map-wrapper"></div>
                    <div class="col-md-6 col-sm-6">
						<h3 class="widget-title">Book a Ticket Now</h3> 
                        <div class="contact-form">
						<form role="form" method="post" name="PostItem" action="index.php?page=book_now" 
						enctype="multipart/form-data" >
						<input type="hidden"  name="ticket" value="<?php echo $type ?>" />
						<input type="hidden"  name="datetravel" value="<?php echo $date ?>" />
							<table class="tab_ticket">
							<tr>
								<td>Choose a Hotel:
									<select name="hotel" style="padding-left:20px;" required >
									<option value="" > - Choose a Hotel - </option>			
									<?php
									 foreach( $results as $row ) { ?>
									   <option value="<?php echo $row['hotel_hotelno'] ?>">  <?php echo $row['hotel_hotelno'].' - '.$row['hotel_regno'] ?></option>
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
								<td><input type="submit"  class="mainBtn" id="submit" name="Finish" value="Finish"></td>
								<td><input type="submit"  class="mainBtn" id="submit" name="Cancel" value="Cancel"></td>
								
							</tr>
							</table>
							</center>
									<br></form>	
			 
                        </div> <!-- /.contact-form -->
                    </div>
					<div class="col-md-3 col-sm-6 map-wrapper"></div>
                </div>
            </div>
        </div>
<?php include AS_THEME."as_footer.php" ?>
    
