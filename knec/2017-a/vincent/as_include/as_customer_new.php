<?php include AS_THEME."as_header.php";
	$as_db_query = "SELECT * FROM as_salesitem ORDER BY salesitem_content ASC";
	$database = new As_Dbconn();			
	$results = $database->get_results( $as_db_query );
?>								
	<div id="tooplate_main">    	        
        <div class="content_box">
            <h2>Register a Customer</h2>
            <div class="col_w340 float_l">
			<?php if (!$results) { ?>
				<a href="index.php?action=salesitem_new"><h3>Add an Item to Continue</h3></a>
			<?php } else { ?>
                <div id="contact_form">
					<form role="form" method="post" name="PostCustomer" action="index.php?action=customer_new" >
					<label for="text">Full Name</label> <input type="text" class="required input_field" name="name"/>
					<div class="cleaner h10"></div>  
					<label for="text">Mobile Phone:</label> <input type="text" class="required input_field" name="mobile"/>
					<div class="cleaner h10"></div>   
					<label for="text">Physical Address:</label> <input type="text" class="required input_field" name="address"/>
					<div class="cleaner h10"></div>  
					<label for="text">Choose an Item</label> 
						<select class="required input_field" name="class" style="padding-left:20px;">
							<option value=""> - Choose a Item - </option>
							<?php foreach( $results as $row ) { ?>
							<option value="<?php echo $row['salesitemid'] ?>">  <?php echo $row['salesitem_title'] ?></option>
							<?php } ?>
						</select>
						<div class="cleaner h10"></div>              	
					<p style="padding-top: 15px"><span><input type="submit" class="submit_btn float_l" id="submitBtn" name="AddCustomer" value="Save & Add"></label> <input type="submit" class="submit_btn float_l" id="submitBtn" name="AddClose" value="Save & Close">
				  </p>		
				</form>
              </div> 
			<?php } ?>
            </div>
            <div class="cleaner h30"></div>
            <a class="gototop" href="#top"></a>
            <div class="cleaner"></div>
            <div class="cleaner"></div>
        </div>
	</div>
<?php include AS_THEME."as_footer.php" ?>
