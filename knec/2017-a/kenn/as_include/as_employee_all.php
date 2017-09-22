<?php include AS_THEME."as_header.php";
	$as_db_query = "SELECT * FROM as_employee ORDER BY employeeid DESC LIMIT 20";
	$database = new As_Dbconn();			
	$results = $database->get_results( $as_db_query );
?>

        <div class="page-top" id="templatemo_events">
        </div> <!-- /.page-header -->

        <div class="middle-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="widget-item">
                            <h3 class="widget-title"><?php echo $database->as_num_rows( $as_db_query ) ?> Employees</h3>
							<?php foreach( $results as $row ) { ?>
                            <div class="post-small">
                                <div class="post-date" style="width:150px;">
                                    <span class="time">Group</span>
                                    <span><?php echo $row['employee_group'] ?></span>
                                </div> 
                                <div class="post-content">
                                    <h4><a href="#"><?php echo $row['employee_fname'].' '.$row['employee_surname'] ?></a></h4>
                                    <span><?php echo $row['employee_mobile'] ?> <?php echo $row['employee_email'] ?></span>
                                    <p>Since: <?php echo date("j/m/y", strtotime($row['employee_joined'])); ?></p>
                                </div>
                            </div> 
							<?php } ?>
                        </div>
                    </div> 
                    
                    <div class="col-md-4">
                        <div class="widget-item">
                            <h3 class="widget-title">employee Priviledges</h3>

                            <div class="service-item">
                                <div class="service-icon">
                                    <i class="fa fa-cogs"></i>
                                </div>
                                <div class="service-content">
                                    <h4>Hotel Booking</h4>
                                    <p>You can book a customer a hotel.</p>
                                </div>
                            </div>
                            
                            <div class="service-item">
                                <div class="service-icon">
                                    <i class="fa fa-cogs"></i>
                                </div>
                                <div class="service-content">
                                    <h4>Safari Booking</h4>
                                    <p>You can book a customer a safari.</p>
                                </div>
                            </div>
                        </div> <!-- /.widget-item -->
                    </div> <!-- /.col-md-4 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div>
		<?php if ($myaccount){ ?>
        <div class="go-act">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="first-map"></div>
                    </div> <!-- /.col-md-4 -->
                    <div class="col-md-8">
                        <div class="act-btn">
                            <div class="inner">
                                <div class="price" style="font-size:50px;">
                                    +
                                </div> <!-- /.price -->
                                <div class="title">
                                    <h2>ADD AN EMPLOYEE</h2>
                                    <span>Click to add more Employees</span>
                                </div>
                            </div> <!-- /.inner -->
                            <a href="index.php?page=employee_new" class="link">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div> <!-- /.act-btn -->
                    </div> <!-- /.col-md-8 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.go-act -->
        <?php } ?>
<?php include AS_THEME."as_footer.php" ?>
    
