<?php include AS_THEME."as_header.php";
	$database = new As_Dbconn();			
	$as_db_query = "SELECT * FROM as_place ORDER BY placeid DESC LIMIT 8";
	$results = $database->get_results( $as_db_query ); ?>

        <div class="flexslider">
            <ul class="slides">
                <li>
                    <div class="overlay"></div>
                    <img src="as_media/templatemo_slide_1.jpg" alt="Special 1">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5 col-lg-4">
                                <div class="flex-caption visible-lg">
                                    <span class="price">$<?php echo as_get_option('slide1_price') ?></span>
                                    <h3 class="title"><?php echo as_get_option('slide1_title') ?></h3>
                                    <p><?php echo as_get_option('slide1_price') ?></p>
                                    <a href="<?php echo as_get_option('slide1_url') ?>" class="slider-btn">Pre-booking</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="overlay"></div>
                    <img src="as_media/templatemo_slide_2.jpg" alt="Special 2">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5 col-lg-4">
                                <div class="flex-caption visible-lg">
                                    <span class="price">$<?php echo as_get_option('slide2_price') ?></span>
                                    <h3 class="title"><?php echo as_get_option('slide2_title') ?></h3>
                                    <p><?php echo as_get_option('slide2_price') ?></p>
                                    <a href="<?php echo as_get_option('slide2_url') ?>" class="slider-btn">Reserve Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="overlay"></div>
                    <img src="as_media/templatemo_slide_3.jpg" alt="Special 3">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5 col-lg-4">
                                <div class="flex-caption visible-lg">
                                    <span class="price">$<?php echo as_get_option('slide3_price') ?></span>
                                    <h3 class="title"><?php echo as_get_option('slide3_title') ?></h3>
                                    <p><?php echo as_get_option('slide3_price') ?></p>
                                    <a href="<?php echo as_get_option('slide3_url') ?>" class="slider-btn">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div> <!-- /.flexslider -->

        
        
        <div class="container">
            <div class="row">
                <div class="our-listing owl-carousel">
	<?php foreach( $results as $row ) { ?>
                    <div class="list-item">
                        <div class="list-thumb">
                            <div class="title">
                                <h4 style="text-transform:uppercase;"><?php echo $row['place_title'] ?></h4>
                            </div>
                            <img src="as_media/destination_4.jpg" alt="destination 4">
                        </div> <!-- /.list-thumb -->
                        <div class="list-content">
                            <h5><?php echo $row['place_title'] ?></h5>
                            <span><?php echo $row['place_details'] ?></span>
                            <a href="index.php?page=book_place&&as_hotelid=<?php echo $row['placeid'] ?>" class="price-btn">$<?php echo $row['place_price'] ?> Book Now</a>
                        </div>
                    </div>
	 <?php } ?>            
                </div> <!-- /.our-listing -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->

		<div class="middle-content"></div>

        <div class="partner-list">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-4 col-xs-6">
                        <div class="partner-item">
                            <img src="as_media/partners/partner1.png" alt="">
                        </div> <!-- /.partner-item -->
                    </div> <!-- /.col-md-2 -->
                    <div class="col-md-2 col-sm-4 col-xs-6">
                        <div class="partner-item">
                            <img src="as_media/partners/partner2.png" alt="">
                        </div> <!-- /.partner-item -->
                    </div> <!-- /.col-md-2 -->
                    <div class="col-md-2 col-sm-4 col-xs-6">
                        <div class="partner-item">
                            <img src="as_media/partners/partner3.png" alt="">
                        </div> <!-- /.partner-item -->
                    </div> <!-- /.col-md-2 -->
                    <div class="col-md-2 col-sm-4 col-xs-6">
                        <div class="partner-item">
                            <img src="as_media/partners/partner1.png" alt="">
                        </div> <!-- /.partner-item -->
                    </div> <!-- /.col-md-2 -->
                    <div class="col-md-2 col-sm-4 col-xs-6">
                        <div class="partner-item">
                            <img src="as_media/partners/partner2.png" alt="">
                        </div> <!-- /.partner-item -->
                    </div> <!-- /.col-md-2 -->
                    <div class="col-md-2 col-sm-4 col-xs-6">
                        <div class="partner-item last">
                            <img src="as_media/partners/partner3.png" alt="">
                        </div> <!-- /.partner-item -->
                    </div> <!-- /.col-md-2 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.partner-list -->

<?php include AS_THEME."as_footer.php" ?>
    
