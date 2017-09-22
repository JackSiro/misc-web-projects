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
                <h4><strong>Ticket</strong> <em>View</em></h4><hr>
				<table class="ticket_tb">
				  <tr>
				    <td>Customer:<hr><?php echo $ticket_customer ?></td>
				    <td>Mobile:<hr><?php echo $ticket_mobile ?></td>
				  </tr>
				  <tr>
				    <td>Event Date:<hr><?php echo $ticket_date ?></td>
				    <td>Ticket Type:<hr><?php echo $ticket_type ?></td>
				  </tr>
				  <tr>
				    <td>Stand Type:<hr><?php echo $ticket_stand ?></td>
				    <td>Type of Booking:<hr><?php echo $ticket_booking ?></td>
				  </tr>
				  <tr>
				    <td>Amount:<hr><?php echo $ticket_amount ?></td>
				    <td>Payment Mode:<hr><?php echo $ticket_payment ?></td>
				  </tr>
				</table>
				<br><hr>
				<center><h2><a href="index.php?page=ticket_edit&&js_ticketid=<?php echo $ticketid ?>">Edit this Item</a>
				 | <a href="index.php?page=ticket_delete&&js_ticketid=<?php echo $ticketid ?>" onclick="return confirm('Are you sure you want to delete this item from the system? \nBe careful, this page can not be reversed.')">Delete this Item</a></h2></center>
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