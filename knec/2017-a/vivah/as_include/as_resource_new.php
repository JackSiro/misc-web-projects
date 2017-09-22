<?php include AS_THEME."as_header.php"; ?>
	<div id="content">
          <div class="scroll">
            <div class="scrollContainer">
			
              <div class="panel">
		  <h3>Allocate a Resource</h3>
          	<div id="contact_form">
			<?php 
			
			$database = new As_Dbconn();			
			
			$as_beneficiary_query = "SELECT * FROM as_beneficiary ORDER BY beneficiaryid ASC";			
			$results = $database->get_results($as_beneficiary_query  ); 
			
			if ($database->as_num_rows( $as_beneficiary_query)<=0) { ?>
				<h2 style="color:#000">You need to fix the following errors before you allocate</h2>
				<ul>
				<h3><li><a href="index.php?action=beneficiary_new">No Beneficiary found! Add a Beneficiary</a></li><h3>
				
				</ul>
			<?php } else { ?>
			<form role="form" method="post" name="Resources" action="index.php?action=resource_new" >
                <label for="text">Choose a Beneficiary:</label>
					<select name="beneficiary" class="input_field" style="padding-left:20px;" required >
						<option value="" > - Choose a Beneficiary - </option>			
						<?php
							foreach( $results as $row ) { ?>
								<option value="<?php echo $row['beneficiaryid'] ?>">  <?php echo $row['beneficiary_name'] ?></option>
						<?php } ?>
						</select>
                <div class="cleaner_h10"></div>		
				<label for="text">Resource Title:</label><input type="text" class="input_field" autocomplete="off" name="resource_title" required >
				<label for="text">Resource Description:</label><textarea class="input_field" name="resource_content" required ></textarea>
				<div class="cleaner_h10"></div>
					
                <input type="submit" id="submit" name="SaveItem" value="Save and Add" class="submit_btn float_l" />
                <input type="submit" id="submit" name="SaveClose" value="Save and Close" class="submit_btn float_l" />
			  </form>
						<?php } ?>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div>
              </div>			  
            </div>
          </div>
		</div>
<?php include AS_THEME."as_footer.php" ?>
    
