<?php include AS_THEME."as_header.php" ?>
<div id="tooplate_content">	
	<div class="col_w460">
       	<div id="contact_form">
        	<h4>Register a new Client</h4>
			<form action="index.php?action=client_new" method="post" >
				<label for="client_name">Client Name:</label> <input type="text" id="client_name" name="client_name" class="required input_field" />
				<div class="cleaner_h10"></div>
				<label for="client_mobile">Mobile Phone:</label> <input type="text" id="client_mobile" name="client_mobile" class="required input_field" />
				<div class="cleaner_h10"></div>
				<label for="client_email">Email Address:</label> <input type="email" id="client_email" name="client_email" class="required input_field" />
				<div class="cleaner_h10"></div>
				<label for="client_location">Location:</label> <input type="text" id="client_location" name="client_location" class="required input_field" />
				<div class="cleaner_h10"></div>
				<label for="client_cyear">Car Year:</label> <input type="text" id="client_cyear" name="client_cyear" class="required input_field" />
				<div class="cleaner_h10"></div>
				<label for="client_cvalue">Car Value:</label> <input type="text" id="client_cvalue" name="client_cvalue" class="required input_field" />
				<div class="cleaner_h10"></div>
				<label for="client_cmodel">Car Model:</label> <input type="text" id="client_cmodel" name="client_cmodel" class="required input_field" />
				<div class="cleaner_h10"></div>
				<label for="client_cirate">Interest Rate:</label> <input type="text" id="client_cirate" name="client_cirate" class="required input_field" />
				<div class="cleaner_h10"></div>
							
				<input type="submit" value="Proceed to Plans" id="submit" name="Proceed" class="submit_btn float_l" />
			</form>
        </div>
   	</div>
    <div class="cleaner"></div>
</div>     		
    <div class="cleaner"></div>
    <div class="cleaner"></div>

<?php include AS_THEME."as_footer.php" ?>
    
