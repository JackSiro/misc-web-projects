<?php include AS_THEME."as_header.php";
	$database = new As_Dbconn();			
	$as_db_query = "SELECT * FROM as_apartment ORDER BY apartmentid  ASC LIMIT 20";
		$results = $database->get_results( $as_db_query );
	?>    <div id="tooplate_main">                            <h1>Add a new Tenant</h1> 
          <br><hr><br>
			<div class="main_content">
			<?php
				if ($database->as_num_rows( $as_db_query)<=0) { ?>
				<h2 style="color:#000">Fix the following errors first</h2>
				<ul>
				<h3><li><a href="index.php?action=apartment_new">Add a Apartment</a></li><h3>
				
				</ul>
			<?php } else { ?>
				<form role="form" method="post" name="Posttenant" action="index.php?action=tenant_new" >
                <label for="text">Choose an Apartment:</label> 
					<select name="apartmentid" style="padding-left:20px;" required >
						<option value="" > - Choose a Apartment - </option>			
						<?php
							foreach( $results as $row ) { ?>
								<option value="<?php echo $row['apartmentid'] ?>">  <?php echo $row['apartment_fullname'] ?></option>
						<?php } ?>
						</select>
					
				
				<label for="text">Starting Date</label> <input type="text" autocomplete="off" name="startdate">
					
				<label for="text">Amount Paid:</label> <input type="text" autocomplete="off" name="amount">
				<br>
                    <center>
						<input type="submit" class="submit" name="Addtenant" value="Save and Add Another tenant">
						<input type="submit" class="submit" name="AddClose" value="Save and Close">
					</center>
				<br></form>
					<?php } ?>
			</div>
		<br>
      <h2><center></center></h2>
		
			
			</div>
<?php include AS_THEME."as_footer.php" ?>
    
