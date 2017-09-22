<?php include JS_THEME."js_header.php";
	$myaccount = isset( $_SESSION['kinyua_account'] ) ? $_SESSION['kinyua_account'] : "";
	?>
	<div id="site_content">	

	  <div id="content"> 
        <?php 
			
			 $js_db_query = "SELECT * FROM js_town ORDER BY town_title ASC LIMIT 20";
			$database = new Js_Dbconn();			
			$results = $database->get_results( $js_db_query );
			
			?>
	  
        <div class="content_item">
		<br><center>
			<div class="main_content" align="center"><br><br><br>
		  <h1>We Lead the Leader...</h1>
			<hr>
					<h2>Fill the form below to start Booking</h2><br>
				<form role="form" method="post" name="Start_Booking" action="index.php?page=booking">
				
				<table style="font-style:20px; width: 75%;">
					<tr>
					  <td>
						<table align="center" style="font-size: 30px;">
						<tr>
						<td><input type="radio" name="type" value="oneway"></td><td> One Way Ticket</td>
						<td> </td></tr></table>
					  </td>
					  <td>
						<table align="center" style="font-size: 30px;"><tr><td><input type="radio" name="type" value="returning"></td><td> Returning Ticket</td>
						</tr></table>
					  </td>
					</tr>
					<tr><td><h2>Travelling From:</h2></td>
					  <td>
						<select name="townfrom" style="width:300px" required >
						<option value="" > - Town Travelling From - </option>
			
						<?php
							foreach( $results as $row ) { ?>
								<option value="<?php echo $row['town_title'] ?>">  <?php echo $row['town_title'] ?></option>
						<?php } ?>
						</select>
					  </td>
					  </tr>
					  
					  <tr>
					  <td><h2>Travelling to:</h2></td>
					  <td>
					  <select name="townto" style="width:300px" required >
						<option value="" > - Town Travelling To - </option>
			
						<?php
							foreach( $results as $row ) { ?>
								<option value="<?php echo $row['town_title'] ?>">  <?php echo $row['town_title'] ?></option>
						<?php } ?>
						</select>
					  </td>
					</tr>
					
					<tr>
					  <td style="text-align:center;"><h2>Set the Date</h2></td>
					  <td><input type="text" placeholder="<?php echo date('d-m-Y') ?>" style="width:230px" name="datetravel" required ></td>
					</tr>
				</table>
				<center><input type="submit" class="submit_this" name="StartBooking" value="Book a Ticket" style="width:500px;"></center>
				</form>
			</div></center>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
