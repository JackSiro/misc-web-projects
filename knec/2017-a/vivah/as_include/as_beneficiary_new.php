<?php include AS_THEME."as_header.php"; ?>
	<div id="content">
          <div class="scroll">
            <div class="scrollContainer">			
              <div class="panel">
				<h3>Add a  Beneficiary</h3>
                <div id="gallery_container">
                  <div id="contact_form">
					<form role="form" method="post" action="index.php?action=beneficiary_new" >
						<input type="hidden" name="loginid" value="<?php echo $_SESSION['sitefacilitator_facilitator'] ?>"/>
						
						<label for="text">Beneficiary Name:</label><input type="text" class="input_field"  autocomplete="off" name="beneficiary_name" required>
							<div class="cleaner_h10"></div>
						<label for="text">Beneficiary Code:</label><input type="text" class="input_field"  autocomplete="off" name="beneficiary_code" required>
						<div class="cleaner_h10"></div>
						
						<label for="text">Institution:</label><input type="text" class="input_field"  autocomplete="off" name="beneficiary_institution" required>
						<div class="cleaner_h10"></div>
						
						<label for="text">Email Address:</label><input type="email" class="input_field"  autocomplete="off" name="beneficiary_email">
							<div class="cleaner_h10"></div>
							
						<label for="text">Date of Birth:</label><input type="text" class="input_field"  autocomplete="off" name="beneficiary_dateofbirth">
							<div class="cleaner_h10"></div>
							
						<label for="text">Physical Address:</label><input type="text" class="input_field"  autocomplete="off" name="beneficiary_address">
							<div class="cleaner_h10"></div>
							
						<label for="text">Parent/Guardian:</label><input type="text" class="input_field"  autocomplete="off" name="beneficiary_guardian">
							<div class="cleaner_h10"></div>
							
						<label for="text">Country Region:</label><input type="text" class="input_field"  autocomplete="off" name="beneficiary_region">
							<div class="cleaner_h10"></div>
							
						<input type="submit" id="submit" name="AddItem" value="Save and Add" class="submit_btn float_l" />&nbsp;
						<input type="submit" id="submit" name="AddClose" value="Save and Close" class="submit_btn float_l" />
					  
                    </form>
                  </div>
                </div>
                
              </div>			  
            </div>
          </div>
		</div>
<?php include AS_THEME."as_footer.php" ?>
    
