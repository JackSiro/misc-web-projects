<?php include JS_THEME."js_header.php"; ?>
	<?php $js_db_query = "SELECT * FROM js_house ORDER BY houseid DESC LIMIT 20";
		$database = new Js_Dbconn();			
		$results = $database->get_results( $js_db_query );
	?>

	<section id="service">
		<div class="container">
			<div class="row">
				<div class="text-center col-md-12 wow fadeInDown" data-wow-delay="2000">
					<h3><?php echo $database->js_num_rows( $js_db_query ) ?> Houses
		  <a class="button_small" style="float:right;width:300px;text-align:center;" href="index.php?action=newhouse">Add New House</a></h3>
				</div>
				<div class="col-md-2"></div>
				<div class="col-md-8 text-center">
				</div>
				<div class="col-md-2"></div>
				<div class="col-sm-12 col-md-12 wow fadeInLeft" data-wow-delay="2000">
					<div class="media">
						<i class="fa fa-cog pull-left media-object"></i>
							<div class="media-body">
								<table class="tt_tb">
								<thead><tr class="tt_tr">
								  <th>House</th>
								  <th>Size</th>
								  <th>Location</th>
								  <th>Type</th>
								  <th>Prices</th>
								</tr></thead>
								<tbody>
								<?php foreach( $results as $row ) { ?>
								<tr onclick="location='index.php?action=viewcat&amp;js_houseid=<?php echo $row['houseid'] ?>'">
								   <td><?php echo $row['house_number'] ?></td>
								   <td><?php echo $row['house_size'] ?></td>
								   <td><?php echo $row['house_location'] ?></td>
								   <td><?php echo $row['house_type'] ?></td>
								   <td><?php echo $row['house_prices'] ?></td>
								 
								</tr>
							
							<?php } ?>
			
                      </tbody>
                    </table>
								
								
							</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>		
<?php include JS_THEME."js_footer.php" ?>
    
