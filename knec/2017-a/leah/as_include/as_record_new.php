<?php include AS_THEME."as_header.php";
	$database = new As_Dbconn();			
	$as_db_query = "SELECT * FROM as_item ORDER BY itemid  ASC LIMIT 20";
	$results = $database->get_results( $as_db_query );
?>		<div id="featured">
			<div class="container">
				<div class="row">
					<section class="12u">
						<div class="box">
							
							<h3>Add a Record</h3> 
							<?php
								if ($database->as_num_rows( $as_db_query)<=0) { ?>
								<h2 style="color:#000">Fix the following errors first</h2>
								<ul>
								<h3><li><a href="index.php?action=item_new">Add an Item</a></li><h3>
								
								</ul>
							<?php } else { ?>
							<form role="form" method="post" name="Postrecord" action="index.php?action=record_new" >
								<p><span> Item: </span>
									<select name="itemid" style="padding-left:20px;" required >
										<option value="" > - Choose an Item - </option>			
										<?php
											foreach( $results as $row ) { ?>
												<option value="<?php echo $row['itemid'] ?>">  <?php echo $row['item_name'] ?></option>
										<?php } ?>
									</select>
								</p>
								<p><span>Place</span><input type="text" autocomplete="off" name="place"></p>
								<p><span>Time</span>
								<select name="time" style="padding-left:20px;" required >
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
								</p>										
								<p><span>Date</span><input type="text" autocomplete="off" name="date"></p>
								<p><span>Measure</span><input type="text" autocomplete="off" name="measure"></p>
												
								<br><p><input type="submit" class="button" name="Addrecord" value="Save and Add Another record">
											<input type="submit" class="button" name="AddClose" value="Save and Close">
								</p></div></form>
							<?php } ?>
					</section>
				</div>
				<div class="divider"></div>
			</div>
		</div>
<?php include AS_THEME."as_footer.php" ?>
    
