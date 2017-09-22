<?php include JS_THEME."js_header.php";
	$myaccount = isset( $_SESSION['gates_account'] ) ? $_SESSION['gates_account'] : "";
	$database = new Js_Dbconn();			

	$ticketid = $results['item'];
	$js_db_query = "SELECT * FROM js_ticket WHERE ticketid = '$ticketid'";
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $ticketid, $ticket_customer,$ticket_mobile, $ticket_date, $ticket_type, $ticket_stand, $ticket_booking, $ticket_amount, $ticket_payment) = $database->get_row( $js_db_query );
}
		
	?>
  <div class="inner">
    <div class="main">
      <section id="content">        
        <div class="padding-2">
          <div class="indent-top">
            <div class="wrapper">
              <article class="col-3">
                <h4><strong>Edit</strong><em>A Ticket Now!!!</em></h4><hr>
				<form role="form" method="post" name="EditItem" action="index.php?action=ticket_edit&&js_ticketid=<?php echo $ticketid ?>" enctype="multipart/form-data" >
                <table class="tab_ticket">				
				<tr>
					<td>Customer Name:
					<input type="text" autocomplete="off" name="customer" value="<?php echo $ticket_customer ?>" required >
					</td>
					<td>Mobile Number:
						<input type="text" autocomplete="off" name="mobile" value="<?php echo $ticket_mobile ?>" required />
					</td>
				</tr>
				 <tr>
					<td>Ticket Date:
					<input type="text" autocomplete="off" name="date" placeholder="DD-MM-YYYY" value="<?php echo $ticket_date ?>" required >
					</td>
					<td>Ticket Type:
						<select name="type" style="padding-left:20px;" required >
						<option value="<?php echo $ticket_type ?>" > - Ticket Type - </option>
						<option value="VIP" > VIP Class </option>
						<option value="Normal" > Normal </option>
					   </select>
					</td>
				</tr>
				<tr> 
					<td>Stand Type:
						<select name="stand" style="padding-left:20px;" required >
						<option value="<?php echo $ticket_stand ?>" > - Stand Type - </option>
						<option value="VIP" > VIP Class </option>
						<option value="Normal" > Normal </option>
					   </select>
					</td> 
					<td>Booking Type:
						<select name="booking" style="padding-left:20px;" required >
						<option value="<?php echo $ticket_type ?>" > - Booking Type - </option>
						<option value="Advance" > Advance Booking </option>
						<option value="Normal" > Normal Booking </option>
					   </select>
					</td>
				</tr>
                <tr>
					<td>Amount Paid:
					<input type="text" autocomplete="off" name="amount" value="<?php echo $ticket_amount ?>" required >
					</td>
					<td>Mode of Payment:
						<select name="payment" style="padding-left:20px;" required >
						<option  value="<?php echo $ticket_payment ?>" > - Mode of payment - </option>
						<option value="Cash payment"> Cash payment </option>
						<option value="Mpesa/AirtelMoney"> Mpesa/AirtelMoney </option>
						<option value="Cheque"> Cheque </option>
						<option value="Visa Card"> Visa Card </option>
					   </select>
					</td>
				</tr>
								
				</table><br>
				<center>
				<input type="submit" class="submit_this" name="EditTicket" value="Save Changes">
				</center>
                <br></form>
              </article>
			  <?php include JS_THEME."js_sidebar.php" ?>
              
            </div>
          </div>
        </div>
	
      </section>
      <div class="block"></div>
    </div>
  </div>
</div>


<?php include JS_THEME."js_footer.php" ?>