<?php include JS_THEME."js_header.php"; ?>
<?php $js_db_query = "SELECT * FROM js_house ORDER BY houseid DESC LIMIT 20";
			$database = new Js_Dbconn();			
			$results = $database->get_results( $js_db_query );
		?>

	<section id="service">
		<div class="container">
			<div class="row">
				<div class="text-center col-md-12 wow fadeInDown" data-wow-delay="2000">
					<h3>Add a Tenant</h3>
				</div>
				<div class="col-md-2"></div>
				<div class="col-md-8 text-center">
				</div>
				<div class="col-md-2"></div>
				<div class="col-sm-12 col-md-12 wow fadeInLeft" data-wow-delay="2000">
					<div class="media">
						<i class="fa fa-cog pull-left media-object"></i>
							<div class="media-body">
								<form role="form" method="post" name="PostHouse" action="index.php?action=newtenant" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<tr>
					<td>Name of the Tenant:</td>
					<td><input type="text" autocomplete="off" name="name"></td>
				</tr>
				<tr>
					<td>Choose a House:</td>
					<td><select name="house" style="padding-left:20px;font-size: 30px;">
						<option style="font-size: 30px;" value="" > - Choose a House - </option>
						<?php $js_db_query = "SELECT * FROM js_house ORDER BY house_number ASC";
							$database = new Js_Dbconn();			
							$results = $database->get_results( $js_db_query );							
							foreach( $results as $row ) { ?>
								<option style="font-size: 30px;" value="<?php echo $row['house_number'] ?>">  <?php echo $row['house_location'].' - '.$row['house_type'].' '.$row['house_number'].' ('.$row['house_size'].') @'.$row['house_prices']  ?></option>
							<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Tenant ID. Number:</td>
					<td><input type="text" autocomplete="off" name="idno"></td>
				</tr>
				<tr>
					<td>Marital Status:</td>
					<td>
					<table><tr><td><input type="radio" name="status" value="Married"></td>
					<td>Married</td><td><input type="radio" name="status" value="Single"></td>
					<td>Single</td></tr></table>
				</tr>
				
				<tr>
					<td>Mobile Number:</td>
					<td><input type="text" autocomplete="off" name="contacts"></td>
				</tr>
				
				</table><br>
                        <center><input type="submit" class="submit_this" name="AddHouse" value="Save & Add">
						<input type="submit" class="submit_this" name="AddClose" value="Save & Close">
			  </center><br></form>
							</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>		
<?php include JS_THEME."js_footer.php" ?>
    
