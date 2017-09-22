<?php include AS_THEME."as_header.php";
	$database = new As_Dbconn();			
	$as_db_query = "SELECT * FROM as_attendant ORDER BY attendantid  ASC LIMIT 20";
		$results = $database->get_results( $as_db_query );
	?><div id="content">            <div id="featured">            <h2 class="h2-line-2">Add a Attendant Payment</h1> 
          <br><hr><br>
			<div class="main_content">
			<?php
				if ($database->as_num_rows( $as_db_query)<=0) { ?>
				<h2 style="color:#000">Fix the following errors first</h2>
				<ul>
				<h3><li><a href="index.php?action=attendant_new">Add a Attendant</a></li><h3>
				
				</ul>
			<?php } else { ?>
				<form role="form" method="post" name="Postpayment" action="index.php?action=payment_new" >
                <table style="width:100%;font-size:20px;">
				
				<tr>
					<td>Choose a Attendant:</td>
					<td>
					<select name="attendantid" style="padding-left:20px;" required >
						<option value="" > - Choose a Attendant - </option>			
						<?php
							foreach( $results as $row ) { ?>
								<option value="<?php echo $row['attendantid'] ?>">  <?php echo $row['attendant_fullname'] ?></option>
						<?php } ?>
						</select>
					</td>
				</tr>
				
				<tr>
					<td>Session</td>
					<td><input type="text" autocomplete="off" name="session"></td>
				</tr>
					
				<tr>
					<td>Amount Paid:</td>
					<td><input type="text" autocomplete="off" name="amount"></td>
				</tr>
							
				</table><br>
                        <center><input type="submit" class="readmore" name="Addpayment" value="Save and Add Another payment">
						<input type="submit" class="readmore" name="AddClose" value="Save and Close">
			  </center><br></form>
					<?php } ?>
			</div>
		<br>
      <h2><center></center></h2>
		
			
			</div>
<?php include AS_THEME."as_footer.php" ?>
    
