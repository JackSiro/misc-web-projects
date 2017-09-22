<?php
	$placeid = $results['place'];
	$as_db_query = "SELECT * FROM as_place WHERE placeid = '$placeid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $placeid, $place_title, $place_price, $place_details) = $database->get_row( $as_db_query );
	}		
	include AS_THEME."as_header.php"; ?>
<div class="page-top" id="templatemo_contact">
</div> <!-- /.page-header -->
		<div class="contact-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 map-wrapper"></div>
                    <div class="col-md-6 col-sm-6">
						<h3 class="widget-title"><?php echo $place_title ?></h3> 
						<p>Price: $<?php echo $place_price ?><p>
						<p>Details: $<?php echo $place_details ?><p>
                        <h4>Book this place</h4> 
						<div class="contact-form">
							<form action="index.php?page=book_place&&as_placeid=<?php echo $placeid ?>" method="post">
							<table style="width:100%;font-size:20px;">
							<tr>
								<td>Full Name:</td>
								<td><input type="text" name="ticket_tourist"></td>
							</tr>
							<tr>
								<td>Mobile:</td>
								<td><input type="text" name="ticket_mobile"></td>
							</tr>
							<tr>
								<td>Starting Date:</td>
								<td><input type="text" name="ticket_startdate"></td>
							</tr>
							<tr>
								<td>Ending Date:</td>
								<td><input type="text" name="ticket_enddate"></td>
							</tr>
							<tr>
								<td>Amount:</td>
								<td><input type="text" name="ticket_amount"></td>
							</tr>
							<tr>
								<td>Type of Payment:</td>
								<td><select name="ticket_payment">
										<option value="Cash">Cash</option>
										<option value="Credit Card">Credit Card</option>
										<option value="Master Card">Master Card</option>
										<option value="Mobile Money">Mobile Money</option>
									</select>
								</td>
							</tr>
							
							</table><br>
									<input type="submit"class="mainBtn" id="submit" name="SubmitTicket" value="Book Me Now">
						  </form>
			
                        </div> <!-- /.contact-form -->
                    </div>
					<div class="col-md-3 col-sm-6 map-wrapper"></div>
                </div>
            </div>
        </div>
<?php include AS_THEME."as_footer.php" ?>
    
