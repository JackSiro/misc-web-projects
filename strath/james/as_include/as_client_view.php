<?php 
	$database = new As_Dbconn();
	$clientid = $results['client'];
	$as_db_query = "SELECT * FROM as_client
			LEFT JOIN as_plan ON as_client.client_plan = as_plan.planid
			WHERE clientid = $clientid";

	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $clientid, $client_name, $client_mobile, $client_email, $client_location, $client_cyear, $client_cvalue, $client_cmodel, $client_cirate, $client_plan, $client_registeredby, $client_registered, $client_updated, $client_updatedby, $planid, $plan_title, $plan_price, $plan_instal, $plan_irate, $plan_benefit, $plan_image) = $database->get_row( $as_db_query );
}
include AS_THEME."as_header.php"; ?>
<div id="tooplate_content">

	<div class="col_w450">
    	<div class="content_box">
			<h2>Client Details</h2>
			<div class="image_wrapper image_fl"><img src="as_media/user_default.jpg" alt="Image 04" width="120"/></div>
			<div class="btn_more"><a href="#">Client:</a> <?php echo $client_name ?></div>
			<div class="btn_more"><a href="#">Mobile:</a> <?php echo $client_mobile ?></div>
			<div class="btn_more"><a href="#">Email:</a> <?php echo $client_email ?></div>
			<div class="btn_more"><a href="#">Location:</a> <?php echo $client_location ?></div><br><br><br>
			<!--<p><em><strong>Mobile: </strong> </em></p> -->
		</div>
		<div class="content_box content_box_last">
        	<h2>Car Details</h2>
			<div class="image_wrapper image_fl"><img src="as_media/car_default.jpg" alt="Image 04" width="120"/></div>
			<div class="btn_more"><a href="#">Car Model:</a> <?php echo $client_cmodel ?></div>
			<div class="btn_more"><a href="#">Car Year:</a> <?php echo $client_cyear ?></div>
			<div class="btn_more"><a href="#">Car Value:</a> Kshs.<?php echo $client_cvalue ?></div>
			<div class="btn_more"><a href="#">Intrest Rate:</a> <?php echo $client_cirate ?> %</div>
		</div>
    </div>
        
    <div class="col_w450 last_col">
            <h2>Purchased Plan</h2>
			  <?php if (empty($row['client_plan'])) { ?>
			  <p> This has client has no plan yet!</p>
			  <div class="btn_more"><a href="index.php?action=plan_select&&as_clientid=<?php echo $clientid ?>">Select for this client</a></div>
			  <?php } else { ?>
            <ul class="tooplate_list">
				<div class="image_wrapper image_fl"><img src="as_media/<?php echo $plan_image ?>" alt="Image 04" width="200"/></div>
                <li>Title: <?php echo $plan_title ?></li>
                <li>Price: Kshs. <?php echo $plan_price ?></li>
                <li>Installments: <?php echo $plan_instal ?></li>
                <li>Intrest Rate: <?php echo $plan_irate ?>%</li>
                <li>Benefits: <?php echo $plan_benefit ?></li>
            </ul>
			<?php } ?>
            <div class="btn_more"><a href="index.php?action=client_edit&&as_clientid=<?php echo $clientid ?>">Edit Client Details</a></div>
            <div class="btn_more"><a href="index.php?action=client_delete&&as_clientid=<?php echo $clientid ?>" onclick="return confirm('Are you sure you want to delete this client from the system? \nBe careful, this action can not be reversed.')">Delete this Client</a></div>
       
    </div>
    <div class="cleaner"></div>
</div>

<?php include AS_THEME."as_footer.php" ?>
    
