<?php include JS_THEME."js_header.php"; ?>
<?php $js_db_query = "SELECT * FROM js_house ORDER BY houseid DESC LIMIT 20";
			$database = new Js_Dbconn();			
			$results = $database->get_results( $js_db_query );
		?>

	<section id="service">
		<div class="container">
			<div class="row">
				<div class="text-center col-md-12 wow fadeInDown" data-wow-delay="2000">
					<h3>Add a house</h3>
				</div>
				<div class="col-md-2"></div>
				<div class="col-md-8 text-center">
				</div>
				<div class="col-md-2"></div>
				<div class="col-sm-12 col-md-12 wow fadeInLeft" data-wow-delay="2000">
					<div class="media">
						<i class="fa fa-cog pull-left media-object"></i>
							<div class="media-body">
								<form role="form" method="post" name="PostHouse" action="index.php?action=newhouse" enctype="multipart/form-data" >
							<table style="width:100%;font-size:20px;">
							<tr>
								<td>House Number:</td>
								<td><input type="text" autocomplete="off" name="number"></td>
							</tr><tr>
								<td>House Size:</td>
								<td><input type="text" autocomplete="off" name="size"></td>
							</tr><tr>
								<td>House Location:</td>
								<td><input type="text" autocomplete="off" name="location"></td>
							</tr><tr>
								<td>House Type:</td>
								<td><input type="text" autocomplete="off" name="type"></td>
							</tr><tr>
								<td>House Prices:</td>
								<td><input type="text" autocomplete="off" name="prices"></td>
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
    
