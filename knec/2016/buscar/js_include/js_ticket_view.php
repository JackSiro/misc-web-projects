<br><span class="info_tt"><?php 

	$ticketid = $results['item'];
	$js_db_query = "SELECT * FROM js_ticket WHERE ticketid = '$ticketid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $ticketid, $ticket_bus, $ticket_pagefrom, $ticket_pageto, $ticket_depature, $ticket_date, $ticket_seat, $ticket_customer, $ticket_mobile, $ticket_amount, $ticket_payment, $ticket_postedby, $ticket_posted) = $database->get_row( $js_db_query );
}
		
?>

<br><span class="info_tt"><?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content"> 
        
	  
        <div class="content_item">
		<br>
		  
			<div class="main_content">
			<h1>Ticket View</h1>
				<table class="tab_ticket tab_tt">
				<tr>
					<td>Bus No.:
						<br><span class="info_tt"><?php echo $ticket_bus ?></span></td>
					<td>Travelling From:
					 <br><span class="info_tt"><?php echo $ticket_pagefrom ?>
					</span></td>
					<td>Travelling To:
					 <br><span class="info_tt"><?php echo $ticket_pageto ?>
					</span></td>
				</tr>
				<tr> 
					<td>Depature Time:
					  <br><span class="info_tt"><?php echo $ticket_depature ?>
					</span></td>
					<td>Depature Date:
					 <br><span class="info_tt"><?php echo $ticket_date ?>
					</span></td>
					<td>Seat Number:
					 <br><span class="info_tt"><?php echo $ticket_seat ?>
					</span></td>
				</tr>
				</table>
				
				<table class="tab_ticket tab_tt">
				
				<tr>
					<td>Customer Name:
					<br><span class="info_tt"><?php echo $ticket_customer ?>
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
				
				</table><br>
				<center><h2><a href="index.php?page=ticket_edit&&js_ticketid=<?php echo $ticketid ?>">Edit this Item</a>
				 | <a href="index.php?page=ticket_delete&&js_ticketid=<?php echo $ticketid ?>" onclick="return confirm('Are you sure you want to delete this item from the system? \nBe careful, this page can not be reversed.')">Delete this Item</a></h2></center>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<br><span class="info_tt"><?php include JS_THEME."js_footer.php" ?>
    
