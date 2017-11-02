<?php 
	$database = new As_Dbconn();
	$clientid = $results['client'];
	$as_db_query = "SELECT * FROM as_client WHERE clientid = $clientid";

	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $clientid, $client_name, $client_mobile, $client_email, $client_location, $client_cyear, $client_cvalue, $client_cmodel, $client_cirate, $client_plan, $client_registeredby, $client_registered, $client_updated, $client_updatedby) = $database->get_row( $as_db_query );
	}
	include AS_THEME."as_header.php";
	?>
<div id="tooplate_content">	
	<div class="col_w460">
       	<div id="contact_form">
        	<h4>Edit a Client</h4>
			<form action="index.php?action=client_edit&&as_clientid=<?php echo $clientid ?>" method="post" >
				<label for="client_name">Client Name:</label> <input type="text" id="client_name" name="client_name" class="required input_field" value="<?php echo $client_name ?>"/>
				<div class="cleaner_h10"></div>
				<label for="client_mobile">Mobile Phone:</label> <input type="text" id="client_mobile" name="client_mobile" class="required input_field" value="<?php echo $client_mobile ?>"/>
				<div class="cleaner_h10"></div>
				<label for="client_email">Email Address:</label> <input type="email" id="client_email" name="client_email" class="required input_field" value="<?php echo $client_email ?>"/>
				<div class="cleaner_h10"></div>
				<label for="client_location">Location:</label> <input type="text" id="client_location" name="client_location" class="required input_field" value="<?php echo $client_location ?>"/>
				<div class="cleaner_h10"></div>
				<label for="client_cyear">Car Year:</label> <input type="text" id="client_cyear" name="client_cyear" class="required input_field" value="<?php echo $client_cyear ?>"/>
				<div class="cleaner_h10"></div>
				<label for="client_cvalue">Car Value:</label> <input type="text" id="client_cvalue" name="client_cvalue" class="required input_field" value="<?php echo $client_cvalue ?>"/>
				<div class="cleaner_h10"></div>
				<label for="client_cmodel">Car Model:</label> <input type="text" id="client_cmodel" name="client_cmodel" class="required input_field" value="<?php echo $client_cmodel ?>"/>
				<div class="cleaner_h10"></div>
				<label for="client_cirate">Interest Rate:</label> <input type="text" id="client_cirate" name="client_cirate" class="required input_field" value="<?php echo $client_cirate ?>"/>
				<div class="cleaner_h10"></div>
				<div class="cleaner_h10"></div>
				<input type="submit" value="Save Only" id="submit" name="SaveItem" class="submit_btn float_l" />
				<input type="submit" value="Save & Close" id="submit" name="SaveClose" class="submit_btn float_r" />
			</form>
        </div>
   	</div>
    <div class="cleaner"></div>
</div>     		
    <div class="cleaner"></div>
    <div class="cleaner"></div>

<?php include AS_THEME."as_footer.php" ?>
    
