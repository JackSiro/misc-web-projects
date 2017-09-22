<br><span class="info_tt"><?php 

	$ticketid = $results['ticket'];
	$as_db_query = "SELECT * FROM as_ticket WHERE ticketid = '$ticketid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $ticketid, $ticket_type, $ticket_date, $ticket_type, $ticket_startdate, $ticket_stopdate, $ticket_information, $ticket_pass, $ticket_seat, $ticket_tourist, $ticket_mobile, $ticket_amount, $ticket_payment, $ticket_postedby, $ticket_posted, $ticket_updated, $ticket_updatedby) = $database->get_row( $as_db_query );
}
		
?>

<br><span class="info_tt"><?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	

	  <div id="content"> 
        
	  
        <div class="content_item">
		<br>
		  
			<div class="main_content">
			<h1>Ticket View</h1>
			<div class="my_ticket">
				
				<table class="tab_ticket tab_tt">
				
				<tr>
					<td>Customer Name:
					<br><span class="info_tt"><?php echo $ticket_tourist ?>
					</span></td>
					<td>Mobile Number:
						<br><span class="info_tt"><?php echo $ticket_mobile ?>
					</span></td>
				</tr>
                <tr>
					<td>Amount Paid:
					<br><span class="info_tt"><?php echo $ticket_amount ?>
					</span></td>
					<td>Mode of Payment:
						<br><span class="info_tt"><?php echo $ticket_payment ?>
					</span></td>
				</tr>
				
				</table>
				
				<table class="tab_ticket tab_tt">
				<tr>
					<td>Hotel Number.:
						<br><span class="info_tt"><?php echo $ticket_type ?></span></td>
					<td>Travelling From:
					 <br><span class="info_tt"><?php echo $ticket_startdate ?>
					</span></td>
					<td>Travelling To:
					 <br><span class="info_tt"><?php echo $ticket_stopdate ?>
					</span></td>
				</tr>
				<tr> 
					<td>Depature Time:
					  <br><span class="info_tt"><?php echo $ticket_information ?>
					</span></td>
					<td>Depature Date:
					 <br><span class="info_tt"><?php echo $ticket_date ?>
					</span></td>
					<td>Seat Number:
					 <br><span class="info_tt"><?php echo $ticket_seat ?>
					</span></td>
				</tr>
				</table>
				
				</div>
				<br><br>
				<center><h2><a href="index.php?page=ticket_edit&&as_ticketid=<?php echo $ticketid ?>">Edit this Ticket</a>
				 | <a href="index.php?page=ticket_delete&&as_ticketid=<?php echo $ticketid ?>" onclick="return confirm('Are you sure you want to delete this item from the system? \nBe careful, this page can not be reversed.')">Delete this Item</a></h2></center>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<br><span class="info_tt"><?php include AS_THEME."as_footer.php" ?>
    
