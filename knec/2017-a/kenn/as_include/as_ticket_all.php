<?php include AS_THEME."as_header.php";
	$database = new As_Dbconn();			
	$as_db_query = "SELECT * FROM as_ticket ORDER BY ticketid DESC LIMIT 20";
	$results = $database->get_results( $as_db_query );
?>

        <div class="page-top" id="templatemo_about">
        </div> <!-- /.page-header -->

        <div class="middle-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="widget-item">
                            <h3 class="widget-title"><?php echo $database->as_num_rows( $as_db_query ) ?> Tickets</h3>
							<?php foreach( $results as $row ) { ?>
                            <div class="post-small">
                                <div class="post-date">
                                    <span class="time">Price</span>
                                    <span><?php echo $row['ticket_type'] ?></span>
                                </div> 
                                <div class="post-content">
                                    <h4><a href="#"><?php echo $row['ticket_information'] ?></a></h4>
                                    <span> As from <?php echo $row['ticket_startdate'] ?> to <?php echo $row['ticket_stopdate'] ?></span>
                                    <p><?php echo $row['ticket_amount'] ?> paid by <?php echo $row['ticket_tourist'] ?> on <?php echo $row['ticket_date'] ?></p>
                                </div>
                            </div> 
							<?php } ?>
                        </div>
                    </div> 
                   
                    <div class="col-md-4">
                        <div class="widget-item">
                            <h3 class="widget-title">Our Services</h3>

                            <div class="service-item">
                                <div class="service-icon">
                                    <i class="fa fa-cogs"></i>
                                </div>
                                <div class="service-content">
                                    <h4>Hotel Booking</h4>
                                    <p>You can book a ticket with us anytime and we will be at your service.</p>
                                </div>
                            </div>
                            
                            <div class="service-item">
                                <div class="service-icon">
                                    <i class="fa fa-cogs"></i>
                                </div>
                                <div class="service-content">
                                    <h4>Safari Booking</h4>
                                    <p>You can book a ticket with us anytime and we will be at your service.</p>
                                </div>
                            </div>
                        </div> <!-- /.widget-item -->
                    </div> <!-- /.col-md-4 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div>
<?php include AS_THEME."as_footer.php" ?>
    
