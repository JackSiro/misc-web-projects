<?php include AS_THEME."as_header.php"; ?>
<div id="tooplate_main">
	<div class="col_w900 col_w900_last">
		  <h3>Register Beneficiarys for Groups</h3>
          	<div id="cp_contact_form">
			<?php 
			
			$database = new As_Dbconn();			
			
			$as_beneficiary_query = "SELECT * FROM as_beneficiary ORDER BY beneficiaryid ASC";			
			$results = $database->get_results($as_beneficiary_query  ); 
			
			if ($database->as_num_rows( $as_beneficiary_query)<=0) { ?>
				<h2 style="color:#000">You need to fix the following errors before you pay fees</h2>
				<ul>
				<h3><li><a href="index.php?action=beneficiary_new">No Beneficiary found! Add a Beneficiary</a></li><h3>
				
				</ul>
			<?php } else { ?>
			<form role="form" method="post" name="Fees" action="index.php?action=beneficiary_new" >
                <label for="text">Choose a Beneficiary:</label>
					<select name="beneficiary" style="padding-left:20px;" required >
						<option value="" > - Choose a Beneficiary - </option>			
						<?php
							foreach( $results as $row ) { ?>
								<option value="<?php echo $row['beneficiaryid'] ?>">  <?php echo $row['beneficiary_name'] ?></option>
						<?php } ?>
						</select>
                <div class="cleaner h10"></div>		
				<label for="text">Groups Name:</label><input type="text" autocomplete="off" name="title" required ></td>
				</tr>
				<div class="cleaner h10"></div>
				
				<label for="text">Groups Date:</label><input type="text" autocomplete="off" name="date" required >
				
				<div class="cleaner h10"></div>
					
                <input type="submit" id="submit" name="SaveItem" value="Save and Add" class="submit_btn float_l" />
                <input type="submit" id="submit" name="SaveClose" value="Save and Close" class="submit_btn float_l" />
			  </form>
						<?php } ?>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
 <script>
 function mySelectContainer() {
    document.getElementById("myText").select();
} 
 </script>
<?php include AS_THEME."as_footer.php" ?>
    
