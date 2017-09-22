<?php include JS_THEME."js_header.php";
	$myaccount = isset( $_SESSION['gates_account'] ) ? $_SESSION['gates_account'] : "";
	$database = new Js_Dbconn();			
	
		$js_db_query = "SELECT * FROM js_ticket ORDER BY ticketid DESC LIMIT 20";
		$results = $database->get_results( $js_db_query );
	?>
  <div class="inner">
    <div class="main">
      <section id="content">        
        <div class="padding-2">
          <div class="indent-top">
            <div class="wrapper">
              <article class="col-3">
                <h4><strong><?php echo $database->js_num_rows( $js_db_query ) ?> Tickets</strong>
		  <em><a style="float:right;width:300px;text-align:center;" href="index.php?page=booking">New Ticket</a></em></h4><hr>
				<table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th>customer</th>
				  <th>mobile</th>
				  <th>date</th>
				  <th>type</th>
				  <th>stand</th>
				  <th>booking</th>
				  <th>amount</th>
				  <th>payment</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?page=ticket_view&amp;js_ticketid=<?php echo $row['ticketid'] ?>'">
					<td><?php echo $row['ticket_customer'] ?></td>
					<td><?php echo $row['ticket_mobile'] ?></td>
					<td><?php echo $row['ticket_date'] ?></td>
					<td><?php echo $row['ticket_type'] ?></td>
					<td><?php echo $row['ticket_stand'] ?></td>
					<td><?php echo $row['ticket_booking'] ?></td>
					<td><?php echo $row['ticket_amount'] ?></td>
					<td><?php echo $row['ticket_payment'] ?></td>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table>
              </article>
			 
            </div>
          </div>
        </div>
	
      </section>
      <div class="block"></div>
    </div>
  </div>
</div>


<?php include JS_THEME."js_footer.php" ?>