<?php include AS_THEME."as_header.php";
	$database = new As_Dbconn();			
	$as_db_query = "SELECT * FROM as_worker ORDER BY workerid  ASC LIMIT 20";
		$results = $database->get_results( $as_db_query );
	?><div id="content">            <div id="featured">            <h2 class="h2-line-2">Add a Worker Shedule</h1> 
          <br><hr><br>
			<div class="main_content">
			<?php
				if ($database->as_num_rows( $as_db_query)<=0) { ?>
				<h2 style="color:#000">Fix the following errors first</h2>
				<ul>
				<h3><li><a href="index.php?action=worker_new">Add a Worker</a></li><h3>
				
				</ul>
			<?php } else { ?>
				<form role="form" method="post" name="Postschedule" action="index.php?action=schedule_new" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				
				<tr>
					<td>Choose a Worker:</td>
					<td>
					<select name="workerid" style="padding-left:20px;" required >
						<option value="" > - Choose a Worker - </option>			
						<?php
							foreach( $results as $row ) { ?>
								<option value="<?php echo $row['workerid'] ?>">  <?php echo $row['worker_fullname'] ?></option>
						<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Choose a Type:</td>
					<td>
						<select name="type" style="padding-left:20px;" required >	
							<option value="day" > Day Time </option>			
							<option value="night" > Night Time </option>			
							
						</select>
					</td>
				</tr>
				<tr>
					<td>Choose a Day:</td>
					<td>
						<select name="day" style="padding-left:20px;" required >	
							<option value="Sunday" > Sunday </option>			
							<option value="Monday" > Monday </option>			
							<option value="Tuesday" > Tuesday </option>			
							<option value="Wednesday" > Wednesday </option>			
							<option value="Thursday" > Thursday </option>			
							<option value="Friday" > Friday </option>			
							<option value="Sartuday" > Sartuday </option>			
							
						</select>
					</td>
				</tr>
				<tr>
					<td>Starting Time:</td>
					<td>
						<select name="starttime" style="padding-left:20px;" required >
							<option value="12:00 am" > 12:00 am </option>
							<option value="1:00 am" > 1:00 am </option>
							<option value="2:00 am" > 2:00 am </option>
							<option value="3:00 am" > 3:00 am </option>
							<option value="4:00 am" > 4:00 am </option>
							<option value="5:00 am" > 5:00 am </option>
							<option value="6:00 am" > 6:00 am </option>
							<option value="7:00 am" > 7:00 am </option>
							<option value="8:00 am" > 8:00 am </option>
							<option value="9:00 am" > 9:00 am </option>
							<option value="10:00 am" > 10:00 am </option>
							<option value="11:00 am" > 11:00 am </option>
							<option value="12:00 pm" > 12:00 pm </option>
							<option value="1:00 pm" > 1:00 pm </option>
							<option value="2:00 pm" > 2:00 pm </option>
							<option value="3:00 pm" > 3:00 pm </option>
							<option value="4:00 pm" > 4:00 pm </option>
							<option value="5:00 pm" > 5:00 pm </option>
							<option value="6:00 pm" > 6:00 pm </option>
							<option value="7:00 pm" > 7:00 pm </option>
							<option value="8:00 pm" > 8:00 pm </option>
							<option value="9:00 pm" > 9:00 pm </option>
							<option value="10:00 pm" > 10:00 pm </option>
							<option value="11:00 pm" > 11:00 pm </option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Stopping Time:</td>
					<td>
						<select name="stoptime" style="padding-left:20px;" required >
							<option value="12:00 am" > 12:00 am </option>
							<option value="1:00 am" > 1:00 am </option>
							<option value="2:00 am" > 2:00 am </option>
							<option value="3:00 am" > 3:00 am </option>
							<option value="4:00 am" > 4:00 am </option>
							<option value="5:00 am" > 5:00 am </option>
							<option value="6:00 am" > 6:00 am </option>
							<option value="7:00 am" > 7:00 am </option>
							<option value="8:00 am" > 8:00 am </option>
							<option value="9:00 am" > 9:00 am </option>
							<option value="10:00 am" > 10:00 am </option>
							<option value="11:00 am" > 11:00 am </option>
							<option value="12:00 pm" > 12:00 pm </option>
							<option value="1:00 pm" > 1:00 pm </option>
							<option value="2:00 pm" > 2:00 pm </option>
							<option value="3:00 pm" > 3:00 pm </option>
							<option value="4:00 pm" > 4:00 pm </option>
							<option value="5:00 pm" > 5:00 pm </option>
							<option value="6:00 pm" > 6:00 pm </option>
							<option value="7:00 pm" > 7:00 pm </option>
							<option value="8:00 pm" > 8:00 pm </option>
							<option value="9:00 pm" > 9:00 pm </option>
							<option value="10:00 pm" > 10:00 pm </option>
							<option value="11:00 pm" > 11:00 pm </option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Place</td>
					<td><input type="text" autocomplete="off" name="place"></td>
				</tr>
								
				</table><br>
                        <center><input type="submit" class="readmore" name="Addschedule" value="Save and Add Another schedule">
						<input type="submit" class="readmore" name="AddClose" value="Save and Close">
			  </center><br></form>
					<?php } ?>
			</div>
		<br>
      <h2><center></center></h2>
		
			
			</div>
<?php include AS_THEME."as_footer.php" ?>
    
