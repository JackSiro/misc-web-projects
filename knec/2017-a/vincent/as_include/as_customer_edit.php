<?php 

	$customerid = $results['customer'];
	$as_db_query = "SELECT * FROM as_customer WHERE customerid = '$customerid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $customerid, $customer_name, $customer_sex, $customer_course, $customer_address, $customer_fee, $customer_registeredby, $customer_registered, $customer_sex, $customer_mobile, $customer_img, $customer_updated, $customer_updatedby) = $database->get_row( $as_db_query );
}
		
?>
<?php include AS_THEME."as_header.php"; ?>
	<div id="tooplate_main">    	        
        <div class="content_box">
            <h2>Edit a Customer</h2>
            <div class="col_w340 float_l">
                <div id="contact_form">
				<form role="form" method="post" name="SaveCustomer" action="index.php?action=customer_edit&&as_customerid=<?php echo $customerid ?>">
                <table style="width:100%;font-size:20px;">
				<label for="text">Choose a Class</label> 
					<td><select class="required input_field" name="class" style="padding-left:20px;">
						<option value="<?php echo $customerid ?>" > - Choose a Class - </option>
			<?php $as_db_query = "SELECT * FROM as_salesitem ORDER BY salesitem_content ASC";
				$database = new As_Dbconn();			
				$results = $database->get_results( $as_db_query );
				
				foreach( $results as $row ) { ?>
						<option value="<?php echo $row['salesitemid'] ?>">  <?php echo $row['salesitem_content'] ?></option>
				<?php } ?>
						</select>
					</p>
				<label for="text">Title of the Customer</label> 
				<input type="text" class="required input_field" autocomplete="off" name="title" value="<?php echo $customer_address ?>"/>
						<div class="cleaner h10"></div>  
				<label for="text">Code of the Customer</label> 
				<input type="text" class="required input_field" autocomplete="off" name="code" value="<?php echo $customer_name ?>"/>
						<div class="cleaner h10"></div>  
				<label for="text">Upload Customer Icon</label> 
					<td>
					<input type="hidden" name="customerimg" value="<?php echo $customer_img ?>">	
						<table style="width:100%"><tr><td>
						<img src="<?php echo 'as_media/'.$customer_img ?>" style="width:70px;height:70px;" >
						</td><td>
						<input name="filename" autocomplete="off" type="file" accept="image/*" >
						</td></tr></table>
					</p>
                
                <label for="text">Description (500 max)</label> 
					<td><textarea style="height:200px" name="content" autocomplete="off" ><?php echo $customer_fee ?></textarea></p>
				<label for="text">Publisher of the Customer</label> 
				<input type="text" class="required input_field" autocomplete="off" name="publisher" value="<?php echo $customer_sex ?>"/>
						<div class="cleaner h10"></div>  
				
				<label for="text">Subject/Topic of the Customer</label> 
				<input type="text" class="required input_field" autocomplete="off" name="subject" value="<?php echo $customer_mobile ?>"/>
						<div class="cleaner h10"></div>  
				
				<p style="padding-top: 15px"><span>&nbsp;</label> <input type="submit" class="submit_btn float_l" id="submitBtn" name="SaveCustomer" value="Save Changes">
						<input type="submit" class="submit_btn float_l" id="submitBtn" name="SaveClose" value="Save & Close">
			  </p>		
			</form>
                </div> 
            </div>
            <div class="cleaner h30"></div>
            <a class="gototop" href="#top"></a>
            <div class="cleaner"></div>
            <div class="cleaner"></div>
        </div>
	</div>
<?php include AS_THEME."as_footer.php" ?>